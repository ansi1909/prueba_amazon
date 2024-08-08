<?php 
namespace App\Controller;

use App\Service\ProductService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * @Route("/", name="product_list")
     */
    public function list()
    {
        $products = $this->productService->getProductsFromJson(dirname(__DIR__, 2) . '/config/json/amazon.json');

        return $this->render('product/list.html.twig', ['products' => $products]);
    }
}
