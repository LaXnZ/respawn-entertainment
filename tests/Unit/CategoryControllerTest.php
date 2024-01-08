<?php

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

it('displays a listing of categories', function () {
    $categories = Category::factory()->count(3)->create();

    $response = $this->get(route('category.index'));

    $response->assertStatus(200);
    $response->assertViewIs('admin.category.categories');
    $response->assertViewHas('category', $categories);
});

it('displays the create category form', function () {
    $response = $this->get(route('category.create'));

    $response->assertStatus(200);
    $response->assertViewIs('admin.category.category-create');
});

it('stores a new category', function () {
    $categoryData = Category::factory()->make()->toArray();

    $response = $this->post(route('category.store'), $categoryData);

    $response->assertRedirect(route('category'));
    $this->assertDatabaseHas('categories', $categoryData);
});

it('displays the edit category form', function () {
    $category = Category::factory()->create();

    $response = $this->get(route('category.edit', $category->id));

    $response->assertStatus(200);
    $response->assertViewIs('admin.category.category-edit');
    $response->assertViewHas('category', $category);
});

it('updates an existing category', function () {
    $category = Category::factory()->create();
    $updatedCategoryData = Category::factory()->make()->toArray();

    $response = $this->put(route('category.update', $category->id), $updatedCategoryData);

    $response->assertRedirect(route('category'));
    $this->assertDatabaseHas('categories', $updatedCategoryData);
});

it('deletes a category', function () {
    $category = Category::factory()->create();

    $response = $this->delete(route('category.destroy', $category->id));

    $response->assertRedirect(route('category'));
    $this->assertDeleted($category);
});