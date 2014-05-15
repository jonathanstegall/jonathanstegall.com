---
layout: post
status: publish
title: JavaScript functions on page load
date: 2008-04-17 11:30:15.000000000 -04:00
type: post
categories:
- programming
- JavaScript
tags:
- jquery
- JavaScript
- ie6
---
One of the biggest annoyances (for me) about JavaScript is that the famous `window.onload = functionname;` only works once on a given page.

Over the years, many people have written various solutions to go around this, and cause the page to load multiple functions. Typically, my favorite is <a href="http://simonwillison.net/2004/May/26/addLoadEvent/">this one</a> from <a href="http://simonwillison.net/">Simon Wilson</a>. It's easy, concise, and works in a myriad of different situations.

The other day, though, I ran into a situation where it didn't work. I'm still not sure what the issue was, but Internet Explorer 6 (of course) refused to load a couple of the functions I was trying to use. Firefox, IE7, Safari, etc. all loaded them very nicely, but IE6 remained stubborn. I tried everything: rewriting the functions, removing everything else in the page, changing random things that were unrelated, and so on, all to no avail.

Finally, I decided to try <a href="http://jquery.com">jQuery</a>'s load solution:

~~~~ javascript
$(document).ready(function() {
    functionname();
});
~~~~

This worked perfectly, in every browser. It didn't occur to me to use this, mainly because the offending functions are not jQuery functions, and that particular page in the site didn't have any jQuery on it at all. Now, it does.

File this away under: "I'm already using jQuery on a site, and I need to load some non-jQuery functions."
