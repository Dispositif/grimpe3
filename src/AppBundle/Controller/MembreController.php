<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Membre;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Membre controller.
 *
 * @Route("membre")
 */
class MembreController extends Controller
{
    /**
     * Lists all membre entities.
     *
     * @Route("/", name="membre_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $membres = $em->getRepository('AppBundle:Membre')->findAll();

        return $this->render('membre/index.html.twig', array(
            'membres' => $membres
        ));
    }

    /**
     * Finds and displays a membre entity.
     *
     * @Route("/{idmembre}", name="membre_show")
     * @Method("GET")
     */
    public function showAction(Membre $membre)
    {

        return $this->render('membre/show.html.twig', array(
            'membre' => $membre
        ));
    }
}
