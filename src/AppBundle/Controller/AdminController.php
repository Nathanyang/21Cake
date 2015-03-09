<?php
/**
 * Created by PhpStorm.
 * User: Nathan-Y
 * Date: 15-3-9
 * Time: 下午6:04
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Class AdminController
 * @Route("/admin/")
 */
class AdminController {
    /**
     * @Route("list", name="admin-list")
     * @Template()
     */
    public function indexAction(){
        return array();
    }

    /**
     * @Route("/", name="admin-login")
     * Template("AppBundle:Admin:login.html.twig")
     * @Template()
     */
    public function loginAction(){
        return array();
    }

} 