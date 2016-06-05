<?php

namespace Sinam\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sinam\CoreBundle\Entity\FarmCatalogoproductos;
use Sinam\CoreBundle\Form\FarmCatalogoproductosType;

/**
 * FarmCatalogoproductos controller.
 *
 */
class FarmCatalogoproductosController extends Controller
{
    /**
     * Lists all FarmCatalogoproductos entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $farmCatalogoproductos = $em->getRepository('SinamCoreBundle:FarmCatalogoproductos')->findAll();

        return $this->render('farmcatalogoproductos/index.html.twig', array(
            'farmCatalogoproductos' => $farmCatalogoproductos,
        ));
    }

    /**
     * Creates a new FarmCatalogoproductos entity.
     *
     */
    public function newAction(Request $request)
    {
        $farmCatalogoproducto = new FarmCatalogoproductos();
        $form = $this->createForm('Sinam\CoreBundle\Form\FarmCatalogoproductosType', $farmCatalogoproducto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($farmCatalogoproducto);
            $em->flush();

            return $this->redirectToRoute('farmcatalogoproductos_show', array('id' => $farmCatalogoproducto->getId()));
        }

        return $this->render('farmcatalogoproductos/new.html.twig', array(
            'farmCatalogoproducto' => $farmCatalogoproducto,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a FarmCatalogoproductos entity.
     *
     */
    public function showAction(FarmCatalogoproductos $farmCatalogoproducto)
    {
        $deleteForm = $this->createDeleteForm($farmCatalogoproducto);

        return $this->render('farmcatalogoproductos/show.html.twig', array(
            'farmCatalogoproducto' => $farmCatalogoproducto,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing FarmCatalogoproductos entity.
     *
     */
    public function editAction(Request $request, FarmCatalogoproductos $farmCatalogoproducto)
    {
        $deleteForm = $this->createDeleteForm($farmCatalogoproducto);
        $editForm = $this->createForm('Sinam\CoreBundle\Form\FarmCatalogoproductosType', $farmCatalogoproducto);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($farmCatalogoproducto);
            $em->flush();

            return $this->redirectToRoute('farmcatalogoproductos_edit', array('id' => $farmCatalogoproducto->getId()));
        }

        return $this->render('farmcatalogoproductos/edit.html.twig', array(
            'farmCatalogoproducto' => $farmCatalogoproducto,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a FarmCatalogoproductos entity.
     *
     */
    public function deleteAction(Request $request, FarmCatalogoproductos $farmCatalogoproducto)
    {
        $form = $this->createDeleteForm($farmCatalogoproducto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($farmCatalogoproducto);
            $em->flush();
        }

        return $this->redirectToRoute('farmcatalogoproductos_index');
    }

    /**
     * Creates a form to delete a FarmCatalogoproductos entity.
     *
     * @param FarmCatalogoproductos $farmCatalogoproducto The FarmCatalogoproductos entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(FarmCatalogoproductos $farmCatalogoproducto)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('farmcatalogoproductos_delete', array('id' => $farmCatalogoproducto->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
