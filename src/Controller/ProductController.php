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
        $products = $this->productService->getProductsFromJson('../path/to/amazon.json');

        return $this->render('product/list.html.twig', ['products' => $products]);
    }
}
