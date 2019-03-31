<?php

namespace Nhatphamcdn\AssetsManage;

use Illuminate\Support\Str;

class AssetManage
{
    private $assets;

    /**
     * @method __Construct
     * @param $assets
     */

    public function __construct($assets) {
        $this->assets = $assets;
    }

    /**
     * @method asset
     * @param lists $libs
     * @return void
    */
    public function asset($type, ...$libs) {
        $html = null;
        
        foreach($libs as $lib) {
            $html .= $this->makeAssetLib($type, $lib);
        }

        return $html;
    }

    protected function makeAssetLib($type, $lib) {
        $html = null;

        if(Str::endsWith($lib, '.css') || Str::endsWith($lib, '.js')) {
            return $this->generateAssetLink($type, $lib);
        }

        if(!isset($this->assets[$lib][$type])) {
            return $html;
        }

        $asset = $this->assets[$lib][$type];

        if(is_array($asset)) {
            foreach($asset as $path) {
                $html .= $this->generateAssetLink($type, $path);
            }
        } else {
            $html .= $this->generateAssetLink($type, $asset);
        }

        return $html;
    }

    protected function generateAssetLink($type, $url) {
        $url = $this->generateAbsoluteUrl($url);

        if($type === 'css') {
            return "<link rel='stylesheet' type='text/css' href='$url'/>\n";
        }

        if($type === 'js') {
            return "<script type='text/javascript' src='$url'></script>\n";
        }

        return null;
    }


    protected function generateAbsoluteUrl($url)
    {
        if(Str::startsWith($url, ['http://', 'https://', '//'])) {
            return $url;
        }

        return url($url);
    }
}
