<?php

namespace App\MainBundle\Controller;

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
	 * @Route("/home")
	 * @Template()
	 */
	public function homeAction()
	{
		return array();
	}
}
