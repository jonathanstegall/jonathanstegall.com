---
layout: post
status: publish
title: CSS and inflexible CMS's
date: 2008-01-21 10:39:17.000000000 -05:00
type: post
excerpt: "I don't write about <abbr title=\"Cascading Style Sheets\">CSS</abbr> as much as I'd like to. I spend a lot of time working with them on an advanced level, however, both in my day job and in any side projects."
categories:
- design
- CSS
tags:
- css difficulties
- working with content management systems
---
I don't write about <abbr title="Cascading Style Sheets">CSS</abbr> as much as I'd like to. I spend a lot of time working with them on an advanced level, however, both in my day job and in any side projects.

I spent a few minutes looking around on Google for issues that arise when designers need to work with and use <abbr title="Cascading Style Sheets">CSS</abbr> within the confines of a <abbr title="Content Management System">CMS</abbr> that does not allow access to things inside the <code>head</code> of the document. Apparently, this is not a rare issue, so I'd like to post a few solutions that, while they are not ideal, do work.

Disclaimer: these options do not <a href="http://validator.w3.org/">validate</a>. The only valid way to include a <abbr title="Cascading Style Sheet">CSS</abbr> is inside the <code>head</code> of the document

##  Option One
Use inline styles. This method is, unfortunately, still the most common way of doing this. A designer might have the following code in place:

~~~~ html
<div class="myClass" id="myDiv">
    <p>foo. I'm a div with an ID and a class, but my ID and class don't do what I want them to do. Bah.</p>
</div>
~~~~

If the div is, for example, defined with its ID or class as a very small div floated to the right, but it needs to be a very large div floated to the left, a designer might do this:

~~~~ html
<div style="float: left; width: 500px; margin: 5px;">
    <p>foo. I'm a div without an ID and class, and I have ugly inline styles.</p>
</div>
~~~~

## Option Two 
Option two allows the designer to access the <code>head</code> of the document through JavaScript. There are a number of techniques for doing this, but they have significant issues.

Mainly, this breaks the separation between content, style, and behavior that provides much of the underlying theory of why a designer would want to use <abbr title="Cascading Style Sheets">CSS</abbr> in the first place. In addition to this, it breaks the accessibility of the page. Anything that doesn't have to be done with JavaScript, shouldn't be done with JavaScript.

## Option Three
This is the option I spend a lot of time using when working in this situation. A designer might have the following scenario:

~~~~ html
<head>
    <link href="a stylesheet I cannot access" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
    <div id="myDiv"><p>foo. I'm a div that needs some styles. I might be on thousands of pages across this site.</p>
    </div>
</body>
~~~~

~~~~ html
<head>
    <link href="a stylesheet I cannot access" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
    <link href="mycss.css" rel="stylesheet" type="text/css" media="screen" />
    <div id="myDiv">
    <p>foo. I'm a div that has styles, even though they're not where they should be. I might be on thousands of pages across this site.</p>
    </div>
</body>
~~~~

The benefit of this is that it works in all major browsers and on all major platforms and, at least, mobile devices (this statement counts Linux and the iPhone as major platforms, for what it's worth). Also, of course, there is the benefit that the given stylesheet can be called throughout the site, which inline styles do not allow.

There are a few downsides to this technique. Browsers, for one, have to work a bit harder to do this kind of thing. When they encounter style information outside the <code>head</code>, whether it's in an external file or in the page, they have to break their normal flow of rendering content, and thus this causes pages to be slower. This slowdown, however, is not usually noticeable.

Of course, because browsers have to work harder to do this, and because it does not validate, it is possible (though it is highly unlikely) that future versions may not support this kind of functionality.
