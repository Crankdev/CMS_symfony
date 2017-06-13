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
    public function indexAction()
    {

        return $this->render('admin/index.html.php', array(

        ));
    }
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
        $form = $this->createForm('Front\MenuBundle\Form\MenuType', $menu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $menu->setUrl($this->TransUrl($menu->getName()));
            $em = $this->getDoctrine()->getManager();
            $em->persist($menu);
            $em->flush($menu);

            return $this->redirectToRoute('admin_edit_menu', array('id' => $menu->getId()));
        }

        return $this->render('admin/new_menu.html.php', array(
            'menu' => $menu,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing menu entity.
     *
     */
    public function edit_menuAction(Request $request, Menu $menu)
    {
        $deleteForm = $this->createDeleteFormMenu($menu);
        $editForm = $this->createForm('Front\MenuBundle\Form\MenuType', $menu);
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

        return $this->redirectToRoute('admin_index_menu');
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

            return $this->redirectToRoute('admin_edit_people', array('id' => $people->getId()));
        }
        return $this->render('admin/new_people.html.php', array(
            'person' => $people,
            'form' => $form->createView(),
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
     * Lists all foto entities.
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
     * Creates a new foto entity.
     *
     */
    public function new_fotoAction(Request $request)
    {
        $foto = new Foto();
        $form = $this->createForm('Front\TopBundle\Form\FotoType', $foto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            foreach ($foto->getName() as $fotos){
                $foto_2 = new Foto();
                $file = $fotos;
                //var_dump($fotos);
                // Generate a unique name for the file before saving it
                $fileName = md5(uniqid()).'.'.$file->guessExtension();

                // Move the file to the directory where brochures are stored
                $file->move(
                    $this->getParameter('imeges_directory'),
                    $fileName
                );
                $str=$this->getParameter('imeges_directory'). "/". $fileName;
                $size = getimagesize($str);

                $foto_2->setName($fileName);
                $foto_2->setSizeX($size[0]);
                $foto_2->setSizeY($size[1]);
                $foto_2->setActivities($foto->getActivities());
                $em = $this->getDoctrine()->getManager();
                $em->persist($foto_2);
                $em->flush($foto_2);
            }
           /* $file = $fotos->getName();

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
           */

            return $this->redirectToRoute('admin_index_foto');
        }

        return $this->render('admin/new_foto.html.php', array(
            'foto' => $foto,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a foto entity.
     *
     */
    public function show_fotoAction(Foto $foto)
    {
        $deleteForm = $this->createDeleteFormFoto($foto);

        return $this->render('admin/show_foto.html.php', array(
            'foto' => $foto,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing fto entity.
     *
     */
    public function edit_fotoAction(Request $request, Foto $foto)
    {
        $deleteForm = $this->createDeleteFormFoto($foto);
        $fotoname = $foto->getName();
        $foto->setName('');
        $editForm = $this->createForm('Front\TopBundle\Form\UnoFotoType', $foto);

        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
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

            return $this->redirectToRoute('admin_edit_foto', array('id' => $foto->getId()));
        }
        return $this->render('admin/edit_foto.html.php', array(
            'foto' => $foto,
            'fotoname' => $fotoname,
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

        return $this->redirectToRoute('admin_index_foto');
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
            ->setAction($this->generateUrl('admin_delete_foto', array('id' => $foto->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }
	
	
	
	 /**
     * Lists all activity entities.
     *
     */
    public function index_activityAction( )
    {
       /*$message = \Swift_Message::newInstance()
            ->setSubject('Hello Email')
            ->setFrom('dimadev13@gmail.com')
            ->setTo('dimadev13@gmail.com')
            ->setBody(
                $this->renderView(
                    'admin/email.txt.twig',
                    array('name' => 'lllll bill')
                )
            )
        ;
        $transport = \Swift_SmtpTransport::newInstance()
            ->setUsername('dimadev13@gmail.com')
            ->setPassword('gear1285')->setHost('smtp.gmail.com')
            ->setPort(465)->setEncryption('ssl');

        $mailer = \Swift_Mailer::newInstance($transport);

        //var_dump($mailer->send($message));
        echo  $this->get('mailer')->send($message);
        die(1);*/
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
            $activity->setUrl($this->TransUrl($activity->getName()));
            $em = $this->getDoctrine()->getManager();
            $em->persist($activity);
            $em->flush($activity);

            return $this->redirectToRoute('admin_edit_activity', array('id' => $activity->getId()));
        }

        return $this->render('admin/new_activity.html.php', array(
            'activity' => $activity,
            'form' => $form->createView(),
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

            return $this->redirectToRoute('admin_edit_project', array('id' => $project->getId()));
        }

        return $this->render('admin/new_project.html.php', array(
            'project' => $project,
            'form' => $form->createView(),
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
        $listit = new Listit();
        $Menu = new Menu();
        $form = $this->createForm('Front\MenuBundle\Form\ListitType', $listit);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $listit->setUrl($this->TransUrl($listit->getName()));
            if($listit->getMenu()==null) {
                $Menu->setName($listit->getName());
                $Menu->setNameRu($listit->getNameRu());
                $Menu->setNameEn($listit->getNameEn());
                $Menu->setUrl($listit->getUrl());
                $Menu->setIsActivated($listit->getIsActivated());
            }
            if ($listit->getFoto()) {
                $file = $listit->getFoto();

                // Generate a unique name for the file before saving it
                $fileName = md5(uniqid()) . '.' . $file->guessExtension();

                // Move the file to the directory where brochures are stored
                $file->move(
                    $this->getParameter('imeges_list_directory'),
                    $fileName
                );
                $listit->setFoto($fileName);
            }
            $em = $this->getDoctrine()->getManager();
            if($listit->getMenu()==null) {
                $em->persist($Menu);
                $em->flush($Menu);
                $listit->setMenu($Menu);
            }
            $em->persist($listit);
            $em->flush($listit);

            return $this->redirectToRoute('admin_edit_listit', array('id' => $listit->getId()));
        }

        return $this->render('admin/new_listit.html.php', array(
            'listit' => $listit,
            'form' => $form->createView(),
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
        $fotoname = $listit->getFoto();
        $listit->setFoto('');
        $editForm->handleRequest($request);
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            if ($listit->getFoto()) {
                $file = $listit->getFoto();

                // Generate a unique name for the file before saving it
                $fileName = md5(uniqid()) . '.' . $file->guessExtension();

                // Move the file to the directory where brochures are stored
                $file->move(
                    $this->getParameter('imeges_list_directory'),
                    $fileName
                );
                $listit->setFoto($fileName);
            }
            else {
                $listit->setFoto($fotoname);
            }
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_edit_listit', array('id' => $listit->getId()));
        }

        return $this->render('admin/edit_listit.html.php', array(
            'listit' => $listit,
            'fotoname'=> $fotoname,
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
    public function TransUrl($str)
    {
        $tr = array(
            "А"=>"a",
            "Б"=>"b",
            "В"=>"v",
            "Г"=>"g",
            "Д"=>"d",
            "Е"=>"e",
            "Ё"=>"e",
            "Ж"=>"j",
            "З"=>"z",
            "И"=>"i",
            "Й"=>"y",
            "К"=>"k",
            "Л"=>"l",
            "М"=>"m",
            "Н"=>"n",
            "О"=>"o",
            "П"=>"p",
            "Р"=>"r",
            "С"=>"s",
            "Т"=>"t",
            "У"=>"u",
            "Ф"=>"f",
            "Х"=>"h",
            "Ц"=>"ts",
            "Ч"=>"ch",
            "Ш"=>"sh",
            "Щ"=>"sch",
            "Ъ"=>"",
            "Ы"=>"i",
            "І"=>"i",
            "і"=>"i",
            "Ь"=>"j",
            "Э"=>"e",
            "Ю"=>"yu",
            "Я"=>"ya",
            "а"=>"a",
            "б"=>"b",
            "в"=>"v",
            "г"=>"g",
            "д"=>"d",
            "е"=>"e",
            "ё"=>"e",
            "ж"=>"j",
            "з"=>"z",
            "и"=>"i",
            "й"=>"y",
            "к"=>"k",
            "л"=>"l",
            "м"=>"m",
            "н"=>"n",
            "о"=>"o",
            "п"=>"p",
            "р"=>"r",
            "с"=>"s",
            "т"=>"t",
            "у"=>"u",
            "ф"=>"f",
            "х"=>"h",
            "ц"=>"ts",
            "ч"=>"ch",
            "ш"=>"sh",
            "щ"=>"sch",
            "ъ"=>"y",
            "ы"=>"i",
            "ь"=>"j",
            "э"=>"e",
            "ю"=>"yu",
            "я"=>"ya",
            " "=> "_",
            "."=> "",
            "/"=> "_",
            ","=>"_",
            "-"=>"_",
            "("=>"",
            ")"=>"",
            "["=>"",
            "]"=>"",
            "="=>"_",
            "+"=>"_",
            "*"=>"",
            "?"=>"",
            "\""=>"",
            "'"=>"",
            "&"=>"",
            "%"=>"",
            "#"=>"",
            "@"=>"",
            "!"=>"",
            ";"=>"",
            "№"=>"",
            "^"=>"",
            ":"=>"",
            "~"=>"",
            "\\"=>"",
            "—"=>"",
            "|"=>"",
            "«"=>"",
            "»"=>"",
            "–"=>"",

        );
        return strtr($str,$tr);
    }
}
