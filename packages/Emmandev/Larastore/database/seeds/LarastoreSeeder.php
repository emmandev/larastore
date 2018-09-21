<?php

use Illuminate\Database\Seeder;

class LarastoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // generate users
        factory(App\Models\User::class, 20)->create();

        // generate products
        factory(App\Models\Product::class, 10)->create();

        // generate product types
        factory(App\Models\ProductType::class, 5)->create();

        $products = App\Models\Product::all();
        $productTypes = App\Models\ProductType::all();

        // generate metas for each product type
        $productTypes->each(function ($type) {
            factory(App\Models\ProductTypeMeta::class, rand(1, 3))->create(['product_type_id' => $type->id]);
        });

        // loop through the generated products and give them product types and metas
        $products->each(function ($product) use ($productTypes) {
            $types = $productTypes->random(rand(1, 5));

            $types->each(function ($type) use ($product){
                // get the ids of the type metas
                $metas = $type->metas()->pluck('id');

                // get array of ids
                $ids = $metas->toArray();

                // create a number of values based on the number of ids
                $values = data_set($ids, '*', ['value' => str_random(5)]);

                // insert the values to the collection
                $metas = $metas->combine($values);
                $metas->all();

                // insert the metas to the product
                $product->metas()->attach($metas);
            });

            $product->types()->attach($types->pluck('id')->toArray());
        });

        // generate orders
        App\Models\User::all()->random(10)->each(function ($user) {
            $user->orders()->save(factory(App\Models\Order::class, rand(1, 3))->create());
        });

        $orders = App\Models\Order::all();

        $orders->each(function ($order) use ($products) {
            // attach user
            $order->user()->attach(App\Models\User::random(1));

            // get random products with stock
            $order_products = $products->where('stock', '>', 0)->random(rand(1, 5));

            // stop adding products to orders if there are no more products with stock
            if ($order_products->isEmpty()) return false;

            // add products to the order
            $order_products->each(function ($product) use ($order) {
                // number of products to buy
                $qty = rand(1, 10);

                // check the product's stock
                if ($product->stock < $qty) {
                    $qty = $product->stock;
                }

                // decrease the product's stock
                $product->stock -= $qty;
                $product->save();

                // get total price
                $total = $product->price * $qty;

                $order->products()->attach(
                    $product->id,
                    [
                        'price' => $product->price,
                        'quantity' => $qty,
                        'total' => $total
                    ]
                );
            });
        });

        // remove orders without products
        $orders->doesntHave('products')->delete();
    }
}
