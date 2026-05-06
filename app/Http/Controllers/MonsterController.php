<?php

namespace App\Http\Controllers;

use App\Models\Monster;
use App\Models\Move;
use App\Models\Type;
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
        $monsters = Monster::where('user_id', Auth::id())->get();

        return view('monster.index', compact('monsters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::where('is_custom', false)
            ->orWhere('user_id', Auth::id())
            ->orderBy('name')
            ->get();
        $moves = Move::orderBy('name')->get();
        
        return view('monster.create', compact('types', 'moves'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['nullable', 'image'],
            'name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'primary_type_id' => ['nullable', 'exists:types,id'],
            'secondary_type_id' => ['nullable', 'exists:types,id', 'different:primary_type_id'],
            'move_1_id' => ['nullable', 'exists:moves,id'],
            'move_2_id' => ['nullable', 'exists:moves,id', 'different:move_1_id'],
            'move_3_id' => ['nullable', 'exists:moves,id', 'different:move_1_id', 'different:move_2_id'],
            'move_4_id' => ['nullable', 'exists:moves,id', 'different:move_1_id', 'different:move_2_id', 'different:move_3_id'],
        ]);

        $monster = new Monster();

        if ($request->hasFile('image'))
        {
            $path = $request->file('image')->store('monsters', 'public');
            $imageUrl = Storage::url($path);
            $monster->image = $imageUrl;
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

        $selectedTypeIds = array_filter([
            $request->input('primary_type_id'),
            $request->input('secondary_type_id'),
        ]);

        $monster->types()->sync(array_unique($selectedTypeIds));

        $selectedMoveIds = array_filter([
            $request->input('move_1_id'),
            $request->input('move_2_id'),
            $request->input('move_3_id'),
            $request->input('move_4_id'),
        ]);

        $monster->moves()->sync(array_unique($selectedMoveIds));

        return to_route('monsters.index')->with('success', 'Monster created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Monster $monster)
    {
        if ($monster->user_id !== Auth::id())
        {
            abort(403);
        }

        $monster->load(['types', 'moves']);

        return view('monster.show', compact('monster'));
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

        $types = Type::where('is_custom', false)
            ->orWhere('user_id', Auth::id())
            ->orderBy('name')
            ->get();
        $moves = Move::orderBy('name')->get();

        return view('monster.edit', compact('monster', 'types', 'moves'));
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
            'image' => ['nullable', 'image'],
            'name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'primary_type_id' => ['nullable', 'exists:types,id'],
            'secondary_type_id' => ['nullable', 'exists:types,id', 'different:primary_type_id'],
            'move_1_id' => ['nullable', 'exists:moves,id'],
            'move_2_id' => ['nullable', 'exists:moves,id', 'different:move_1_id'],
            'move_3_id' => ['nullable', 'exists:moves,id', 'different:move_1_id', 'different:move_2_id'],
            'move_4_id' => ['nullable', 'exists:moves,id', 'different:move_1_id', 'different:move_2_id', 'different:move_3_id'],
        ]);

        if ($request->hasFile('image'))
        {
            $path = $request->file('image')->store('monsters', 'public');
            $imageUrl = Storage::url($path);
            $monster->image = $imageUrl;
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

        $selectedTypeIds = array_filter([
            $request->input('primary_type_id'),
            $request->input('secondary_type_id'),
        ]);

        $monster->types()->sync(array_unique($selectedTypeIds));

        $selectedMoveIds = array_filter([
            $request->input('move_1_id'),
            $request->input('move_2_id'),
            $request->input('move_3_id'),
            $request->input('move_4_id'),
        ]);

        $monster->moves()->sync(array_unique($selectedMoveIds));

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
