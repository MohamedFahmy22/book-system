@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Your Reservations</h1>

        @if ($reservations->isEmpty())
            <p>You have no reservations.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Book Title</th>
                        <th>Date Reserved</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->book->title }}</td>
                            <td>{{ $reservation->created_at->format('Y-m-d') }}</td>
                            <td>
                                <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Cancel</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
