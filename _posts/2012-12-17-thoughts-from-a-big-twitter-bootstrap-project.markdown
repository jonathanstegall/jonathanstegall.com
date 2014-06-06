---
layout: post
status: publish
title: Thoughts from a big Twitter Bootstrap project
excerpt: "Recently, my team at work spent a few months building a thing with <a href=\"http://twitter.github.com/bootstrap/index.html\">Twitter
  Bootstrap</a>. Essentially, it's very similar to a default WordPress theme for the
  CMS we use - any client can have this thing to build their site with. They can use
  it, or they can expand it, customize it to an extent, etc.\r\n\r\nTo specify a little
  more, this project wasn't creating a design, really; instead it was taking an existing
  design and refining it and expanding it to account for things that didn't previously
  exist, or could be standardized, subtly improved upon, and so on. So there was quite
  a lot of design work that we did, especially for smaller devices and on the micro
  level as opposed to the macro, but that wasn't the primary purpose."
type: post
categories:
- design
- CSS
- JavaScript
tags:
- design
- CSS
- JavaScript
- twitter bootstrap
---
<p>Recently, my team at work spent a few months building a thing with <a href="http://twitter.github.com/bootstrap/index.html">Twitter Bootstrap</a>. Essentially, it's very similar to a default WordPress theme for the CMS we use - any client can have this thing to build their site with. They can use it, or they can expand it, customize it to an extent, etc.</p>

<p>To specify a little more, this project wasn't creating a design, really; instead it was taking an existing design and refining it and expanding it to account for things that didn't previously exist, or could be standardized, subtly improved upon, and so on. So there was quite a lot of design work that we did, especially for smaller devices and on the micro level as opposed to the macro, but that wasn't the primary purpose.</p>

<p>Coming from that perspective, I think it's important to reflect on how Twitter Bootstrap was used in this project, and what effects it had. For the sake of structuring my thoughts, I'm using the structure of Bootstrap's own navigation: scaffolding, base CSS, Components, and JavaScript. Customize, for their purposes, is just a matter of excluding stuff you don't need.</p>

<h2>Scaffolding</h2>

<p>The Bootstrap scaffold is essentially a CSS normalizer, a nestable grid system, and some bolted on responsive design features. The normalizer is freely available and used in many projects. While I am personally more a fan of the reset, the normalizer is fine once you get used to it. The grid system is decent, though we had to change a great deal of it since we were essentially dealing with a pre-defined design. It's certainly not the best grid system I've seen, but it's not the worst either.</p>

<p>The bolted on responsive part is what really bugged, and bugs, me. Bootstrap's first version wasn't responsive, and by default its second version isn't either (though it is adaptive, and the differences are large). You can tweak things to make it responsive, but it doesn't really indicate that you have to do that. This caused our team some issues, as we started working independently, and some folks went responsive while others didn't, and we ended up having to stick with the default, adaptive version in the end. Again this is probably mostly because we were dealing with an existing design, but I think the documentation should mitigate this issue more than it does. Having an adaptive default in a system this complex is a failure on Bootstrap's part, in my opinion.</p>

<p>Overall, I'd say this grid system is not worth using. Certainly there are worse ones, and that's worth mentioning. But there are also far better ones (such as <a href="http://framelessgrid.com/">Frameless</a>, <a href="https://gridsetapp.com/">Gridset</a>, <a href="http://www.getskeleton.com/">Skeleton</a>, essentially any mobile first version and most desktop-first ones), from a capability/customization perspective and from a mobile-friendly/mobile-first perspective, and from a CSS/HTML perspective. Use one of those, if you have the choice. This one, I think, causes more issues than it solves.</p>

<h2>Base CSS</h2>

<p>The base CSS contains styles for a default typography framework, tables, forms, buttons, images, and icons. It's all pretty good for what it is - nothing is glaringly ugly or unusable, but of course it's all styled for Bootstrap, <em>not your branding</em>. We used quite a bit of this, though we changed the branding to match what we were using. Needing to do that caused significant issues and time wasting for us, because often it just wasn't clear what needed to be overwritten to get rid of Bootstrap's style conventions. There is <em>a ton</em> of CSS there, and while it is structured reasonably well there is just so much of it, and the design styles are so specific, that it is hard to track them down.</p>

<p>Overall, I'd again say that the base CSS is not worth using, <em>if</em> you aren't using the Bootstrap styles. If you are using those styles, I'm sure it's brilliant and worth using though not very custom, but if you have your own styles or are creating them as you create your site, create that stuff on your own from scratch, based on what you need functionally and visually. It'll save time in the end. I do think such a base could be created in a much more design-agnostic way, but it would be much harder to do.</p>

<h2>Components</h2>

<p>Bootstrap includes a lot of components for things that sites and web apps commonly use - navs, typographical elements, buttons, image treatments, and so on. We used few of these - fewer than we had initially expected, simply because our design didn't need them. The few that we did use (thumbnails, alerts, pull-left and pull-right, and several miscellaneous items), varied in how useful they were. The more design styles they had, the less useful and the more time we had to spend overwriting, as I mentioned before, and some of them were just mind-boggling when it came down to overwriting their default styles.</p>

<p>So again, I'd say that the components aren't really worthwhile. They don't use good markup (almost no HTML5 is here and they rely a great deal on lots of nested divs), they have a lot of included styles, and most of them would have to be completely rewritten to be used in a different design or markup system.</p>

<h2>JavaScript</h2>

<p>The JavaScript items include things like tabs, tooltips, popovers, alerts, accordions, carousels, and some nav treatments, among others. We used a few of these (especially tabs and accordions), and I can see places where clients will probably make use of some of the others. I'd say these are indeed worthwhile. In a lot of cases they're better than competitive options (jQuery UI, for example).</p>

<p>The fascinating thing is that they're often better for the same reasons that the other parts of Bootstrap are worse - they don't depend as much on markup or style included with Bootstrap. When they do depend on specific CSS conventions, they are modern, future-friendly CSS conventions, not conventions you'd have to overwrite to use HTML5. Even a notable thing that we didn't use - the slideshow - was a choice we made because we have to support older IE versions, and we already had slideshows that do that with good, clean code. We didn't neglect it because it was bad, or couldn't fit in our design; we neglected it because we had different requirements.</p>

<h2>Hindsight is 20/20, and so on</h2>

<p>I'd say that in our pre-project evaluation, the JavaScript items and the components were the chief reason we went with Bootstrap. My team had a short amount of time to evaluate things like this, and while we discussed and were concerned about all the things I mention in this post, we didn't know how big an impediment they would end up being (not having previous experience with the design and code in the system). The JavaScript looked so helpful that it helped us make the decision we thought would save us the most time on a quick project.</p>

<p>But in the end, it didn't and I would not make the same decision if I had to do it over again. I'd use a different grid system, and I'd write the rest of the stuff myself and use self-selected plugins. I think that would ultimately result in less code, less frustration, and a better product.</p>
