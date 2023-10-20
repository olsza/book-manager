<div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
        @foreach($books as $book)
            <x-box
                title="{{ $book->title }}"
                link="{{ route('book', $book) }}"
            >
                {{ $book->short_description}}
            </x-box>
        @endforeach
    </div>

    <div class="grid grid-cols-1 gap-12 grid-rows-2 pt-2">
        <div class="scale-100 p-12 ">
            {{ $books->links() }}
        </div>
    </div>
</div>
