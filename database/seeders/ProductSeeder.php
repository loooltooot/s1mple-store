<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'title' => 'Original Kombucha',
                'description' => 'Our original kombucha is made with the finest tea leaves and a carefully crafted fermentation process. It has a refreshing and tangy flavor that will invigorate your taste buds.',
                'price' => mt_rand(50, 150),
                'img' => '1.png',
            ],
            [
                'title' => 'Green Tea Kombucha',
                'description' => 'Infused with the goodness of green tea, our kombucha is packed with antioxidants and natural flavors. Enjoy the subtle blend of tea and tanginess in every sip.',
                'price' => mt_rand(50, 150),
                'img' => '2.png',
            ],
            [
                'title' => 'Hibiscus Raspberry Kombucha',
                'description' => 'Experience the vibrant flavors of hibiscus and raspberry in our kombucha. This delightful blend offers a refreshing and fruity taste that will leave you wanting more.',
                'price' => mt_rand(50, 150),
                'img' => '3.png',
            ],
            [
                'title' => 'Ginger Lemon Kombucha',
                'description' => 'Our ginger lemon kombucha is a zesty and invigorating choice. The combination of fresh ginger and tangy lemon creates a unique and revitalizing flavor profile.',
                'price' => mt_rand(50, 150),
                'img' => '4.png',
            ],
            [
                'title' => 'Blueberry Burst Kombucha',
                'description' => 'Indulge in the burst of juicy blueberries with our kombucha. This delightful blend combines the goodness of blueberries with the probiotic benefits of kombucha.',
                'price' => mt_rand(50, 150),
                'img' => '5.png',
            ],
            [
                'title' => 'Mango Passion Kombucha',
                'description' => 'Experience the tropical flavors of mango and passion fruit in our kombucha. The combination of these exotic fruits creates a refreshing and energizing drink.',
                'price' => mt_rand(50, 150),
                'img' => '6.png',
            ],
            [
                'title' => 'Pineapple Mint Kombucha',
                'description' => 'Refresh your senses with our pineapple mint kombucha. The sweet tanginess of pineapple combined with the coolness of mint will transport you to a tropical paradise.',
                'price' => mt_rand(50, 150),
                'img' => '7.png',
            ],
            [
                'title' => 'Strawberry Basil Kombucha',
                'description' => 'Savor the delightful combination of ripe strawberries and aromatic basil in our kombucha. This unique blend offers a balance of sweetness and herbal freshness.',
                'price' => mt_rand(50, 150),
                'img' => '8.png',
            ],
            [
                'title' => 'Lavender Chamomile Kombucha',
                'description' => 'Relax and unwind with our lavender chamomile kombucha. The soothing floral notes of lavender and chamomile create a calming and aromatic beverage.',
                'price' => mt_rand(50, 150),
                'img' => '9.png',
            ],
            [
                'title' => 'Citrus Burst Kombucha',
                'description' => 'Experience the vibrant and citrusy flavors in our kombucha. This refreshing blend of oranges, lemons, and grapefruits will awaken your taste buds.',
                'price' => mt_rand(50, 150),
                'img' => '10.png',
            ],
            [
                'title' => 'Raspberry Lime Kombucha',
                'description' => 'Treat yourself to the delightful combination of raspberries and tangy lime in our kombucha. This fruity blend offers a burst of flavors with every sip.',
                'price' => mt_rand(50, 150),
                'img' => '11.png',
            ],
            [
                'title' => 'Watermelon Mint Kombucha',
                'description' => 'Quench your thirst with our watermelon mint kombucha. The refreshing sweetness of watermelon combined with the coolness of mint is the perfect summer drink.',
                'price' => mt_rand(50, 150),
                'img' => '12.png',
            ],
            [
                'title' => 'Passionfruit Guava Kombucha',
                'description' => 'Transport yourself to a tropical paradise with our passionfruit guava kombucha. The exotic flavors of passionfruit and guava create a truly tropical experience.',
                'price' => mt_rand(50, 150),
                'img' => '13.png',
            ],
            [
                'title' => 'Cranberry Apple Kombucha',
                'description' => 'Experience the delightful blend of tart cranberries and crisp apples in our kombucha. This fruity combination offers a perfect balance of sweet and tangy flavors.',
                'price' => mt_rand(50, 150),
                'img' => '14.png',
            ],
            [
                'title' => 'Peach Ginger Kombucha',
                'description' => 'Enjoy the harmonious combination of juicy peaches and spicy ginger in our kombucha. This unique blend offers a refreshing and flavorful taste experience.',
                'price' => mt_rand(50, 150),
                'img' => '15.png',
            ],
            [
                'title' => 'Tropical Mango Kombucha',
                'description' => 'Immerse yourself in the tropical flavors of ripe mangoes with our kombucha. This luscious blend offers a burst of sweet and tangy taste that will transport you to a sunny beach.',
                'price' => mt_rand(50, 150),
                'img' => '16.png',
            ],
            [
                'title' => 'Lemon Ginger Kombucha',
                'description' => 'Refresh your palate with our invigorating lemon ginger kombucha. The tanginess of lemon and the warmth of ginger create a revitalizing and uplifting beverage.',
                'price' => mt_rand(50, 150),
                'img' => '17.png',
            ],
            [
                'title' => 'Minty Matcha Kombucha',
                'description' => 'Experience the perfect balance of earthy matcha and cool mint in our kombucha. This energizing blend offers a unique and refreshing flavor profile.',
                'price' => mt_rand(50, 150),
                'img' => '18.png',
            ],
            [
                'title' => 'Cherry Berry Kombucha',
                'description' => 'Satisfy your taste buds with the sweet and tangy combination of cherries and berries in our kombucha. This delightful blend offers a burst of fruity flavors.',
                'price' => mt_rand(50, 150),
                'img' => '19.png',
            ],
            [
                'title' => 'Coconut Lime Kombucha',
                'description' => 'Escape to a tropical paradise with our coconut lime kombucha. The creamy coconut flavor combined with the zesty lime creates a refreshing and exotic beverage.',
                'price' => mt_rand(50, 150),
                'img' => '20.png',
            ],
        ];
        

        foreach ($products as $product) {
            Product::create($product)->save();
        }
    }
}
