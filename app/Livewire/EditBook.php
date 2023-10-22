<?php

namespace App\Livewire;

use App\Http\Controllers\BookController;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class EditBook extends Component
{
    public int $book_id;
    public string $title = '';
    public string $author = '';
    public null|string $short_description = null;
    public int $number_available = 1;
    public null|int $publication_year = null;
    public null|int $category_id = 0;
    public null|string $category_name;
    public null|Collection $list_category;

    public function mount(int|string $id)
    {
        $book = Book::find($id);

        $this->book_id = $book->id;
        $this->title = $book->title;
        $this->author = $book->author;
        $this->short_description = $book->short_description;
        $this->number_available = $book->number_available;
        $this->publication_year = $book->publication_year;
        $this->category_id = $book->category_id;
        $this->category_name = $book->category()->first()?->name;
        $this->list_category = Category::all('id', 'name')->collect();
    }

    public function render()
    {
        return view('livewire.edit-book')->layout('components.layouts.app');
    }

    public function updateBook() :void
    {
        if($this->category_id === 0) {
            $this->category_id = null;
        }

        try {
            $this->validate((new UpdateBookRequest())->rules());
        } catch (ValidationException $e) {
            throw $e;
        }

        (new BookController)->update(new UpdateBookRequest([
            'title' => $this->title,
            'author' => $this->author,
            'short_description' => $this->short_description,
            'number_available' => $this->number_available,
            'publication_year' => $this->publication_year,
            'category_id' => $this->category_id,
        ]), Book::find($this->book_id));

        $this->dispatch('updateBook');
    }
}
