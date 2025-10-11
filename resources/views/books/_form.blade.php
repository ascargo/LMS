@props(['book' => null, 'statuses'])

<!-- 🌿 Wrapper for background, spacing, and readability -->
<div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md text-gray-800 dark:text-gray-100">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <x-input-label for="title" value="Title" />
            <x-text-input id="title" name="title" type="text"
                class="mt-1 block w-full text-gray-800 border-gray-300 focus:border-teal focus:ring-teal"
                :value="old('title', $book->title ?? '')" required autofocus />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="author" value="Author" />
            <x-text-input id="author" name="author" type="text"
                class="mt-1 block w-full text-gray-800 border-gray-300 focus:border-teal focus:ring-teal"
                :value="old('author', $book->author ?? '')" required />
            <x-input-error :messages="$errors->get('author')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="isbn" value="ISBN" />
            <x-text-input id="isbn" name="isbn" type="text"
                class="mt-1 block w-full text-gray-800 border-gray-300 focus:border-teal focus:ring-teal"
                :value="old('isbn', $book->isbn ?? '')" />
            <x-input-error :messages="$errors->get('isbn')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="year" value="Year" />
            <x-text-input id="year" name="year" type="number"
                class="mt-1 block w-full text-gray-800 border-gray-300 focus:border-teal focus:ring-teal"
                :value="old('year', $book->year ?? '')" />
            <x-input-error :messages="$errors->get('year')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="genre" value="Genre" />
            <x-text-input id="genre" name="genre" type="text"
                class="mt-1 block w-full text-gray-800 border-gray-300 focus:border-teal focus:ring-teal"
                :value="old('genre', $book->genre ?? '')" />
            <x-input-error :messages="$errors->get('genre')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="collection" value="Collection" />
            <x-text-input id="collection" name="collection" type="text"
                class="mt-1 block w-full text-gray-800 border-gray-300 focus:border-teal focus:ring-teal"
                :value="old('collection', $book->collection ?? '')" />
            <x-input-error :messages="$errors->get('collection')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="location" value="Location" />
            <x-text-input id="location" name="location" type="text"
                class="mt-1 block w-full text-gray-800 border-gray-300 focus:border-teal focus:ring-teal"
                :value="old('location', $book->location ?? '')" />
            <x-input-error :messages="$errors->get('location')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="status_id" value="Status" />
            <select id="status_id" name="status_id"
                class="mt-1 block w-full rounded border-gray-300 text-gray-800 focus:border-teal focus:ring-teal">
                @foreach($statuses as $s)
                    <option value="{{ $s->id }}"
                        @selected(old('status_id', $book->status_id ?? '') == $s->id)>
                        {{ $s->name }}
                    </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('status_id')" class="mt-2" />
        </div>
    </div>
</div>
