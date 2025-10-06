<?php

namespace App\Http\Controllers;

use App\Models\Stylebook;
use Illuminate\Http\Request;

class StylebookController extends Controller
{
    /**
     * Öffentliche Landing-Page: zeigt die neuesten Stylebooks (für /stylebooks).
     * Route: GET /stylebooks  -> name: stylebooks.landing
     */
    public function landing()
    {
        // Neueste Stylebooks (öffentlich), mit Autor
        $latest = Stylebook::with('user')
            ->latest()
            ->paginate(12);

        return view('stylebooks.landing', compact('latest'));
    }

    /**
     * Liste der eigenen Stylebooks (nur eingeloggt).
     * Route: GET /stylebooks (falls als Resource in auth-Gruppe registriert)
     */
    public function index()
    {
        $stylebooks = auth()->user()
            ->stylebooks()
            ->latest()
            ->paginate(10);

        return view('stylebooks.index', compact('stylebooks'));
    }

    /**
     * Formular zum Erstellen.
     * Route: GET /stylebooks/create
     */
    public function create()
    {
        return view('stylebooks.create');
    }

    /**
     * Speichern eines neuen Stylebooks (mit Validierung).
     * Route: POST /stylebooks
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ]);

        $stylebook = Stylebook::create([
            'user_id'     => auth()->id(),
            'title'       => $validated['title'],
            'description' => $validated['description'] ?? null,
        ]);

        return redirect()
            ->route('stylebooks.show', $stylebook)
            ->with('status', 'Stylebook erstellt!');
    }

    /**
     * Detailansicht.
     * Route: GET /stylebooks/{stylebook}
     */
    public function show(Stylebook $stylebook)
    {
        // Falls du später Artikel/Kommentare lädst:
        // $stylebook->load('articles.user', 'comments.user');

        return view('stylebooks.show', compact('stylebook'));
    }

    /**
     * Formular zum Bearbeiten (nur Besitzer).
     * Route: GET /stylebooks/{stylebook}/edit
     */
    public function edit(Stylebook $stylebook)
    {
        abort_unless($stylebook->user_id === auth()->id(), 403);

        return view('stylebooks.edit', compact('stylebook'));
    }

    /**
     * Update (mit Validierung; nur Besitzer).
     * Route: PUT/PATCH /stylebooks/{stylebook}
     */
    public function update(Request $request, Stylebook $stylebook)
    {
        abort_unless($stylebook->user_id === auth()->id(), 403);

        $validated = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ]);

        $stylebook->update($validated);

        return redirect()
            ->route('stylebooks.show', $stylebook)
            ->with('status', 'Stylebook aktualisiert!');
    }

    /**
     * Löschen (nur Besitzer).
     * Route: DELETE /stylebooks/{stylebook}
     */
    public function destroy(Stylebook $stylebook)
    {
        abort_unless($stylebook->user_id === auth()->id(), 403);

        $stylebook->delete();

        return redirect()
            ->route('stylebooks.index')
            ->with('status', 'Stylebook gelöscht!');
    }
}
