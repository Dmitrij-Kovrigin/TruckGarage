@extends('layouts/app')

@section('content')
<div class="container background-grey">



    <form action="{{ route('truck_store') }}" method="post">

        <h1 class="mt-3">Create new truck</h1>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Truck maker</label>

            <input type="text" class="form-control" id="exampleFormControlInput1" name="truck_maker" placeholder="Truck maker">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Truck plate</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="truck_plate" placeholder="Truck plate">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Truck year of production</label>

            <input type="text" class="form-control" id="exampleFormControlInput1" name="truck_year" placeholder="Truck year of production">
        </div>
        <div class="col-4 form-group">
            Mechanics:
            <select name="mechanic_id" class="form-control">
                <option value="0"> Select mechanic </option>
                @foreach($mechanics as $mechanic)
                <option value="{{$mechanic->id}}"> {{$mechanic->name}} {{$mechanic->surname}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mb-3">Create</button>

        @csrf

    </form>

</div>


@endsection
