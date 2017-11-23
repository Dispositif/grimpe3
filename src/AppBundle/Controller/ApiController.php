<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;


/**
 * API controller (REST server)
 *
 * @Route("api")
 */
class ApiController extends Controller
{
    /**
     * @Route("/", name="api_hello")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $res = array('message' => 'hello');

        $response = new Response(json_encode( $res ));
		$response->headers->set('Content-Type', 'application/json');
		return $response;
    }

    /**
     * Renvoi XML des sites à proximité avec sorties selon date
     * // ,requirements={"id" = "\d+"}
     * @Route("/map/{lat}/{lon}/{date}", name="api_sitemap")
     * @Method("GET")
     */
    public function mapAction($lat, $lon, $date)
    {
    	// http://localhost/grimpe3/web/app_dev.php/api/map/43.3/5.3/25-11-2017
        //$lat = 43.3; $lon = 5.3; $date = '2017-11-25';

        $em = $this->getDoctrine()->getManager();
        $res = $em->getRepository('AppBundle:Site')->findNearSites($lat, $lon, $date, 100 );
    	
		// Start XML file
		$dom = new \DOMDocument("1.0");
		$node = $dom->createElement("markers");
		$parnode = $dom->appendChild($node);

		foreach ($res as $row) {

		    // Add to XML document node
		    $node = $dom->createElement("marker");
		    $newnode = $parnode->appendChild($node);
		    $newnode->setAttribute("id", $row['siteid']);
		    $newnode->setAttribute("type", $row['type']);
		    $newnode->setAttribute("adresse", $row['sitenom']);
		    $newnode->setAttribute("nom", $row['sitenom']);
		    $newnode->setAttribute("lat", $row['latitude']);
		    $newnode->setAttribute("lng", $row['longitude']);

		    $newnode->setAttribute("distance", round($row['distance']) );
		    $newnode->setAttribute("sorties", $row['nsorties']);
		   
		   	$node->setAttribute("searchdate", $date );
		    
		}


        $response = new Response( $dom->saveXML() );
        $response->headers->set('Access-Control-Allow-Origin', '*');
		$response->headers->set('Content-Type', 'text/xml'); // text/xml; charset=utf-8
		return $response;
    }

}
