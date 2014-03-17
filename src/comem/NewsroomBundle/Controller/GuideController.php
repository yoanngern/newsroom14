<?php

namespace comem\NewsroomBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use comem\NewsroomBundle\Entity\Ad;
use comem\NewsroomBundle\Form\AdType;

class GuideController extends Controller
{
    public function listAction()
    {
        
        $em = $this->getDoctrine()->getManager();
        
        $ads = $em->getRepository('comemNewsroomBundle:Ad')->findAll();
        
        return $this->render('comemNewsroomBundle:Guide:list.html.twig', array(
            'ads' => $ads,
        ));
    }
    
    /*
     *   Add an add
     */
    public function addAction()
    {
        $ad = new ad();
        
        $form = $this->createForm(new AdType, $ad);
        
        $request = $this->get('request');
        
        if($request->getMethod() == 'POST')
        {
            $form->bind($request);
            
            if($form->isValid())
            {
                
                $em = $this->getDoctrine()->getManager();
                
                $em->persist($ad);
                $em->flush();
                
                $this->get('session')->getFlashBag()->add('info', 'The ad has been added.');
                
                return $this->redirect( $this->generateUrl('comem_newsroom_guide'));
            }
        }
        
        return $this->render('comemNewsroomBundle:Guide:add.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
