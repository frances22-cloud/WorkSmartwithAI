<?php

namespace App\Http\Controllers;

use App\BookingStatus;
use App\Enums\TrainingType;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;

class BookingController extends Controller
{
    /**
     * Return all bookings (admin use)
     */
    public function index()
    {
        $bookings = Booking::latest()->get();

        return response()->json([
            'success' => true,
            'data' => $bookings,
        ], 200);
    }

    /**
     * Return a single booking
     */
    public function show(Booking $booking)
    {
        return response()->json([
            'success' => true,
            'data' => $booking,
        ], 200);
    }

    /**
     * Store a new booking (public use)
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'organization' => 'nullable|string|max:255',
            'training_type' => ['required', new Enum(TrainingType::class)],
            'preferred_date' => 'required|date|after:today',
            'additional_details' => 'nullable|string',
        ]);

        $booking = Booking::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Booking submitted successfully',
            'data' => $booking,
        ], 201);
    }

    /**
     * Update booking status (admin use)
     */
    public function update(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'status' => ['required', new Enum(BookingStatus::class)],
        ]);

        $booking->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Booking status updated successfully',
            'data' => $booking,
        ], 200);
    }

    /**
     * Delete a booking (admin use)
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();

        return response()->json([
            'success' => true,
            'message' => 'Booking deleted successfully',
        ], 200);
    }
}
