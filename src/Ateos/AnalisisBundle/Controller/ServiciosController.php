<?php

namespace Ateos\AnalisisBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\Query\ResultSetMapping;

use Ateos\AnalisisBundle\Entity\Comentario;

class ServiciosController extends Controller
{
    public function librosAction()
    {
        $em = $this->getDoctrine()->getManager();
	    $libros = $em->getRepository('AteosAnalisisBundle:Libro')->findAll();
	    
    	$respuesta = array();
    	foreach($libros as $libro){
	    	$respuesta[$libro->getId()]=$libro->getNombre();
    	}
    
        return $this->render('AteosAnalisisBundle:Servicios:respuesta.json.twig', array(
        	"respuesta"=>json_encode($respuesta)
        ));
    }

    public function capitulosAction($libro)
    {
        $em = $this->getDoctrine()->getManager();

	    $sql = "SELECT chapter as capitulo,
                count(*) AS versos "
            ."FROM verse "
            ."WHERE book_id=".$libro." "
            ."GROUP BY chapter;";
		$rsm = new ResultSetMapping;
		$rsm->addScalarResult('capitulo', 'capitulo');
		$rsm->addScalarResult('versos', 'versos');
		$query = $em->createNativeQuery($sql, $rsm);
		$capitulos = $query->getResult();


    	$respuesta = array();
    	foreach($capitulos as $capitulo){
	    	$respuesta[$capitulo["capitulo"]]="Capitulo ".$capitulo["capitulo"]." Versos: ".$capitulo["versos"];
    	}
   
        return $this->render('AteosAnalisisBundle:Servicios:respuesta.json.twig', array(
        	"respuesta"=>json_encode($respuesta)
        ));
    }
    
    public function versosAction($idLibro, $capituloDesde, $capituloHasta){
    	$em = $this->getDoctrine()->getManager();
    
	    $libro = $em->getRepository('AteosAnalisisBundle:Libro')->find($idLibro);
	    $r_versos = $this->getDoctrine()->getRepository('AteosAnalisisBundle:Verso');
	    $r_comentarios = $this->getDoctrine()->getRepository('AteosAnalisisBundle:Comentario');

		$versos = $r_versos->createQueryBuilder('v')
			->where('v.capitulo >= :desde')
			->andWhere('v.capitulo <= :hasta')
			->andWhere('v.libro = :libro')
			->setParameter('desde', $capituloDesde)
			->setParameter('hasta', $capituloHasta)
			->setParameter('libro', $libro)
			->orderBy('v.id', 'ASC')
			->getQuery()
			->getResult();
	    
	    
    	$respuesta = array();
    	foreach($versos as $verso){
			$count = $em->createQueryBuilder()
			->select('count(comentario.id)')
			->from('AteosAnalisisBundle:Comentario','comentario')
			->where('comentario.versoDesde = :desde')
			->setParameter('desde', $verso)
			->getQuery()->getSingleScalarResult();
			
	    	$respuesta[$verso->getId()]=array("texto"=>$verso->getTexto(), "comentarios"=>$count);
    	}
   
        return $this->render('AteosAnalisisBundle:Servicios:respuesta.json.twig', array(
        	"respuesta"=>json_encode($respuesta)
        ));
	    
    }
    
    
    public function comentariosAction($idVerso){
    	$em = $this->getDoctrine()->getManager();
        //$request = $this->getRequest();
	    //$idVerso = $request->get("idVerso");
	    $verso = $em->getRepository('AteosAnalisisBundle:Verso')->find($idVerso);
	    
	    $comentarios = $em->getRepository('AteosAnalisisBundle:Comentario')->findBy(array("versoDesde"=>$verso));
	    
		$respuesta=array();
		foreach($comentarios as $comentario){
			$respuesta[$comentario->getId()]=array(
				"autor"=>$comentario->getAutor(),
				"comentario"=>$comentario->getComentario(),
			);
		}

		return $this->render('AteosAnalisisBundle:Servicios:respuesta.json.twig', array(
			"respuesta"=>json_encode($respuesta)
		));
	    
    }
    public function agregarComentarioAction(){
    	$em = $this->getDoctrine()->getManager();
        $request = $this->getRequest();


	    $id = $request->get("id");
	    $texto = $request->get("comentario");
	    $autor = $request->get("autor");
	    
	    $verso = $em->getRepository('AteosAnalisisBundle:Verso')->find($id);
	    
	    $comentario = new Comentario();
	    $comentario->setVersoDesde($verso);
	    $comentario->setComentario($texto);
	    $comentario->setAutor($autor);
		$em->persist($comentario);
		$em->flush();

    	
    	$respuesta = array("resultado"=>"ok");
    
        return $this->render('AteosAnalisisBundle:Servicios:respuesta.json.twig', array(
        	"respuesta"=>json_encode($respuesta)
        ));
	    
    }
       
}
