<?php

namespace App\Http\Controllers;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/5
 * Time: 15:04
 */
class ProductInfo extends Controller
{
    public function getAll(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $productRepository = $entityManager->getRepository("Product");
        $products = $productRepository->findAll();

        foreach ($products as $v) {
            echo sprintf("-%s\n", $v->getName());
        }
        exit;
    }

    public function findOne(Request $request)
    {
        $id = $request->get("id");
        $entityManager = $request->db;
        $product = $entityManager->find('Product', $id);

        if ($product === null) {
            echo "No product found.\n";
            exit(1);
        }

        echo sprintf("-%s\n", $product->getName());
        exit;
    }

    public function insert(Request $request)
    {

        $newProductName = uniqid("php_");
        $product = new \Product();
        $product->setName($newProductName);

        $entityManager = $request->db;
        $entityManager->persist($product);
        $entityManager->flush();
        var_dump($product->getId());

        $response = new Response();
        return $response;
    }
}
