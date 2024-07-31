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

    public function getRating(Request $request, $TraditionalDrinkId)
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

        $Snack = Snack::find($TraditionalDrinkId);
        if ($Snack) {
            if ($Snack->$columnName !== null) {
                $rating = $Snack->$columnName;
                Log::info('Rating found', ['SnackId' => $SnackId, 'column' => $columnName, 'rating' => $rating]);
                return response()->json(['column' => $columnName, 'rating' => $rating]);
            } else {
                Log::info('No rating found for Snack', ['SnackId' => $SnackId, 'column' => $columnName]);
                return response()->json(['error' => 'No rating found for FoSnackod'], 404);
            }
        } else {
            Log::info('Snack not found', ['SnackId' => $SnackId]);
            return response()->json(['error' => 'Snack not found'], 404);
        }
    }
}