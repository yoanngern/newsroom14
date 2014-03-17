<?php

namespace comem\NewsroomBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function homeAction()
    {
        return $this->render('comemNewsroomBundle:Default:home.html.twig');
    }
}
