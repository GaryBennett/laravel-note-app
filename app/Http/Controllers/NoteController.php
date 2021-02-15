<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(User $user)
    {
        $notes = Note::latest()->paginate(5);

        return view('notes.notes', [
            'page_title' => "Notes - MakeItAll",
            'notes' => $notes,
            'user' => $user,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required',
        ]);

        $request->user()->notes()->create([
            'body' => $request->body,
        ]);

        return back();
    }

    public function destroy(Note $note)
    {
        $this->authorize('delete', $note);
        $note->delete();
        return back();
    }
}
