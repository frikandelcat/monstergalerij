<?php

namespace App\Http\Controllers;

use App\Models\Move;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MoveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $moves = Move::with('type')->where('is_custom', false)->orWhere('user_id', Auth::id())->get();

        return view('moves.index', compact('moves'));
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

        return view('moves.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'power' => ['nullable', 'integer', 'min:0', 'max:300'],
            'accuracy' => ['nullable', 'integer', 'min:0', 'max:100'],
            'move_class' => ['nullable', 'in:physical,special,support'],
            'pp' => ['nullable', 'integer', 'min:0', 'max:100'],
            'type_id' => ['required', 'exists:types,id'],
        ]);

        $power = $validated['power'] ?? null;

        if (($validated['move_class'] ?? null) === 'support')
        {
            $power = null;
        }

        Move::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'power' => $power,
            'accuracy' => $validated['accuracy'] ?? null,
            'move_class' => $validated['move_class'] ?? null,
            'pp' => $validated['pp'] ?? null,
            'type_id' => $validated['type_id'],
            'user_id' => Auth::id(),
            'is_custom' => true,
        ]);

        return to_route('moves.index')->with('success', 'Move created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Move $move)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Move $move)
    {
        if (! $move->is_custom || $move->user_id !== Auth::id())
        {
            abort(403);
        }

        $types = Type::where('is_custom', false)
            ->orWhere('user_id', Auth::id())
            ->orderBy('name')
            ->get();

        return view('moves.edit', compact('move', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Move $move)
    {
        if (! $move->is_custom || $move->user_id !== Auth::id())
        {
            abort(403);
        }

        $validated = $request->validate([
            'name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'power' => ['nullable', 'integer', 'min:0', 'max:300'],
            'accuracy' => ['nullable', 'integer', 'min:0', 'max:100'],
            'move_class' => ['nullable', 'in:physical,special,support'],
            'pp' => ['nullable', 'integer', 'min:0', 'max:100'],
            'type_id' => ['required', 'exists:types,id'],
        ]);

        $power = $validated['power'] ?? null;

        if (($validated['move_class'] ?? null) === 'support')
        {
            $power = null;
        }

        $move->update([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'power' => $power,
            'accuracy' => $validated['accuracy'] ?? null,
            'move_class' => $validated['move_class'] ?? null,
            'pp' => $validated['pp'] ?? null,
            'type_id' => $validated['type_id'],
        ]);

        return to_route('moves.index')->with('success', 'Move updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Move $move)
    {
        if (! $move->is_custom || $move->user_id !== Auth::id())
        {
            abort(403);
        }

        $move->delete();

        return to_route('moves.index')->with('success', 'Move deleted successfully.');
    }
}
