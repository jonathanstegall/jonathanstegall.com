---
layout: post
status: publish
title: Choose Authors From Registered Users
excerpt: "I've made my first, hopefully useful for public consumption, plugin for <a href=\"http://wordpress.org/\">WordPress</a>. I've made a few other plugins, but none of them seemed to be really useful or customizable to benefit others."
type: post
categories:
- blogging
- software
- programming
- php
tags: []
---
I've made my first, hopefully useful for public consumption, plugin for <a href="http://wordpress.org/">WordPress</a>. I've made a few other plugins, but none of them seemed to be really useful or customizable to benefit others.
<h2>About this plugin</h2>
This plugin uses the same data as the WordPress function <code>wp_list_authors();</code>. This function lists all of the authors that have posts associated with their accounts. See the <a href="http://codex.wordpress.org/Template_Tags/wp_list_authors">Codex</a> for more information about this function.

Note that you cannot use this function outside the WordPress Loop. There is another <a href="http://guff.szub.net/2005/01/31/get-author-profile/">plugin</a> that creates a list of authors outside the loop, and it works very well for this purpose.

My plugin, which is a widget that can be used in any widgetized theme, allows you to pick users and list them by inserting the widget into your theme. If you have users with posts who should not be listed, simply do not check their names.

If there is interest, I'll expand this so that it can be used inside the Loop as well, but it seems to me that it is most practical for sidebars.
<h2>Why make this plugin?</h2>
This plugin is not an attempt to compete with any of the methods listed above, although certainly it does have some of the same functionality and could easily be expanded to have all of the same functionality. Its difference is that it allows for users with posts to be excluded from the list. There are a couple of situations where this could be useful.
<ul>
  <li>You have a blog with a large number of authors, and would like to feature a few of them. Maybe they are more popular, or have more posts, or are more regular posters. You can check these to be included in the list.</li>
  <li>On the flip side, you could have a blog with certain authors that you do not want to feature. You can simply leave these authors out of the list.</li>
  <li>You use your user pages to include users that have comments, instead of just users that have posts. The configuration of this plugin shows all users, regardless of whether or not they have posted or are assigned a certain role.</li>
</ul>
<h2>Download</h2>
Without further ado, feel free to download and try out this plugin.
<dl>
  <dt>Plugin:</dt>
  <dd>Choose Authors From Registered Users (maybe it needs a better name).</dd>
  <dt>Version:</dt>
  <dd>0.5</dd>
  <dt>Download</dt>
  <dd><a href='http://jonathanstegall.com/wp-content/uploads/2008/07/wp-chooseauthors.zip'>wp-chooseauthors.zip</a></dd>
</dl>
