<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Lib\LinkShortner;

class testLinkShortner extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testShortner()
    {
        $testUrl = 'https://laravel.com/docs/5.7/providers';
        $shortnerObject = \App::make(LinkShortner::class);
        $uniqId = $shortnerObject->shorten($testUrl);
        $this->assertTrue((strlen($uniqId) > 0));
    }

    public function testExpand()
    {
        $shortnedUrl = 'first-short-url';
        $shortnerObject = \App::make(LinkShortner::class);
        $url = $shortnerObject->expand($shortnedUrl);
        $this->assertTrue(filter_var($url, FILTER_VALIDATE_URL) != false);
    }

    public function testExpandWithBadUniqId()
    {
        $this->expectException(\Illuminate\Database\Eloquent\ModelNotFoundException::class);
        $shortnedUrl = 'first-short-url-bad-id';
        $shortnerObject = \App::make(LinkShortner::class);
        $url = $shortnerObject->expand($shortnedUrl);
    }

    public function testList()
    {
        $shortnerObject = \App::make(LinkShortner::class);
        $result = $shortnerObject->list();
        $this->assertTrue(count($result) > 0);
    }
}
