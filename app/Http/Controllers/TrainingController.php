<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    /**
     * Return all trainings
     */
    public function index()
    {
        $trainings = Training::all();

        return response()->json([
            'success' => true,
            'data'    => $trainings
        ], 200);
    }

    /**
     * Return a single training
     */
    public function show(Training $training)
    {
        return response()->json([
            'success' => true,
            'data'    => $training
        ], 200);
    }

    /**
     * Store a new training
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'         => 'required|string|max:255',
            'description'   => 'required|string',
            'training_date' => 'required|date',
            'location'      => 'nullable|string|max:255',
        ]);

        $training = Training::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Training created successfully',
            'data'    => $training
        ], 201);
    }

    /**
     * Update an existing training
     */
    public function update(Request $request, Training $training)
    {
        $validated = $request->validate([
            'title'         => 'sometimes|string|max:255',
            'description'   => 'sometimes|string',
            'training_date' => 'sometimes|date',
            'location'      => 'nullable|string|max:255',
        ]);

        $training->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Training updated successfully',
            'data'    => $training
        ], 200);
    }

    /**
     * Delete a training
     */
    public function destroy(Training $training)
    {
        $training->delete();

        return response()->json([
            'success' => true,
            'message' => 'Training deleted successfully'
        ], 200);
    }
}