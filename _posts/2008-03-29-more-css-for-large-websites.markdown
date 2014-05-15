---
layout: post
status: publish
title: More CSS for large websites
date: 2008-03-29 18:37:53.000000000 -04:00
type: post
categories:
- design
- CSS
tags:
- css efficiency
- large website css
- CSS
---
I want to continue with my thoughts on creating and maintaining CSS on very large websites. In <a href="http://jonathanstegall.com/2008/03/28/efficient-css-for-large-websites/">my last post</a> on the subject, I mentioned that there are at least ten different layout conventions that I deal with on a regular basis.

For what it's worth, I want to add a little context and say that those layout conventions (and ten is a rough estimate) power somewhere around four hundred pages, give or take a few. Certainly, the website is much larger than that number, but again those are the ones with which I have significant interaction.

Again, none of this is new to someone who works on a very large website, but all of it was new to me. In light of this, I want to shed a little more light on some of the techniques I use or have used.
<h2>Structured Sections of Styles</h2>
I began to practice this technique when most of my days were spent working with relatively small sites, that typically had a total page number of less than fifty. However, many stylesheets don't do this, so I think it's worth mentioning.

Structuring sections of styles allows the designer to keep things in logical places within the stylesheet: such as layout styles, link styles, typography, browser fixes, and so on. An example goes like this:
<h3>HTML:</h3>
~~~~ html
<div class="layout-a" id="wrapper">
    <div id="subContent">
        <p>content</p>
    </div>
    <div id="mainContent">
        <p>content</p>
    </div>
</div>
~~~~

~~~~ html
<div class="layout-b" id="wrapper">
    <div id="subContent">
        <p>content</p>
    </div>
    <div id="mainContent">
        <p>content</p>
    </div>
</div>
~~~~

<h3>CSS:</h3>
~~~~ css
body {
    background: #fff;
    font-size: 76%;
    text-align: center;
}
/* Layout Styles */
/* constants */
#wrapper {
    width: 760px;
    margin: 0 auto;
    text-align: left;
    font: 1em normal Verdana, Arial, Helvetica, sans-serif;
}
/* end constants */
/* layout-a */
.layout-a #subContent {
    width: 260px;
    float: left;
}
.layout-a #mainContent {
    width: 400px;
    float: right;
}
/* end layout-a */
/* layout-b */
.layout-b #mainContent {
    width: 400px;
    float: left;
}
.layout-b #subContent {
    width: 260px;
    float: right;
}
/* end layout-b */
/* Link Styles */
/* constants */
a:link, a:visited {
    color: #f00;
    text-decoration: underline;
}
a:hover, a:focus, a:active {
    color: f00;
    text-decoration: none;
}
~~~~
Thus, styles become very nicely organized and can easily be found by another designer, or a developer, or someone learning from your source code.
<h2>Multiple stylesheets</h2>
Most large websites already do this, but it is important to mention that multiple stylesheets are an amazing organizational tool, beyond (but not replacing) the need to structure the stylesheets themselves.

Example:

~~~~ html
<link rel="stylesheet" href="reset.css" type="text/css" media="screen, projection" />
<link rel="stylesheet" href="site.css" type="text/css" media="screen, projection" />
<link rel="stylesheet" href="businessUnit.css" type="text/css" media="screen, projection" />
~~~~

For myself, I use <a href="http://meyerweb.com/">Eric Meyer</a>'s great <a href="http://meyerweb.com/eric/tools/css/reset/index.html">reset stylesheet</a> to remove default browser styles (as well as, in my case, default styles from the <acronym title="Content Management System">CMS</acronym> that conflict with my needs). There are several others around the internet. Use whatever fits.

In my situation, several different business units have very different styles for their respective sections of the website. So, its beneficial to add these in separately when they do not overlap. Often, each business unit has several different layout conventions, hence the use of layout-a and layout-b, and so on.
<h2>Calm down</h2>
Unfortunately, most large websites do not validate, neither in their <a href="http://validator.w3.org/">HTML</a> or their <a href="http://jigsaw.w3.org/css-validator/">CSS</a>. This can be a constant source of frustration for standards-aware designers and developers. Multiple people may maintain the code. Some of them may be serious back-end programmers who don't care about what the browser actually receives at all. Others may be non-technology people who barely know what a browser is, but have the responsibility of maintaining code for one reason or another.

And that has to become okay, at least to an extent. Otherwise, jobs become depressing. Certainly, work for better support of web standards. Push the fact that even the IE team wants to support standards. Push for accessibility, and the fact that <a href="http://www.webstandards.org/2007/10/05/will-target-get-schooled/">major websites are being sued</a> for accessibility violations. These things are important.

But every once in a while, take a flight for a few hours. Rejoice in the fact that, at least for now, people can't call your cell phone and tell you that the world is ending, and expect you to do something about it. They'll have to wait till you land.
