<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class ListBooks extends Component
{
    use WithPagination;

    public function render()
    {
        $books = Book::paginate(10);

        return view('livewire.list-books', compact('books'));
    }
}
