<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Class AppController
 * @Route("/")
 */
class AppController extends Controller
{
    /**
     * @Route("/", name="Home-Page")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }

    /**
     * @Route("/gallery")
     * @Template()
     */
    public function listAction(){
        return array();
    }

}
