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
    public function getBibleGatewayAction(){
        $em = $this->getDoctrine()->getManager();
	    $versiones = $em->getRepository('AteosAnalisisBundle:Version')->findAll();
        return $this->render('AteosAnalisisBundle:Default:getBibleGateway.html.twig', array(
        	"versiones"=>$versiones,
        ));
    }
    public function versionesAction($id){
        $em = $this->getDoctrine()->getManager();
	    $version = $em->getRepository('AteosAnalisisBundle:Version')->find($id);
	    
        return $this->render('AteosAnalisisBundle:Default:versiones.html.twig', array(
        	"version"=>$version,
        ));
    }
    public function comentariosAction(){
        $em = $this->getDoctrine()->getManager();
	    $comentarios = $em->getRepository('AteosAnalisisBundle:Comentario')->findAll();
        return $this->render('AteosAnalisisBundle:Default:comentarios.html.twig', array(
        	"comentarios"=>$comentarios,
        ));
    }
    
}
