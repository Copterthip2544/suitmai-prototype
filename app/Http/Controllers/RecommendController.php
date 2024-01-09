<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recommend;

class RecommendController extends Controller
{
    public function addRecommend(Request $request)
    {
        // Handle the request and add the recommend menu to the database
        // Example: Assuming you have a Recommend model with fields like 'name', 'description'
        $recommend = new Recommend();
        $recommend->name = $request->input('name'); // Adjust accordingly
        $recommend->description = $request->input('description'); // Adjust accordingly
        $recommend->save();

        return response()->json(['message' => 'Recommend menu added successfully']);
    }
}
