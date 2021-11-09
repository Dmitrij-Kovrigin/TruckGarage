@extends('layouts/app')

@section('content')

<div class="container background-black">
    <div class="card-header">
        <span style="color:white">
            <h1>All trucks</h1>
        </span>


        <div class="front-sort mt-2">
            <form action="{{route('trucks')}}" method="get">
                <div class="form-group">
                    <label style="color:white">Sort Trucks by:</label>

                    <select class="form-control" name="sort">
                        <option value="0">Select here</option>
                        <option value="by_maker" @if ('by_maker'==$select) selected @endif>Maker</option>
                        <option value="by_year" @if ('by_year'==$select) selected @endif>Year of production</option>
                        <option value="by_mechanic" @if ('by_mechanic'==$select) selected @endif>Mechanic's name</option>
                    </select>
                    <button type="submit" class="btn btn-primary mt-2">Sort</button>
                    <a href="{{route('trucks')}}" class="btn btn-secondary mt-2">Reset</a>
                </div>
            </form>
        </div>
    </div>



    {{--
    <form class="form-group mb-3" action="{{route('trucks')}}" method="get">


    <select class="form-select form-select-sm" name="sort">
        <option value="0">Select here</option>
        <option value="by_name">By name</option>
        <option value="by_year">By production year</option>
        <option value="by_mechanic">By mechanic's name</option>
    </select>
    <button type="submit" class="btn btn-primary mb-3">Filter</button>
    </form> --}}

    @foreach($trucks as $truck)

    <div class="card ml-5 mt-4" style="width: 18rem;display:inline-block;">

        <div class="card-body ">
            <h5 class="card-title">Maker: <b>{{$truck->maker}}</b></h5>
            <img class="truck_image" src="{{$truck->image}}">
            <p class="card-text">Plate: {{$truck->plate}}</p>
            <p class="card-text">Production year: {{$truck->make_year}}</p>
            <p class="card-text"> Mechanic: {{$truck->getMechanic->name}} {{$truck->getMechanic->surname}}</p>
            <p class="card-text">Notices in details... </p>
            <a href="{{route('truck_show', $truck)}}" class="btn btn-primary" name="truck_details">Details</a>
        </div>
    </div>
    @endforeach

</div>

@endsection
