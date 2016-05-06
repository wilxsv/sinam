<?php

namespace Sinam\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sinam\CoreBundle\Entity\CtlPais;
use Sinam\CoreBundle\Form\CtlPaisType;

/**
 * CtlPais controller.
 *
 */
class CtlPaisController extends Controller
{
    /**
     * Lists all CtlPais entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ctlPais = $em->getRepository('SinamCoreBundle:CtlPais')->findAll();

        return $this->render('ctlpais/index.html.twig', array(
            'ctlPais' => $ctlPais,
        ));
    }

    /**
     * Creates a new CtlPais entity.
     *
     */
    public function newAction(Request $request)
    {
        $ctlPai = new CtlPais();
        $form = $this->createForm('Sinam\CoreBundle\Form\CtlPaisType', $ctlPai);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ctlPai);
            $em->flush();

            return $this->redirectToRoute('ctlpais_show', array('id' => $ctlPai->getId()));
        }

        return $this->render('ctlpais/new.html.twig', array(
            'ctlPai' => $ctlPai,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a CtlPais entity.
     *
     */
    public function showAction(CtlPais $ctlPai)
    {
        $deleteForm = $this->createDeleteForm($ctlPai);

        return $this->render('ctlpais/show.html.twig', array(
            'ctlPai' => $ctlPai,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing CtlPais entity.
     *
     */
    public function editAction(Request $request, CtlPais $ctlPai)
    {
        $deleteForm = $this->createDeleteForm($ctlPai);
        $editForm = $this->createForm('Sinam\CoreBundle\Form\CtlPaisType', $ctlPai);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ctlPai);
            $em->flush();

            return $this->redirectToRoute('ctlpais_edit', array('id' => $ctlPai->getId()));
        }

        return $this->render('ctlpais/edit.html.twig', array(
            'ctlPai' => $ctlPai,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a CtlPais entity.
     *
     */
    public function deleteAction(Request $request, CtlPais $ctlPai)
    {
        $form = $this->createDeleteForm($ctlPai);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ctlPai);
            $em->flush();
        }

        return $this->redirectToRoute('ctlpais_index');
    }

    /**
     * Creates a form to delete a CtlPais entity.
     *
     * @param CtlPais $ctlPai The CtlPais entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CtlPais $ctlPai)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ctlpais_delete', array('id' => $ctlPai->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
