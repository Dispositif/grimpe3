<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Region;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Region controller.
 *
 * @Route("region")
 */
class RegionController extends Controller
{
    /**
     * Lists all region entities.
     *
     * @Route("/", name="region_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $regions = $em->getRepository('AppBundle:Region')->findAll();

        return $this->render('region/index.html.twig', [
            'regions' => $regions,
        ]);
    }

    /**
     * Creates a new region entity.
     *
     * @Route("/new", name="region_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $region = new Region();
        $form = $this->createForm('AppBundle\Form\RegionType', $region);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($region);
            $em->flush();

            return $this->redirectToRoute('region_show', ['rid' => $region->getRid()]);
        }

        return $this->render('region/new.html.twig', [
            'region' => $region,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Finds and displays a region entity.
     *
     * @Route("/{rid}", name="region_show")
     * @Method("GET")
     */
    public function showAction(Region $region)
    {
        $deleteForm = $this->createDeleteForm($region);

        return $this->render('region/show.html.twig', [
            'region' => $region,
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
     * Displays a form to edit an existing region entity.
     *
     * @Route("/{rid}/edit", name="region_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Region $region)
    {
        $deleteForm = $this->createDeleteForm($region);
        $editForm = $this->createForm('AppBundle\Form\RegionType', $region);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('region_edit', ['rid' => $region->getRid()]);
        }

        return $this->render('region/edit.html.twig', [
            'region' => $region,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
     * Deletes a region entity.
     *
     * @Route("/{rid}", name="region_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Region $region)
    {
        $form = $this->createDeleteForm($region);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($region);
            $em->flush();
        }

        return $this->redirectToRoute('region_index');
    }

    /**
     * Creates a form to delete a region entity.
     *
     * @param Region $region The region entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Region $region)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('region_delete', ['rid' => $region->getRid()]))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
