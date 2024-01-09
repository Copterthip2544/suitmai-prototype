<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function dashboard()
    {
        return view('Home');
    }

    public function index()
    {
        $users = User::all(); // Fetch all users (adjust the query as needed)
        return view('admin.usermanage', ['users' => $users]);
    }

    public function destroy(User $user)
    {
    // Perform the deletion logic here
    $user->delete();

    // Optionally, you can redirect to a different page after deletion
    return redirect()->route('user.index')->with('success', 'User deleted successfully');
    }

}
