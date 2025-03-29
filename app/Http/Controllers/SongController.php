<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SongController extends Controller
{
    // Afficher la liste des chansons
    public function index()
    {
        $songs = Song::all();
        return Inertia::render('Songs/Index', [
            'songs' => $songs
        ]);
    }

    // Afficher le formulaire de création d'une chanson
    public function create()
    {
        return Inertia::render('Songs/Create');
    }

    // Enregistrer une nouvelle chanson
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'album' => 'nullable|string|max:255',
            'duration' => 'nullable|integer',
            'file_path' => 'required|string',
        ]);

        Song::create($request->only(['title', 'artist', 'album', 'duration', 'file_path']));

        return redirect()->route('songs.index');
    }

    // Afficher les détails d'une chanson
    public function show(Song $song)
    {
        return Inertia::render('Songs/Show', [
            'song' => $song
        ]);
    }

    // Afficher le formulaire de modification d'une chanson
    public function edit(Song $song)
    {
        return Inertia::render('Songs/Edit', [
            'song' => $song
        ]);
    }

    // Mettre à jour une chanson
    public function update(Request $request, Song $song)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'album' => 'nullable|string|max:255',
            'duration' => 'nullable|integer',
            'file_path' => 'required|string',
        ]);

        $song->update($request->only(['title', 'artist', 'album', 'duration', 'file_path']));

        return redirect()->route('songs.index');
    }

    // Supprimer une chanson
    public function destroy(Song $song)
    {
        $song->delete();

        return redirect()->route('songs.index');
    }
}
