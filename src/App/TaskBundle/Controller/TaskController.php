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
     * @Route("/task/create", name="task_create")
     * @Template()
	  * @Method("POST")
     */
    public function createAction( Request $request )
    {
		 $task = new Task();

		 $form = $this->createFormBuilder( $task )
			 ->add( 'name', 'text' )
			 ->getForm();

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
