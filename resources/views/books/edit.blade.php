@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Book</h1>

        <form action="{{ route('books.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-gray-700">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title', $book->title) }}" class="form-input mt-1 block w-full" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description</label>
                <textarea id="description" name="describtion" class="form-input mt-1 block w-full" required>{{ old('describtion', $book->describtion) }}</textarea>
            </div>

            <div class="mb-4">
                <button type="submit" class="btn btn-primary">Update Book</button>
            </div>
        </form>
    </div>
@endsection
