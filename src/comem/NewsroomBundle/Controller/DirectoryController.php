<?php

namespace comem\NewsroomBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use comem\NewsroomBundle\Entity\Ad;
use comem\NewsroomBundle\Form\AdType;

class DirectoryController extends Controller
{
    public function listAction()
    {
        
        $em = $this->getDoctrine()->getManager();
        
        $ads = $em->getRepository('comemNewsroomBundle:Ad')->findAll();
        
        return $this->render('comemNewsroomBundle:Directory:list.html.twig', array(
            'ads' => $ads,
        ));
    }
    
    /*
     *   Add an ad
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
                
                return $this->redirect( $this->generateUrl('comem_newsroom_directory'));
            }
        }
        
        return $this->render('comemNewsroomBundle:Directory:add.html.twig', array(
            'form' => $form->createView()
        ));
    }
    
    
    /*
     *   Edit an ad
     */
    public function editAction(Ad $ad)
    {
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
                
                $this->get('session')->getFlashBag()->add('info', 'L\'annonce a été modifiée.');
                
                return $this->redirect( $this->generateUrl('comem_newsroom_directory'));
            }
        }
        
        return $this->render('comemNewsroomBundle:Directory:edit.html.twig', array(
            'ad' => $ad,
            'form' => $form->createView()
        ));
    }
}
