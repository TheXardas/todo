<?php

namespace App\TaskBundle\Controller;

use App\TaskBundle\Entity\Task;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class TaskController extends Controller
{
	/**
	 * @Template()
	 */
	public function listWidgetAction( Request $request )
	{
		return array('taskListUrl' => $this->generateUrl( 'task_list' ));
	}


	/**
	 * @Route("/task/list", name="task_list")
	 * @Template()
	 *
	 */
	public function listAction( Request $request )
	{
		$repository = $this->getDoctrine()->getRepository( 'AppTaskBundle:Task' );
		$tasks = $repository->findAll();

		$encoder = $this->container->get( 'app_task.helpers.encoder' );
		$tasks = $encoder->encode( $tasks );

		return new JsonResponse( $tasks );
	}

    /**
     * @Route("/task/create", name="task_create")
     * @Template()
     * @Method("POST")
     */
    public function createAction( Request $request )
    {
		 $task = new Task();

		 $form = $this->createForm( 'task_simple', $task );

		 $form->handleRequest( $request );

		 if ( $form->isValid() )
		 {
			 $task->setTimeCreated( new DateTime() );
			 $em = $this->getDoctrine()->getManager();
			 $em->persist( $task );
			 $em->flush();
			 return $this->redirect( $this->generateUrl( 'home' ) );
		 }
		 else {
			 die('shit');
		 }

    }
}
