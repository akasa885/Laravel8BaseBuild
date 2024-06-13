<?php

namespace App\View\Components\Util;

use Illuminate\View\Component;
use App\Models\SiteSetting;
use App\Models\MetaContent;

class MetaWebsite extends Component
{
    protected $available_meta_part = [
        'title',
        'description',
        'keywords',
    ];

    public $metaString = '';
    public $metaPart = '';
    public $isContent = false;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($meta = null, $content_id = null)
    {
        if (!$this->checkRequestMetaPart($meta)) {
            return '';
        }

        $this->metaPart = $meta;

        if ($content_id) {
            $this->isContent = true;
            $this->metaString = $this->getMetaForContent($content_id, $meta);
        } else {
            $this->metaString = $this->getDefaultMeta($meta);
        }
    }

    private function checkRequestMetaPart($meta_part)
    {
        return in_array($meta_part, $this->available_meta_part);
    }

    private function getMetaForContent($content_id, $meta_part)
    {

    }

    public function getDefaultMeta($meta_part)
    {
        $site_setting = SiteSetting::findorfail(SiteSetting::IDENTIFIER);
        $meta = $site_setting->getMeta($meta_part);

        return $meta;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.util.meta-website');
    }
}
