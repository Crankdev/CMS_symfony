<?php

namespace Front\TopBundle\Controller;

use Front\TopBundle\Entity\People;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Person controller.
 *
 */
class PeopleController extends Controller
{
    /**
     * Lists all person entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $menus = $em->getRepository('FrontMenuBundle:Menu')->findAll();
        $people = $em->getRepository('FrontTopBundle:People')->findAll();

        return $this->render('people/index.html.twig', array(
            'people' => $people,
            'menus' => $menus,
        ));
    }

    /**
     * Creates a new person entity.
     *
     */
    public function newAction(Request $request)
    {
        $people = new People();
        $form = $this->createForm('Front\TopBundle\Form\PeopleType', $people);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        $menus = $em->getRepository('FrontMenuBundle:Menu')->findAll();
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();


            $file = $people->getFoto();

            // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            // Move the file to the directory where brochures are stored
            $file->move(
                 $this->getParameter('foto_people_directory'),
                 $fileName
            );

            $people->setFoto($fileName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($people);
            $em->flush($people);

            return $this->redirectToRoute('people_show', array('id' => $people->getId()));
        }

        return $this->render('people/new.html.twig', array(
            'person' => $people,
            'form' => $form->createView(),
            'menus' => $menus,
        ));
    }

    /**
     * Finds and displays a person entity.
     *
     */
    public function showAction(People $people)
    {
        $deleteForm = $this->createDeleteForm($people);
        $em = $this->getDoctrine()->getManager();
        $menus = $em->getRepository('FrontMenuBundle:Menu')->findAll();
        return $this->render('people/show.html.twig', array(
            'person' => $people,
            'delete_form' => $deleteForm->createView(),
            'menus' => $menus,
        ));
    }

    /**
     * Displays a form to edit an existing person entity.
     *
     */
    public function editAction(Request $request, People $people)
    {
        $deleteForm = $this->createDeleteForm($people);
        $editForm = $this->createForm('Front\TopBundle\Form\PeopleType', $people);
        $editForm->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        $menus = $em->getRepository('FrontMenuBundle:Menu')->findAll();
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('people_edit', array('id' => $people->getId()));
        }

        return $this->render('people/edit.html.twig', array(
            'person' => $people,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'menus' => $menus,
        ));
    }

    /**
     * Deletes a person entity.
     *
     */
    public function deleteAction(Request $request, People $people)
    {
        $form = $this->createDeleteForm($people);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($people);
            $em->flush($people);
        }

        return $this->redirectToRoute('people_index');
    }

    /**
     * Creates a form to delete a person entity.
     *
     * @param People $person The person entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(People $people)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('people_delete', array('id' => $people->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
