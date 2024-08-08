<?php
namespace App\Service;

class ProductService
{
    public function getProductsFromJson(string $jsonFilePath): array
    {
        $jsonData = file_get_contents($jsonFilePath);
        $products = json_decode($jsonData, true);

        foreach ($products as &$product) {
            $product['rating'] = $this->generateRandomRating();
        }

        return $products;
    }

    private function generateRandomRating(): array
    {
        $rating = rand(9, 10) . '.' . rand(0, 9);
        $stars = round($rating / 2);

        return [
            'rating' => $rating,
            'stars' => $stars,
        ];
    }
}
