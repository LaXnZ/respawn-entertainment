<?php

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

it('displays a listing of products', function () {
    $products = Product::factory()->count(10)->create();

    $response = $this->get(route('products'));

    $response->assertStatus(200);
    $response->assertViewIs('admin.products.products');
    $response->assertViewHas('product', $products);
});

it('displays the create product form', function () {
    $response = $this->get(route('product.create'));

    $response->assertStatus(200);
    $response->assertViewIs('admin.products.product-create');
});

it('stores a new product', function () {
    $productData = Product::factory()->make()->toArray();

    $response = $this->post(route('product.store'), $productData);

    $response->assertRedirect(route('products'));
    $this->assertDatabaseHas('products', $productData);
});

it('displays a specific product', function () {
    $product = Product::factory()->create();

    $response = $this->get(route('product.show', $product->id));

    $response->assertStatus(200);
});

it('displays the edit product form', function () {
    $product = Product::factory()->create();

    $response = $this->get(route('product.edit', $product->id));

    $response->assertStatus(200);
    $response->assertViewIs('admin.products.product-edit');
    $response->assertViewHas('product', $product);
});

it('updates an existing product', function () {
    $product = Product::factory()->create();
    $updatedProductData = Product::factory()->make()->toArray();

    $response = $this->put(route('product.update', $product->id), $updatedProductData);

    $response->assertRedirect(route('products'));
    $this->assertDatabaseHas('products', $updatedProductData);
});

it('deletes a product', function () {
    $product = Product::factory()->create();

    $response = $this->delete(route('product.destroy', $product->id));

    $response->assertRedirect(route('products'));
    $this->assertDeleted($product);
});