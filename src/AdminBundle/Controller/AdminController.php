<?php

namespace AdminBundle\Controller;

use Front\MenuBundle\Entity\Menu;
use Front\TopBundle\Entity\People;
use Front\TopBundle\Entity\Foto;
use Front\MenuBundle\Entity\Listit;
use Front\TopBundle\Entity\Activities;
use Front\TopBundle\Entity\Project;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Menu controller.
 *
 */
class AdminController extends Controller
{
    /**
     * Lists all menu entities.
     *
     */
    public function index_menuAction()
    {
        $em = $this->getDoctrine()->getManager();

        $menus = $em->getRepository('FrontMenuBundle:Menu')->findAll();

        return $this->render('admin/index_menu.html.php', array(
            'menus' => $menus,
        ));
    }
    /**
     * Creates a new menu entity.
     *
     */
    public function new_menuAction(Request $request)
    {
        $menu = new Menu();
        $form = $this->createForm('AdminBundle\Form\MenuType', $menu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($menu);
            $em->flush($menu);

            return $this->redirectToRoute('admin_show_menu', array('id' => $menu->getId()));
        }

        return $this->render('admin/new_menu.html.php', array(
            'menu' => $menu,
            'form' => $form->createView(),
        ));
    }
    /**
     * Finds and displays a menu entity.
     *
     */
    public function show_menuAction(Menu $menu)
    {
        $deleteForm = $this->createDeleteFormMenu($menu);

        return $this->render('admin/show_menu.html.php', array(
            'menu' => $menu,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing menu entity.
     *
     */
    public function edit_menuAction(Request $request, Menu $menu)
    {
        $deleteForm = $this->createDeleteFormMenu($menu);
        $editForm = $this->createForm('AdminBundle\Form\MenuType', $menu);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_edit_menu', array('id' => $menu->getId()));
        }

        return $this->render('admin/edit_menu.html.php', array(
            'menu' => $menu,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a menu entity.
     *
     */
    public function delete_menuAction(Request $request, Menu $menu)
    {
        $form = $this->createDeleteFormMenu($menu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($menu);
            $em->flush($menu);
        }

        return $this->redirectToRoute('admin_index');
    }
    /**
     * Creates a form to delete a menu entity.
     *
     * @param Menu $menu The menu entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteFormMenu(Menu $menu)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_delete_menu', array('id' => $menu->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
	
	
	/**
     * Lists all person entities.
     *
     */
    public function index_peopleAction()
    {
        $em = $this->getDoctrine()->getManager();
        $people = $em->getRepository('FrontTopBundle:People')->findAll();

        return $this->render('admin/index_people.html.php', array(
            'peoples' => $people,
        ));
    }

    /**
     * Creates a new person entity.
     *
     */
    public function new_peopleAction(Request $request)
    {
        $people = new People();
        $form = $this->createForm('Front\TopBundle\Form\PeopleType', $people);
        $form->handleRequest($request);
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

            return $this->redirectToRoute('admin_show_people', array('id' => $people->getId()));
        }

        return $this->render('admin/new_people.html.php', array(
            'person' => $people,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a person entity.
     *
     */
    public function show_peopleAction(People $people)
    {
        $deleteForm = $this->createDeleteFormPeople($people);
        return $this->render('admin/show_people.html.php', array(
            'person' => $people,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing person entity.
     *
     */
    public function edit_peopleAction(Request $request, People $people)
    {
        $deleteForm = $this->createDeleteFormPeople($people);
        $editForm = $this->createForm('Front\TopBundle\Form\PeopleType', $people);
        $editForm->handleRequest($request);
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_edit_people', array('id' => $people->getId()));
        }

        return $this->render('admin/edit_people.html.php', array(
            'person' => $people,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a person entity.
     *
     */
    public function delete_peopleAction(Request $request, People $people)
    {
        $form = $this->createDeleteFormPeople($people);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($people);
            $em->flush($people);
        }

        return $this->redirectToRoute('admin_index_people');
    }

    /**
     * Creates a form to delete a person entity.
     *
     * @param People $person The person entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteFormPeople(People $people)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_delete_people', array('id' => $people->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
	
	
	
	    /**
     * Lists all activity entities.
     *
     */
    public function index_fotoAction()
    {
        $em = $this->getDoctrine()->getManager();
        $foto= $em->getRepository('FrontTopBundle:Foto')->findAll();

        return $this->render('admin/index_foto.html.php', array(
            'fotos' => $foto,
        ));
    }

    /**
     * Creates a new activity entity.
     *
     */
    public function new_fotoAction(Request $request)
    {
        $foto = new Foto();
        $form = $this->createForm('Front\TopBundle\Form\FotoType', $foto);
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();

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

            $foto->setName($fileName);
            $foto->setSizeX($size[0]);
            $foto->setSizeY($size[1]);

            $em = $this->getDoctrine()->getManager();
            $em->persist($foto);
            $em->flush($foto);

            return $this->redirectToRoute('admin_show_foto', array('id' => $foto->getId()));
        }

        return $this->render('admin/new_foto.html.php', array(
            'foto' => $foto,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a activity entity.
     *
     */
    public function show_fotoAction(Foto $foto)
    {
        $deleteForm = $this->createDeleteFormFoto($foto);
        $em = $this->getDoctrine()->getManager();
        return $this->render('admin/show_foto.html.php', array(
            'foto' => $foto,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing activity entity.
     *
     */
    public function edit_fotoAction(Request $request, Foto $foto)
    {
        $deleteForm = $this->createDeleteFormFoto($foto);
        $editForm = $this->createForm('Front\TopBundle\Form\FotoType', $foto);
        $editForm->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_show_foto', array('id' => $foto->getId()));
        }

        return $this->render('admin/edit_foto.html.php', array(
            'foto' => $foto,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a activity entity.
     *
     */
    public function delete_fotoAction(Request $request, Foto $foto)
    {
        $form = $this->createDeleteFormFoto($foto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($foto);
            $em->flush($foto);
        }

        return $this->redirectToRoute('admin_show_foto');
    }

    /**
     * Creates a form to delete a activity entity.
     *
     * @param Activities $activity The activity entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteFormFoto(Foto $foto)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('Front_foto_index', array('id' => $foto->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }
	
	
	
	 /**
     * Lists all activity entities.
     *
     */
    public function index_activityAction()
    {
        $em = $this->getDoctrine()->getManager();
        $activities = $em->getRepository('FrontTopBundle:Activities')->findAll();


        return $this->render('admin/index_activity.html.php', array(
            'activities' => $activities,
        ));
    }

    /**
     * Creates a new activity entity.
     *
     */
    public function new_activityAction(Request $request)
    {
        $activity = new Activities();
        $form = $this->createForm('Front\TopBundle\Form\ActivitiesType', $activity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($activity);
            $em->flush($activity);

            return $this->redirectToRoute('admin_show_activity', array('id' => $activity->getId()));
        }

        return $this->render('admin/new_activity.html.php', array(
            'activity' => $activity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a activity entity.
     *
     */
    public function show_activityAction(Activities $activity)
    {
        $deleteForm = $this->createDeleteFormActivities($activity);

        return $this->render('admin/show_activity.html.php', array(
            'activity' => $activity,
            'delete_form' => $deleteForm->createView(),
        ));
    }
	
    /**
     * Displays a form to edit an existing activity entity.
     *
     */
    public function edit_activityAction(Request $request, Activities $activity)
    {
        $deleteForm = $this->createDeleteFormActivity($activity);
        $editForm = $this->createForm('Front\TopBundle\Form\ActivitiesType', $activity);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_edit_activity', array('id' => $activity->getId()));
        }

        return $this->render('admin/edit_activitie.html.php', array(
            'activity' => $activity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a activity entity.
     *
     */
    public function delete_activityAction(Request $request, Activities $activity)
    {
        $form = $this->createDeleteFormActivity($activity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($activity);
            $em->flush($activity);
        }

        return $this->redirectToRoute('admin_index_activity');
    }

    /**
     * Creates a form to delete a activity entity.
     *
     * @param Activities $activity The activity entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteFormActivity(Activities $activity)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_delete_activity', array('id' => $activity->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
	 /**
     * Lists all project entities.
     *
     */
    public function index_projectAction()
    {
        $em = $this->getDoctrine()->getManager();
        $projects = $em->getRepository('FrontTopBundle:Project')->findAll();


        return $this->render('admin/index_project.html.php', array(
            'projects' => $projects,
        ));
    }

    /**
     * Creates a new project entity.
     *
     */
    public function new_projectAction(Request $request)
    {
        $project = new Project();
        $form = $this->createForm('Front\TopBundle\Form\ProjectType', $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($project);
            $em->flush($project);

            return $this->redirectToRoute('admin_show_project', array('id' => $project->getId()));
        }

        return $this->render('admin/new_project.html.php', array(
            'project' => $project,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a project entity.
     *
     */
    public function show_projectAction(Project $project)
    {
        $deleteForm = $this->createDeleteFormActivities($project);

        return $this->render('admin/show_project.html.php', array(
            'project' => $project,
            'delete_form' => $deleteForm->createView(),
        ));
    }
	
    /**
     * Displays a form to edit an existing project entity.
     *
     */
    public function edit_projectAction(Request $request, Project $project)
    {
        $deleteForm = $this->createDeleteFormProject($project);
        $editForm = $this->createForm('Front\TopBundle\Form\ProjectType', $project);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_edit_project', array('id' => $project->getId()));
        }

        return $this->render('admin/edit_project.html.php', array(
            'project' => $project,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a project entity.
     *
     */
    public function delete_projectAction(Request $request, Project $project)
    {
        $form = $this->createDeleteFormProject($project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($project);
            $em->flush($project);
        }

        return $this->redirectToRoute('admin_index_project');
    }

    /**
     * Creates a form to delete a project entity.
     *
     * @param Activities $project The project entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteFormProject(Project $project)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_delete_project', array('id' => $project->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
	
	  /**
     * Lists all listit entities.
     *
     */
    public function index_listitAction()
    {
        $em = $this->getDoctrine()->getManager();
        $listits = $em->getRepository('FrontMenuBundle:Listit')->findAll();

        return $this->render('admin/index_listit.html.php', array(
            'listits' => $listits,
        ));
    }

    /**
     * Creates a new listit entity.
     *
     */
    public function new_listitAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $listit = new Listit();
        $form = $this->createForm('Front\MenuBundle\Form\ListitType', $listit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $file = $listit->getFoto();

            // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            // Move the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('imeges_list_directory'),
                $fileName
            );
            $listit->setFoto($fileName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($listit);
            $em->flush($listit);

            return $this->redirectToRoute('admin_show_listit', array('url' => $listit->getUrl()));
        }

        return $this->render('admin/new_listit.html.php', array(
            'listit' => $listit,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a listit entity.
     *
     */
    public function show_listitAction(Listit $listit)
    {
        $em = $this->getDoctrine()->getManager();
        $deleteForm = $this->createDeleteFormListit($listit);
        return $this->render('asmin/show_listit.html.php', array(
            'listit' => $listit,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing listit entity.
     *
     */
    public function edit_listitAction(Request $request, Listit $listit)
    {
        $deleteForm = $this->createDeleteFormListit($listit);
        $editForm = $this->createForm('Front\MenuBundle\Form\ListitType', $listit);
        $editForm->handleRequest($request);
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $file = $listit->getFoto();

            // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            // Move the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('imeges_list_directory'),
                $fileName
            );
            $listit->setFoto($fileName);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_edit_listit', array('id' => $listit->getId()));
        }

        return $this->render('admin/edit_listit.html.php', array(
            'listit' => $listit,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a listit entity.
     *
     */
    public function delete_listitAction(Request $request, Listit $listit)
    {
        $form = $this->createDeleteFormListit($listit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($listit);
            $em->flush($listit);
        }

        return $this->redirectToRoute('admin_index_listit');
    }

    /**
     * Creates a form to delete a listit entity.
     *
     * @param Listit $listit The listit entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteFormListit(Listit $listit)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_delete_listit', array('id' => $listit->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
