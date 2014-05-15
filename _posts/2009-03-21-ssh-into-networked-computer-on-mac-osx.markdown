---
layout: post
status: publish
title: SSH into networked computer on Mac OSX
excerpt: "I've written occasionally about <a href=\"/category/linux/\">my experiences</a>
  with Ubuntu Linux. Since I got accustomed to the system, everything has been overwhelmingly
  positive, especially when it relates to using Ubuntu for programming.\r\n\r\nPredominantly,
  I program in <abbr title=\"PHP Hypertext Processor\">PHP</abbr> and Ruby on Rails,
  depending on the project. For these, with the ways that I use them, Ubuntu has proven
  itself infinitely superior to any other development environment I've used."
date: 2009-03-21 22:45:33.000000000 -04:00
type: post
categories:
- apple
- linux
- programming
tags:
- ssh
- ubuntu
- mac
- apple
- linux
---
I've written occasionally about <a href="/category/linux/">my experiences</a> with <a href="http://ubuntu.com/">Ubuntu Linux</a>. Since I got accustomed to the system, everything has been overwhelmingly positive, especially when it relates to using Ubuntu for programming.

Predominantly, I program in <abbr title="PHP Hypertext Processor">PHP</abbr> and Ruby on Rails, depending on the project. For these, with the ways that I use them, Ubuntu has proven itself infinitely superior to any other development environment I've used.

That said, recently I inherited a <a href="http://www.apple.com/macbookpro/">MacBook Pro</a> as my work computer. Naturally, I have fallen in love with it, and am using it for design work at home as well. Mac OSX, of course, has a UNIX foundation, and thus is much better for my kind of programming than Windows is, and works very well with most development.

However, particularly with Ruby on Rails applications, I still find Linux to be more intuitive with the management and storage of the apps. With the last one I was working on, I sought a way to <abbr title="Secure Shell"><code>ssh</code></abbr> into my Linux system through the Mac, so that I could have the best of both worlds. I couldn't find anything in particular in various searches, so I asked about it in <a href="http://forums.macrumors.com/showthread.php?t=672638">a forum post</a>.

Thanks to the community there, I have an answer. Essentially, there are a couple of steps.
<ol>
	<li><a href="http://www.kremalicious.com/2008/06/ubuntu-as-mac-file-server-and-time-machine-volume/">Make Ubuntu a Mac File Server</a><p>This is the hardest part, as it involves a few steps on both the Linux system and the Mac system. That being said, the instructions in the linked post are fantastic. They are well-written and easy to follow.</p></li>
	<li>Note the name of the Ubuntu system when it is mounted (for example: <code>ubuntu-desktop</code>).</li>
	<li>Ensure that sshd server is installed on the Ubuntu system. <code>sudo apt-get openssh-server</code></li>
	<li>If the Ubuntu system's name is <code>ubuntu-desktop</code>, use the command <code>username@ubuntu-desktop.local</code> in the Mac's Terminal, and you can log in.</li>
</ol>
