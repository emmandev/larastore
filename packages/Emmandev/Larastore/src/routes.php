<?php

Route::get('products/{product}', function ($product) {
    $product = App\Models\Product::findOrFail($product);

    return $product->metas;
});
