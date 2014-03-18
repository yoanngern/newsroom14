<?php

namespace comem\NewsroomBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use comem\NewsroomBundle\Entity\Theme;

class ArticleController extends Controller
{
    public function homeAction()
    {
        return $this->render('comemNewsroomBundle:Article:home.html.twig');
    }
    
    public function themeAction(Theme $theme)
    {
        
        $em = $this->getDoctrine()->getManager();
        
        $ads = $em->getRepository('comemNewsroomBundle:Ad')->findAllByTheme($theme);
        
        return $this->render('comemNewsroomBundle:Theme:'. $theme->getRef() .'.html.twig', array(
            'ads' => $ads,
            'theme' => $theme
        ));
    }
}
