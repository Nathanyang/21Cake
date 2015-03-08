<?php
/**
 * Created by PhpStorm.
 * User: NathanY
 * Date: 2015/3/8
 * Time: 17:18
 */

namespace NathanCakeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Class AdminController
 * @Route("/admin")
 */
class AdminController extends Controller {

    /**
     * @Route("/list", name="admin-list")
     * @Template()
     */
    public function indexAction(){
        return array();
    }
    /**
     * @Route("/", name="admin-login")
     * Template("NathanCakeBundle:Admin:login.html.twig")
     * @Template()
     */
    public function loginAction(){
        return array();
    }


}