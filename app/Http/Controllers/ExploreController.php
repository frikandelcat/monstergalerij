<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ExploreController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', Auth::id())->get();

        return view('explore.index', compact('users'));
    }

    public function monsters()
    {
        // $monsters =

        return view('explore.monsters');
    }

    public function show()
    {

    }
}
