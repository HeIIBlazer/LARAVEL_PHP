@extends('layouts.appMain')

@section('content')

    <h1 class="text-center text-light my-5">Registeration was successfull</h1>
    <div class="card bg-dark w-75" style="margin: 30px auto; max-width: 900px">
        <img src="{{ asset('images/' . $event->image) }}" class="w-100 h-100" alt="" style="object-fit: cover">
        <div class="card-body bg-dark text-light">
            <p class="card-text" style="font-size: 18px;"><b>Description: </b>{{ $event->description }}</p>
            <p class="card-text" style="font-size: 18px;">
                <b>Event date:</b> {{ Carbon\Carbon::parse($event->date_event)->format('d.m.Y') }}
            </p>
            <p class="card-text fs-5" style="font-size: 18px;">
                <b>Address:</b> {{ $event->aadress }}
            </p>
            
            <p class="card-text text-center border-top pt-2">
                You have been registered to the following event: <br>
                Group: {{ $request->group_name }} <br>
                Members: {{ $request->members_number }}
            </p>
            <div class="d-flex justify-content-center">
                <a href="/" class="btn btn-primary ml-3 mt-3">Back to events</a>
            </div>
        </div>
    </div>
@endsection
