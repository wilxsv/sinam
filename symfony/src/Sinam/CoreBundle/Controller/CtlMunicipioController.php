<?php

namespace Sinam\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sinam\CoreBundle\Entity\CtlMunicipio;
use Sinam\CoreBundle\Form\CtlMunicipioType;

/**
 * CtlMunicipio controller.
 *
 */
class CtlMunicipioController extends Controller
{
    /**
     * Lists all CtlMunicipio entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ctlMunicipios = $em->getRepository('SinamCoreBundle:CtlMunicipio')->findAll();

        return $this->render('ctlmunicipio/index.html.twig', array(
            'ctlMunicipios' => $ctlMunicipios,
        ));
    }

    /**
     * Creates a new CtlMunicipio entity.
     *
     */
    public function newAction(Request $request)
    {
        $ctlMunicipio = new CtlMunicipio();
        $form = $this->createForm('Sinam\CoreBundle\Form\CtlMunicipioType', $ctlMunicipio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ctlMunicipio);
            $em->flush();

            return $this->redirectToRoute('ctlmunicipio_show', array('id' => $ctlMunicipio->getId()));
        }

        return $this->render('ctlmunicipio/new.html.twig', array(
            'ctlMunicipio' => $ctlMunicipio,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a CtlMunicipio entity.
     *
     */
    public function showAction(CtlMunicipio $ctlMunicipio)
    {
        $deleteForm = $this->createDeleteForm($ctlMunicipio);

        return $this->render('ctlmunicipio/show.html.twig', array(
            'ctlMunicipio' => $ctlMunicipio,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing CtlMunicipio entity.
     *
     */
    public function editAction(Request $request, CtlMunicipio $ctlMunicipio)
    {
        $deleteForm = $this->createDeleteForm($ctlMunicipio);
        $editForm = $this->createForm('Sinam\CoreBundle\Form\CtlMunicipioType', $ctlMunicipio);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ctlMunicipio);
            $em->flush();

            return $this->redirectToRoute('ctlmunicipio_edit', array('id' => $ctlMunicipio->getId()));
        }

        return $this->render('ctlmunicipio/edit.html.twig', array(
            'ctlMunicipio' => $ctlMunicipio,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a CtlMunicipio entity.
     *
     */
    public function deleteAction(Request $request, CtlMunicipio $ctlMunicipio)
    {
        $form = $this->createDeleteForm($ctlMunicipio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ctlMunicipio);
            $em->flush();
        }

        return $this->redirectToRoute('ctlmunicipio_index');
    }

    /**
     * Creates a form to delete a CtlMunicipio entity.
     *
     * @param CtlMunicipio $ctlMunicipio The CtlMunicipio entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CtlMunicipio $ctlMunicipio)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ctlmunicipio_delete', array('id' => $ctlMunicipio->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
