---
layout: post
status: publish
title: jQuery Auto Suggest with MySQL
excerpt: "Recently, I was building a site at work that benefited from an auto suggest
  feature in some of the form fields. This, of course, is the kind of thing that you
  see when you do Google searches. I've done some similar things in the past, but
  I've never had a solid, consistent solution that I could use for this kind of thing.\r\n\r\nIn
  knowing this, I spent some time looking at a large number of <a href=\"http://jquery.com/\">jQuery</a>
  plugins that do this. For some time, I couldn't find any that fit the specific need
  I had. There was one plugin that I thought would work, but I couldn't get it to
  work with a MySQL database, as it was designed to work with plain text lists in
  PHP. It may seem pathetic, but I couldn't translate it."
type: post
categories:
- design
- JavaScript
- php
tags:
- mysql
- jquery
- php
- jquery auto suggest
---
Recently, I was building a site at work that benefited from an auto suggest feature in some of the form fields. This, of course, is the kind of thing that you see when you do Google searches. I've done some similar things in the past, but I've never had a solid, consistent solution that I could use for this kind of thing.

In knowing this, I spent some time looking at a large number of <a href="http://jquery.com/">jQuery</a> plugins that do this. For some time, I couldn't find any that fit the specific need I had. There was one plugin that I thought would work, but I couldn't get it to work with a MySQL database, as it was designed to work with plain text lists in PHP. It may seem pathetic, but I couldn't translate it.

So finally, I found the specific solution I wanted, and also manipulated the code examples enough to get it to work with MySQL. In light of this, and in light of my difficulty finding good examples for this, I want to give an example here, for myself and any others with the issue.
<h2>Steps</h2>
<ol>
	<li>Download <a href="http://jquery.com/">the latest jQuery</a>.</li>
	<li>Download the latest <a href="http://bassistance.de/jquery-plugins/jquery-plugin-autocomplete/">Autocomplete Plugin</a> from <a href="http://bassistance.de">bassistance.de</a>.</li>
	<li>Include the <a href="http://plugins.jquery.com/project/bgiframe">bgiframe plugin</a> for the sake of Internet Explorer users, in case this appears within a larger form. You can include this with a <a href="http://www.quirksmode.org/css/condcom.html">conditional comment</a> if you wish.</li>
	<li>Create a MySQL database that contains the items from which you'll be suggesting. There are many great tutorials out there for this kind of thing.</li>
	<li>Include your JavaScript files in a page with the following HTML, additional JavaScript, PHP, and CSS.</li>
</ol>
<h2>HTML form markup</h2>
So let's say we have the following XHTML. I'm not concerned with specific areas of content at the moment, just a basic auto-suggest form that does not submit to anything in particular.

~~~~ html
<div id="wrapper">
  <form id="suggest-form">
    <div>
      <label for="field">Search for something</label>
      <input id="field" name="field" type="text"/>
    </div>
  </form>
</div>
~~~~

<h2>jQuery Auto Suggest code</h2>
The jQuery plugin for this technique works in such a way that it examines the contents of the text field as users type in it, and as it does this it sends requests to PHP to see what contents in the database (or other PHP content) match what is being typed. Each time a letter is pressed or deleted, this occurs again. jQuery then creates HTML that displays the results to the user.

After the plugin is loaded, the following JavaScript is loaded. For myself, I normally put this into a main.js file, though for the purposes of this example I have kept it inside the source, and you can view it there if you wish.

~~~~ javascript
function suggestValues() {
  $("#field").autocomplete("http://design.jonathanstegall.com/autosuggest/suggestions.php", {
    width: 260,
    selectFirst: false
  });
}
$(document).ready(function(){
  suggestValues();
});
~~~~

<h2>PHP search code (suggestions.php)</h2>
In this particular example, we'll use PHP to connect to a MySQL database and get search results. I have a specific test database here, with keywords that are used in this blog. Obviously, you'll need to modify the code for your own purposes, and there is no reason to use suggestions.php; you'll just need to take note of the filename in order to include it in the JavaScript code above.

~~~~ php
// First, you will need to have an active connection to your database. I can’t possibly predict all the ways that this can happen, so I will assume that you are already connected to it and can run queries on it.
function autosuggest() {
  $q = strtolower($_GET["q"]);
  if (!$q) return;
  $query = "SELECT name FROM keywords";
  $results = mysql_query($query);
  while($result = mysql_fetch_array($results)) {
    $name = $result['name'];
    if (strpos(strtolower($name), $q) !== false) {
      echo "$name\n";
    };
  };
}
autosuggest();
~~~~

<h2>CSS example</h2>
There is also some CSS that needs to be present to account for the default behavior of the plugin. The JavaScript, as I said, creates HTML on the fly, and this HTML can be styled very easily. Here is an example of what I have used. You can also see this in the source, if you view it, though again it would normally be inside a CSS file.

~~~~ css
.ac_results {
  padding: 0;
  border: 1px solid #333;
  background-color: #fff;
  overflow: hidden;
  z-index: 99999;
  text-align: left;
}
.ac_results ul {
  width: 100%;
  list-style-position: outside;
  list-style: none;
  padding: 0;
  margin: 0;
}
.ac_results li {
  margin: 0;
  padding: 2px 5px;
  cursor: default;
  display: block;
  font: menu;
  font-size: 10px;
  line-height: 16px;
  overflow: hidden;
}
.ac_results {
  background-color: #eee;
}
.ac_over {
  background-color: #0e2221;
  color: #fff;
}
~~~~

<h2>Put it all together</h2>
I have created a file at <a href="http://design.jonathanstegall.com/jquery/autosuggest/">http://design.jonathanstegall.com/jquery/autosuggest/</a> that demonstrates the jQuery auto suggest technique that I have discussed. This is a very foundational concept, and the plugin does come with some configuration options, but I feel that this is important since most of us will be using this plugin with a database of some kind.

Feel free to leave any additional thoughts or questions in the comments.
