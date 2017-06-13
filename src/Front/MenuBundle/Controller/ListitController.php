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
        $menus = $em->getRepository('FrontMenuBundle:Menu')->findBy(array('is_activated'=> 1));
        if ($_locale == 'ru'){
            foreach ($menus as $menu)$menu->setName($menu->getNameru());
            $listit->setName($listit->getNameru());
            $listit->setAbout($listit->getAboutru());

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
    private function feedback(){
        $feedback = new Feedback();
        $form = $this->createForm('Front\TopBundle\Form\FeedbackType', $feedback, array(
            'action' => $this->generateUrl('feedback_new'),
            'method' => 'post',
        ));
        return $form->createView();
    }

}
