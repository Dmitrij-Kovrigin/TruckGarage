@extends('layouts/app')

@section('content')
<div class="container">
    <div class="card border-dark mb-3" style="max-width: 54rem;">
        <div class="card-header" style="width:100%; color:white;">
            <h1>{{$truck->maker}}</h1>
        </div>
        <div class="card-body text-dark">
            <p><img class="truck_image_show" src="{{$truck->image}}"></p>
            <h5 class="card-title">Trucks plate: {{$truck->plate}}, Year of production: {{$truck->make_year}}</h5>
            <h5 class="card-title">Mechanics {{$truck->getMechanic->name}} {{$truck->getMechanic->surname}} notices: </h5>
            <p class="card-text">{{$truck->mechanic_notices}}</p>
            <a href="{{route('truck_edit', $truck)}}" class="btn btn-primary" name="truck_edit">Edit truck</a>
            <a href="{{route('trucks')}}" class="btn btn-secondary m-2" name="truck_edit">Back</a>
            <button type="submit" class="delete--button btn btn-danger btn m-2" data-action="{{route('truck_delete', $truck)}}">Delete truck</button>

        </div>
    </div>
</div>


<div id="confirm-modal" style="display:none;">

    <div class="card">
        <div class="card-body background-grey __border-grey">

            <h5 class="card-title">Confirm truck delete</h5>
            <div class="buttons">
                <form action="" class="m-1" method="post">
                    <button type="submit" class="btn btn-danger" style="color:white;">DELETE</button>
                    @method('DELETE')
                    @csrf
                </form>
                <button type="button" class="cancel--confirm--button btn btn-info m-1">Cancel</button>
            </div>
        </div>
    </div>
</div>


@endsection
