<?php

namespace App\Http\Controllers;

use App\Models\Snack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SnackController extends Controller
{
    public function storeRating(Request $request, $id)
    {
        // Log the incoming request for debugging
        Log::info('Received rating request', ['id' => $id, 'data' => $request->all()]);

        // Validate the request data
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'columnName' => 'required|string|in:Kentang_Goreng,Pisang_Nugget,Pentol,Nugget,Sosis,Tahu_Walik,Roti_Bakar,Cireng,Tahu_Bakso,Tempura,Pisang_Goreng_Ori',

            'ID' => 'required|integer|exists:users,id'
        ]);

        $columnName = $validatedData['columnName'];
        $rating = $validatedData['rating'];
        $SnackId = $validatedData['ID'];

        try {
            // Find the Snack item by ID
            $Snack = Snack::findOrFail($SnackId);

            // Update the rating column
            $Snack->$columnName = $rating;
            $Snack->save();

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
