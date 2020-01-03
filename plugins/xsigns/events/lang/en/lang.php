<?php return [
    'plugin' => [
        'name' => 'Eventmanager',
        'description' => 'Simple event manager for the web page'
    ],
    'form' => [
        'title' => 'Name',
        'title_desc' => 'Name of the Event.',
        'title_placeholder' => 'new Event',
        'text' => 'Description',
        'text_description' => 'Long text.',
        'text_placeholder' => 'Beschreibung des Events',
        'short' => 'Short text',
        'short_description' => 'Short text of the event for list view.',
        'short_placeholder' => 'Short text',

        'public' => 'activated',
        'public_desc' => 'Show events for all.',
        'fromdate' => 'Start date',
        'todate' => 'End date',
        'timefrom' => 'Start time',
        'timeto' => 'End time',
        'create' => 'new event',
        'update' => 'Update event',
        'saved' => 'Event saved',
        'deleted' => 'Event deleted',
        'preview' => 'Event preview',
        'city' => 'City',
        'city_desc' => 'Place of event',
        'alias' => 'Event alias from title (after save)',
        'alias_desc' => 'The alias is automatically generated to produce a search engine optimized url'

    ],
    'list' => [
        'id' => 'ID',
        'title' => 'Name',
        'fromdate' => 'Start date',
        'todate' => 'End date',
        'time' => 'Time',
        'public' => 'activated',
        'yes' => 'Yes',
        'no' => 'No',
        'city' => 'City'
    ],
    'menu' => [
        'main' => 'Eventmanager',
        'side_entries' => 'Events',
    ],
    'event' =>[
        'name' => 'Eventdetail',
        'description' => 'show event detail',
        'labels' => 'Labels',
        'ptitle' => 'Title',
        'pdescription' => 'HTML-Tags allowed',
        'pdatum' => 'Date to show',
        'pdatumdesc' => 'Placeholder  in text [d] = start date, [dd] = end date, [z] = start time, [zz]= end time',
        'ptime' => 'Time',
        'ptimedesc' =>'HTML-Tags allowed erlaubt. Placeholder [z] = start time, [zz]= end time',
    ],
    'events' => [
        'name' => 'Eventlist',
        'description' => 'shows an event list',
        'detailpage' => 'Landing page',
        'detailpagedesc' => 'Langing page to details with alias (example : event/:alias)',
        'labels' => 'Labels',
        'noentry' => 'No events',
        'noentrydesc' => 'Note : There were no events found. HTML-Tags allowed',
        'ptitle' => 'Title',
        'pdescription' => 'HTML-Tags allowed',
        'pdatum' => 'Date to show',
        'pdatumdesc' => 'Placeholder [d] = start date, [dd] = end date, [z] = start time, [zz]= end time',
        'ptime' => 'Zeit',
        'ptimedesc' =>'HTML-Tags allowed. Placeholder [z] = start time [zz]= end time',
        'detail' => 'Link text',
        'detaildesc' => 'Text for the link to the detail page'
    ]
];