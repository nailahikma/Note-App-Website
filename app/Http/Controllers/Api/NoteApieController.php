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

    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $note = Note::where('id', $id)->first();

        if (!$note) {
            return MessageHelper::error(false, 'Data Not Found');
        }

        Storage::delete($note->image);
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
