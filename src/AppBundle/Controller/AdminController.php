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

use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Type;

/**
 * Class AdminController
 * @Route("/admin/")
 * @Template("")
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

    /**
     * 添加类型
     * @Route("type/new", name="add-type")
     * @Template("AppBundle:Admin:Type/add.html.twig")
     */
    public function newTypeAction(Request $request){
        $type = new Type();

        $form = $this->createFormBuilder($type)
            ->add('name', 'text')
            ->add('code', 'text')
            ->add('save', 'submit', array('label' => 'Create Cake Type'))
            ->getForm();

        return array(
            'form' => $form->createView(),
        );
    }

    /**
     * 修改类型
     * @Route("type/update/{id}", name="update-type")
     * @Template("AppBundle:Admin:Type/update.html.twig")
     */
    public function modTypeAction($id){
        return array();
    }

    /**
     * 类型列表
     * @Route("type", name="type-list")
     * @Template("AppBundle:Admin:Type/list.html.twig")
     */
    public function typeAction(){
        return array();
    }



    /**
     * 添加类型
     * @Route("crowd/add", name="add-crowd")
     * @Template("AppBundle:Admin:Crowd/add.html.twig")
     */
    public function addCrowdAction(){
        return array();
    }

    /**
     * 修改类型
     * @Route("crowd/update/{id}", name="update-crowd")
     * @Template("AppBundle:Admin:Crowd/update.html.twig")
     */
    public function modCrowdAction($id){
        return array();
    }

    /**
     * 类型列表
     * @Route("crowd", name="crowd-list")
     * @Template("AppBundle:Admin:Crowd/list.html.twig")
     */
    public function crowdAction(){
        return array();
    }

} 