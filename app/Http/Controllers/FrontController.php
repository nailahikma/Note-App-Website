<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function home()
    {
        $user = Auth::user();
        $notes = Note::all();
        return view('page.main', compact('notes', 'user'));
    }
    public function about()
    {
        $user = Auth::user();
        return view('page.about', compact('user'));
    }
    public function contact()
    {
        $user = Auth::user();
        return view('page.contact', compact('user'));
    }
}
