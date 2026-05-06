<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::where('is_custom', false)->orWhere('user_id', Auth::id())->get();

        return view('type.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'color' => ['nullable', 'string'],
        ]);

        Type::create([
            'name' => $validated['name'],
            'color' => $validated['color'] ?? '#ffffff',
            'user_id' => Auth::id(),
            'is_custom' => true,
        ]);

        return to_route('types.index')->with('success', 'Type created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        if ($type->user_id !== Auth::id())
        {
            abort(403);
        }

        return view('type.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        if ($type->user_id !== Auth::id())
        {
            abort(403);
        }
        
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'color' => ['nullable', 'string'],
        ]);

        $type->update([
            'name' => $validated['name'],
            'color' => $validated['color'] ?? '#ffffff',
        ]);

        return to_route('types.index')->with('success', 'Type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        if (! $type->is_custom || $type->user_id !== Auth::id())
        {
            abort(403);
        }

        $type->delete();

        return to_route('types.index')->with('success', 'Type deleted successfully.');
    }
}
