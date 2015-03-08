<?php
/**
 * Created by PhpStorm.
 * User: NathanY
 * Date: 2015/3/7
 * Time: 20:29
 */

namespace NathanCakeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


/**
 * Class HomeController
 * @Route("/")
 */
class HomeController {
    /**
     * @Route("/", name="HomePage")
     * @Template()
     */
    public function indexAction(){
        return array();
    }
}