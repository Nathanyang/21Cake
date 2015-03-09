<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Class HomeController
 * @Route("/")
 */
class AppController extends Controller
{
    /**
     * @Route("/", name="Home-Page")
     * @Template()
     */
    public function indexAction(){
        return array();
    }

    /**
     * @Route("/gallery", name="Cake-list")
     * @Template()
     */
    public function listAction(){
        return array();
    }
}
