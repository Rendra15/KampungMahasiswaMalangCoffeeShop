<?php

namespace App\Http\Controllers;

use App\Models\ModernDrink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ModernDrinkController extends Controller
{
    public function storeRating(Request $request, $id)
    {
        // Log the incoming request for debugging
        Log::info('Received rating request', ['id' => $id, 'data' => $request->all()]);

        // Validate the request data
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'columnName' => 'required|string|in:Hot_Greentea,Hot_RedVelvet,Hot_Chocolate,Hot_Thaitea,Hot_Taro,Hot_Cappucino,Ice_Greentea,Ice_RedVelvet,Ice_Chocolate,Ice_Thaitea,Ice_Vanilla_Latte,Ice_Taro,Ice_Cappucino,Ice_Thai_Tea',
            'ID' => 'required|integer|exists:users,id'
        ]);

        $columnName = $validatedData['columnName'];
        $rating = $validatedData['rating'];
        $ModernDrinkId = $validatedData['ID'];

        try {
            // Find the ModernDrink item by ID
            $ModernDrink = ModernDrink::findOrFail($ModernDrinkId);

            // Update the rating column
            $ModernDrink->$columnName = $rating;
            $ModernDrink->save();

            // Return a success response
            return response()->json(['success' => true, 'message' => 'Rating successfully added']);
        } catch (\Exception $e) {
            // Log the error for debugging purposes
            Log::error('Error adding rating: '.$e->getMessage());

            // Return an error response
            return response()->json(['success' => false, 'message' => 'Error adding rating.'], 500);
        }
    }

    public function getRating(Request $request, $ModernDrinkId)
    {
        $ratingColumns = [
            'Hot_Greentea',
            'Hot_RedVelvet',
            'Hot_Chocolate',
            'Hot_Thaitea',
            'Hot_Taro',
            'Hot_Cappucino',
            'Ice_Greentea',
            'Ice_RedVelvet',
            'Ice_Chocolate',
            'Ice_Thaitea',
            'Ice_Vanilla_Latte',
            'Ice_Taro',
            'Ice_Cappucino',
            'Ice_Thai_Tea'
        ];

        $columnName = $request->input('columnName');

        if (!in_array($columnName, $ratingColumns)) {
            Log::info('Invalid column name', ['column_name' => $columnName]);
            return response()->json(['error' => 'Invalid column name'], 400);
        }

        $Food = Food::find($ModernDrinkId);
        if ($Food) {
            if ($Food->$columnName !== null) {
                $rating = $Food->$columnName;
                Log::info('Rating found', ['ModernDrinkId' => $ModernDrinkId, 'column' => $columnName, 'rating' => $rating]);
                return response()->json(['column' => $columnName, 'rating' => $rating]);
            } else {
                Log::info('No rating found for Food', ['Food_id' => $ModernDrinkId, 'column' => $columnName]);
                return response()->json(['error' => 'No rating found for Food'], 404);
            }
        } else {
            Log::info('Food not found', ['FooModernDrinkIdd_id' => $ModernDrinkId]);
            return response()->json(['error' => 'Food not found'], 404);
        }
    }
}
