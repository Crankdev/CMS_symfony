<?php

namespace Front\TopBundle\Controller;

use Front\TopBundle\Entity\Activities;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Activity controller.
 *
 */
class ActivitiesController extends Controller
{
    /**
     * Lists all activity entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $activities = $em->getRepository('FrontTopBundle:Activities')->findAll();

        return $this->render('activities/index.html.twig', array(
            'activities' => $activities,
        ));
    }

    /**
     * Creates a new activity entity.
     *
     */
    public function newAction(Request $request)
    {
        $activity = new Activities();
        $form = $this->createForm('Front\TopBundle\Form\ActivitiesType', $activity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $em = $this->getDoctrine()->getManager();
            $em->persist($activity);
            $em->flush($activity);

            return $this->redirectToRoute('Front_proj_show', array('id' => $activity->getId()));
        }

        return $this->render('activities/new.html.twig', array(
            'activity' => $activity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a activity entity.
     *
     */
    public function showAction(Activities $activity)
    {
        $em = $this->getDoctrine()->getManager();
        $deleteForm = $this->createDeleteForm($activity);
        $foto = $em->getRepository('FrontTopBundle:foto')->findAll();
        //var_dump($foto);
        return $this->render('activities/show.html.twig', array(
            'activity' => $activity,
            'fotos' => $foto,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing activity entity.
     *
     */
    public function editAction(Request $request, Activities $activity)
    {
        $deleteForm = $this->createDeleteForm($activity);
        $editForm = $this->createForm('Front\TopBundle\Form\ActivitiesType', $activity);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('Front_proj_edit', array('id' => $activity->getId()));
        }

        return $this->render('activities/edit.html.twig', array(
            'activity' => $activity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a activity entity.
     *
     */
    public function deleteAction(Request $request, Activities $activity)
    {
        $form = $this->createDeleteForm($activity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($activity);
            $em->flush($activity);
        }

        return $this->redirectToRoute('Front_proj_index');
    }

    /**
     * Creates a form to delete a activity entity.
     *
     * @param Activities $activity The activity entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Activities $activity)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('Front_proj_delete', array('id' => $activity->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
