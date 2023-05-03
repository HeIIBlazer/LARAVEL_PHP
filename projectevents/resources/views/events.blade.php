@extends('layouts.appMain')

@section('content')
    <h1 class="text-center my-5 text-light" style="font-size: 46px;">All events list</h1>

    <div class="d-flex w-75 pt-2 mx-auto my-3 flex-row bd-highlight justify-content-center"
        style="flex-wrap: wrap; border-top: 2px solid #ffffff">
        @if (count($events) == 0)
            <h3 class="my-3">There is no events at the moment.</h3>
        @else
            @foreach ($events as $event)
                <div class="card bg-dark mx-3 my-2" style="width: 30rem; height: 450px">
                    <div class="cart-img-top w-100 h-50">
                        <img src="{{ asset('images/' . $event->image) }}" class="w-100 h-100" alt=""
                            style="object-fit: cover">
                    </div>
                    <div class="card-body h-50 pb-0 d-flex flex-wrap">
                        <h5 class="card-title w-100 h-20 text-capitalize text-light fw-bold">{{ $event->title }}</h5>
                        <h4 class="card-text text-light  w-100">Date: {{ Carbon\Carbon::parse($event->date_event)->format('d.m.Y') }}</h4>
                        <div class="btn_container d-flex mt-2 justify-content-end w-20 h-25">
                            <a href="{{ url('event/' . $event->id) }}" class="btn btn-primary bg-dark" style="height: fit-content;"> Read more </a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
