@props([
    'disabled' => false,
    'readonly' => false,
    'wire_submit' => false,
    'list_category' => [],
])

<form class="mt-6 space-y-6" @if($wire_submit) wire:submit="{{ $wire_submit }}" @endif>
    <ul>
        <li class="mb-6">
            <x-input-label for="title" :value="__('Title:')" />
            <x-text-input wire:model="title"
                          id="title"
                          name="title"
                          type="text"
                          class="mt-1 block w-full"
                          autocomplete="title"
                          :disabled="$disabled"
                          :readonly="$readonly"
            />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </li>
        <li class="mb-6">
            <x-input-label for="author" :value="__('Author:')" />
            <x-text-input wire:model="author"
                          id="author"
                          name="author"
                          type="text"
                          class="mt-1 block w-full"
                          autocomplete="author"
                          :disabled="$disabled"
                          :readonly="$readonly"
            />
            <x-input-error :messages="$errors->get('author')" class="mt-2" />
        </li>
        <li class="mb-6">
            <x-input-label for="short_description" :value="__('Short description:')" />
            <textarea wire:model="short_description"
                      id="short_description"
                      name="short_description"
                      class="mt-1 block w-full"
                      cols="50"
                      rows="4"
                      {{ $disabled ? 'disabled' : '' }}
                      {{ $readonly ? 'readonly' : '' }}
            ></textarea>
            <x-input-error :messages="$errors->get('short_description')" class="mt-2" />
        </li>
        <li class="mb-6">
            <x-input-label for="number_available" :value="__('Number available:')" />
            <x-text-input wire:model="number_available"
                          id="number_available"
                          name="number_available"
                          type="number"
                          class="mt-1 block w-full"
                          autocomplete="number_available"
                          :disabled="$disabled"
                          :readonly="$readonly"
            />
            <x-input-error :messages="$errors->get('number_available')" class="mt-2" />

            <x-input-label for="publication_year" :value="__('Publication year:')" />
            <x-text-input wire:model="publication_year"
                          id="publication_year"
                          name="publication_year"
                          type="number"
                          class="mt-1 block w-full"
                          autocomplete="publication_year"
                          :disabled="$disabled"
                          :readonly="$readonly"
            />
            <x-input-error :messages="$errors->get('publication_year')" class="mt-2" />
        </li>
        <li class="mb-6">
            <x-input-label for="category_id" :value="__('Category:')" />
            <select wire:model="category_id"
                    id="category_id"
                    name="category_id"
                    class="mt-1 block w-full"
                    {{ $disabled ? 'disabled' : '' }}
                    {{ $readonly ? 'readonly' : '' }}
            >
                <option value="0">{{ __('Uncategorized') }}</option>
                @foreach($list_category as $category)
                    <option value="{{ $category->id }}">{{ __($category->name) }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
        </li>
    </ul>

    @auth()
        <div class="flex items-center gap-4">
            @if( ! $readonly )
                @if(\Illuminate\Support\Facades\Route::currentRouteName() != 'book.new')
                    <x-primary-button>{{ __('Save') }}</x-primary-button>

                    <x-action-message class="mr-3" on="updateBook">
                        {{ __('Saved.') }}
                    </x-action-message>

                    <x-action-message class="mr-3" on="addBook">
                        {{ __('Added.') }}
                    </x-action-message>
                @else
                    <x-primary-button>{{ __('Add') }}</x-primary-button>
                @endif
            @else
                <x-link-button href="{{ route('book.edit', [$this->book_id]) }}">{{ __('Edit') }}</x-link-button>

                <x-link-button href="{{ route('book.new') }}">{{ __('Add new') }}</x-link-button>
            @endif
        </div>
    @endauth
</form>
