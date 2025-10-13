@props(['book' => null, 'statuses'])

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
            <select id="genre" name="genre"
                class="mt-1 block w-full rounded border-gray-300 text-gray-800 focus:border-secondary focus:ring-secondary">
                <option value="">Select a genre</option>

                <optgroup label="📚 Fiction & Literature">
                    <option>Classic Literature</option>
                    <option>Contemporary Fiction</option>
                    <option>Historical Fiction</option>
                    <option>Fantasy</option>
                    <option>Science Fiction</option>
                    <option>Mystery</option>
                    <option>Crime & Thriller</option>
                    <option>Romance</option>
                    <option>Adventure</option>
                    <option>Magical Realism</option>
                    <option>Humor & Satire</option>
                    <option>Short Stories</option>
                    <option>Poetry</option>
                    <option>Drama / Plays</option>
                    <option>Graphic Novel / Comic</option>
                    <option>Children’s Literature</option>
                    <option>Young Adult (YA)</option>
                </optgroup>

                <optgroup label="📘 Non-Fiction">
                    <option>Biography & Memoir</option>
                    <option>History</option>
                    <option>Philosophy</option>
                    <option>Politics & Society</option>
                    <option>Economics</option>
                    <option>Psychology</option>
                    <option>Education</option>
                    <option>Science</option>
                    <option>Nature & Environment</option>
                    <option>Technology</option>
                    <option>Health & Wellbeing</option>
                    <option>Self-Help</option>
                    <option>Art & Design</option>
                    <option>Architecture</option>
                    <option>Photography</option>
                    <option>Travel Writing</option>
                    <option>Essays</option>
                    <option>Journalism & Media Studies</option>
                </optgroup>

                <optgroup label="🎭 Performing Arts & Creativity">
                    <option>Theatre Studies</option>
                    <option>Acting / Performance</option>
                    <option>Clowning</option>
                    <option>Movement & Body Work</option>
                    <option>Dance</option>
                    <option>Music</option>
                    <option>Film & Cinema</option>
                    <option>Creative Writing</option>
                    <option>Visual Arts</option>
                    <option>Crafts & DIY</option>
                    <option>Fashion & Textile Arts</option>
                </optgroup>

                <optgroup label="🌱 Human Development & Care">
                    <option>Gestalt Therapy</option>
                    <option>Psychotherapy</option>
                    <option>Counselling</option>
                    <option>Mindfulness</option>
                    <option>Coaching</option>
                    <option>Personal Growth</option>
                    <option>Spirituality</option>
                    <option>Somatics / Embodiment</option>
                    <option>Group Facilitation</option>
                    <option>Youth Work</option>
                    <option>Education & Pedagogy</option>
                    <option>Social Work</option>
                    <option>Community Practice</option>
                </optgroup>

                <optgroup label="🎓 Academic & Professional">
                    <option>Biology</option>
                    <option>Medicine & Health Sciences</option>
                    <option>Physics</option>
                    <option>Chemistry</option>
                    <option>Mathematics</option>
                    <option>Linguistics</option>
                    <option>Language & Literature Studies</option>
                    <option>Sociology</option>
                    <option>Anthropology</option>
                    <option>Cultural Studies</option>
                    <option>Education Sciences</option>
                    <option>Psychology Research</option>
                    <option>Environmental Studies</option>
                    <option>Engineering</option>
                    <option>Law</option>
                    <option>Business & Management</option>
                    <option>Research Methods</option>
                </optgroup>

                <optgroup label="🧶 Practical Skills & Hobbies">
                    <option>Crafts & Handwork</option>
                    <option>Knitting & Crochet</option>
                    <option>Screen Printing</option>
                    <option>Painting & Drawing</option>
                    <option>Cooking & Food</option>
                    <option>Gardening</option>
                    <option>DIY / Home Improvement</option>
                    <option>Language Learning</option>
                    <option>Games & Play</option>
                    <option>Travel Guides</option>
                </optgroup>

                <optgroup label="💛 Special / Flexible Options">
                    <option>Anthology / Collection</option>
                    <option>Reference</option>
                    <option>Manual / Guide</option>
                    <option>Workbook</option>
                    <option>Exhibition Catalogue</option>
                    <option>Catalog / Archive</option>
                    <option>Other (custom)</option>
                </optgroup>
            </select>
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

        <div class="col-span-2">
            <x-input-label for="cover" value="Cover Image" />
            <input id="cover" name="cover" type="file"
                class="mt-1 block w-full text-gray-800 border-gray-300 focus:border-secondary focus:ring-secondary" />
            <x-input-error :messages="$errors->get('cover')" class="mt-2" />
        </div>
    </div>
</div>