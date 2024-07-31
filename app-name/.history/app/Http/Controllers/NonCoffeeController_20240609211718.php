<?php

namespace App\Http\Controllers;

use App\Models\NonCoffee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NonCoffeeController extends Controller
{
    public function storeRating(Request $request, $id)
    {
        // Log the incoming request for debugging
        Log::info('Received rating request', ['id' => $id, 'data' => $request->all()]);

        // Validate the request data
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'columnName' => 'required|string|in:Strawberry_Milkshake,Chocolate_Milkshake,Vanilla_Milkshake,Avocado_Durian,Soda_Gembira,Es_Milo_Susu,Extrajoss_Susu,Es_Susu,Es_Milo,Ice_Greentea,Ice_Red_Velvet,Ice_Chocolate,Ice_Thai_Tea,Kombucha,Ice_Taro,Ice_Tea,STMJ,Jahe,Jahe_Susu,Jahe_Gula_Aren,Wedang_Uwuh,Milo,Teh_Panas,Lemontea,Greentea,RedVelvet,Chocolate,Thai_Tea,Taro,Jeruk_Hangat,Susu_Milo,Susu_Putih',
            'ID' => 'required|integer|exists:users,id'  // Menggunakan 'ID' sesuai dengan nama kolom di database
        ]);

        $columnName = $validatedData['columnName'];
        $rating = $validatedData['rating'];
        $noncoffeeId = $validatedData['ID'];  // Menggunakan 'ID' sesuai dengan nama kolom di database

        try {
            // Find the Noncoffee item by ID
            $noncoffee = Noncoffee::findOrFail($noncoffeeId);

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
