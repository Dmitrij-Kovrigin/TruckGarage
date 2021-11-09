@extends('layouts/app')

@section('content')
<div class="container">
    <div class="card border-dark mb-3" style="max-width: 54rem;">
        <div class="card-header">Mechanic details</div>
        <div class="card-body text-dark">
            <h5 class="card-title">Name: {{$mechanic->name}}</h5>
            <h5 class="card-title">Surname: {{$mechanic->surname}}</h5>

            <p class="card-text">Vehicles: </p>
            <p class="card-text">
                @foreach($mechanic->getTrucks as $truck)
                {{$truck->maker}}, {{$truck->plate}}, {{$truck->make_year}}
                <a href="{{route('truck_edit', $truck)}}" class="btn-sm btn-primary" name="add_notices">Add notices</a></p>

            @endforeach
            </p>


            <a href="{{route('mechanic_index')}}" class="btn btn-secondary m-2" name="">Back</a>


            {{-- <a href="{{route('truck_edit', $truck)}}" class="btn btn-primary" name="truck_edit">Edit truck</a>
            <a href="{{route('trucks')}}" class="btn btn-secondary m-2" name="truck_edit">Back</a>
            <button type="submit" class="delete--button btn btn-danger btn m-2" data-action="{{route('truck_delete', $truck)}}">Delete truck</button> --}}

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
