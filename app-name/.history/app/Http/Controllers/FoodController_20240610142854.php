<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FoodController extends Controller
{
    public function storeRating(Request $request, $id)
    {
        // Log the incoming request for debugging
        Log::info('Received rating request', ['id' => $id, 'data' => $request->all()]);

        // Validate the request data
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'columnName' => 'required|string|in:Nasi_Telur_Mata_Sapi,Nasi_Telur_Normal,Nasi_Telur_Kecap,Nasi_Telur_Pedas,Nasi_Telur_Bawang,Nasi_Telur_Saus,Nasi_Telur_Keju,Nasi_Indomie,Nasi_Omelette,Indomie_Goreng,Indomie_Goreng_Double,Indomie_Kuah',
            'ID' => 'required|integer|exists:users,id'  // Menggunakan 'ID' sesuai dengan nama kolom di database
        ]);

        $columnName = $validatedData['columnName'];
        $rating = $validatedData['rating'];
        $FoodId = $validatedData['ID'];  // Menggunakan 'ID' sesuai dengan nama kolom di database

        try {
            // Find the Food item by ID
            $Food = Food::findOrFail($FoodId);

            // Update the rating column
            $Food->$columnName = $rating;
            $Food->save();

            // Return a success response
            return response()->json(['success' => true, 'message' => 'Rating successfully added']);
        } catch (\Exception $e) {
            // Log the error for debugging purposes
            Log::error('Error adding rating: '.$e->getMessage());

            // Return an error response
            return response()->json(['success' => false, 'message' => 'Error adding rating.'], 500);
        }
    }

    public function getRating(Request $request, $FoodId)
    {
        $ratingColumns = [
            'Nasi_Telur_Mata_Sapi',
            'Nasi_Telur_Normal',
            'Nasi_Telur_Kecap',
            'Nasi_Telur_Pedas',
            'Nasi_Telur_Bawang',
            'Nasi_Telur_Saus',
            'Nasi_Telur_Keju',
            'Nasi_Indomie',
            'Nasi_Omelette',
            'Indomie_Goreng',
            'Indomie_Goreng_Double',
            'Indomie_Kuah'
        ];

        $columnName = $request->input('columnName');

        if (!in_array($columnName, $ratingColumns)) {
            Log::info('Invalid column name', ['column_name' => $columnName]);
            return response()->json(['error' => 'Invalid column name'], 400);
        }

        $Food = Food::find($FoodId);
        if ($Food) {
            if ($Food->$columnName !== null) {
                $rating = $Food->$columnName;
                Log::info('Rating found', ['Food_id' => $FoodId, 'column' => $columnName, 'rating' => $rating]);
                return response()->json(['column' => $columnName, 'rating' => $rating]);
            } else {
                Log::info('No rating found for Food', ['Food_id' => $FoodId, 'column' => $columnName]);
                return response()->json(['error' => 'No rating found for coffee'], 404);
            }
        } else {
            Log::info('Coffee not found', ['coffee_id' => $coffeeId]);
            return response()->json(['error' => 'Coffee not found'], 404);
        }
    }
}
