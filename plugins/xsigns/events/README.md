# **xsigns events**

Simple plugin to display events
---

### **Componenten**
* Events
    Represents all events from the current date as a list
* Event 
    Detail view of the selected event from the list view
    
### **Detail-Site**
The detail page must contain the parameter 'alias' as URL.
For example: /event-detail/:alias

### config/app.php
In the app.php, set your current timezone such as 'Europe/Berlin'



###Patrtials
##event/default.htm
```
<div class="event-detail">
    <div class="event-header">{{ labels.titel|raw}}</div><!-- heading text -->
    <div class="event-title">{{ event.title|raw }}</div><!-- event title -->
    <div class="event-date">{{ event.date|raw }}</div><!-- date string -->
    <div class="event-time">{{ event.time|raw }}</div><!-- time string -->
    <div class="event-city">{{ event.city }}</div><!-- city -->
    <div class="event-text">{{ event.text|raw }}</div><!-- long text -->
    <div class="event-short">{{ event.short|raw }}</div><!-- short text -->
</div>
```

##events/default.htm
```
<div class="container">
    <div class="page-header">
        {{labels.titel|raw}}
    </div>
    {% for entry in events %}
    <p class="lead"><strong>{{ entry.title }}</strong> {{ entry.date|raw }}&nbsp;</p>
        <p class="event_time">{{ entry.time|raw }}</p>
        <p class="event_city">{{ entry.city}}</p>
        <p>{{ entry.short|raw }}</p>
        <a href="{{entry.url}}">{{ labels.detail }}</a>
        {% if not loop.last %}<hr />{% endif %}
    {% else %}
        {{ labels.noentry|raw}}
    {% endfor %}
</div>
<!-- 
Placeholder :
    date  = date string 
    title = event title
    city = city
    text = long text,
    short = short text,
    time = time string 
    url = url to detail page
    labels.title = header title
    labels.detail = text for detail link
    labels.noentry = no events found
-->
```