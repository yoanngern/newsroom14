<?php

namespace comem\NewsroomBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use comem\NewsroomBundle\Entity\Ad;
use comem\NewsroomBundle\Form\AdType;

use comem\NewsroomBundle\Entity\Theme;
use comem\NewsroomBundle\Form\ThemeType;

class DirectoryController extends Controller
{
    public function listAction()
    {
        
        $em = $this->getDoctrine()->getManager();
        
        $ads = $em->getRepository('comemNewsroomBundle:Ad')->findAllOrder();
        
        return $this->render('comemNewsroomBundle:Directory:list.html.twig', array(
            'ads' => $ads,
            'page' => 'annuaire'
        ));
    }
    
    
    /*
     *   Search JSON address
     */
    public function searchAction()
    {   
        $request = Request::createFromGlobals();
        
        $search = $request->query->get('search');
        
        $em = $this->getDoctrine()->getManager();
        
        $addresses = $em->getRepository('comemNewsroomBundle:Ad')->search($search);
        
        $response = new Response(json_encode($addresses));
        
        $response->headers->set('Content-Type', 'application/json');
        
        return $response;
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
            'form' => $form->createView(),
            'page' => 'annuaire'
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
            'form' => $form->createView(),
            'page' => 'annuaire'
        ));
    }
    
    public function listThemeAction()
    {
        
        $em = $this->getDoctrine()->getManager();
        
        $themes = $em->getRepository('comemNewsroomBundle:Theme')->findAll();
        
        return $this->render('comemNewsroomBundle:Directory:listTheme.html.twig', array(
            'themes' => $themes,
            'page' => 'annuaire'
        ));
    }
    
    
    /*
     *   Add a theme
     */
    public function addThemeAction()
    {
        $theme = new theme();
        
        $form = $this->createForm(new ThemeType, $theme);
        
        $request = $this->get('request');
        
        if($request->getMethod() == 'POST')
        {
            $form->bind($request);
            
            if($form->isValid())
            {
                
                $em = $this->getDoctrine()->getManager();
                
                $em->persist($theme);
                $em->flush();
                
                $this->get('session')->getFlashBag()->add('info', 'Le thème a été ajouté.');
                
                return $this->redirect( $this->generateUrl('comem_newsroom_directory_theme'));
            }
        }
        
        return $this->render('comemNewsroomBundle:Directory:addTheme.html.twig', array(
            'form' => $form->createView(),
            'page' => 'annuaire'
        ));
    }
    
    
    /*
     *   Edit a theme
     */
    public function editThemeAction(Theme $theme)
    {
        $form = $this->createForm(new ThemeType, $theme);
        
        $request = $this->get('request');
        
        if($request->getMethod() == 'POST')
        {
            $form->bind($request);
            
            if($form->isValid())
            {
                $em = $this->getDoctrine()->getManager();
                $em->persist($theme);
                $em->flush();
                
                $this->get('session')->getFlashBag()->add('info', 'Le thème a été modifié.');
                
                return $this->redirect( $this->generateUrl('comem_newsroom_directory_theme'));
            }
        }
        
        return $this->render('comemNewsroomBundle:Directory:editTheme.html.twig', array(
            'theme' => $theme,
            'form' => $form->createView(),
            'page' => 'annuaire'
        ));
    }
}
