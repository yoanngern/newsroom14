<?php

namespace comem\NewsroomBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArticleController extends Controller
{
    public function homeAction()
    {
        return $this->render('comemNewsroomBundle:Article:home.html.twig');
    }
    
    public function themeAction($theme)
    {
        
        $em = $this->getDoctrine()->getManager();
        
        $ads = $em->getRepository('comemNewsroomBundle:Ad')->findAllByTheme($theme);
        
        return $this->render('comemNewsroomBundle:Theme:'. $theme .'.html.twig', array(
            'ads' => $ads,
            'theme' => $theme
        ));
    }
}
