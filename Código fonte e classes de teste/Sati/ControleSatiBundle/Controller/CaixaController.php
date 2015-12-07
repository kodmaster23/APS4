<?php

namespace Sati\ControleSatiBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sati\ControleSatiBundle\Entity\Caixa;
use Sati\ControleSatiBundle\Form\CaixaType;

/**
 * Caixa controller.
 *
 */
class CaixaController extends Controller
{

    /**
     * Lists all Caixa entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SatiControleSatiBundle:Caixa')->findAll();

        return $this->render('SatiControleSatiBundle:Caixa:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Caixa entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Caixa();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('caixa_show', array('id' => $entity->getId())));
        }

        return $this->render('SatiControleSatiBundle:Caixa:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Caixa entity.
     *
     * @param Caixa $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Caixa $entity)
    {
        $form = $this->createForm(new CaixaType(), $entity, array(
            'action' => $this->generateUrl('caixa_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Caixa entity.
     *
     */
    public function newAction()
    {
        $entity = new Caixa();
        $form   = $this->createCreateForm($entity);

        return $this->render('SatiControleSatiBundle:Caixa:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Caixa entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SatiControleSatiBundle:Caixa')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Caixa entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SatiControleSatiBundle:Caixa:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Caixa entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SatiControleSatiBundle:Caixa')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Caixa entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SatiControleSatiBundle:Caixa:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Caixa entity.
    *
    * @param Caixa $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Caixa $entity)
    {
        $form = $this->createForm(new CaixaType(), $entity, array(
            'action' => $this->generateUrl('caixa_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Caixa entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SatiControleSatiBundle:Caixa')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Caixa entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('caixa_edit', array('id' => $id)));
        }

        return $this->render('SatiControleSatiBundle:Caixa:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Caixa entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SatiControleSatiBundle:Caixa')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Caixa entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('caixa'));
    }

    /**
     * Creates a form to delete a Caixa entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('caixa_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
