---
layout: post
status: publish
title: Upgrading to Ubuntu Gutsy Gibbon
type: post
excerpt: "The other day, I had to buy a new monitor. The one I had been using for three years finally croaked, and so I turned to eBay to get another one. When it came in, I hooked it up (after complaining that my desk hutch was too small for the larger monitor) and started up the computer. I received the message: \"Out of Range,\" on a black screen."
categories:
- linux
tags:
- monitors
- ubuntu gutsy gibbon
---
The other day, I had to buy a new monitor. The one I had been using for three years finally croaked, and so I turned to eBay to get another one. When it came in, I hooked it up (after complaining that my desk hutch was too small for the larger monitor) and started up the computer. I received the message: "Out of Range," on a black screen.

After some Googling, the answer came up that I needed to reconfigure the monitor's drivers. I didn't really understand how to do this (until later), so I thought, "This is the perfect time to upgrade to <a href="https://wiki.ubuntu.com/GutsyGibbon">Gutsy Gibbon</a>. For what it's worth, though, the monitor could probably have worked with Feisty Fawn had I done the following:
<ol>
	<li>Boot into recovery mode</li>
	<li>Enter the following command:</li>
</ol>
<code>$ sudo dpkg-reconfigure xserver-xorg</code>

I tried doing this, but I went into the Advanced settings instead of the Basic ones. My belief is that I don't know enough about the new monitor to correctly fill in the values, so things didn't go very well and the monitor still didn't work. Should the issue arise again, though, I'll try Basic first. The reason is that later, after I had already gotten everything working, I ran into the error again and fixed it through the Basic configuration.

Anyway. To upgrade, I first moved the /home folder to its own partition, which I should have done in the beginning of my Linux experiences. But, understandably I was too confused at the time to do anything beyond get things working. This partition move was achieved through <a href="http://www.psychocats.net/ubuntu/separatehome">this article</a>, and will allow future upgrades to happen without losing data (websites, documents, etc.).

After this, I was still incredibly worried that things would go as badly as they did on <a href="http://jonathanstegall.com/2007/07/30/ubuntu-dual-boot-woes/">my first attempt</a> to install Linux. I burned a CD from the <a href="http://ubuntu.com/">Ubuntu</a> website, loaded it, and started to install things. I selected each partition, choosing to format the root (where the installation of the operating system resides). This allowed me to keep /home unaffected.

Things went very smoothly from there, and Ubuntu booted perfectly and I didn't lose my Windows dual boot, and all was well with the world. Because I have an ATI graphics card, I needed to follow <a href="http://ubuntuforums.org/showthread.php?t=576624&amp;page=8">these steps</a>, but I was even able to get Compiz-Fusion working with all of its eye candy goodness.

In essence, my upgrade experience has gone much smoother than the initial installation. Gutsy Gibbon seems to have a lot of nice changes, and I'm enjoying it thus far.
