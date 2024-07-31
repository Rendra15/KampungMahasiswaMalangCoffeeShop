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
            CASE WHEN u.name IS NULL THEN NULL ELSE c.Ice_Coffee_ori END AS Ice_Coffee_ori,
            CASE WHEN u.name IS NULL THEN NULL ELSE c.Americano END AS Americano,
            CASE WHEN u.name IS NULL THEN NULL ELSE c.Ice_Coffee_Hazel END AS Ice_Coffee_Hazel,
            CASE WHEN u.name IS NULL THEN NULL ELSE c.Ice_Kopi_Vanilla END AS Ice_Kopi_Vanilla,
            CASE WHEN u.name IS NULL THEN NULL ELSE c.Ice_Kopi_Gula_Aren END AS Ice_Kopi_Gula_Aren,
            CASE WHEN u.name IS NULL THEN NULL ELSE c.Ice_Kopi_Banana END AS Ice_Kopi_Banana,
            CASE WHEN u.name IS NULL THEN NULL ELSE c.Ice_Cappucino END AS Ice_Cappucino,
            CASE WHEN u.name IS NULL THEN NULL ELSE c.Ice_Vanila_Latte END AS Ice_Vanila_Latte,
            CASE WHEN u.name IS NULL THEN NULL ELSE c.v_drip END AS v_drip,
            CASE WHEN u.name IS NULL THEN NULL ELSE c.Tubruk_Susu END AS Tubruk_Susu,
            CASE WHEN u.name IS NULL THEN NULL ELSE c.Kopi_Coklat END AS Kopi_Coklat,
            CASE WHEN u.name IS NULL THEN NULL ELSE c.Kopi_Susu END AS Kopi_Susu,
            CASE WHEN u.name IS NULL THEN NULL ELSE c.Kopi_Tutup_Susu END AS Kopi_Tutup_Susu,
            CASE WHEN u.name IS NULL THEN NULL ELSE c.Hot_Cappucino END AS Hot_Cappucino,
            CASE WHEN u.name IS NULL THEN NULL ELSE c.Hot_Vanila_Latte END AS Hot_Vanila_Latte,
            CASE WHEN u.name IS NULL THEN NULL ELSE c.Espresso END AS Espresso,
            CASE WHEN u.name IS NULL THEN NULL ELSE c.Double_Espresso END AS Double_Espresso,
            CASE WHEN u.name IS NULL THEN NULL ELSE c.Kopi_Hitam END AS Kopi_Hitam,
            CASE WHEN u.name IS NULL THEN NULL ELSE c.Kopi_Tubruk END AS Kopi_Tubruk,
            CASE WHEN u.name IS NULL THEN NULL ELSE c.KSTG END AS KSTG,
            CASE WHEN u.name IS NULL THEN NULL ELSE c.Kopi_Tutup END AS Kopi_Tutup,
            CASE WHEN u.name IS NULL THEN NULL ELSE c.Kopi_Espresso_Susu END AS Kopi_Espresso_Susu
        FROM users u
        LEFT JOIN Coffee c ON u.id = c.ID;
        
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
