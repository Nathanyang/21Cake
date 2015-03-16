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
use AppBundle\Entity\Genre;
use AppBundle\Entity\Crowd;
use AppBundle\Form\GenreType;

//use Doctrine\Common\Util\Debug;
use Symfony\Component\HttpKernel\Debug;
/**
 * Class AdminController
 * @Route("/admin/")
 */
class AdminController extends Controller {
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
     */
    public function loginAction(){
//        return array();
        return $this->render('AppBundle:Admin:login.html.twig', array());
    }

    /**
     * 添加类型
     * @Route("type/new", name="new-type")
     * @Template("AppBundle:Admin:Type/add.html.twig")
     */
    public function newTypeAction(Request $request){
        $type       = new Genre();
        $form       = $this->createForm( new GenreType(), $type  );
        if ( $request->getMethod() == 'POST' ) {
            $form->bind( $request );
            $em = $this->getDoctrine()->getManager();

            if ( $form->isValid() ) {
                $em->persist($type);
                $em->flush();
                return $this->redirect( $this->generateUrl('admin-list') );
            }
        }

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
     * 添加适用人群
     * @Route("crowd/new", name="new-crowd")
     * @Template("AppBundle:Admin:Crowd/add.html.twig")
     */
    public function newCrowdAction(){
        $crowd = new Crowd();

        $form = $this->createFormBuilder($crowd)
            ->add('code' , 'text' )
            ->add('name' , 'text' )
            ->add('save' , 'submit' , array('label' => 'Add New Crowd' ))
            ->getForm();

        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bind( $request );

            if ($form->isValid()) {
                $em->persist($crowd);
                $em->flush();
                return $this->redirect($this->generateUrl('crowd-list'));
            }
        }

        return array(
            'form' => $form->createView(),
        );
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