---
layout: post
status: publish
title: Beginning Android development
excerpt: "Recently, I have started to work with <a href=\"http://www.android.com/\">Android</a>,
  Google's system for smartphones. This is mostly a work-related endeavor, though
  I am incredibly curious. I've wanted an iPhone since they came out, but have a Verizon
  contract and many friends and family who also do. I've hoped that eventually Verizon
  would get the iPhone, knowing that AT&amp;T's network is not a strong selling point.
  I don't know of any carrier other than Verizon that is likely to get it, but Verizon
  does have a knack for putting its foot in its mouth when it comes to the iPhone
  (a case in point is the commercial for the Droid).\r\n\r\nSo in light of all this,
  I'm interested in, though skeptical of, the <a href=\"http://www.verizonwireless.com/droid/\">Droid</a>
  that is coming out soon, and hope that it will prove to be a positive impact on
  Verizon's so-far <del datetime=\"2009-10-27T13:50:17+00:00\">terrible</del> <del
  datetime=\"2009-10-27T13:50:17+00:00\">abysmal</del> useless lineup of attempts
  to compete with the iPhone. The Droid, of course, runs on Android. If Google has
  more control over it than Verizon, I think it can potentially provide the best competition
  to the iPhone that anyone has provided thus far, and this would be a good thing
  for everyone."
type: post
categories:
- programming
- mobile
tags:
- programming
- android
- mobile
- java
---
Recently, I have started to work with <a href="http://www.android.com/">Android</a>, Google's system for smartphones. This is mostly a work-related endeavor, though I am incredibly curious. I've wanted an iPhone since they came out, but have a Verizon contract and many friends and family who also do. I've hoped that eventually Verizon would get the iPhone, knowing that AT&amp;T's network is not a strong selling point. I don't know of any carrier other than Verizon that is likely to get it, but Verizon does have a knack for putting its foot in its mouth when it comes to the iPhone (a case in point is the commercial for the Droid).

So in light of all this, I'm interested in, though skeptical of, the <a href="http://www.verizonwireless.com/droid/">Droid</a> that is coming out soon, and hope that it will prove to be a positive impact on Verizon's so-far <del datetime="2009-10-27T13:50:17+00:00">terrible</del> <del datetime="2009-10-27T13:50:17+00:00">abysmal</del> useless lineup of attempts to compete with the iPhone. The Droid, of course, runs on Android. If Google has more control over it than Verizon, I think it can potentially provide the best competition to the iPhone that anyone has provided thus far, and this would be a good thing for everyone.

So have I begun researching and setting up to develop with Android. First problem: I don't know any Java (though I know enough to be very angry when people confuse it with JavaScript, which I know and love). I'm a designer, and my knowledge of programming stems from a desire to solve problems and accomplish the designs I envision. So in light of this, I'm willing to spend some time with Java, as I am aware that it is a very powerful language.
<h2>Beginning with Android</h2>
It is with all of that context that I have set up a development environment on my Mac. Here are the steps to follow to do the same:
<ol>
	<li>Download the <a href="http://developer.android.com/sdk/1.6_r1/index.html">Android SDK</a>. At this time, the current version is 1.6</li>
	<li>Install said SDK. On Snow Leopard, and maybe on other 64-bit operating systems, there is a necessary fix to prevent errors, <a href="http://michaelpardo.com/2009/09/ddms-for-android-sdk-1-6-on-snow-leopard/">making the swt 64-bit compatible</a>.</li>
	<li>Between Linux and Mac OSX, there are different steps for configuring the <code>.bash_profile</code> configuration file. I'll list the steps for Ubuntu (presumably other Debian systems as well) and OSX.
<ol>
<li>Ubuntu: In a Terminal, run <code>sudo gedit ~/.bash_profile</code> and add <code>export PATH=${PATH}:<your_sdk_dir>/tools</code> to it.</li>
<li>Mac OSX: In a Terminal, cd to <code>~/</code>, and run <code>sudo touch .bash_profile</code>, followed by <code>open -e .bash_profile</code>. Again, add <code>export PATH=${PATH}:<your_sdk_dir>/tools</code> to it.</li>
</ol></li>
	<li>Install <a href="http://www.eclipse.org/downloads/">Eclipse for Java Developers</a>. I used the 64-bit Cocoa version.</li>
	<li>Use <a href="http://developer.android.com/sdk/1.6_r1/installing.html">these instructions</a> to install the Android plugin for Eclipse.</li>
</ol>
From this point, Android and Eclipse are installed and ready for use. Naturally, I went looking for a <a href="http://developer.android.com/guide/tutorials/hello-world.html">Hello World</a> application. This builds really easily, and gives a very small glimpse into what Android provides.

After this, I wanted to follow the <a href="http://developer.android.com/guide/tutorials/notepad/notepad-ex1.html">Notepad tutorial</a>. It gives a good deal more insight into Java syntax, and the kind of methods that Android employs.

When I tried to run this app in the emulator, though, I ran into an issue in which the app didn't indicate that there were any errors, but also did not appear in the list of applications. Rather, the Hello World app continued to show up in the list, and would still run though I had attempted to close it inside Eclipse.

This may seem entirely obvious to iPhone developers, though I have a suspicion that Apple has made this happen behind the scenes, but in Android you (at least, I) have to create Android Virtual Devices to run each application. In Eclipse, these devices can be created under <em>Window > Android SDK and AVD Manager</em>, and (again, for me, running Snow Leopard) need to be started once they are created. This can be done in the same area, after creating them.

After doing this, the Notepad application runs in my environment, though I have to run the application, close it, and then run it again. My hope is that small roadblocks like this will be easier to overcome as the Android community grows, and my goal is to document these kind of things, and any other things that I learn, as I begin working on this platform.
