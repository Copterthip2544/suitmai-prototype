<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\Ingredient;

class AdminController extends Controller
{
    public function setupAdmin()
    {
        $admin = User::where('email', 'admin1@gmail.com')->first();

        if (!$admin) {
            $user = new User;
            $user->name = 'Admin1';
            $user->email = 'admin1@gmail.com';
            $user->password = Hash::make('admin123'); // แทนที่ด้วยรหัสผ่านที่คุณต้องการ
            $user->role_id = 1; // 1 คือ ID ของบทบาท "admin"
            $user->save();
            
            return "Admin account created!";
        } else {
            return "Admin account already exists.";
        }
    }

    public function index()
    {
        return view('admin.admintest');
    }

    public function showDashboard()
    {
        return view('admin.admin');
    }

    public function addIngredient(Request $request)
    {
        // Validate the form data
        $request->validate([
            'ingredientName' => 'required',
            'price' => 'required|numeric',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Save the ingredient to the database
        $ingredient = new Ingredient();
        $ingredient->name = $request->input('ingredientName');
        $ingredient->price = $request->input('price');

        // Handle image upload
        $imagePath = $request->file('photo')->store('ingredients', 'public');
        $ingredient->photo = $imagePath;

        $ingredient->save();

        return redirect()->back()->with('success', 'Ingredient added successfully');
    }

}

