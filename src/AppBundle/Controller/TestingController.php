<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TestingController extends Controller
{
    /**
     * @Route("/testing/products")
     */
    public function productsAction()
    {
        $utils = $this->get('utils');
        $debug = $this->get('debug');

        $products = $this->getProducts($this->getDoctrine()->getManager());

        $debug->pr($products, 4);
        
        return new Response (
            ''
        );       
    }

    public function getProducts(ObjectManager $em)
    {
        $productsRepository = $em
            ->getRepository('AppBundle:Product');
        $products = $productsRepository->findAll();
        return $products;  
    }

    /**
     * @Route("/testing/get_value")
     */
    public function getValueAction()
    {
        $i = 1000;
        $i++;
        echo "<div>" . $i . "</div>";

        echo "<div>" . ($i + 1) . "</div>";

        $i++;

        echo "<div>" . $i . "</div>";

        return new Response (
            "Ausgabe von \$i: " . $i
        );
    }

    public function getNumber()
    {
        return 2000;
    }

    /**
     * @Route("/testing/get_html")
     */
    public function getHtml()
    {
        return new Response (
            "<html><head></head><body><h1>Begrüßung</h1><div>Hallo alle zusammen!</div><div>Nochn Div</div></body></html>"
        );        
    }
}
