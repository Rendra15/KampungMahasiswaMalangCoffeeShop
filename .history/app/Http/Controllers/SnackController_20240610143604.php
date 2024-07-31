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

    public function getRating(Request $request, $SnackId)
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

        $Food = Food::find($SnackId);
        if ($Food) {
            if ($Food->$columnName !== null) {
                $rating = $Food->$columnName;
                Log::info('Rating found', ['Food_id' => $SnackId, 'column' => $columnName, 'rating' => $rating]);
                return response()->json(['column' => $columnName, 'rating' => $rating]);
            } else {
                Log::info('No rating found for Food', ['Food_id' => $SnackId, 'column' => $columnName]);
                return response()->json(['error' => 'No rating found for Food'], 404);
            }
        } else {
            Log::info('Food not found', ['Food_id' => $SnackId]);
            return response()->json(['error' => 'Food not found'], 404);
        }
    }
}
