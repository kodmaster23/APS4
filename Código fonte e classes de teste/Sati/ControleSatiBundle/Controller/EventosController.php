<?php

namespace Sati\ControleSatiBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sati\ControleSatiBundle\Entity\Eventos;
use Sati\ControleSatiBundle\Form\EventosType;

/**
 * Eventos controller.
 *
 */
class EventosController extends Controller
{

    /**
     * Lists all Eventos entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SatiControleSatiBundle:Eventos')->findAll();

        return $this->render('SatiControleSatiBundle:Eventos:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Eventos entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Eventos();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('eventos_show', array('id' => $entity->getId())));
        }

        return $this->render('SatiControleSatiBundle:Eventos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Eventos entity.
     *
     * @param Eventos $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Eventos $entity)
    {
        $form = $this->createForm(new EventosType(), $entity, array(
            'action' => $this->generateUrl('eventos_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Eventos entity.
     *
     */
    public function newAction()
    {
        $entity = new Eventos();
        $form   = $this->createCreateForm($entity);

        return $this->render('SatiControleSatiBundle:Eventos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Eventos entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SatiControleSatiBundle:Eventos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Eventos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SatiControleSatiBundle:Eventos:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Eventos entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SatiControleSatiBundle:Eventos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Eventos entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SatiControleSatiBundle:Eventos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Eventos entity.
    *
    * @param Eventos $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Eventos $entity)
    {
        $form = $this->createForm(new EventosType(), $entity, array(
            'action' => $this->generateUrl('eventos_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Eventos entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SatiControleSatiBundle:Eventos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Eventos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('eventos_edit', array('id' => $id)));
        }

        return $this->render('SatiControleSatiBundle:Eventos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Eventos entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SatiControleSatiBundle:Eventos')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Eventos entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('eventos'));
    }

    /**
     * Creates a form to delete a Eventos entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('eventos_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
