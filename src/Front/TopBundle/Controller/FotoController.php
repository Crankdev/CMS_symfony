<?php

namespace Front\TopBundle\Controller;

use Front\TopBundle\Entity\Foto;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Activity controller.
 *
 */
class FotoController extends Controller
{
    /**
     * Lists all activity entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $foto= $em->getRepository('FrontTopBundle:Foto')->findAll();

        return $this->render('foto/index.html.twig', array(
            'fotos' => $foto,
        ));
    }

    /**
     * Creates a new activity entity.
     *
     */
    public function newAction(Request $request)
    {
        $foto = new Foto();
        $form = $this->createForm('Front\TopBundle\Form\FotoType', $foto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $foto->getName();

            // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            // Move the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('imeges_directory'),
                $fileName
            );
            $str=$this->getParameter('imeges_directory'). "/". $fileName;
            $size = getimagesize($str);
            //var_dump($size);
            $foto->setName($fileName);
            $foto->setSizeX($size[0]);
            $foto->setSizeY($size[1]);

            $em = $this->getDoctrine()->getManager();
            $em->persist($foto);
            $em->flush($foto);

            return $this->redirectToRoute('Front_foto_show', array('id' => $foto->getId()));
        }

        return $this->render('foto/new.html.twig', array(
            'foto' => $foto,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a activity entity.
     *
     */
    public function showAction(Foto $foto)
    {
        $deleteForm = $this->createDeleteForm($foto);

        return $this->render('foto/show.html.twig', array(
            'foto' => $foto,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing activity entity.
     *
     */
    public function editAction(Request $request, Foto $foto)
    {
        $deleteForm = $this->createDeleteForm($foto);
        $editForm = $this->createForm('Front\TopBundle\Form\FotoType', $foto);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('Front_foto_index', array('id' => $foto->getId()));
        }

        return $this->render('activities/edit.html.twig', array(
            'foto' => $foto,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a activity entity.
     *
     */
    public function deleteAction(Request $request, Foto $foto)
    {
        $form = $this->createDeleteForm($foto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($foto);
            $em->flush($foto);
        }

        return $this->redirectToRoute('Front_foto_index');
    }

    /**
     * Creates a form to delete a activity entity.
     *
     * @param Activities $activity The activity entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Foto $foto)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('Front_foto_index', array('id' => $foto->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }
}
