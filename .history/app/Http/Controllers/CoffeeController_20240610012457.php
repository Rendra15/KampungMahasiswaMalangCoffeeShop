<?php

namespace App\Http\Controllers;

use App\Models\coffee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CoffeeController extends Controller
{
    public function storeRating(Request $request, $id)
    {
        // Log the incoming request for debugging
        Log::info('Received rating request', ['id' => $id, 'data' => $request->all()]);

        // Validate the request data
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'columnName' => 'required|string|in:Ice_Coffee_ori,Americano,Ice_Coffee_Hazel,Ice_Kopi_Vanilla,Ice_Kopi_Gula_Aren,Ice_Kopi_Banana,Ice_Cappucino,Ice_Vanila_Latte,v_drip,Tubruk_Susu,Kopi_Coklat,Kopi_Susu,Kopi_Tutup_Susu,Hot_Cappucino,Hot_Vanila_Latte,Espresso,Double_Espresso,Kopi_Hitam,Kopi_Tubruk,KSTG,Kopi_Tutup,Kopi_Espresso_Susu',
            'ID' => 'required|integer|exists:users,id'
        ]);

        $columnName = $validatedData['columnName'];
        $rating = $validatedData['rating'];
        $coffeeId = $validatedData['ID'];

        try {
            // Find the coffee item by ID
            $coffee = Coffee::findOrFail($coffeeId);

            // Update the rating column
            $coffee->$columnName = $rating;
            $coffee->save();

            // Return a success response
            return response()->json(['success' => true, 'message' => 'Rating successfully added']);
        } catch (\Exception $e) {
            // Log the error for debugging purposes
            Log::error('Error adding rating: '.$e->getMessage());

            // Return an error response
            return response()->json(['success' => false, 'message' => 'Error adding rating.'], 500);
        }
    }

    public function getRating($coffeeId, $columnName)
    {
        $ratingColumns = [
            'Ice_Coffee_ori',
            'Americano',
            'Ice_Coffee_Hazel',
            'Ice_Kopi_Vanilla',
            'Ice_Kopi_Gula_Aren',
            'Ice_Kopi_Banana',
            'Ice_Cappucino',
            'Ice_Vanila_Latte',
            'v_drip',
            'Tubruk_Susu',
            'Kopi_Coklat',
            'Kopi_Susu',
            'Kopi_Tutup_Susu',
            'Hot_Cappucino',
            'Hot_Vanila_Latte',
            'Espresso',
            'Double_Espresso',
            'Kopi_Hitam',
            'Kopi_Tubruk',
            'KSTG',
            'Kopi_Tutup',
            'Kopi_Espresso_Susu',
        ];

        if (!in_array($columnName, $ratingColumns)) {
            Log::info('Invalid column name', ['columnName' => $columnName]);
            return response()->json(['error' => 'Invalid column name'], 400);
        }

        $coffee = Coffee::find($coffeeId);
        if ($coffee) {
            $rating = $coffee->$columnName;
            if ($rating !== null) {
                Log::info('Rating found', ['coffee_id' => $coffeeId, 'rating' => $rating]);
                return response()->json(['rating' => $rating]);
            } else {
                Log::info('No rating found for column', ['coffee_id' => $coffeeId, 'columnName' => $columnName]);
                return response()->json(['error' => 'No rating found for column'], 404);
            }
        } else {
            Log::info('Coffee not found', ['coffee_id' => $coffeeId]);
            return response()->json(['error' => 'Coffee not found'], 404);
        }
    }

}