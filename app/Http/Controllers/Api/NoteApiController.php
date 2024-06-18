<?php

namespace App\Http\Controllers\Api;

use App\Helpers\MessageHelper;
use App\Http\Controllers\Controller;
use App\Models\Note;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NoteApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $note = Note::orderBy('id', 'asc')->get();
        return response()->json([
            'success' => true,
            'message' => 'List Data Notes',
            'data' => $note
        ], 200);
    }

    // app/Http/Controllers/NoteController.php

    public function getNotesByUser($userId)
    {
        // Validasi jika diperlukan
        // $user = User::find($userId);
        // if (!$user) {
        //     return response()->json(['success' => false, 'message' => 'User not found'], 404);
        // }

        $notes = Note::where('user_id', $userId)->get();

        return response()->json(['success' => true, 'data' => $notes]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'content' => 'required|min:5',
        ]);

        // $filename = time() . '.' . $request->image->extension();
        // $request->image->storeAs('public/notes', $filename);
        $note = Note::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'content' => $request->content,
        ]);

        if ($note) {
            return response()->json([
                'success' => true,
                'message' => 'Note Created',
                'data' => $note
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Note Failed to Save',
            ], 409);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $note = Note::findOrFail($id);

        $note->title = $request->input('title');
        $note->content = $request->input('content');
        $note->save();

        return response()->json([
            'status' => true,
            'message' => 'Note updated successfully',
            'data' => $note
        ]);
    }
    public function edit(Request $request, $id)
    {
        $note = Note::findOrFail($id);
        $note->update([
            'title' => $request->title,
            'content' => $request->content,
            'updateAt' => $request->updateAt,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Note updated successfully',
            'data' => $note
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $note = Note::find($id);

        if (!$note) {
            return MessageHelper::error(false, 'Data Not Found');
        }

        Storage::delete($note->image);
        $note->delete();
        return MessageHelper::error(true, 'Success Delete Data');
    }
    public function parameters()
    {
        return [
            'notes' => 'id', // Mengubah pola parameter untuk endpoint /api/notes/{note_id}
        ];
    }

    public function delete($id)
    {
        $note = Note::findOrFail($id);

        if (!$note) {
            return MessageHelper::error(false, 'Data Not Found');
        }

        // Storage::delete($note->image);
        $note->delete();
        return MessageHelper::error(true, 'Success Delete Data');
    }

    public function format($note)
    {

        return [
            'id' => $note->id,
            'title' => $note->title,
            'content' => $note->content,
            'image' => $note->image,
            'tanggal_note' => Carbon::parse($note->created_at)->translatedFormat('d F Y'),
        ];
    }

    public function respons($note)
    {
        return response()->json([
            'status' => true,
            'data' => $note,
        ], 200);
    }

    public function errorStatus($status, $message)
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
        ], 200);
    }
}
