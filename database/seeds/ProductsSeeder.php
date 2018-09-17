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
        factory(App\Models\Product::class, 10)->create();

        // generate product types
        factory(App\Models\ProductType::class, 5)->create();

        $products = App\Models\Product::all();
        $productTypes = App\Models\ProductType::all();

        // generate attributes for each product type
        $productTypes->each(function ($type) {
            factory(App\Models\ProductTypeAttribute::class, rand(1, 3))->create(['product_type_id' => $type->id]);
        });

        // loop through the generated products and give them product types and attributes
        $products->each(function ($product) use ($productTypes) {
            $types = $productTypes->random(rand(1, 5));

            $types->each(function ($type) use ($product){
                // get the ids of the attributes
                $metas = $type->attributes()->pluck('id');

                // get array of ids
                $ids = $metas->toArray();

                // create a number of values based on the number of ids
                $values = data_set($ids, '*', ['value' => str_random(5)]);

                // insert the values to the collection
                $metas = $metas->combine($values);
                $metas->all();

                // insert the attributes to the product
                $product->metas()->attach($metas);
            });

            $product->types()->attach($types->pluck('id')->toArray());
        });
    }
}
