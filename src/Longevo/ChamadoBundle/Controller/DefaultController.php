<?php

namespace Longevo\ChamadoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/chamado",name="chamado_index")
     */
    public function indexAction(Request $request)
    {
        /*$em = $this->getDoctrine()->getManager();
        $chamados = $em->getRepository('LongevoModelBundle:Chamado')
                                    ->findAll();
        return $this->render('chamado/index.html.twig',[
        	'chamados'=>$chamados
        ]);*/
        $email = '';
        $id_pedido = '';

        if($request->get('find')){
            $email = $request->get('email');
            $id_pedido = $request->get('id_pedido');
            $em = $this->getDoctrine()->getManager();
            $chamados = $em->getRepository('LongevoModelBundle:Chamado')->findFilter($email,$id_pedido);
        }else{
            $em = $this->getDoctrine()->getManager();
            $chamados = $em->getRepository('LongevoModelBundle:Chamado')->findAll();
        }
        
        /** @var  $paginator */
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate($chamados, $request->query->get('page', 1), 5);
        return $this->render('chamado/index.html.twig',[
            'pagination' => $pagination,
            'email' => $email,
            'id_pedido' => $id_pedido,
        ]);
    }
}
