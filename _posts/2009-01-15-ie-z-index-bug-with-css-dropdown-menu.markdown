---
layout: post
status: publish
title: IE z-index bug with CSS dropdown menu
excerpt: "In the W3C's specs, z-index is designed to affect the stacking order of
  positioned elements on a web page. So, an element with a z-index of 2 should always
  appear above an element with a z-index of 1.\r\n\r\nIn Internet Explorer, this doesn't
  work like it should. Internet Explorer resets the stack when the positioned elements
  are separated from each other."
date: 2009-01-15
categories:
- design
- CSS
- web standards
tags:
- web standards
- ie z-index bug
- internet explorer z-index bug
- internet explorer
---
Standards-aware web designers generally know of the <a href="http://verens.com/archives/2005/07/15/ie-z-index-bug/">z-index bug</a> in all versions of Internet Explorer (though, version 8 is rumored to fix it).

In the W3C's specs, z-index is designed to affect the stacking order of positioned elements on a web page. So, an element with a z-index of 2 should always appear above an element with a z-index of 1.

In Internet Explorer, this doesn't work like it should. Internet Explorer resets the stack when the positioned elements are separated from each other.
<h2>Example</h2>
So let's say we have the following HTML. Fairly standard header, navigation, etc.

~~~~ html
<div id="wrapper">
    <div id="header">
        <ul id="nav">
            <li>
                <a href="#">home</a>
            </li>
            <li>
                <a href="#">item one</a>
                <ul>
                    <li>
                        <a href="#">sub item one</a>
                    </li>
                    <li>
                        <a href="#">sub item two</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">item two</a>
                <ul>
                    <li>
                        <a href="#">sub item one</a>
                    </li>
                    <li>
                        <a href="#">sub item two</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <div id="container">
        <h1>Hi. This is a positioned H1</h1>
        <p>This page is just some friendly content to show you just how bad IE really is.</p>
    </div>
</div>
~~~~

Then, we have the following CSS.

~~~~ css
#wrapper #header {
    position: relative;
}
#wrapper #nav {
    clear: both;
    margin: 0 5px;
    padding: 0 5px;
    width: 750px;
    height: 30px;
    list-style: none;
    border-top: 1px solid #335a86;
    border-bottom: 1px solid #335a86;
    text-align: center;
    position: relative;
    z-index: 2;
}
#wrapper #nav li {
    float: left;
    margin: 0;
    padding: 0 0 5px 0;
    border: 0;
    position: relative;
}
#wrapper #nav li a {
    margin: 0;
    padding: 7px 15px;
    display: block;
    text-decoration: none;
    font-size: 1.2em;
}
#wrapper #nav a:link, #wrapper #nav a:visited {
    color: #888;
}
#wrapper #nav a:hover, #wrapper #nav a:focus {
    color: #335a86;
}
#wrapper #nav li ul {
    background-color: #ccc;
    width: 150px;
    height: auto;
    list-style: none;
    margin: 0;
    padding: 5px 0 10px 0;
    border: 0;
    text-align: left;
    position: absolute;
    display: none;
}
#wrapper #nav li ul li {
    float: none;
    margin: 0;
    line-height: 30px;
    height: 30px;
}
#wrapper #nav li ul a {
    padding: 7px 10px;
    white-space: nowrap;
    display: block;
}
#wrapper #nav li:hover ul {
    display: block;
}
#wrapper #container {
    padding: 10px;
    position: relative;
}
#wrapper h1 {
    position: absolute;
    left: 10px;
    top: 10px;
    height: 60px;
    line-height: 60px;
    vertical-align: middle;
    font-size: 2em;
    background: #335a86;
    color: #fff;
}
#wrapper #container p {
    margin-top: 60px;
}
~~~~

This is very common code used to trigger a CSS dropdown menu in all modern browsers. Remember that IE6, of course, requires a small JavaScript. A good example is the <a href="http://www.alistapart.com/articles/dropdowns">Sons of Suckerfish</a>. I do not have this JavaScript on my current example, since there are plenty of other great articles about that.

<div class="image-main"><a href="http://design.jonathanstegall.com/css/iedropdownbug.html"><img src="/wp-content/uploads/2009/01/iedropdownbug-218x140.jpg" alt="IE Dropdown Bug Example" class="two-eighteen" /></a><p class="caption"><a href="http://design.jonathanstegall.com/css/iedropdownbug.html">IE7 Example - click to enlarge</a></p></div>

When the code below the navigation, in this case the absolutely positioned h1, is any positioned element (or a select element, Flash movie, etc.), all versions of Internet Explorer prior to version 8 will cause the dropdown menus to fall behind the content.
<h2>The Fix</h2>
The fix for this is very simple, but there are incredibly large websites that use jumbled masses of iframes, extra divs, and other horrors to get Internet Explorer to display the dropdowns above the offending elements.

For a fix, we use the following CSS for the header div. See the screenshot for an example of this (again, in IE7). Click it to see a larger version.

~~~~ css
#wrapper #header {
    position: relative;
    z-index: 2;
}
~~~~

Now, you will also need to make sure that your container div, whatever it is called, is styled correctly. In my example:

~~~~ css
#wrapper #container {
    position: relative;
}
~~~~

This ensures that the <code>header</code> and the <code>container</code>, whatever you call them, understand their relationship to each other for the z-index fix to work.

<div class="image-main"><a href="http://design.jonathanstegall.com/css/iedropdownfix.html"><img src="/wp-content/uploads/2009/01/iedropdownfix-218x140.jpg" alt="IE Dropdown Bug Fix Example" class="two-eighteen" /></a><p class="caption"><a href="http://design.jonathanstegall.com/css/iedropdownfix.html">IE7 Example - click to enlarge</a></p></div>

This fix causes the dropdowns to appear above everything that is inside the content areas of the page. It works in IE7 and IE6. My example adds some code to show the <code>select</code> element, which is another common offender.
