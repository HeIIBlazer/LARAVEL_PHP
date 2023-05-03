@extends('layouts.appMain')

@section('content')
<div class=" text-center text-light">
    <h1>Event Title: {{ $event->title }}</h1>
</div>
<div class="d-flex flex-row w-100 h-100 justify-content-center align-items-center my-5">
    <div class="mx-3 w-50 h-100 text-right">
        <img class=" w-50 h-50" src="{{ asset('images/' . $event->image) }}" alt="">
    </div>
    <div class="text-light w-50 h-100 d-flex text-left align-middle flex-column">
        <div class="w-50 d-flex justify-content-center flex-column">
            <div>
                <h3>Description:</h3>
            </div>
            <div>
                <h5>{{ $event->description}}</h5>
            </div>
        </div>
        <div>
            <div class="font-italic">
                <p><b>Date: </b>{{ Carbon\Carbon::parse($event->date_event)->format('d.m.Y') }}</p>
            </div>
            <div class="font-italic">
                <p><b>Address: </b> {{$event->aadress}}</p>
            </div>
        </div>
    </div>
</div>
<div class="d-flex justify-content-center"> 
    <div class="mx-5">
        <a href="/" class="btn btn-primary absolute-top ml-3 mt-3">Back to events</a>
    </div>
    <div class="mx-5">
        <a href="/event/{{ $event->id }}/register" class="btn btn-success w-75"style="text-decoration: none; color: #fff;">Register for this event</a>
    </div>
</div>
@endsection
