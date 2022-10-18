@extends('master')

@section('Add_author')

<h2 class="text-center mt-5 mb-0">Enter Author's information</h2>

<form class="offset-md-4 col-md-4 pt-5 mt-5" action="addAuthor" method="post">
    @csrf
    <!-- Name input -->
    <div class="form-outline mb-4 ">
        <label class="form-label" for="form4Example1">Name</label>
        <input type="text" name="name" id="form4Example1" class="form-control" />
        @error('name')
        <span class="text-danger">{{$message}}</span> @enderror
    </div>

    <!-- Email input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form4Example2">Email</label>
        <input type="email" name="email" id="form4Example2" class="form-control " />
        @error('email')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>

    <!-- Message input -->

    <div class="form-outline mb-4">
        <label class="form-label" for="form4Example3">Nationality</label>
        <input type="text" name="nationality" id="form4Example3" class="form-control " />
        @error('nationality')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mt-4 w-100">Submit</button>
</form>

@endsection
