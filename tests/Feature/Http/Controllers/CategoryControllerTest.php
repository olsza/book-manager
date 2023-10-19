<?php

use App\Models\Category;
use Database\Seeders\CategorySeeder;
use Illuminate\Http\Response;

beforeEach(function () {
    $this->seed(CategorySeeder::class);
});

test('returns a list of categories', function () {
    $response = $this->getJson('/api/categories');

    $response->assertStatus(Response::HTTP_OK)
        ->assertJsonCount(15);
});

test('creates a new category', function () {
    $data = [
        'name' => 'Olsza category',
    ];

    $response = $this->postJson('/api/categories', $data);

    $response->assertStatus(Response::HTTP_CREATED)
        ->assertJsonFragment($data);

    $this->assertDatabaseHas('categories', $data);

    $this->expect(Category::count())->toBe(16);
});

test('shows a specific category', function () {
    $data = Category::factory()->create();

    $response = $this->getJson('/api/categories/' . $data->id);

    $response->assertStatus(Response::HTTP_OK)
        ->assertJson([
            'id' => $data->id,
        ]);
});

test('updates a category', function () {
    $data = [
        'name' => 'Old category',
    ];

    $randomId = Category::all()->random()->id;

    $response = $this->putJson('/api/categories/' . $randomId, $data);

    $response->assertStatus(Response::HTTP_OK)
        ->assertJson($data);

    $this->assertDatabaseHas('categories',  array_merge($data, ['id' => $randomId]));
});

test('deletes a category', function () {
    $randomId = Category::all()->random()->id;

    $response = $this->deleteJson('/api/categories/' . $randomId);

    $response->assertStatus(Response::HTTP_NO_CONTENT);

    $this->assertDatabaseMissing('categories', ['id' => $randomId]);

    $this->expect(Category::count())->toBe(14);
});
