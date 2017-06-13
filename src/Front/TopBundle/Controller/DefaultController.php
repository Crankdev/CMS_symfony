<?php

namespace Front\TopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('FrontTopBundle:Default:index.html.php');
    }
}
