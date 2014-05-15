---
layout: post
status: publish
title: Upgrading to Wordpress 2.6
excerpt: "<a href=\"http://www.wordpress.org/\">WordPress</a> has officially released version 2.6, with <a href=\"http://wordpress.org/development/2008/07/wordpress-26-tyner/\">some nice changes</a>."
date: 2008-07-15 12:45:03.000000000 -04:00
type: post
categories:
- blogging
- software
tags:
- wordpress
- wordpress upgrade
- wordpress 2.6
---
<a href="http://www.wordpress.org/">WordPress</a> has officially released version 2.6, with <a href="http://wordpress.org/development/2008/07/wordpress-26-tyner/">some nice changes</a>.

In my various work and ministry endeavors, I have varying degrees of responsibility for several WordPress blogs (in addition to this one), and have thus upgraded several installations from 2.5.1 to 2.6.

Apparently, an issue that is at least relatively common in this particular upgrade experience is that, after upgrading, one is unable to log back in to the admin system. I encountered this issue in one of the upgrades I performed, and then saw it mentioned on Twitter.

In the hopes that anyone else who encounters the issue can resolve it quickly, here are the steps that worked for me:
<ol>
	<li>Return to the main (not admin) page of the website.</li>
	<li>If there is a status indicator there (depending on the theme), click the Logout link.</li>
	<li>If there is not a status indicator, visit <code>http://sitename.com/wp-login.php?action=logout</code>.</li>
	<li>Go back to the admin login page, and log in.</li>
</ol>
So, if you run into this issue, try the above steps. Feel free to post comments, if it does or does not work for your installation.
<h2>Update</h2>
While I'm thinking about WordPress upgrades, I'd like to put in a plug for some great ways to ease your upgrade experience.

First of all, I would be amiss if I did not recommend my current webhost, <a href="http://www.dreamhost.com/r.cgi?234834">DreamHost</a>. For as affordable as they are, they are a solid host with lots of freedom and even more disk space. In addition, if you use the promo code <strong>JSTEGALLBLOG</strong>, you will receive $25 off if you buy a year of hosting. If you host your WordPress blog with DreamHost, there is an easy one-click installation and upgrade process. Also, there are frequent backups in the event that something does go wrong.

If you do not host your blog at DreamHost, there are two plugins that can make your upgrade experience go much more smoothly.
<dl>
  <dt><a href="http://www.ilfilosofo.com/blog/wp-db-backup">WordPress Database Backup</a></dt>
  <dd>This plugin will prove invaluable, should your upgrade run into any issues. Back up your database, and save it to your hard drive. All of your posts, comments, etc. will be stored there, and you can restore them if necessary.</dd>
  <dd>If you have a host that does not backup your database for you, you should use this plugin and set it to email you backups on a regular basis (perhaps weekly, or twice a month)</dd>
  <dt><a href="http://www.zirona.com/software/wordpress-instant-upgrade">Instant Upgrade</a></dt>
  <dd>This plugin is just like it sounds. You click a button, and it does all the upgrade work for you. You will need to change some of the permissions that are on the files on your host server, but this is very easy and there are good instructions for how to do so included with the plugin.</dd>
  <dd>It is possible that there are hosts on which this plugin will not work, due to the permission change requirement. However, I have been forced to use Godaddy for a few work-related projects, and it even works there. I suspect there are very few hosts where it will not work.</dd>
</dl>
