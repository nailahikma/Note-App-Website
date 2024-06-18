<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $notes = Note::where('user_id', Auth::id())->get();

        return view('page.note.notes', compact('user', 'notes'));
    }

    public function tutorial()
    {
        $notes = Note::all();
        return view('page.note.tutorial', compact('notes'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            // 'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        // if ($request->hasFile('image')) {
        //     $validatedData['image'] = $request->file('image')->store('image-notes');
        // }

        $validatedData['user_id'] = Auth::id();

        Note::create($validatedData);

        return redirect()->back();
    }
    
    public function update(Request $request, $id)
    {
        $note = Note::findOrFail($id);
        $note->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $note = Note::findOrFail($id);
        $note->delete();

        return redirect()->back();
    }

    public function destroyAll()
    {
        Note::where('user_id', Auth::id())->delete();

        return redirect()->route('notes.index');
    }
}
