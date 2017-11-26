<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Test de /api
 */
class ApiControllerTest extends WebTestCase
{
	/** 
	 * la page de test GET /api/ qui renvoit JSON hello
	 */
    public function testIndex()
    { 
    	
        $client = static::createClient();
        $crawler = $client->request('GET', '/api/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        // The Crawler only works when the response is an XML or an HTML
        //$this->assertContains('hello', $crawler->filter('#container h1')->text());
        //$this->assertGreaterThan(0, $crawler->filter('json:contains("hello")')->count() );
        
        // Get raw 
        $this->assertContains('hello', $client->getResponse()->getContent() );
    }

    /**
     * Liste XML des sites
     * /map/{lat}/{lon}/{date}
     * @return [type] [description]
     */
    public function testMapAction() {

    	// http://localhost/grimpe3/web/app_dev.php/api/map/43.3/5.3/25-11-2017
    	
    	$client = static::createClient();
        $crawler = $client->request('GET', '/api/map/43.3/5.3/25-11-2017');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        if( !isset($_ENV['TRAVIS']) ) { // exclusion pour building Travis 

        	$this->assertGreaterThan(0, $crawler->filter('marker[type=falaise]')->count() );
        	$this->assertGreaterThan(0, $crawler->filter('marker[nom="Pilon du Roi"]')->count() );
        	$this->assertGreaterThan(0, $crawler->filter('marker[ville="Marseille"]')->count() );
        	$this->assertGreaterThan(0, $crawler->filter('marker[sorties="0"]')->count() );

        }

        

    }
}
