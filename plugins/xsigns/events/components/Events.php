<?php
namespace Xsigns\events\Components;

use Cms\Classes\ComponentBase;
use xsigns\events\Models\Events as Entry;
use Cms\Classes\Page;

class Events extends ComponentBase
{

    public function componentDetails()
    {
        /**
         * Component details.
         */
        return [
            'name'        => 'xsigns.events::lang.events.name',
            'description' => 'xsigns.events::lang.events.description'
        ];
    }
	
    public function defineProperties()
    {
        return [
            'postPage' => [
                'title' => 'xsigns.events::lang.events.detailpage',
                'description' => 'xsigns.events::lang.events.detailpagedesc',
                'type' => 'dropdown',
                'default' => '/'
            ],
            'labels' => [
                'property' => 'labels',
                'title' => e(trans('xsigns.events::lang.events.labels')),
                'type' => 'object',
                'default' => [
                    'noentrys' => 'Keine aktuellen Einträge vorhanden',
                    'titel' => '<h2>Veranstaltungen</h2>',
                    'datum' => '<h3>[d] [z] - [dd] [zz]</h3>',
                    'zeit' => '<h3>[z] - [zz]</h3>',
                    'detail' => 'Deteails...'
                ],
                'properties' => [
                    ['property' => 'noentrys',
                        'title' => e(trans('xsigns.events::lang.events.noentry')),
                        'description' => e(trans('xsigns.events::lang.events.noentrydesc')),
                        'type'   => 'text',
                    ],
                    ['property' => 'titel',
                        'title' => e(trans('xsigns.events::lang.events.ptitle')),
                        'description' => e(trans('xsigns.events::lang.events.pdescription')),
                        'type'  => 'text'
                    ],
                    ['property' => 'datum',
                        'title' => e(trans('xsigns.events::lang.events.pdatum')),
                        'description' => e(trans('xsigns.events::lang.events.pdatumdesc')),
                        'type'   => 'text',
                    ],
                    ['property' => 'zeit',
                        'title' => e(trans('xsigns.events::lang.events.ptime')),
                        'description' => e(trans('xsigns.events::lang.events.ptimedesc')),
                        'type'   => 'text',
                    ],
                    ['property' => 'detail',
                        'title' => e(trans('xsigns.events::lang.events.detail')),
                        'deascription' => e(trans('xsigns.events::lang.events.detaildesc')),
                        'type'   => 'string',
                    ],
                ]
            ]
        ];
    }
	public function getPostPageOptions()
    {
        return Page::sortBy('/')->lists('url', 'url');
    }

    public function onRun()
    {
        /**
         * Init component
         */
        $this->page['events'] = $this->getEntries();
        $this->page['labels'] = $this->properties['labels'];
    }

    public function getEntries() 
    {
        /**
         * Getting entries from database and returning to a partial.
         */
        $result = [];
        $today = date('Y-m-d');
        $entries = Entry::where('public', 1)
            ->where('to', '>=', $today)
            ->orderBy('from', 'asc')
            ->orderBy('timefrom', 'desc')
            ->get();
        $url = $this->property('postPage');
        foreach($entries as $entry)
        {
            $result[] = array(
                'date' => str_replace(array('[d]', '[dd]','[z]','[zz]'), array(date("d.m.Y", strtotime($entry->from)), date("d.m.Y", strtotime($entry->to)),date("H:i",strtotime($entry->timefrom)), date("H:i",strtotime($entry->timeto))), $this->properties['labels']['datum']),
                'title' => $entry->title,
                'city' => $entry->city,
                'text' => $entry->text,
                'short' => $entry->short,
                'time' => str_replace(array('[z]','[zz]'),array(date("H:i",strtotime($entry->timefrom)), date("H:i",strtotime($entry->timeto))),$this->properties['labels']['zeit']),
                'url' => str_replace(':alias', $entry->alias, $url)
            );
        }
        return $result;
    }
}
