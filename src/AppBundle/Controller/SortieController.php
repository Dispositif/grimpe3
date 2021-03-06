<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Sortie;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Sortie controller.
 *
 * @Route("sortie")
 */
class SortieController extends Controller
{
    /**
     * Lists all sortie entities.
     *
     * @Route("/", name="sortie_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $sorties = $em->getRepository('AppBundle:Sortie')->findAll();

        return $this->render('sortie/index.html.twig', array(
            'sorties' => $sorties,
        ));
    }

    /**
     * Creates a new sortie entity.
     *
     * @Route("/new", name="sortie_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $sortie = new Sortie();
        $form = $this->createForm('AppBundle\Form\SortieType', $sortie);
        $sortie->setDatecreated( new \DateTime('now')); 

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($sortie);
            $em->flush();

            return $this->redirectToRoute('sortie_show', array('idsortie' => $sortie->getIdsortie()));
        }

        return $this->render('sortie/new.html.twig', array(
            'sortie' => $sortie,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a sortie entity.
     *
     * @Route("/{idsortie}", name="sortie_show")
     * @Method("GET")
     */
    public function showAction(Sortie $sortie)
    {
        $deleteForm = $this->createDeleteForm($sortie);

        return $this->render('sortie/show.html.twig', array(
            'sortie' => $sortie,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing sortie entity.
     *
     * @Route("/{idsortie}/edit", name="sortie_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Sortie $sortie)
    {
        $deleteForm = $this->createDeleteForm($sortie);
        $editForm = $this->createForm('AppBundle\Form\SortieType', $sortie);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sortie_edit', array('idsortie' => $sortie->getIdsortie()));
        }

        return $this->render('sortie/edit.html.twig', array(
            'sortie' => $sortie,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a sortie entity.
     *
     * @Route("/{idsortie}", name="sortie_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Sortie $sortie)
    {
        $form = $this->createDeleteForm($sortie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($sortie);
            $em->flush();
        }

        return $this->redirectToRoute('sortie_index');
    }

    /**
     * Creates a form to delete a sortie entity.
     *
     * @param Sortie $sortie The sortie entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Sortie $sortie)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('sortie_delete', array('idsortie' => $sortie->getIdsortie())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
