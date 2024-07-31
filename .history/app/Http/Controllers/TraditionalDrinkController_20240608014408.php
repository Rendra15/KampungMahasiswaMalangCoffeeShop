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
            'columnName' => 'required|string|in:Ice_Coffee_ori,Americano,Ice_Coffee_Hazel,Ice_Kopi_Vanilla,Ice_Kopi_Gula_Aren,Ice_Kopi_Banana,Ice_Cappucino,Ice_Vanila_Latte,v_drip,Tubruk_Susu,Kopi_Coklat,Kopi_Susu,Kopi_Tutup_Susu,Hot_Cappucino,Hot_Vanila_Latte,Espresso,Double_Espresso,Kopi_Hitam,Kopi_Tubruk,KSTG,Kopi_Tutup,Kopi_Espresso_Susu',
            'ID' => 'required|integer|exists:users,id'  // Menggunakan 'ID' sesuai dengan nama kolom di database
        ]);

        $columnName = $validatedData['columnName'];
        $rating = $validatedData['rating'];
        $TraditionalDrinkId = $validatedData['ID'];  // Menggunakan 'ID' sesuai dengan nama kolom di database

        try {
            // Find the coffee item by ID
            $Noncoffee = Coffee::findOrFail($TraditionalDrinkId);

            // Update the rating column
            $Noncoffee->$columnName = $rating;
            $Noncoffee->save();

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
