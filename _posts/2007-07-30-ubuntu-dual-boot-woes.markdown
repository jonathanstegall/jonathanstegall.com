---
layout: post
status: publish
title: Ubuntu dual boot woes
date: 2007-07-30 23:48:46.000000000 -04:00
type: post
excerpt: I had hoped to delay this post until I encountered some degree of victory, but that doesn't look like it's coming anytime soon. Plus, of course, we should always have the courage to speak in the midst of difficulties, and all that mess.
categories:
- life
- linux
tags: []
---
I had hoped to delay this post until I encountered some degree of victory, but that doesn't look like it's coming anytime soon. Plus, of course, we should always have the courage to speak in the midst of difficulties, and all that mess.

I've been trying to install Ubuntu Linux on my desktop for over a week now. I'm interested in learning Linux for its own sake, and in running web applications (like PHP, MySQL, Ruby, Python, etc) in a more native environment. I've reformatted my hard drive (I have backups this time) several times due to these attempts. I have never gotten Ubuntu to load successfully, but obviously I have lost Windows several times.
<h2>Failed Attempts and Current Messiness</h2>
I've tried the following steps in an attempt to have a working Ubuntu and XP:
<ol>
<li>XP Master Drive, Ubuntu Slave Drive, no other configuration - this was done by selecting use entire slave drive in the install dialog.<ul><li>Resulted in having to format the master drive due to Windows not booting.</li></ul></li>
<li>Unplug XP drive, install Ubuntu on slave drive, using entire drive, replug Ubuntu slave drive.<ul><li>Resulted in having to format the master drive due to Windows not booting.</li></ul></li>
<li>XP Master Drive, Ubuntu Slave Drive using entire drive, instructing Ubuntu to put GRUB onto the master drive.<ul><li>Resulted in having to format the master drive due to Windows not booting.</li></ul></li>
<li>Partition master drive with first partition NTFS and XP, second partition Fat32 and Ubuntu, use slave drive for storage.<ul><li>Resulted in having to format the master drive due to Windows not booting.</li></ul></li>
<li>Install XP on the master drive first partition, leaving ~10 gigs of unpartitioned space. Then, using the Ubuntu manual partition to create the / partition at 8 gigs, the swap partition at 1 gig, and the /home partition set to use the entirety of the slave drive.<ul><li>After the install process, Ubuntu did not ask me to reboot my system, and when I rebooted it myself it gave several errors in a list, and stopped shutting down. Windows did successfully boot after this, but when I booted from the GRUB CD, it did not find an Ubuntu installation.</li><li>This is the current state of my hard drive. The master has Windows on it with ~10 gigs of unpartitioned space. The slave drive is empty. Windows does not recognize it, which I'm assuming means that the Linux install did format it as FAT32.</li></ul></li></ol>
As noted, several attempts have resulted in Windows being unable to boot. I suspect at least some of it has been due to Ubuntu being unable to boot, as well, but I can't verify that. Fixmbr has never worked, bootcfg has never worked, and the GRUB CD hasn't worked. Formatting both drives again and reinstalling Windows has been the only thing thus far that has resulted in a boot of anything.

With the GBUB CD, I've tried all the various options that are under GNU/Linux in an attempt to boot Ubuntu after it has been installed. GRUB typically does recognize that Ubuntu is present, but it is always unable to boot it or create the MBR.

When running the Ubuntu installer, it once gave me an error related to creating the user, and then it appeared to continue installing, but didn't work. Other times, it has gone through the install process, and then appeared to finish. It didn't ask me to reboot, though.

<h2>Looking Forward</h2>
In some way, I still hold on to the hope that in the near future, I will have a working copy of XP and Ubuntu, on the same computer. Ha.
