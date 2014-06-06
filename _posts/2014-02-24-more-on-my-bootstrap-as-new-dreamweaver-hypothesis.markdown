---
layout: post
status: publish
title: More on my Bootstrap as "new Dreamweaver" hypothesis
excerpt: I was fortunate to be able to attend <a href="http://aneventapart.com/event/atlanta-2014">An
  Event Apart in Atlanta</a> last week. One of the talks was from Luke Wroblewski,
  and it was called "Screen Time." In it, he examined the vast numbers of screen resolutions
  and rotations and sizes and types, how much stuff we are trying to throw onto said
  screens, and how we can better design in light of these things. He addressed in
  varying degrees of depth concepts like CSS optimization, SVG, responsive images,
  horizontal and vertical media queries, input methods, and postures at which humans
  use devices.
type: post
categories:
- design
---
I was fortunate to be able to attend <a href="http://aneventapart.com/event/atlanta-2014">An Event Apart in Atlanta</a> last week. [^1] One of the talks was from Luke Wroblewski, and it was called "Screen Time." In it, he examined the vast numbers of screen resolutions and rotations and sizes and types, how much stuff we are trying to throw onto said screens, and how we can better design in light of these things. He addressed in varying degrees of depth concepts like CSS optimization, SVG, responsive images, horizontal and vertical media queries, input methods, and postures at which humans use devices.

All of this was brilliant and challenging and worthy of engagement, as Luke always is. During the talk, an idea came into my head and I tweeted it:

<blockquote class="twitter-tweet" lang="en"><p>Hypothesis: Bootstrap is the new Dreamweaver. It&#39;s creating standards for design implementation that we&#39;ll increasingly regret. <a href="https://twitter.com/search?q=%23aeaatl&amp;src=hash">#aeaatl</a></p>&mdash; Jonathan Stegall (@jonathanstegall) <a href="https://twitter.com/jonathanstegall/statuses/435501228584611840">February 17, 2014</a></blockquote>

<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

The idea seemed to hit a nerve of some kind. I mostly got agreements, along with some respectful disagreements and requests to elaborate. To honor those requests, I first wanted to give that brief amount of context to Luke&#8217;s talk, and then take a look at why I believe the overall hypothesis to be true.

## Dreamweaver

If you've never used Dreamweaver and are interested in this conversation, Dreamweaver is a product owned by Adobe (and previously by Macromedia, where Adobe made various attempts to defeat it before finally buying it), and it used to be one of the most common tools web designers used to make websites. It was partly (predominantly?) a WYSIWYG editor, but it also had a code editor, a file manager, some CSS tools, and various ways of integrating with server-side technologies.

For myself, I learned to make websites with Notepad starting in 1997, and then I discovered Flash in 2001. I used Dreamweaver's code editor and file manager (without learning any of its other features) heavily from 2004 (when Flash began to fade away for me) until around 2008, when I switched to the wonderful text editors available on the Mac.

With that context, I'll say this: it was (and I suspect it still is) quite possible to design advanced, technically sound, high quality websites with Dreamweaver. But for the most part, in reality, it was an application that designers used, taking advantage of its default settings and default ways of doing things. For years the quality of HTML, CSS, and JavaScript it produced was a cause of wincing for folks in the web standards community, and it's only been the last few years that we've mostly been able to stop complaining about it. This is more because the landscape of tools we use has changed than because Dreamweaver has changed.[^2]

For a small example to keep this post manageable, I present this humble CSS font stack.

~~~~ css
body {
  font-family: Verdana, Arial, Helvetica, sans-serif;
}
~~~~

If you've seen this, thank Dreamweaver, as it was the default value it used when you allowed it to complete a font stack for you in CSS. The problem with it is in the placement of Helvetica, right after Arial. The way CSS works is that the first font a device recognizes is the one it uses. Every operating system since at least 2001 has included Arial, making Helvetica's placement in this order completely unnecessary as it would never be used. Designers should have been taught to put Helvetica before Arial (and then had the discussion about Helvetica's merits for on-screen display), or to simply leave Helvetica out and use Arial (and wept for Arial's own issues).

his is a tiny example, of course, but it affected the way people made things. Dreamweaver taught designers to do something that was technically wrong, and they followed the pattern set for them because it was easy. Many designers allowed Dreamweaver to handle things like rollovers and preloaders, for which it wrote terrible JavaScript. Still others used the WYSIWYG itself, as they were taught to reproduce their Photoshop layouts with it, and for that it wrote bad HTML and worse CSS.

