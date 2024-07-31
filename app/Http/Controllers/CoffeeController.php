<?php

namespace App\Http\Controllers;

use App\Models\coffee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CoffeeController extends Controller
{
    public function storeRating(Request $request, $id)
    {
        // menampilkan log untuk menampilkan apakah dia sukses atau error
        Log::info('Received rating request', ['id' => $id, 'data' => $request->all()]);

        // validasi request data
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'columnName' => 'required|string|in:Ice_Coffee_ori,Americano,Ice_Coffee_Hazel,Ice_Kopi_Vanilla,Ice_Kopi_Gula_Aren,Ice_Kopi_Banana,Ice_Cappucino,Ice_Vanila_Latte,V-drip,Tubruk_Susu,Kopi_Coklat,Kopi_Susu,Kopi_Tutup_Susu,Hot_Cappucino,Hot_Vanila_Latte,Espresso,Double_Espresso,Kopi_Hitam,Kopi_Tubruk,KSTG,Kopi_Tutup,Kopi_Espresso_Susu',
            'ID' => 'required|integer|exists:users,id'
        ]);

        //inisiasi kolom,rating,dan id
        $columnName = $validatedData['columnName'];
        $rating = $validatedData['rating'];
        $coffeeId = $validatedData['ID'];

        try {
            // mencari produk coffee berdasarkan ID
            $coffee = Coffee::findOrFail($coffeeId);

            // Update kolom rating
            $coffee->$columnName = $rating;
            $coffee->save();

            // Return a success response
            return response()->json(['success' => true, 'message' => 'Rating successfully added']);
        } catch (\Exception $e) {
            // Log error
            Log::error('Error adding rating: '.$e->getMessage());

            // Return an error response
            return response()->json(['success' => false, 'message' => 'Error adding rating.'], 500);
        }
    }

    public function getRating(Request $request, $coffeeId)
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
            'V-drip',
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

        //mendapatkan nama kolom
        $columnName = $request->input('columnName');

        //validasi nama kolom
        if (!in_array($columnName, $ratingColumns)) {
            Log::info('Invalid column name', ['column_name' => $columnName]);
            return response()->json(['error' => 'Invalid column name'], 400);
        }

        //Mencari Data Kopi Berdasarkan coffeeId
        $coffee = Coffee::find($coffeeId);
        if ($coffee) {
            if ($coffee->$columnName !== null) {
                $rating = $coffee->$columnName;
                Log::info('Rating found', ['coffee_id' => $coffeeId, 'column' => $columnName, 'rating' => $rating]);
                return response()->json(['column' => $columnName, 'rating' => $rating]);
            } else {
                Log::info('No rating found for coffee', ['coffee_id' => $coffeeId, 'column' => $columnName]);
                return response()->json(['error' => 'No rating found for coffee'], 404);
            }
        } else {
            Log::info('Coffee not found', ['coffee_id' => $coffeeId]);
            return response()->json(['error' => 'Coffee not found'], 404);
        }
    }


}
