<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AlbumControllerTest extends WebTestCase
{
    public function testIndexAction()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/showAlbum');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertTrue($crawler->filter('html:contains("Albums")')->count() > 0);
    }
}
