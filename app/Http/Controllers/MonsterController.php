<?php

namespace App\Http\Controllers;

use App\Models\Monster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class MonsterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $monsters = Monster::all();

        return view('monster.index', compact('monsters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('monster.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['nullable', 'image'],
            'name' => ['required', 'string'],
            'description' => ['nullable', 'string']
        ]);

        $monster = new Monster();

        if ($request->hasFile('image'))
        {
            $path = $request->file('image')->store('monsters', 'public');
            $imageUrl = Storage::url($path);
            $monster->image = $imageUrl;
        } else
        {
            $monster->image = null;
        }

        $monster->name = $request->name;

        if ($request->description)
        {
            $monster->description = $request->description;
        } else
        {
            $monster->description = null;
        }

        $monster->user_id = Auth::id();
        $monster->save();

        return to_route('monsters.index')->with('success', 'Monster created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Monster $monster)
    {
        // uitbreiding wanneer ik types/moves aanmaak
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Monster $monster)
    {
        if ($monster->user_id !== Auth::id())
        {
            abort(403);
        }

        return view('monster.edit', compact('monster'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Monster $monster)
    {
        if ($monster->user_id !== Auth::id())
        {
            abort(403);
        }

        $request->validate([
        'image' => 'nullable',
        'name' => 'required',
        'description' => 'nullable'
        ]);

        if ($request->hasFile('image'))
        {
            $path = $request->file('image')->store('monsters', 'public');
            $imageUrl = Storage::url($path);
            $monster->image = $imageUrl;
        } else
        {
            $monster->image = null;
        }

        $monster->name = $request->name;

        if ($request->description)
        {
            $monster->description = $request->description;
        } else
        {
            $monster->description = null;
        }

        $monster->save();

        return to_route('monsters.index', $monster)->with('success', 'Monster updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Monster $monster)
    {
        if ($monster->user_id !== Auth::id())
        {
            abort(403);
        }

        $monster->delete();

        return to_route('monsters.index')->with('success', 'Monster deleted successfully.');
    }
}
