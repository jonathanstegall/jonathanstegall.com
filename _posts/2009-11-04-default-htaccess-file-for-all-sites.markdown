---
layout: post
status: publish
title: Default .htaccess file for all sites
excerpt: "Most of the sites I work with on a daily basis run on Linux servers, and
  run under the Apache web server. This gives me all the benefits and stresses of
  using <code>.htaccess</code> files to control things, from rewrite URLs to various
  security and performance aspects of sites. If you run any such sites and are unfamiliar
  with <code>.htaccess</code>, especially WordPress sites, I hope you'll find this
  helpful.\r\n\r\nIf you follow my <a href=\"/daily-links/\">daily links</a>, from
  time to time I link to various articles and blog posts that share amazing Apache
  techniques. The most common place that I find well-written articles on these subjects
  that I can actually understand and implement is <a href=\"http://perishablepress.com/\">Perishable
  Press</a>, and I can't recommend it enough if you need such knowledge."
date: 2009-11-04 19:00:45.000000000 -05:00
categories:
- programming
tags:
- programming
- htaccess
- apache
type: post
---
Most of the sites I work with on a daily basis run on Linux servers, and run under the Apache web server. This gives me all the benefits and stresses of using <code>.htaccess</code> files to control things, from rewrite URLs to various security and performance aspects of sites. If you run any such sites and are unfamiliar with <code>.htaccess</code>, especially WordPress sites, I hope you'll find this helpful.

If you follow my <a href="/daily-links/">daily links</a>, from time to time I link to various articles and blog posts that share amazing Apache techniques. The most common place that I find well-written articles on these subjects that I can actually understand and implement is <a href="http://perishablepress.com/">Perishable Press</a>, and I can't recommend it enough if you need such knowledge.

At the moment, though, I want to share one simple technique that is too commonly forgotten - a default, basic <code>.htaccess</code> file to start off every website. It can and should be expanded for each website's needs, but it ensures that really wonderful things are present from the start. Here is mine, as it currently stands, and I'll comment on each section (defined as a <code># comment</code> in the example) following the example:

~~~~ htaccess
# basic compression
<IfModule mod_gzip.c>
mod_gzip_on Yes
mod_gzip_dechunk Yes
mod_gzip_item_include file \.(html?|txt|css|js)$
mod_gzip_item_include mime ^text/.*
mod_gzip_item_include mime ^application/x-javascript.*
mod_gzip_item_exclude mime ^image/.*
mod_gzip_item_exclude rspheader ^Content-Encoding:.*gzip.*
</IfModule>
# Protect files and directories
<FilesMatch "(\.(engine|inc|info|install|module|profile|po|sh|.*sql|theme|tpl(\.php)? |xtmpl)|code-style\.pl|Entries.*|Repository|Root|Tag|Template)$">
Order allow,deny
</FilesMatch>
# Don’t show directory listings
Options -Indexes
# Basic rewrite rules, stop unneeded PERL bot, block subversion directories
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteRule ^(.*/)?\.svn/ - [F,L]
ErrorDocument 403 "Access Forbidden"
RewriteCond %{HTTP_USER_AGENT} libwww-perl.*
RewriteRule .* – [F,L]
</IfModule>
~~~~

<h2>Basic compression</h2>
The code in this section asks Apache to compress all CSS, JavaScript, HTML, and txt files, while not compressing images (to preserve their quality). This can greatly reduce the time it takes to load these kind of files, especially for libraries like <a href="http://jquery.com/">jQuery</a>. In this case, it is done with the <code>mod_gzip</code> module, which usually is installed in Apache.

Now, it is important to note that in some cases, the <code>gzip</code> module is either not installed, or is not as effective as the <code>mod_deflate</code> module. I learned from a server admin friend that <code>mod_gzip</code> can compress better, while <code>mod_deflate</code> runs faster overall. So in cases where CPU cycles are more of a concern for you individually, or your host, you can use <code>mod_deflate</code> in place of this section like this:
<ol class="code">
<li><code><FilesMatch "\\.(js|css|html|htm|php|xml)$"></code></li>
<li class="tab1"><code>SetOutputFilter DEFLATE</code></li>
<li><code></FilesMatch></code></li>
</ol>
<h2>Protect files and directories</h2>
This simply looks at some common file and directory types that should not be viewed by users. Install directories, include directories, files that would contain sensitive code, etc. You can certainly customize the list, but it is good to have this as a basic defense.
<h2>Don't show directory listings</h2>
All this one does is keep directories that don't have a default index page (index.php, index.html, etc.) from listing their contents. It isn't always a problem for directories to list their contents, but it is never a problem to hide them, either. If you want to list files, do it yourself so you can choose what gets listed.
<h2>Basic rewrite rules, stop unneeded PERL bot, block subversion directories</h2>
Most Apache installations have the <code>mod_rewrite</code> module, which is invaluable for friendly URLs, changed URLs, and any number of other things. In this case, we are just detecting whether it is present. If it is, we are sending away the <code>libwww-perl</code> bot (from <a href="http://ocaoimh.ie/keep-the-libwww-perl-bad-guys-out/">this article</a>), and we are also keeping users from viewing any <code>.svn</code> directories. These are created by <a href="http://en.wikipedia.org/wiki/Subversion_%28software%29">Subversion</a>, which is a wonderful thing that is beyond the scope of this post. If you have these directories, you should never upload them, but should instead export repositories. But regardless, accidents happen and sometimes these directories can end up on servers. If they do, they shouldn't be publicly accessible.
<h2>Something extra for WordPress users</h2>
If you are a WordPress user, you have a <code>wp-config.php</code> file that contains database information. Potential attackers know this, and it is always a good idea to keep them out of this file. If you use another CMS, find out what file(s) correspond to this one, and change it accordingly. It's a simple command that prevents users from directly visiting this file, while still allowing the web server itself to access the configuration information it contains.
<ol class="code">
<li class="comment"># block config file for the CMS, if any</li>
<li><code><files wp-config.php></code></li>
<li class="tab1"><code>order allow,deny</code></li>
<li class="tab1"><code>deny from all</code></li>
<li><code></files></code></li>
</ol>
