<?php

namespace App\Http\Controllers;

use App\Models\Patron;
use Illuminate\Http\Request;

class PatronController extends Controller
{
    // Show the public patron request form
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

    // Show list of patrons in owner view
    public function index()
    {
        $patrons = Patron::orderByDesc('created_at')->paginate(10);
        return view('patrons.index', compact('patrons'));
    }

    // Owner create form
    public function create()
    {
        return view('patrons.create');
    }

    // Owner-created patron (defaults to approved)
    public function storeFromOwner(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:patrons,email'],
            'message' => ['nullable', 'string', 'max:1000'],
            'approved' => ['sometimes', 'boolean'],
        ]);

        $validated['approved'] = $validated['approved'] ?? true;

        Patron::create($validated);

        return redirect()->route('patrons.index')->with('success', 'Patron created.');
    }

    // Show details of one patron
    public function show(Patron $patron)
    {
        return view('patrons.show', compact('patron'));
    }

    // Approve a pending patron
    public function approve(Patron $patron)
    {
        $patron->update(['approved' => true]);
        return redirect()->route('patrons.index')->with('success', 'Patron approved.');
    }

    // Delete a patron
    public function destroy(Patron $patron)
    {
        if ($patron->borrowings()->exists()) {
            return redirect()->route('patrons.index')
                ->with('error', 'Cannot delete a patron with active borrowings.');
        }

        $patron->delete();
        return redirect()->route('patrons.index')->with('success', 'Patron removed.');
    }
}
