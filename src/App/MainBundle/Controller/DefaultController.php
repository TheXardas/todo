<?php

namespace App\MainBundle\Controller;

use App\TaskBundle\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
	/**
	 * Home page (index) with large login form and some marketing shit
	 *
	 * @Route("/")
	 * @Template()
	 */
	public function homePageAction()
	{
		return array();
	}

	/**
	 * Main desktop. Users works here.
	 *
	 * @Route("/home", name="home")
	 * @Template()
	 */
	public function homeAction()
	{
		$form = $this->createForm( 'task_simple', new Task(), array(
			'action' => $this->generateUrl( 'task_create' ),
		) );

		return array( 'add_task_form' => $form->createView() );
	}
}
