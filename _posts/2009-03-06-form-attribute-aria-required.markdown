---
layout: post
status: publish
title: Form attribute aria-required
excerpt: 'Recently, I noticed that the default <a href="http://www.wordpress.org/">WordPress</a>
  theme includes the following code in its comment form:'
date: 2009-03-06 20:00:35.000000000 -05:00
type: post
categories:
- design
- web standards
tags:
- aria-required
- xhtml aria-required
- accessibility
---
Recently, I noticed that the default <a href="http://www.wordpress.org/">WordPress</a> theme was updated to include the following code on the name and email fields in its comment form:

~~~~ php
<?php
if ($req) echo "aria-required='true'";
?>
~~~~

There is very little mention of this code as part of WordPress (because it is just the default theme, and most people do not use it), though there are a few questions of people who are concerned with why it doesn't <a href="http://validator.w3.org/">validate</a>. Sometimes, people are encouraged to simply remove it. From one forum post, though:

<blockquote cite="http://www.sitepoint.com/forums/showthread.php?t=599318"><p>From what I have read, aria-required is a handicap-man accessibility feature that allows folks with disabilities to know that certain fields are required by way of a screen readers voice alert saying, "hey moron, this is a required field". Lots of browsers, well I should say some, do support it and some don't...</p><p>So, for now the html W3 consortium is not going to accept aria-required until MS decides to play ball</p></blockquote>

Moron talk toward users aside, this is fantastic information for anyone who might run into the fact that their WordPress code no longer validates if they use a theme that adds this.

Occasionally, when I write I run posts through the validator to ensure that I haven't forgotten or added something, and it was in one of these validations that I noticed the attribute. I'm keeping it in this new theme, even though it doesn't validate, as accessibility is a desperately important and neglected part of high quality code.

Let this be a lesson, or a reminder, that valid code is not enough, nor is it always best: it can easily be inaccessible and non-semantic, and still be valid.
