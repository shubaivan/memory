<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SongControllerTest extends WebTestCase
{
    public function testIndexAction()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/showSong');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertTrue($crawler->filter('html:contains("Songs")')->count() > 0);
    }
}
