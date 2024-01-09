<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingredient;

class IngredientsController extends Controller
{
    // public function index()
    // {
    //     $ingredients = Ingredient::all();

    //     return view('ingredients.index', compact('ingredients'));
    // }

    // public function create()
    // {
    //     return view('ingredients.create');
    // }

    // public function store(Request $request)
    // {
    //     $this->validate($request, [
    //         'name' => 'required|string',
    //         'price' => 'required|numeric',
    //         'photo' => 'required|image',
    //     ]);

    //     $ingredient = new Ingredient();
    //     $ingredient->name = $request->input('name');
    //     $ingredient->price = $request->input('price');
    //     $ingredient->image = $request->file('iphoto')->store('ingredients');

    //     if ($request->hasFile('photo')) {
    //         $ingredient->photo = $request->file('photo')->store('ingredients');
    //     }
    
    //     if ($ingredient->save()) {
    //         return redirect()->route('ingredients.index')->with('success', 'บันทึกข้อมูลสำเร็จ');
    //     } else {
    //         return redirect()->back()->with('error', 'บันทึกข้อมูลไม่สำเร็จ');
    //     }
    // }
    public function index()
    {
        $ingredients = Ingredient::all();
        dd($ingredients);
        return view('admintest', ['ingredients' => $ingredients]);
    }
}
