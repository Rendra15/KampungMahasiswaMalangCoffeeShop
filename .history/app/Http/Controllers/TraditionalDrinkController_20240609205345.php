<?php

namespace App\Http\Controllers;

use App\Models\TraditionalDrink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TraditionalDrinkController extends Controller
{
    public function storeRating(Request $request, $id)
    {
        // Log the incoming request for debugging
        Log::info('Received rating request', ['id' => $id, 'data' => $request->all()]);

        // Validate the request data
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'columnName' => 'required|string|in:Jahe,Jahe_Susu,Jahe_Gula_Aren,STMJ,Bramasta,Wedang_Uwuh,Jeruk_Anget',
            'ID' => 'required|integer|exists:users,id'
        ]);

        $columnName = $validatedData['columnName'];
        $rating = $validatedData['rating'];
        $TraditionalDrinkId = $validatedData['ID'];

        try {
            // Find the TraditionalDrink item by ID
            $TraditionalDrink = TraditionalDrink::findOrFail($TraditionalDrinkId);

            // Update the rating column
            $TraditionalDrink->$columnName = $rating;
            $TraditionalDrink->save();

            // Return a success response
            return response()->json(['success' => true, 'message' => 'Rating successfully added']);
        } catch (\Exception $e) {
            // Log the error for debugging purposes
            Log::error('Error adding rating: '.$e->getMessage());

            // Return an error response
            return response()->json(['success' => false, 'message' => 'Error adding rating.'], 500);
        }
    }


}
