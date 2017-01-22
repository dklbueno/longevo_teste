<?php

namespace Longevo\ChamadoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/chamado",name="chamado_index")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $chamados = $em->getRepository('LongevoModelBundle:Chamado')
                                    ->findAll();
        return $this->render('chamado/index.html.twig',[
        	'chamados'=>$chamados
        ]);
    }
}
