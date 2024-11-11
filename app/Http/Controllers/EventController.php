<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        // Retorne uma lista de eventos, por exemplo:
        $events = Event::all();
        return view('eventos.index', compact('events'));
    }

    // Outros métodos do EventController, como store, create, etc.
}
