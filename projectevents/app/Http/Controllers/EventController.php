<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use App\Models\Register_event;
use Carbon\Carbon;

class EventController extends Controller
{
    public function listLimit()
    {
        $events = Event::orderBy('date_event', 'desc')->take(3)->get();
        return view('startMainPage', compact('events'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::orderBy('date_event', 'desc')->get();
        return view('events.index', compact('events'));
    }

    public function registration(Event $event)
    {
        return view('events.register', compact('event'));
    }
    public function register(Request $request, Event $event)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:255',
            'group_name' => 'required|string|max:255',
            'members_number' => 'required|numeric|max:4',
        ]);
        Register_event::create([
            'contact_person' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'group_name' => $request->group_name,
            'number_members' => $request->members_number,
            'events_id' => rtrim($event->id),
        ]);
        return view('events.registerResult', compact('event', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }
    public function allEvents(Request $request)
    {
        // SEARCH FUNCTION
        if ($request->input('search') != null) {
            $search = $request->input('search');
            $events = Event::orderBy('date_event', 'DESC')
            ->where('title', 'like', '%' . $search . '%')
                ->get();
        }

        // ALL EVENTS RENDER
        else {
            $events = Event::orderBy('date_event', 'desc')->get();
        }
        // GET ALL USED MONTHS BY EVENTS
        return view('events', compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date_event' => 'required',
            'aadress' => 'required',
        ]);
        $data = $request->all(); //данные, переданы формой
        $filename = $request->file('image')->getClientOriginalName(); //имя файла картинки
        $data['image'] = $filename; // записали имя файла для бд
        Event::create($data); //добавили данные базу(INSERT)
        //*------------------ закачка картинки root/images/
        $file = $request->file('image'); //путь исходной картинки
        if ($filename) {
            $file->move('../public/images/', $filename); //загрузка изоброжения
        }
        return redirect('/eventlist'); //возврат к списку мероприятий

    }
    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('Events.detail', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date_event' => 'required',
            'aadress' => 'required',
        ]);

        $data = $request->all(); //данные, переданы формой
        if ($request->file('image')) {
            $filename = $request->file('image')->getClientOriginalName(); //имя файла картинки
            $data['image'] = $filename; // записали имя файла для бд
        }
        //*------------------ закачка картинки root/images/
        $file = $request->file('image'); //путь исходной картинки
        if ($filename) {
            $file->move('../public/images/', $filename); //загрузка изобрaжения
        }
        $event->update($data); //update data
        return redirect('/eventlist'); //возврат к списку мероприятий
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect('/eventlist');
    }
}