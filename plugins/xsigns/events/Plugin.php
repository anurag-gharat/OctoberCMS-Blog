<?php
namespace Xsigns\events;

use Event;
use Backend;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{

    public function pluginDetails()
    {
        return [
            'name'        => 'xsigns.events::lang.plugin.name',
            'description' => 'xsigns.events::lang.plugin.description',
            'author'      => 'xsigns',
            'icon'        => 'icon-comments-o',
            'homepage'    => 'https://www.xsigns.de'
        ];
    }

    public function registerComponents()
    {
        return[
            'xsigns\events\Components\Events' => 'events',
            'xsigns\events\Components\Event' => 'event',
        ];
    }

    public function registerNavigation()
    {
        return [
            'octo.timeline' => [
                'label'       => 'xsigns.events::lang.plugin.name',
                'url'         => Backend::url('xsigns/events/events'),
                'icon'        => 'icon-comments-o',
                'iconSvg'     => 'plugins/xsigns/events/assets/images/events.svg',
                'permissions' => '',
                'order'       => 500,

                'sideMenu' => [
                    'posts' => [
                    'label'       => 'xsigns.events::lang.menu.side_entries',
                    'icon'        => 'icon-comments-o',
                    'url'         => Backend::url('xsigns/events/events'),
                    ],
                ]

            ]
        ];
    }

    public function registerSettings()
    {
    }
}
