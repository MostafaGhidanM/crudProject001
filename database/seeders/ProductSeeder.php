<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 1000; $i++) { // Adjust the loop count based on your needs
            Product::create([
                'productName' => $faker->word,
                'productPrice' => $faker->randomFloat(2, 10, 1000),
                'productDescription' => $faker->sentence,
                'productProducer' => $faker->word
            ]);
        }
    }
}
