<?php

namespace Nhatphamcdn\AssetsManage\Tests;

class ViewTest extends TestCase
{
    public function testViewWorks()
    {
        $html = view('index')->render();
        $this->assertCssExists('https://example.com/simple.css', $html);
        $this->assertJsExists('https://example.com/simple.js', $html);

        $this->assertCssExists('https://example.com/simple-one.css', $html);
        $this->assertJsExists('https://example.com/simple-one.js', $html);

        $this->assertCssExists('https://example.com/simple-two.css', $html);
        $this->assertJsExists('https://example.com/simple-two.js', $html);

        $this->assertCssExists('https://example.com/multiple-a.css', $html);
        $this->assertCssExists('https://example.com/multiple-b.css', $html);
        $this->assertJsExists('https://example.com/multiple-a.js', $html);
        $this->assertJsExists('https://example.com/multiple-b.js', $html);

        $this->assertCssExists('https://example.com/multiple-one-a.css', $html);
        $this->assertCssExists('https://example.com/multiple-one-b.css', $html);
        $this->assertJsExists('https://example.com/multiple-one-a.js', $html);
        $this->assertJsExists('https://example.com/multiple-one-b.js', $html);

        $this->assertCssExists('https://example.com/multiple-two-a.css', $html);
        $this->assertCssExists('https://example.com/multiple-two-b.css', $html);
        $this->assertJsExists('https://example.com/multiple-two-a.js', $html);
        $this->assertJsExists('https://example.com/multiple-two-b.js', $html);

        $this->assertCssExists('http://localhost/css/local.css', $html);
        $this->assertJsExists('http://localhost/js/local.js', $html);
    }
}
