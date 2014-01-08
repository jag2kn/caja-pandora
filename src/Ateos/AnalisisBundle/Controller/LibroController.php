<?php

namespace Ateos\AnalisisBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Ateos\AnalisisBundle\Entity\Libro;
use Ateos\AnalisisBundle\Form\LibroType;

/**
 * Libro controller.
 *
 */
class LibroController extends Controller
{

    /**
     * Lists all Libro entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AteosAnalisisBundle:Libro')->findAll();

        return $this->render('AteosAnalisisBundle:Libro:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Libro entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Libro();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('libro_show', array('id' => $entity->getId())));
        }

        return $this->render('AteosAnalisisBundle:Libro:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Libro entity.
    *
    * @param Libro $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Libro $entity)
    {
        $form = $this->createForm(new LibroType(), $entity, array(
            'action' => $this->generateUrl('libro_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Libro entity.
     *
     */
    public function newAction()
    {
        $entity = new Libro();
        $form   = $this->createCreateForm($entity);

        return $this->render('AteosAnalisisBundle:Libro:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Libro entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AteosAnalisisBundle:Libro')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Libro entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AteosAnalisisBundle:Libro:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Libro entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AteosAnalisisBundle:Libro')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Libro entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AteosAnalisisBundle:Libro:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Libro entity.
    *
    * @param Libro $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Libro $entity)
    {
        $form = $this->createForm(new LibroType(), $entity, array(
            'action' => $this->generateUrl('libro_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Libro entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AteosAnalisisBundle:Libro')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Libro entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('libro_edit', array('id' => $id)));
        }

        return $this->render('AteosAnalisisBundle:Libro:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Libro entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AteosAnalisisBundle:Libro')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Libro entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('libro'));
    }

    /**
     * Creates a form to delete a Libro entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('libro_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
