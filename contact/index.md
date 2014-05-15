---
date: 2009-02-26 20:18:21.000000000 -05:00
layout: none
title: "Contact Me"
slug: "contact"
description: 
excerpt:
group: ""
type: section

navigation:
    order: 
display:
    number: 2
    type: page
    categories: [contact]
    class: grid__item desk-one-half
    slug_in_class: true
home:
    order: 
    omit_title: 
    unlinked_title:
    button: 
footer:
    order: 1
    omit_title: true
    unlinked_title: true
---

{% for cat in site.page-category-list %}
<ul>
{% for contactpage in site.pages %}

{% for pc in contactpage.page_categories %}
{% if pc == cat %}
<li>
  <a href="{{ contactpage.url }}">{{ contactpage.title }}</a> &mdash; {{ page.desc }}
</li>
{% endif %} <!-- cat-match-p -->
{% endfor %} <!-- page-category -->

{% endfor %} <!-- page -->
</ul>
{% endfor %} <!-- cat -->