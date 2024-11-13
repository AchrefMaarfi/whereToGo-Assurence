<?php

namespace App\Http\Controllers;

use App\Models\Assurance;
use Illuminate\Http\Request;

class AssuranceController extends Controller
{
    // Retrieve all assurances
    public function index()
    {
        return response()->json(Assurance::all());
    }

    // Store a new assurance
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'expiration_date' => 'required|date',
        ]);

        // Create a new assurance record
        $assurance = Assurance::create($request->all());

        return response()->json($assurance, 201);
    }

    // Retrieve a specific assurance by ID
    public function show($id)
    {
        $assurance = Assurance::findOrFail($id);

        return response()->json($assurance);
    }

    // Update an existing assurance
    public function update(Request $request, $id)
    {
        $assurance = Assurance::findOrFail($id);

        // Validate the request
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'type' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'price' => 'sometimes|required|numeric',
            'expiration_date' => 'sometimes|required|date',
        ]);

        // Update the assurance record
        $assurance->update($request->all());

        return response()->json($assurance);
    }

    // Delete an assurance
    public function destroy($id)
    {
        $assurance = Assurance::findOrFail($id);

        // Delete the assurance record
        $assurance->delete();

        return response()->json(null, 204);
    }

    // Optional: Custom route method for price range
    public function priceRange(Request $request)
    {
        $minPrice = $request->query('min', 0);
        $maxPrice = $request->query('max', 1000);

        $assurances = Assurance::whereBetween('price', [$minPrice, $maxPrice])->get();

        return response()->json($assurances);
    }
}
