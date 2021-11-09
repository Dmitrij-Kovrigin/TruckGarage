@extends('layouts/app')

@section('content')
<div class="container background-grey p-3">



    <form action="{{ route('truck_update', $truck) }}" method="post">

        <h1 class="mt-3">Edit truck</h1>

        <p><img class="truck_image_show" src="{{$truck->image}}"></p>


        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Truck maker</label>

            <input type="text" class="form-control" id="exampleFormControlInput1" name="truck_maker" value="{{old('truck_maker', $truck->maker)}}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Truck plate</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="truck_plate" value="{{old('truck_plate', $truck->plate)}}">

        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Truck year of production</label>

            <input type="text" class="form-control" id="exampleFormControlInput1" name="truck_year" value="{{old('truck_year', $truck->make_year)}}">

        </div>
        <div class="col-4 form-group">
            Mechanics:
            <select name="mechanic_id" class="form-control">
                <option value="0"> Select mechanic </option>
                @foreach($mechanics as $mechanic)
                <option value="{{$mechanic->id}}" @if($mechanic->id == old('mechanic_id', $truck->mechanic_id)) selected
                    @endif> {{$mechanic->name}} {{$mechanic->surname}}</option>

                @endforeach
            </select>
        </div>

        <div class="form-floating">
            <label for="exampleFormControlInput1" class="form-label">Mechanics notices:</label>
            <textarea rows="4" cols="40" class="form-control" id="textarea" name="mechanic_notices" style="height: 200px" value="{{old('mechanic_notices', $truck->mechanic_notices)}}">{{old('mechanic_notices', $truck->mechanic_notices)}}</textarea>

        </div><br>


        <button type="submit" class="btn btn-primary mb-3">Edit truck</button>
        <a href="{{asset('trucks/show/' . $truck->id)}}" class="btn btn-secondary mb-3" name="truck_edit">Back</a>


        @method('PUT')

        @csrf

    </form>

</div>


@endsection
