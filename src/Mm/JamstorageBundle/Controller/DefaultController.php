<?php

namespace Mm\JamstorageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('MmJamstorageBundle:Default:index.html.twig', array('name' => $name));
    }
}
