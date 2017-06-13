<?php

namespace Front\MenuBundle\Controller;

use Front\TopBundle\Entity\Feedback;
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
     * Finds and displays a listit entity.
     *
     */
    public function showAction(Listit $listit, $_locale)
    {
        $em = $this->getDoctrine()->getManager();
<<<<<<< HEAD
        $menus = $em->getRepository('FrontMenuBundle:Menu')->findBy(array('is_activated'=> 1));
        if ($_locale == 'ru'){
            foreach ($menus as $menu)$menu->setName($menu->getNameru());
            $listit->setName($listit->getNameru());
            $listit->setAbout($listit->getAboutru());

=======
        $listit = new Listit();
        $menus = $em->getRepository('FrontMenuBundle:Menu')->findAll();
        $form = $this->createForm('Front\MenuBundle\Form\ListitType', $listit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($listit);
            $em->flush($listit);

            return $this->redirectToRoute('l_show', array('url' => $listit->getUrl()));
>>>>>>> parent of 5f11dee... Update admin bundle
        }
        if ($_locale == 'en'){
            foreach ($menus as $menu)$menu->setName($menu->getNameen());
            $listit->setName($listit->getNameen());
            $listit->setAbout($listit->getAbouten());
        }
        return $this->render('listit/show.html.twig', array(
            'locale' => $_locale,
            'listit' => $listit,
            'menus'   => $menus,
            'form' =>  $this->feedback(),
        ));
    }
<<<<<<< HEAD
    private function feedback(){
        $feedback = new Feedback();
        $form = $this->createForm('Front\TopBundle\Form\FeedbackType', $feedback, array(
            'action' => $this->generateUrl('feedback_new'),
            'method' => 'post',
=======

    /**
     * Displays a form to edit an existing listit entity.
     *
     */
    public function editAction(Request $request, Listit $listit)
    {
        $em = $this->getDoctrine()->getManager();
        $deleteForm = $this->createDeleteForm($listit);
        $editForm = $this->createForm('Front\MenuBundle\Form\ListitType', $listit);
        $editForm->handleRequest($request);
        $menus = $em->getRepository('FrontMenuBundle:Menu')->findAll();
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('l_edit', array('id' => $listit->getId()));
        }

        return $this->render('listit/edit.html.twig', array(
            'listit' => $listit,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'menus'   => $menus,
>>>>>>> parent of 5f11dee... Update admin bundle
        ));
        return $form->createView();
    }

}
