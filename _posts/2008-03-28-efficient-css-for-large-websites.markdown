---
layout: post
status: publish
title: Efficient CSS for large websites
type: post
categories:
- design
- CSS
tags:
- css efficiency
- large website css
- CSS
comments:
- id: 106
  author: jonathan stegall &raquo; Blog Archive &raquo; More CSS for large websites
  author_email: ''
  author_url: http://jonathanstegall.com/2008/03/29/more-css-for-large-websites/
  date: '2008-03-29 18:38:10 -0400'
  date_gmt: '2008-03-29 23:38:10 -0400'
  content: "[...] want to continue with my thoughts on creating and maintaining CSS
    on very large websites. In my last post on the subject, I mentioned that there
    are at least ten different layout conventions that I deal [...]"
---
I could see this becoming a series of posts, but for now I'll start with one. I spend my days, to a large extent, dealing with <acronym title="HyperText Markup Language">HTML</acronym> and <acronym title="Cascading Style Sheets">CSS</acronym> on a very large website.

I used to spend the majority of my days dealing with <acronym title="eXtensible HyperText Markup Language">XHTML</acronym> and <acronym title="Cascading Style Sheets">CSS</acronym> in relatively small websites. Rather than having, say, four or five different layout conventions, I now deal with at least ten different layout conventions. There are sections of the site that are of varying ages, and sections that were designed at different times and by different people in the company's history. Any very large website is likely to have these kind of issues.

One of the results of this shift in my work situation is that I now have very large stylesheets. While there is a large amount of re-used code, re-used styles, and so on, there is so much going on that it is difficult to have efficiency.

There are a number of <acronym title="Cascading Style Sheets">CSS</acronym> frameworks that have come out in recent years, from <a href="http://www.google.com/url?sa=t&amp;ct=res&amp;cd=1&amp;url=http%3A%2F%2Fdeveloper.yahoo.com%2Fyui%2Fgrids%2F&amp;ei=avfsR-f6LIT8hASZla0N&amp;usg=AFQjCNGeq3Wxmzp_kfW9PfFolWQKK-zccQ&amp;sig2=c4rg0Vh6ib8oZYCT2uRNKw">YUI</a> to <a href="http://www.google.com/url?sa=t&amp;ct=res&amp;cd=1&amp;url=http%3A%2F%2Fcode.google.com%2Fp%2Fblueprintcss%2F&amp;ei=u_fsR92YM5iWggTzubkV&amp;usg=AFQjCNH665KFPzNHIXDu-_FlcgIxsh5-dA&amp;sig2=6Nhm553b3e4uiPr4QdfRtA">Blueprint</a> to others. This trend is similar to the trend of JavaScript libraries, of course, and it is seen as both a good thing and a bad thing, depending on how it is used.

One of the things that I have lately begun to make use of, though, is the YUI convention of creating several different layouts based on one selector. Thus, we might have the following:

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

The benefit of this is that layout-a and layout-b can share an identical structure in their <acronym title="HyperText Markup Language">HTML</acronym>, and be styled to match almost any layout convention with less code and more efficiency than, for example, creating different divs for all of the sections.

Any styles that are shared between the layouts are, of course, shared. They don't have to target layout-a or layout-b. As I begin to implement this, I find code becoming more efficient and I feel that it would be much easier for someone else to come along and have to deal with it.

When I first began working on this type of site, I was very good at <acronym title="HyperText Markup Language">HTML</acronym> and <acronym title="Cascading Style Sheets">CSS</acronym>, but apparently I was not very efficient. This degree of efficiency simply wasn't necessary, although it certainly could have been beneficial. I post all this because I have a feeling that I'm not the only one who could benefit from this kind of thought shift.
