<?php

namespace App\Http\Controllers;

use App\Models\Patron;
use Illuminate\Http\Request;

class PatronController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patrons = Patron::orderBy('approved', 'desc')->orderBy('name')->paginate(10);
        return view('patrons.index', compact('patrons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:patrons,email'],
            'message' => ['nullable', 'string', 'max:1000'],
        ]);

        Patron::create($validated);

        return redirect()->route('patron.request.thanks');
    }

    /**
     * Display the specified resource.
     */
    public function show(Patron $patron)
    {
        return view('patrons.show', compact('patron'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Approve a patron (owner).
     */
    public function approve(Patron $patron)
    {
        $patron->update(['approved' => true]);
        return redirect()->route('patrons.index')->with('success', 'Patron approved successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patron $patron)
    {
        $patron->delete();
        return redirect()->route('patrons.index')->with('success', 'Patron removed.');
    }
}
