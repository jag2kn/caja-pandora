<?php

namespace Ateos\AnalisisBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Ateos\AnalisisBundle\Entity\Verso;
use Ateos\AnalisisBundle\Form\VersoType;

/**
 * Verso controller.
 *
 */
class VersoController extends Controller
{

    /**
     * Lists all Verso entities.
     *
     */
    public function indexAction($pagina)
    {
    	if ($pagina<=0){
	    	$pagina=1;
    	}
    	
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AteosAnalisisBundle:Verso')
        	->findBy(array(),array(),10,($pagina-1)*100);

        return $this->render('AteosAnalisisBundle:Verso:index.html.twig', array(
            'entities' => $entities,
            'paginaAnterior' => $pagina-1,
            'paginaSiguiente' => $pagina+1,
        ));
    }
    /**
     * Creates a new Verso entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Verso();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('verso_show', array('id' => $entity->getId())));
        }

        return $this->render('AteosAnalisisBundle:Verso:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Verso entity.
    *
    * @param Verso $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Verso $entity)
    {
        $form = $this->createForm(new VersoType(), $entity, array(
            'action' => $this->generateUrl('verso_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Verso entity.
     *
     */
    public function newAction()
    {
        $entity = new Verso();
        $form   = $this->createCreateForm($entity);

        return $this->render('AteosAnalisisBundle:Verso:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Verso entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AteosAnalisisBundle:Verso')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Verso entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AteosAnalisisBundle:Verso:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Verso entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AteosAnalisisBundle:Verso')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Verso entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AteosAnalisisBundle:Verso:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Verso entity.
    *
    * @param Verso $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Verso $entity)
    {
        $form = $this->createForm(new VersoType(), $entity, array(
            'action' => $this->generateUrl('verso_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Verso entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AteosAnalisisBundle:Verso')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Verso entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('verso_edit', array('id' => $id)));
        }

        return $this->render('AteosAnalisisBundle:Verso:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Verso entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AteosAnalisisBundle:Verso')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Verso entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('verso'));
    }

    /**
     * Creates a form to delete a Verso entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('verso_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
