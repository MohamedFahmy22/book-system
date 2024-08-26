@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create a Reservation</h1>

        <form action="{{ route('reservations.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="book_id" class="block text-gray-700">Book</label>
                <select id="book_id" name="book_id" class="form-select mt-1 block w-full" required>
                    <!-- Assuming you have a list of books passed from the controller -->
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}">{{ $book->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <button type="submit" class="btn btn-primary">Reserve</button>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </form>
    </div>
@endsection
