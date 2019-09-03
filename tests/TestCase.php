<?php

namespace Nhatphamcdn\AssetsManage\Tests;

use Nhatphamcdn\AssetsManage\AssetsManageServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('view.paths', [__DIR__.'/resources/views']);
        $app['config']->set('assets-manage.assets', [
            'local' => [
                'css' => 'css/local.css',
                'js'  => 'js/local.js',
            ],

            'simple' => [
                'css' => 'https://example.com/simple.css',
                'js'  => 'https://example.com/simple.js',
            ],

            'simple-one' => [
                'css' => 'https://example.com/simple-one.css',
                'js'  => 'https://example.com/simple-one.js',
            ],
            'simple-two' => [
                'css' => 'https://example.com/simple-two.css',
                'js'  => 'https://example.com/simple-two.js',
            ],

            'multiple' => [
                'css' => [
                    'https://example.com/multiple-a.css',
                    'https://example.com/multiple-b.css',
                ],
                'js' => [
                    'https://example.com/multiple-a.js',
                    'https://example.com/multiple-b.js',
                ],
            ],

            'multiple-one' => [
                'css' => [
                    'https://example.com/multiple-one-a.css',
                    'https://example.com/multiple-one-b.css',
                ],
                'js' => [
                    'https://example.com/multiple-one-a.js',
                    'https://example.com/multiple-one-b.js',
                ],
            ],
            'multiple-two' => [
                'css' => [
                    'https://example.com/multiple-two-a.css',
                    'https://example.com/multiple-two-b.css',
                ],
                'js' => [
                    'https://example.com/multiple-two-a.js',
                    'https://example.com/multiple-two-b.js',
                ],
            ],
        ]);
    }

    protected function getPackageProviders($app)
    {
        return [AssetsManageServiceProvider::class];
    }

    protected function assertCssExists($css, $source)
    {
        $this->assertStringContainsString("<link rel='stylesheet' type='text/css' href='$css'/>", $source);
    }

    protected function assertJsExists($js, $source)
    {
        $this->assertStringContainsString("<script type='text/javascript' src='$js'></script>", $source);
    }
}
