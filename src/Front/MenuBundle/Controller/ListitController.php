<?php

namespace Front\MenuBundle\Controller;

use Front\MenuBundle\Entity\Listit;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Listit controller.
 *
 */
class ListitController extends Controller
{
    /**
     * Lists all listit entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $listits = $em->getRepository('FrontMenuBundle:Listit')->findAll();

        return $this->render('listit/index.html.twig', array(
            'listits' => $listits,
        ));
    }

    /**
     * Creates a new listit entity.
     *
     */
    public function newAction(Request $request)
    {
        $listit = new Listit();
        $form = $this->createForm('Front\MenuBundle\Form\ListitType', $listit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($listit);
            $em->flush($listit);

            return $this->redirectToRoute('l_show', array('id' => $listit->getId()));
        }

        return $this->render('listit/new.html.twig', array(
            'listit' => $listit,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a listit entity.
     *
     */
    public function showAction(Listit $listit)
    {
        $deleteForm = $this->createDeleteForm($listit);

        return $this->render('listit/show.html.twig', array(
            'listit' => $listit,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing listit entity.
     *
     */
    public function editAction(Request $request, Listit $listit)
    {
        $deleteForm = $this->createDeleteForm($listit);
        $editForm = $this->createForm('Front\MenuBundle\Form\ListitType', $listit);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('l_edit', array('id' => $listit->getId()));
        }

        return $this->render('listit/edit.html.twig', array(
            'listit' => $listit,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a listit entity.
     *
     */
    public function deleteAction(Request $request, Listit $listit)
    {
        $form = $this->createDeleteForm($listit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($listit);
            $em->flush($listit);
        }

        return $this->redirectToRoute('l_index');
    }

    /**
     * Creates a form to delete a listit entity.
     *
     * @param Listit $listit The listit entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Listit $listit)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('l_delete', array('id' => $listit->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
