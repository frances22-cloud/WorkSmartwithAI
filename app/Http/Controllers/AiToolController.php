<?php

namespace App\Http\Controllers;

use App\Models\AiTool;
use Illuminate\Http\Request;

class AiToolController extends Controller
{
    /**
     * Return all AI tools
     */
    public function index()
    {
        $tools = AiTool::all();

        return response()->json([
            'success' => true,
            'data'    => $tools
        ], 200);
    }

    /**
     * Return a single AI tool
     */
    public function show(AiTool $aiTool)
    {
        return response()->json([
            'success' => true,
            'data'    => $aiTool
        ], 200);
    }

    /**
     * Store a new AI tool
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'category'    => 'required|string|max:255',
            'url'         => 'required|url',
            'logo'        => 'nullable|string',
        ]);

        $tool = AiTool::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'AI Tool created successfully',
            'data'    => $tool
        ], 201);
    }

    /**
     * Update an existing AI tool
     */
    public function update(Request $request, AiTool $aiTool)
    {
        $validated = $request->validate([
            'name'        => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'category'    => 'sometimes|string|max:255',
            'url'         => 'sometimes|url',
            'logo'        => 'nullable|string',
        ]);

        $aiTool->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'AI Tool updated successfully',
            'data'    => $aiTool
        ], 200);
    }

    /**
     * Delete an AI tool
     */
    public function destroy(AiTool $aiTool)
    {
        $aiTool->delete();

        return response()->json([
            'success' => true,
            'message' => 'AI Tool deleted successfully'
        ], 200);
    }
}