## Bootstrap

But my hypothesis isn't really about Dreamweaver; it is that Bootstrap is "the new Dreamweaver," and that *it* is creating standards for design implementation. I've written before about my experiences using Bootstrap at work, and that's not what I'm talking about in this hypothesis. For purposes of this post, I'm interested in the kind of patterns it leads people to follow because of how it does things.

This does not mean, again, that it isn't possible to build great things with Bootstrap. It certainly is. To reiterate, it's about the kind of patterns it creates for people designing things.

### Context

Bootstrap 3 made great strides in the direction of mobile first, and I'm so appreciative of that. But still, by its nature, it's attempting to create standards that designers can use in an infinite number of ways. This means it is, largely, unable to take specific content and context needs into account. The factors that most affect users on mobile devices - context, posture, input, output - are all standardized in Bootstrap. Bootstrap doesn't support vertical media queries. It doesn't (by default) include more than three media queries (though that may change, it'll always be a predefined number). It's guessing based on the most common use cases it has defined.

Now of course, one can add any number of additional media queries to Bootstrap. It's quite possible to overlay and overwrite anything built into the framework. But here's the problem: the more that exists in the framework, the more likely it is that people will only use what is included in the framework. People won't think to write new media queries because they'll assume that they can just use the included media queries. They won't think to change up their input methods because they'll just use the input methods Bootstrap has. They won't be concerned about all the things mobile devices know about because they'll just use what Bootstrap already has.

Desktop devices will be affected by this as well, because Bootstrap will (likely) always have more design built into it than is necessary. If the design doesn't fit your users' context, you'll have to overwrite it. If you've overwritten things for mobile devices already, you'll have to overwrite them again for larger media queries. The escalation here doesn't have an end, if you start building toward the context your users have.

### Content

Content first has become a mantra for many designers. We like to get at least some sense of what the content is before we start designing, because that's how the best designs get built. We don't have to pretend we've created designs that will match the content if we already know what it is. Bootstrap, of course, has no idea what the content will be. It's (again) guessing based on the most common use cases. This isn't necessarily going to blow up in your face, but it is (by definition) going to be a least common denominator, and this will hurt more in some cases than it does in others. But if you attempt to build out things for your own content, you'll eventually have to break away from Bootstrap's conventions, and then the benefits you get from using it will decrease.

This is why many Bootstrap sites look like Bootstrap. It is easier to build things according to the conventions that it has created than it is to divert from them. They have set up a lot of (well-thought, I'll add) conventions that are very easy to use. They interact well with all the other conventions it has, and they work well in all the situations that the framework has predicted.

## Why, and what instead?

So the crux of my hypothesis, again, is this: Dreamweaver created design standards. We regretted them for the better part of a decade. Bootstrap has also created standards. We will increasingly regret those. The reason is this: we'll all learn more and more about the contexts our users have, especially on mobile devices. Those of us interested in content strategy and user experience will run into needs that Bootstrap doesn't meet well, and we'll spend more and more time building out the infrastructure and design for those needs. All of this will reduce or remove the amount of time that Bootstrap saves for us.

What should we do instead? In my opinion, it's this: build our own pattern libraries. Like [MailChimp's](https://ux.mailchimp.com/patterns), [A List Apart's](http://patterns.alistapart.com/), and so on. For smaller sites, we'll build fewer things. For larger sites, we'll build only what is needed and we'll build the stuff while we're designing it. We'll know it better, and it'll fit our users better, because we built it.

That's not to be idealistic and say we should never use anything prebuilt. It's simply to say that the concept of a base level design/markup framework is not suitable for modern websites that are built for modern users, whether they be products, services, or agency client websites. We should pick the prebuilt stuff very carefully, and use what we need.

[^1]: It was a lovely event, as it always is (this was the third year I&#8217;ve been able to attend). I was encouraged, challenged, given new thoughts and ways to tweak existing thoughts and old thoughts to throw away, and it all happened among such wonderful people who really care about making good things on the web. It's truly a great environment.
[^2]: As a side note, I worked at a small design firm during art school that used Adobe's GoLive and encouraged use of its WYSIWYG, which was the last attempt Adobe made to compete with Dreamweaver before buying Macromedia. I'll say this: nothing Dreamweaver produced in my wildest nightmares was as bad as the things GoLive produced.