<x-layouts.owner>
    <h1 class="text-2xl font-semibold text-sunshine mb-6">Add Book</h1>

    <form action="{{ route('books.store') }}"
        method="POST"
        enctype="multipart/form-data"
        class="space-y-6">
        @csrf

        @include('books._form', ['book' => new \App\Models\Book, 'statuses' => $statuses])

        <div class="flex gap-3">
            <x-primary-button>Save</x-primary-button>
            <a href="{{ route('books.index') }}" class="px-4 py-2 rounded border">Cancel</a>
        </div>
    </form>
</x-layouts.owner>