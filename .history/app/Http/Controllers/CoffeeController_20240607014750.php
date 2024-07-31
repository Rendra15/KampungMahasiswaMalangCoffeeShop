<?php

namespace App\Http\Controllers;

use App\Models\coffee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class CoffeeController extends Controller
{
    public function storeRating(Request $request, $id)
    {
        // Log the incoming request for debugging
        Log::info('Received rating request', ['id' => $id, 'data' => $request->all()]);

        $sqlQuery = "
            SELECT
            u.Id as ID,
            u.email as Email,
            u.name as UserName,
            c.Ice_Coffee_ori,
            c.Americano,
            c.Ice_Coffee_Hazel,
            c.Ice_Kopi_Vanilla,
            c.Ice_Kopi_Gula_Aren,
            c.Ice_Kopi_Banana,
            c.Ice_Cappucino,
            c.Ice_Vanila_Latte,
            c.v_drip,
            c.Tubruk_Susu,
            c.Kopi_Coklat,
            c.Kopi_Susu,
            c.Kopi_Tutup_Susu,
            c.Hot_Cappucino,
            c.Hot_Vanila_Latte,
            c.Espresso,
            c.Double_Espresso,
            c.Kopi_Hitam,
            c.Kopi_Tubruk,
            c.KSTG,
            c.Kopi_Tutup,
            c.Kopi_Espresso_Susu
        FROM users u
        LEFT JOIN Coffee c ON u.id = c.ID AND u.id = :id;

        ";

        $usersWithCoffee = DB::select($sqlQuery, ['id' => $id]);

        // Validate the request data
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'columnName' => 'required|string|in:Ice_Coffee_ori,Americano,Ice_Coffee_Hazel,Ice_Kopi_Vanilla,Ice_Kopi_Gula_Aren,Ice_Kopi_Banana,Ice_Cappucino,Ice_Vanila_Latte,v_drip,Tubruk_Susu,Kopi_Coklat,Kopi_Susu,Kopi_Tutup_Susu,Hot_Cappucino,Hot_Vanila_Latte,Espresso,Double_Espresso,Kopi_Hitam,Kopi_Tubruk,KSTG,Kopi_Tutup,Kopi_Espresso_Susu',
            'ID' => 'required|integer|exists:users,id'  // Menggunakan 'ID' sesuai dengan nama kolom di database
        ]);

        $columnName = $validatedData['columnName'];
        $rating = $validatedData['rating'];
        $coffeeId = $validatedData['ID'];  // Menggunakan 'ID' sesuai dengan nama kolom di database

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

}
