<?php

use Illuminate\Http\Request;
use App\Http\Resources\Order as OrderResource;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderProduct as OrderProductResource;
use App\Http\Resources\OrderProductCollection;
use App\Http\Resources\OrderProductMetaCollection;
use App\Http\Resources\Product as ProductResource;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductType as ProductTypeResource;
use App\Http\Resources\ProductTypeCollection;
use App\Http\Resources\ProductTypeMeta as ProductTypeMetaResource;
use App\Http\Resources\ProductTypeMetaCollection;

Route::group(['prefix' => 'api'], function () {
    Route::middleware('api')->group(function () {
        Route::get('orders/{order}', function (App\Models\Order $order) {
            return new OrderResource($order);
        });

        Route::get('orders', function () {
            return new OrderCollection(App\Models\Order::all());
        });

        Route::get('orders/{order}/products/{orderProduct}', function (App\Models\Order $order, App\Models\OrderProduct $orderProduct) {
            return new OrderProductResource($orderProduct);
        });

        Route::get('orders/{order}/products', function (App\Models\Order $order) {
            return new OrderProductCollection($order->products);
        });

        Route::get('products/{product}', function (App\Models\Product $product) {
            return new ProductResource($product);
        });

        Route::get('products', function () {
            return new ProductCollection(App\Models\Product::all());
        });

        Route::get('products/{product}/metas', function (App\Models\Product $product) {
            return new ProductTypeMetaCollection($product->metas);
        });

        Route::get('products/{product}/metas/{meta}', function (App\Models\Product $product, App\Models\ProductTypeMeta $meta) {
            return new ProductTypeMetaResource($meta);
        });

        Route::get('product_types/{product_type}', function (App\Models\ProductType $product_type) {
            return new ProductTypeResource($product_type);
        });

        Route::get('product_types/{product_type}/products', function (App\Models\ProductType $product_type) {
            return new ProductCollection($product_type->products);
        });

        Route::get('product_types', function () {
            return new ProductTypeCollection(App\Models\ProductType::all());
        });
    });

    Route::middleware('auth:api')->group(function () {

    });
});
