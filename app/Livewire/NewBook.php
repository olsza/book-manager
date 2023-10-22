<?php

namespace App\Livewire;

use App\Http\Controllers\BookController;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class NewBook extends Component
{
    public string $title = '';
    public string $author = '';
    public null|string $short_description = null;
    public int $number_available = 1;
    public null|int $publication_year = null;
    public null|int $category_id = 0;
    public null|Collection $list_category;

    public function mount()
    {
        $this->list_category = Category::all('id', 'name')->collect();
    }

    public function render()
    {
        return view('livewire.new-book')->layout('components.layouts.app');
    }

    public function addBook() :void
    {
        if($this->category_id === 0) {
            $this->category_id = null;
        }

        try {
            $this->validate((new UpdateBookRequest())->rules());
        } catch (ValidationException $e) {
            if(is_null($this->category_id)) {
                $this->category_id = 0;
            }
            throw $e;
        }

        $newBook = (new BookController)->store(new StoreBookRequest([
            'title' => $this->title,
            'author' => $this->author,
            'short_description' => $this->short_description,
            'number_available' => $this->number_available,
            'publication_year' => $this->publication_year,
            'category_id' => $this->category_id,
        ]));

        $this->dispatch('addBook');

        $book_id = collect(json_decode($newBook->content()))->get('id');

        to_route('book', $book_id);
    }
}
