---
layout: post
status: publish
title: Sharing a FileZilla Profile
type: post
categories:
- software
- linux
tags:
- filezilla
- share filezilla data
---
My favorite <acronym title="File Transfer Protocol">FTP</acronym> client is <a href="http://filezilla-project.org/">FileZilla</a>. In the last year or so, it became cross-platform. For myself, I currently run it in Windows and Linux, which in my system reside on separate hard drives. I share the data between the two.

This would also work for networking environments, where multiple designers or developers need to share FTP data from a central server or other system.
<h2>Configuring FileZilla</h2>
FileZilla has a file called <code>fzdefaults.xml</code>. On Windows systems, it resides at <code>C:\Program Files\FileZilla FTP Client\fzdefaults.xml</code>. Note that, when you first install the program, there will be an <code>fzdefaults.xml.example</code> inside the <code>/FileZilla FTP Client\docs</code> folder instead. Simply duplicate this file, move it into the main FileZilla FTP Client folder, and rename it to <code>fzdefaults.xml</code>.

On Ubuntu, if you install FileZilla from the repositories, the file resides at <code>/home/username/.filezilla/fzdefaults.xml</code>. The same process works, if there is an <code>fzdefaults.xml.example</code>. I have not yet had the pleasure of installing FileZilla on a Mac, but I suspect it is similar to the Linux path.

When you have this file in the right location, open it up. There is a line that reads

<code><Setting name="Config Location">$SOMEDIR/filezilla/</Setting></code>

Change the <code>$SOMEDIR/filezilla/</code> to the centrally located folder where the data will be stored. An example is <code>/media/shared/Filezilla_Profile/</code>. Save.

Then, you should copy all of the files that are inside <code>C:\Documents and Settings\username\Application Data\FileZilla\</code> (Windows) or <code>/home/username/.filezilla</code> (Linux, but do not copy <code>fzdefaults.xml</code>) and move them to the above folder.

In the <strong>central folder</strong>, open up <code>sitemanager.xml</code>. This should be all of your FTP data. FileZilla will use this file the next time it opens, and from here on out it will update this file as you add new information.
<h2>Operating System Issues</h2>
Probably because FileZilla was originally a Windows program, there are few if any issues that will commonly arise.

On Linux systems, FileZilla requires that the central location (on another hard drive, or another server, or wherever it may be) have specific configuration when it is mounted. The current user (you, when you are logged in) needs to be able to read and write files in the mounted drive, or you will receive lots of errors when you try to open it.

For example, if you were trying to mount /sda5 as the external drive that FileZilla needed to use, you would do it like this:

In your terminal, type:

<code>sudo gedit /etc/fstab</code>

This file controls what media (hard drives, CD drives, etc.) that the system mounts when it boots. Start a new line at the end.

<code>/dev/sda5       /media/shared vfat defaults,utf8,umask=007,uid=1000,gid=1000</code>

This would name your new drive "shared", put a link to it in the media folder, and give it the proper permissions for your user. To get the proper uid, type <code>id</code> in a terminal window. Replace uid and gid, if necessary.

FileZilla, as well as other programs that could share data across systems and operating systems (Firefox, for example), will now be able to use the data properly.
