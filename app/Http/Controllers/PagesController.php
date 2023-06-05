<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pages;
use App\Models\User;
class PagesController extends Controller
{
    //
    public function index()
    {
        // Retrieve the data you want to display
        $users = User::all(); // Assuming you have a User model
        
        // Pass the data to the view
        return view('users.index', ['users' => $users]);
    }
}
