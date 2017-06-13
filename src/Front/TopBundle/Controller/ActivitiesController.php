<?php

namespace Front\TopBundle\Controller;

use Front\TopBundle\Entity\Activities;
use Front\TopBundle\Entity\Feedback;
use Front\TopBundle\Entity\Project;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Doctrine\ORM\Tools\Pagination\Paginator;
/**
 * Activity controller.
 *
 */
class ActivitiesController extends Controller
{

    /**
     * Lists all activity entities.
     * @Route("/{page}", name="Front_proj_index", requirements={"page": "\d+"})
     */
    public function indexAction( $_locale  = 'ua' )
    {
        $em = $this->getDoctrine()->getManager();
        $menus = $em->getRepository('FrontMenuBundle:Menu')->findBy(array('is_activated'=> 1));
        $activities = $em->getRepository('FrontTopBundle:Activities')->findBy(array('is_activated'=> 1));
        $total_activities = count($activities);
        $this->translate ($menus, $activities,  $_locale);
        //usort($activities, function($a, $b) {
          //  return $a->getCreatedAt()->format('U') - $b->getCreatedAt()->format('U');
        //});
        $activities = array_reverse($activities);
        return $this->render('activities/index.html.twig', array(
            'locale' => $_locale,
            'activities' => $activities,
            'menus' => $menus,
<<<<<<< HEAD
            'form' =>  $this->feedback(),
            'total_activities' => $total_activities,
=======
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
>>>>>>> parent of 5f11dee... Update admin bundle
        ));
    }

    /**
     * Finds and displays a activity entity.
     *
     */
    public function showAction(Activities $activity , $_locale  = 'ua' )
    {
        $em = $this->getDoctrine()->getManager();
<<<<<<< HEAD
        $menus = $em->getRepository('FrontMenuBundle:Menu')->findBy(array('is_activated'=> 1));
        $array[0]=$activity;
        $this->translate ($menus, $array,  $_locale);
=======
        $menus = $em->getRepository('FrontMenuBundle:Menu')->findAll();
        $deleteForm = $this->createDeleteForm($activity);
       // var_dump($activity->getFoto());
>>>>>>> parent of 5f11dee... Update admin bundle
        return $this->render('activities/show.html.twig', array(
            'locale' => $_locale,
            'activity' => $activity,
            'form' =>  $this->feedback(),
            'menus' => $menus,
        ));
    }

    public function showpAction(Project $project,  $_locale  = 'ua' )
    {
        $em = $this->getDoctrine()->getManager();
        $menus = $em->getRepository('FrontMenuBundle:Menu')->findBy(array('is_activated'=> 1));
        $this->translate ($menus , $project->getActivities(), $_locale, $project);
        return $this->render('activities/showp.html.twig', array(
            'locale' => $_locale,
            'project' => $project,
            'form' =>  $this->feedback(),
            'menus' => $menus,
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

    private function  translate ($menus, $activitys, $_locale  = 'ua', $project = null) {
        if ($_locale == 'ru') {
            if($project != null) {
                $project->setName($project->getNameru());
                $project->setAbout($project->getAboutru());
            }
            foreach ($activitys as $activity) {
                foreach ($menus as $menu)$menu->setName($menu->getNameru());
                $activity->setName($activity->getNameru());
                $activity->setAbout($activity->getAboutru());
                $activity->setNeeds($activity->getNeedsRu());
                $activity->getProject()->setName($activity->getProject()->getNameRu());
                foreach ($activity->getPeople() as $person){
                    $person->setName($person->getNameRu());
                    $person->setWho($person->getWhoRu());
                }
            }
        }
        if ($_locale == 'en') {
            if($project != null) {
                $project->setName($project->getNameen());
                $project->setAbout($project->getAbouten());
            }
            foreach ($activitys as $activity) {
                foreach ($menus as $menu)$menu->setName($menu->getNameen());
                $activity->setName($activity->getNameen());
                $activity->setAbout($activity->getAbouten());
                $activity->setNeeds($activity->getNeedsEn());
                $activity->getProject()->setName($activity->getProject()->getNameEn());
                foreach ($activity->getPeople() as $person){
                    $person->setName($person->getNameEn());
                    $person->setWho($person->getWhoEn());
                }
            }
        }
    }
}
