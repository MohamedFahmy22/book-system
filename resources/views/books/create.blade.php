@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create a New Book</h1>

        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-gray-700">Title</label>
                <input type="text" id="title" name="title" class="form-input mt-1 block w-full" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description</label>
                <textarea id="description" name="describtion" class="form-input mt-1 block w-full"></textarea>
            </div>

            <div class="mb-4">
                <label for="code" class="block text-gray-700">Code</label>
                <input type="text" id="code" name="code" class="form-input mt-1 block w-full" required>
            </div>

            <div class="mb-4">
                <button type="submit" class="btn btn-primary">Create Book</button>
            </div>
        </form>
    </div>
@endsection
