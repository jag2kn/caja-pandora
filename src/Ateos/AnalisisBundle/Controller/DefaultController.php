<?php

namespace Ateos\AnalisisBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AteosAnalisisBundle:Default:index.html.twig', array(
        ));
    }
}
