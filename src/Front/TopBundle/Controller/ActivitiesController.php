<?php

namespace Front\TopBundle\Controller;

use Front\TopBundle\Entity\Activities;
use Front\TopBundle\Entity\Project;
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
        $menus = $em->getRepository('FrontMenuBundle:Menu')->findAll();
        $activities = $em->getRepository('FrontTopBundle:Activities')->findAll();


        return $this->render('activities/index.html.twig', array(
            'activities' => $activities,
            'menus' => $menus,
        ));
    }

    /**
     * Creates a new activity entity.
     *
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $menus = $em->getRepository('FrontMenuBundle:Menu')->findAll();
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
            'menus' => $menus,
        ));
    }

    /**
     * Finds and displays a activity entity.
     *
     */
    public function showAction(Activities $activity)
    {
        $em = $this->getDoctrine()->getManager();
        $menus = $em->getRepository('FrontMenuBundle:Menu')->findAll();
        $deleteForm = $this->createDeleteForm($activity);

        return $this->render('activities/show.html.twig', array(
            'activity' => $activity,
            'menus' => $menus,
            'delete_form' => $deleteForm->createView(),
        ));
    }
    public function showpAction(Project $project)
    {
        $em = $this->getDoctrine()->getManager();
        $menus = $em->getRepository('FrontMenuBundle:Menu')->findAll();

        return $this->render('activities/showp.html.twig', array(
            'project' => $project,
            'menus' => $menus,
        ));
    }
    /**
     * Displays a form to edit an existing activity entity.
     *
     */
    public function editAction(Request $request, Activities $activity)
    {
        $em = $this->getDoctrine()->getManager();
        $menus = $em->getRepository('FrontMenuBundle:Menu')->findAll();
        $deleteForm = $this->createDeleteForm($activity);
        $editForm = $this->createForm('Front\TopBundle\Form\ActivitiesType', $activity);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('Front_proj_edit', array('id' => $activity->getId()));
        }

        return $this->render('activities/edit.html.twig', array(
            'activity' => $activity,
            'menus' => $menus,
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
