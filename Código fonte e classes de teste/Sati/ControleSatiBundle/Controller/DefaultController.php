<?php

namespace Sati\ControleSatiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SatiControleSatiBundle:Default:index.html.twig', array('name' => $name));
    }
}
