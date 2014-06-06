---
layout: post
status: publish
title: Ubuntu dual boot victory
type: post
excerpt: So, following the <a href="http://jonathanstegall.com/2007/07/30/ubuntu-dual-boot-woes/">previous post</a> about my Ubuntu dual boot woes, today I have successfully set up a dual boot of XP and Ubuntu.
categories:
- life
- linux
tags: []
---
So, following the <a href="http://jonathanstegall.com/2007/07/30/ubuntu-dual-boot-woes/">previous post</a> about my Ubuntu dual boot woes, today I have successfully set up a dual boot of XP and Ubuntu.
<h2>Steps taken</h2>
<h3>Steps that did not work</h3>
<ol>
	<li><p>Download Ubuntu desktop install file again, as the original CD started showing up with errors in testing</p><p>It's important to note that I <strong>did</strong> check the disk for errors before attempting any initial install procedure.</p></li>
	<li>Test new install CD - errors reported</li>
</ol>
<h3>Steps that worked</h3>
<ol>
	<li>Download Ubuntu Server edition and <a href="https://help.ubuntu.com/community/BurningIsoHowto">create CD</a>. <a href="https://help.ubuntu.com/community/HowToMD5SUM">Test for errors</a>, receive none.</li>
	<li><p>Install Ubuntu server, following instructions in the prompts and choosing to create dual boot with XP</p><p>This really was as easy as it sounds. The prompts were fairly similar to the prompts one sees while installing Windows from a CD. Prompts were used to set localization, profile username/password, and so on.</p><p>For partitioning, I chose to leave my master drive untouched, and install Ubuntu on an empty slave drive (which was an option). I created a partition for /home, /root, and /etc. After this, the installer placed GRUB into the master drive for me, allowing the dual boot to occur successfully. I tested both systems boots before continuing.</p><p>At this time, I was booting into an Ubuntu server that was exclusively a command line terminal.</p></li>
	<li><p>Install GNOME GUI to cause Ubuntu to act like a desktop as well as a server. This was done through the following command:</p>
<p><code>sudo apt-get install ubuntu-desktop</code></p></li>
	<li>Feel proud of myself</li>
</ol>
Woo hoo.
