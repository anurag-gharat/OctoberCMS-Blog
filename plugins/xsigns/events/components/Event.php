<?php
namespace Xsigns\events\Components;

use Cms\Classes\ComponentBase;
use xsigns\events\Models\Events as Entry;
use Cms\Classes\Page;

class Event extends ComponentBase
{

    public function componentDetails()
    {
        /**
         * Component details.
         */
        return [
            'name' => 'xsigns.events::lang.event.name',
            'description' => 'xsigns.events::lang.event.description',
        ];
    }

    public function defineProperties()
    {
        return [
            'labels' => [
                'property' => 'labels',
                'title' => e(trans('xsigns.events::lang.event.labels')),
                'type' => 'object',
                'default' => [
                    'titel' => '<h2>Veranstaltung</h2>',
                    'datum' => '<h3>[d] [z] bis [dd] [zz]</h3>',
                    'zeit' => '<h3>[z] bis [zz]</h3>',
                ],
                'properties' => [
                    ['property' => 'titel',
                        'title' => e(trans('xsigns.events::lang.event.ptitle')),
                        'description' => e(trans('xsigns.events::lang.event.pdescription')),
                        'type'  => 'text'
                    ],
                    ['property' => 'datum',
                        'title' => e(trans('xsigns.events::lang.event.pdatum')),
                        'description' => e(trans('xsigns.events::lang.event.pdatumdesc')),
                        'type'   => 'text',
                    ],
                    ['property' => 'zeit',
                        'title' => e(trans('xsigns.events::lang.event.ptime')),
                        'description' => e(trans('xsigns.events::lang.event.ptimedesc')),
                        'type'   => 'text',
                    ]
                ]
            ]
        ];
    }

    public function onRun()
    {
        /**
         * Init component
         */
        $alias = $this->param('alias');
        $this->page['event'] = $this->getEntry($alias);
        $this->page['labels'] = $this->properties['labels'];
    }
    public function getEntry($alias)
    {
        /**
         * Getting entries from database and returning to a partial.
         */
        $result = [];
        $entries = Entry::where('public', 1)
            ->where('alias', '=', $alias)
            ->get();

        foreach ($entries as $entry) {
            $result = array(
                'date' => str_replace(array('[d]', '[dd]','[z]','[zz]'), array(date("d.m.Y", strtotime($entry->from)), date("d.m.Y", strtotime($entry->to)),date("H:i",strtotime($entry->timefrom)), date("H:i",strtotime($entry->timeto))), $this->properties['labels']['datum']),
                'title' => $entry->title,
                'city' => $entry->city,
                'text' => $entry->text,
                'short' => $entry->short,
                'time' => str_replace(array('[z]','[zz]'),array(date("H:i",strtotime($entry->timefrom)+date("Z",strtotime($entry->timefrom))), date("H:i",strtotime($entry->timeto))),$this->properties['labels']['zeit'])
            );
        }
        return $result;
    }
}
