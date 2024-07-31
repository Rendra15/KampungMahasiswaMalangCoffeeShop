<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use Illuminate\Http\Request;

class CoffeeController extends Controller
{
    public function storeRating(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'columnName' => 'required|string|in:Ice_Coffee_ori,Americano,Ice_Coffee_Hazel,Ice_Kopi_Vanilla,Ice_Kopi_Gula_Aren,Ice_Kopi_Banana,Ice_Cappucino,Ice_Vanila_Latte,v_drip,Tubruk_Susu,Kopi_Coklat,Kopi_Susu,Kopi_Tutup_Susu,Hot_Cappucino,Hot_Vanila_Latte,Espresso,Double_Espresso,Kopi_Hitam,Kopi_Tubruk,KSTG,Kopi_Tutup,Kopi_Espresso_Susu'
        ]);

        $columnName = $request->input('columnName');
        $rating = $request->input('rating');

        try {
            // Find the coffee item by ID
            $coffee = Coffee::findOrFail($id);

            // Update the rating column
            $coffee->$columnName = $rating;
            $coffee->save();

            // Return a success response
            return response()->json(['success' => true, 'message' => 'Rating successfully added']);
        } catch (\Exception $e) {
            // Return an error response
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}

