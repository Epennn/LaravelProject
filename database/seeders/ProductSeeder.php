<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Black Jacket',
            'price' => '1300000',
            'image' => 'jacket.jpeg',
            'description' => 'The water-repellent Mens Down Hoodie',
            'stock' => '15'
        ]);

        DB::table('products')->insert([
            'name' => 'Brown Coat',
            'price' => '2100000',
            'image' => 'coat.jpg',
            'description' => 'Brown Coat with notch lapels and buttons at the front.',
            'stock' => '7'
        ]);

        DB::table('products')->insert([
            'name' => 'White Hoodie',
            'price' => '650000',
            'image' => 'hoodie.jpeg',
            'description' => 'White Cashmere hoodie for Men and Women',
            'stock' => '50'
        ]);

        DB::table('products')->insert([
            'name' => 'Grey Trousers',
            'price' => '400000',
            'image' => 'trousers.jpg',
            'description' => 'Gret Suit trousers in woven fabric with a concealed hook-and-eye fastening',
            'stock' => '120'
        ]);

        DB::table('products')->insert([
            'name' => 'Blue Jeans',
            'price' => '350000',
            'image' => 'jeans.jpg',
            'description' => 'Blue Jeans in cotton denim with a premium stretch for excellent comfort',
            'stock' => '170'
        ]);

        DB::table('products')->insert([
            'name' => 'Green Cotton Shirt',
            'price' => '230000',
            'image' => 'shirt.jpg',
            'description' => 'Green Long sleeves cotton shirt with a relaxed fit.',
            'stock' => '210'
        ]);

        DB::table('products')->insert([
            'name' => 'Beige Shorts',
            'price' => '270000',
            'image' => 'shorts.jpg',
            'description' => 'Regular-fit Beige shorts in cotton twill with side and back pockets',
            'stock' => '90'
        ]);

        DB::table('products')->insert([
            'name' => 'Leather Shoes',
            'price' => '1700000',
            'image' => 'shoes.jpg',
            'description' => 'Brown Shoes made from Crocodile Skin',
            'stock' => '12'
        ]);
    }
}
