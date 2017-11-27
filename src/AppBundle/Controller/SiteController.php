<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Site;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Site controller.
 *
 * @Route("site")
 */
class SiteController extends Controller
{
    /**
     * Lists all site entities.
     *
     * @Route("/", name="site_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $sites = $em->getRepository('AppBundle:Site')->findAll();

        return $this->render('site/index.html.twig', array(
            'sites' => $sites,
        ));
    }

    /**
     * Show a map of sites
     *
     * @Route("/map", name="site_map")
     * @Method({"GET"})
     */
    public function sitemapAction()
    {
        //$em = $this->getDoctrine()->getManager();
        //$sites = $em->getRepository('AppBundle:Site')->findAll();

        return $this->render('site/map.html.twig');
    }


    /**
     * Creates a new site entity.
     *
     * @Route("/new", name="site_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $site = new Site();
        $form = $this->createForm('AppBundle\Form\SiteType', $site);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($site);
            $em->flush();

            return $this->redirectToRoute('site_show', array('siteid' => $site->getSiteid()));
        }

        return $this->render('site/new.html.twig', array(
            'site' => $site,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a site entity.
     *
     * @Route("/{siteid}", name="site_show")
     * @Method("GET")
     */
    public function showAction(Site $site)
    {
        $deleteForm = $this->createDeleteForm($site);

        // TODO BBcode 
        // HACKED (à l'arrache)
        $description = $site->getDescription();
        $replace = [
                '\r\n'  => '<br />',
                '[h3]'   => '<h3>',
                '[/h3]'  => '</h3>',
                '[img]'  => '<div style="text-align:center"><img class="img-thumbnail" width="250" style="margin:20px;" src="',
                '[/img]' => '" /></div>',
                ];
        $description = str_replace(array_keys($replace), array_values($replace), $description);
        $site->setDescription( $description);
        

        // Liste des sorties prochaines sur ce site
        $em = $this->getDoctrine()->getManager();
        $sqltoday = date('Y-m-d 00:00:00', strtotime('now'));
        $query = $em->createQuery('SELECT s
                                    FROM AppBundle:Sortie s
                                    WHERE s.ssite = :site AND s.date > :sqltoday
                                    ORDER BY s.date'
                                )->setParameter('sqltoday', $sqltoday)
                                ->setParameter('site', $site)
                                ->setMaxResults(10);
        $sorties = $query->getResult();
        
        // var_dump($sorties);exit;

        function timeto($time_stamp, $time_stamp2 = 'now') {
            $res = '';

            $diff = abs(strtotime($time_stamp) - strtotime($time_stamp2));

            $jours = intval($diff / 3600 / 24);

            if ($jours >= 30 * 12) {
                return intval($diff / 3600 / 24 / 365).' ans';
            }
            if ($jours >= 30) {
                return intval($diff / 3600 / 24 / 30).' mois';
            }
            if ($jours >= 2) {
                return $jours.' jours';
            }
            // < 48h
            $heures = floor(intval($diff / 3600));
            $minutes = floor(($diff - $heures * 3600) / 60);

            if ($heures >= 2) {
                return $heures.' heures';
            }
            if ($heures == 1) {
                return 'plus d’une heure';
            }

            if ($minutes > 2) {
                return $minutes.' minutes';
            } else {
                return 'à l’instant';
            }
        }

        

        return $this->render('site/show.html.twig', array(
                                        'site' => $site,
                                        'delete_form' => $deleteForm->createView(),
                                        'sorties' => $sorties
        ));
    }

    /**
     * Displays a form to edit an existing site entity.
     *
     * @Route("/{siteid}/edit", name="site_edit")
     * @Method({"GET", "POST"})
     *
/    public function editAction(Request $request, Site $site)
    {
        $deleteForm = $this->createDeleteForm($site);
        $editForm = $this->createForm('AppBundle\Form\SiteType', $site);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('site_edit', array('siteid' => $site->getSiteid()));
        }

        return $this->render('site/edit.html.twig', array(
            'site' => $site,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a site entity.
     *
     * @Route("/{siteid}", name="site_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Site $site)
    {
        $form = $this->createDeleteForm($site);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($site);
            $em->flush();
        }

        return $this->redirectToRoute('site_index');
    }

    /**
     * Creates a form to delete a site entity.
     *
     * @param Site $site The site entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Site $site)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('site_delete', array('siteid' => $site->getSiteid())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
