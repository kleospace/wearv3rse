<?php

namespace App\Http\Controllers;

use App\Models\Stylebook;
use Illuminate\Http\Request;

class StylebookController extends Controller
{
    // public landing (list)
    public function landing()
    {
        $latest = Stylebook::with('user')->latest()->paginate(12);
        return view('stylebooks.landing', compact('latest'));
    }

    // own stylebooks
    public function index()
    {
        $stylebooks = auth()->user()->stylebooks()->latest()->paginate(10);
        return view('stylebooks.index', compact('stylebooks'));
    }

    public function create()
    {
        return view('stylebooks.create');
    }

    public function store(Request $r)
    {
        $data = $r->validate([
            'title'       => ['required','string','max:255'],
            'description' => ['nullable','string'],
        ]);

        $sb = Stylebook::create([
            'user_id'     => auth()->id(),
            'title'       => $data['title'],
            'description' => $data['description'] ?? null,
        ]);

        return redirect()->route('stylebooks.show',$sb)->with('status','Stylebook erstellt.');
    }

    public function show(Stylebook $stylebook)
    {
        return view('stylebooks.show', compact('stylebook'));
    }

    public function edit(Stylebook $stylebook)
    {
        abort_unless($stylebook->user_id === auth()->id(), 403);
        return view('stylebooks.edit', compact('stylebook'));
    }

    public function update(Request $r, Stylebook $stylebook)
    {
        abort_unless($stylebook->user_id === auth()->id(), 403);

        $data = $r->validate([
            'title'       => ['required','string','max:255'],
            'description' => ['nullable','string'],
        ]);

        $stylebook->update($data);
        return redirect()->route('stylebooks.show',$stylebook)->with('status','Stylebook aktualisiert.');
    }

    public function destroy(Stylebook $stylebook)
    {
        abort_unless($stylebook->user_id === auth()->id(), 403);
        $stylebook->delete();
        return redirect()->route('stylebooks.index')->with('status','Stylebook gelöscht.');
    }
}
