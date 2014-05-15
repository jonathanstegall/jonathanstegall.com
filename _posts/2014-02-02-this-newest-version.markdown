---
date: 2014-02-02 01:08:03.000000000 -05:00
layout: post
status: publish
title: This newest version
excerpt: If you've been to this site before over the years, you may have realized I did a redesign recently. Around Christmas, I finally launched version 4 since I bought this domain in 2006 (many versions of personal sites existed before that). I'm reasonably happy with this version, and I've been wanting to take a little time to write about it.
type: post
categories:
- design
tags:
- design
- wordpress
- CSS
- responsive design
- sass
---
If you've been to this site before over the years, you may have realized I did a redesign recently. Around Christmas, I finally launched version 4 since I bought this domain in 2006 (many versions of personal sites existed before that). [^1] I'm reasonably happy with this version, and I've been wanting to take a little time to write about it.

## WordPress

I've been using WordPress on some level since 2006, I think it was, but I didn't start using it for my own site until 2007. I continued using it this time, though I was considering a switch to Jekyll. I may still do that switch, but I wanted to make sure I didn't make design or content decisions based on my limited knowledge of Jekyll rather than what I actually wanted to achieve. With this version I chose to use [Timber](http://jarednova.github.io/timber/), not because I'm not comfortable with PHP or WordPress itself, but because I wanted to see how the separation created by a template language would change the way I worked.

Generally I found Timber quite helpful, and in the cases where it wasn't the documentation was quite nice. I even saw Jared make a change based on a GitHub issue I submitted. Filament Group has been one of my favorite agencies for a long time, and since it came from them I knew I could trust it. Overall my only complaint is that it seems to run a bit slower than normal WordPress. But this may be because I was doing something wrong, or didn't take ideal advantage of the performance features within the plugin. In any case, I had to switch from WP Super Cache to W3 Total Cache to get the site to load reasonably. This is one of the reasons I'm still thinking about Jekyll.

But beyond the technical parts, I also stripped out a lot of the things I was previously doing with WordPress. I started using a Format for my [aside posts](http://jonathanstegall.com/items-of-interest/) to try to make them a bit easier on the backend. I used to use the Delicious API until they took away the feature I was using, and then the whole thing just languished. So it works now, at least. I took out or expanded archives, got rid of comments (because for my site it wasn't a helpful feature, and in general I think it's one of the scourges of the internet), and took out a lot of random things. I also made code display better.

In general I'm happy with these changes, but mostly because it just seems simpler to use and maintain. I don't write a whole lot, and all that added organization just seemed unhelpful.

## Design

From a design side, I finally went responsive and mobile first. Since I was in an experimental mood for this version I decided to try using someone else's framework. I've written before about [my feelings on Bootstrap](http://jonathanstegall.com/2012/12/17/thoughts-from-a-big-twitter-bootstrap-project/) (although it seems far better in version 3), so I went looking for something more minimal that would still save me time writing stuff I would have written on my own anyway. I ended up using [inuitcss](http://inuitcss.com/), sort of. It has a lot of functionality I didn't use, and it has some other functionality that I overwrote, but it makes it so easy to do both of those things that I was quite happy with it anyway.

This project was the first time I've used Sass, as well. I used LESS at a previous job and have used it on some freelance projects and been happy with it, but at this point I predict Sass has a better future and I wanted to switch. At my current job I haven't been able to introduce either yet, so it was fantastic to introduce one of them into my personal work.

It was fun to take the brand I created in 2009 and bring it forward five years, hopefully in a way that it won't begin to look so dated so quickly. I introduced web fonts from Typekit (Athelas and Tablet Gothic are lovely typefaces, especially for a Tolkien nerd) and took advantage with bigger text and more space, simplified (and, I think, beautified) the color scheme and imagery, and took advantage of vertical space. I started with mobile, and I only changed things when it started to look broken as the screen got bigger. I've been preaching the merits of this approach for more than three years in my various jobs, so it was great to have a client in myself who had the time and buy-in to use it.

I'm happy with the design, as I think it gives a solid foundation without stuff I'll want to get rid of later. I've had minimal time to look for bugs and such, but I'm sure it has some, especially with old posts I haven't checked.

## Content and such

I loved being able to strip out organizational stuff, and I hope it works well. I also took the time to rewrite static pages, get rid of old and irrelevant portfolio items, and stop pretending people care about related posts. I think there is room to expand the model I've left myself with - maybe create some additional custom page types, and I may need to revisit the archives at some point, but in general I am pleased.

My hope is that being able to look at my own site again will help me be more motivated to write, as I've (obviously) let my writing languish the last couple of years. Fatherhood and job changes will do that to a person, apparently. But there is hope now!

I do hope folks enjoy the changes. If you have something to say, feel free to use the email at the bottom, or talk to me on [Twitter](http://twitter.com/jonathanstegall).

[^1]: I saved [the most recent version](http://2009.jonathanstegall.com/), but I don't think I have copies of any of the others.