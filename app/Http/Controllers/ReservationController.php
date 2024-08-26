<?php
    namespace App\Http\Controllers;

    use App\Models\Book;
    use App\Models\Reservation;
    use App\Http\Requests\StoreReservationRequest;

    class ReservationController extends Controller
    {
        public function index()
        {
            $reservations = Reservation::where('user_id', auth()->id())->with('book')->get();

            return view('reservations.index', compact('reservations'));
        }

        public function create()
        {
            $books = Book::where('deserved', false)->get();
            return view('reservations.create', compact('books'));
        }

        public function store(StoreReservationRequest $request) // Use the form request here
        {
            $book = Book::findOrFail($request->book_id);
            if ($book->deserved) {
                return back()->with('error', 'Book is already reserved.');
            }

            $book->deserved = true;
            $book->save();

            try {
                $reservation = Reservation::create([
                    'user_id' => auth()->id(),
                    'book_id' => $book->id,
                ]);

                if ($reservation) {
                    return back()->with('success', 'Book reserved successfully.');
                } else {
                    return back()->with('error', 'Failed to reserve the book.');
                }
            } catch (\Exception $e) {
                \Log::error('Reservation Error: ' . $e->getMessage());
                return back()->with('error', 'An error occurred while trying to reserve the book.');
            }
        }

        public function destroy(Reservation $reservation)
        {
            $book = $reservation->book;
            $book->deserved = false;
            $book->save();

            $reservation->delete();

            return back()->with('success', 'Reservation canceled.');
        }
    }
