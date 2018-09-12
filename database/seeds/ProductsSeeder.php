<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // generate products
        factory(App\Product::class, 10)->create();

        // generate product types
        factory(App\ProductType::class, 5)->create();

        $products = App\Product::all();
        $productTypes = App\ProductType::all();

        // generate attributes for each product type
        $productTypes->each(function ($type) {
            factory(App\ProductTypeAttribute::class, rand(1, 3))->create(['product_type_id' => $type->id]);
        });

        // loop through the generated products and give them product types and attributes
        $products->each(function ($product) use ($productTypes) {
            $types = $productTypes->random(rand(1, 5));

            $types->each(function ($type) use ($product){
                $product->productAtrributes()->attach($type->attributes()->pluck('id')->toArray());
            });

            $product->productTypes()->attach($types->pluck('id')->toArray());
        });
    }
}
