<?php

Route::get('products/{product}/{relate}', function ($product, $relate) {
    $product = App\Models\Product::findOrFail($product);

    return $product->{$relate};
});
