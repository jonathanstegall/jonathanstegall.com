---
Time-stamp: <2013-07-28 23:52:14 ()>
layout: default
title: "Social"
slug: "social"
description: 
excerpt:
type: page
categories: [contact]
group: ""
navigation:
    order: 
display:
    number: 
    type: 
    categories: 
    class: 
    slug_in_class:
home:
    order: 
    omit_title: 
    unlinked_title:
    button: 
footer:
    order: 3
    omit_title: 
    unlinked_title: 
---

<ul class="social inline">
    {% for item in site.social %}
        <li><a href="{{item[1]}}"><span class="fa fa-{{item[0]}}"></span></a></li>
    {% endfor %}
</ul>