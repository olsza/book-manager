<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Collection;
use Livewire\Component;

class ShowBook extends Component
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

    public function mount(Book $book)
    {
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
        return view('livewire.book-show')->layout('components.layouts.app');
    }
}
