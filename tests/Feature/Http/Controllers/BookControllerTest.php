<?php

use App\Models\Book;
use Database\Seeders\BookSeeder;
use Illuminate\Http\Response;

beforeEach(function () {
    $this->seed(BookSeeder::class);
});

test('returns a list of books', function () {
    $response = $this->getJson('/api/books');

    $response->assertStatus(Response::HTTP_OK)
        ->assertJsonCount(75);
});

test('creates a new book', function () {
    $data = [
        'author' => 'Olsza',
        'title' => 'Olsza`s new Book',
    ];

    $response = $this->postJson('/api/books', $data);

    $response->assertStatus(Response::HTTP_CREATED)
        ->assertJsonFragment($data);

    $this->assertDatabaseHas('books', $data);

    $this->expect(Book::count())->toBe(76);
});

test('shows a specific book', function () {
    $data = Book::factory()->create();

    $response = $this->getJson('/api/books/' . $data->id);

    $response->assertStatus(Response::HTTP_OK)
        ->assertJson([
            'id' => $data->id,
        ]);
});

test('updates a book', function () {
    $data = [
        'author' => 'Anonymous',
        'title' => 'old Book',
    ];

    $randomId = Book::all()->random()->id;

    $response = $this->putJson('/api/books/' . $randomId, $data);

    $response->assertStatus(Response::HTTP_OK)
        ->assertJson($data);

    $this->assertDatabaseHas('books',  array_merge($data, ['id' => $randomId]));
});

test('deletes a book', function () {
    $randomId = Book::all()->random()->id;

    $response = $this->deleteJson('/api/books/' . $randomId);

    $response->assertStatus(Response::HTTP_NO_CONTENT);

    $this->assertDatabaseMissing('categories', ['id' => $randomId]);

    $this->expect(Book::count())->toBe(74);
});
