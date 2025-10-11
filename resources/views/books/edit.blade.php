<x-layouts.owner>
    <h1 class="text-2xl font-semibold text-sunshine mb-6">Edit Book</h1>

    <form action="{{ route('books.update', $book) }}" method="POST" class="space-y-6">
        @csrf @method('PUT')
        @include('books._form', ['book' => $book, 'statuses' => $statuses])

        <div class="flex gap-3">
            <x-primary-button>Update</x-primary-button>
            <a href="{{ route('books.index') }}" class="px-4 py-2 rounded border">Cancel</a>
        </div>
    </form>
</x-layouts.owner>
