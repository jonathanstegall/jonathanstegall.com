---
layout: post
status: publish
title: Printing from Mac OSX to Ubuntu 9.10
excerpt: "Last month, <a href=\"http://ubuntu.com/\">Ubuntu</a> released the new version
  of its operating system, 9.10. I've been using Ubuntu for over two years on my home
  desktop, and have documented some of my struggles and victories with it here. For
  purposes of this post, know that my wife owns a <a href=\"http://www.apple.com/macbook/\">MacBook</a>
  and I use a <a href=\"http://www.apple.com/macbookpro/\">MacBook Pro</a> for work.
  Both Macs run Snow Leopard, and sit on the same network as my Ubuntu desktop.\r\n\r\nFor
  some time, I have used Ubuntu as a print/file/music server to the two Macs, among
  other things. When I upgraded to 9.10, I was no longer able to print from the Macs
  to Ubuntu. Ubuntu itself could still print to its own printer, of course, but the
  Macs gave the error <code>Processing - \"Unable to get printer status (Bad Request)!</code>.
  I've seen many other folks on forums with this issue, and I was finally able to
  get it working today."
type: post
categories:
- apple
- linux
tags:
- ubuntu
- apple
- cups
- networking
---
Last month, <a href="http://ubuntu.com/">Ubuntu</a> released the new version of its operating system, 9.10. I've been using Ubuntu for over two years on my home desktop, and have documented some of my struggles and victories with it here. For purposes of this post, know that my wife owns a <a href="http://www.apple.com/macbook/">MacBook</a> and I use a <a href="http://www.apple.com/macbookpro/">MacBook Pro</a> for work. Both Macs run Snow Leopard, and sit on the same network as my Ubuntu desktop.

For some time, I have used Ubuntu as a print/file/music server to the two Macs, among other things. When I upgraded to 9.10, I was no longer able to print from the Macs to Ubuntu. Ubuntu itself could still print to its own printer, of course, but the Macs gave the error <code>Processing - "Unable to get printer status (Bad Request)!</code>. I've seen many other folks on forums with this issue, and I was finally able to get it working today.

If you are having this issue with Mac to Ubuntu 9.10 printing, try these steps. I can't verify whether they would work with Windows, though I suspect that if there is an issue with Windows, it would have a different resolution. Apple uses CUPS as its print queue, and Ubuntu can use this as well. Windows uses Samba, which Ubuntu can also use, but the two are different.
<h2>Steps to follow</h2>
<ol>
	<li><strong>On Ubuntu</strong>, go to <code>http://localhost:631</code> in your browser. Click "Printers" and make sure you have the proper name of the printer that is connected to Ubuntu. Click on it, and in the <code>http://localhost:631/printers/PRINTERNAME</code> screen, you can click Set As Server Default. I'm not entirely sure if this is a required step, but I did it.</li>
	<li><strong>On the Mac</strong>, go to <code>http://localhost:631</code> in your browser. Go to Administration > Add Printer. Let it finish looking. Choose the "Internet Printing Protocol (ipp)" option, and click Continue.</li>
	<li>In the Connection field, type <code>http://SERVERNAME:631/printers/PRINTERNAME</code> where SERVERNAME is the name of your Ubuntu server, and PRINTERNAME is the name by which the server knows the printer, as you saw in step 1. Click Continue.</li>
	<li><strong>Note:</strong> For me, my previous setup required me to use <code>http://SERVERNAME.local/...</code> in the configuration. This doesn't work for me in the new setup; I need to use <code>http://SERVERNAME/...</code> instead.</li>
	<li>The Name, Description, and Location fields can be whatever you like.</li>
	<li>Choose the proper Make and Model for the printer. Click Add Printer.</li>
	<li>Set the other options as you like them.</li>
	<li>That's it!</li>
</ol>
Note: this only works if you can successfully network from the Mac to Ubuntu. If you are not yet able to do that, look at posts like <a href="http://jonathanstegall.com/2008/02/14/printing-to-windows-xp-printer-with-mac-osx/">this one</a> on printing from the Mac, and <a href="http://jonathanstegall.com/2009/03/21/ssh-into-networked-computer-on-mac-osx/">this one</a> on using <code>SSH</code> from the Mac.
