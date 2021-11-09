@extends('layouts/app')

@section('content')
<div class="container-sm background-grey">

    <form action="{{ route('mechanic_store') }}" method="post">
        <h1 class="mt-3">Create new mechanic</h1>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Mechanic's name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="mechanic_name" placeholder="New mechanic's name">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Mechanic's surname</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="mechanic_surname" placeholder="New mechanic's surname">
        </div>
        <button type="submit" class="btn btn-primary mb-3">Submit</button>
        @csrf
    </form>
</div>

@endsection
