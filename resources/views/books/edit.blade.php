<x-layouts.owner>
    <h1 class="text-2xl font-semibold text-sunshine mb-6">Edit Book</h1>

    <form method="POST" action="{{ route('books.update', $book) }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PATCH')
        @include('books._form', ['book' => $book, 'statuses' => $statuses])
        <x-primary-button>Update</x-primary-button>
    </form>

</x-layouts.owner>