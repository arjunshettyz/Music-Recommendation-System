<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MusicController extends Controller
{
    public function index()
    {
        $songs = [
            ['title' => 'Blinding Lights', 'artist' => 'The Weeknd'],
            ['title' => 'As It Was', 'artist' => 'Harry Styles'],
            ['title' => 'Levitating', 'artist' => 'Dua Lipa'],
        ];

        return view('music.index', compact('songs'));
    }
}

?>