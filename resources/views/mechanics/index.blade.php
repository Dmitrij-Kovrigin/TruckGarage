@extends('layouts/app')

@section('content')

<div class="container background-black">



    @foreach($mechanics as $mechanic)

    <div class="card ml-5 mt-4" style="width: 18rem;display:inline-block;">
        <div class="card-body ">
            <h5 class="card-title">Name: <b>{{$mechanic->name}}</b></h5>
            <p class="card-text">Surname: {{$mechanic->surname}}</p>
            <p class="card-text">Trucks prescribed: {{$mechanic->getTrucks->count()}}</p>

            <a href="{{route('mechanic_show', $mechanic)}}" class="btn btn-primary" name="mechanic_details">More about employeer</a>


            {{-- <a href="{{route('mechanic_show', $mechanic)}}" class="btn btn-primary" name="mechanic_details">Details</a> --}}
        </div>
    </div>
    @endforeach

    {{-- @foreach($trucks as $truck)

    <div> Manufacturer: {{$truck->maker}}, Plate: {{$truck->plate}}, Production year: {{$truck->make_year}}</div>


@endforeach --}}

</div>



@endsection
