@extends('master')

@section('addForm')

<form class="offset-md-4 col-md-4 pt-5 mt-5" action="addBook" method="post">
    @csrf
    <!-- Name input -->
    <div class="form-outline mb-4 ">
        <label class="form-label" for="form4Example1">Name</label>
        <input type="text" name="book_title" id="form4Example1" class="form-control" />
        @error('book_title')
        <span class="text-danger">{{$message}}</span> @enderror
    </div>

    <div class="form-outline mb-4 ">
        <label class="form-label" for="form4Example1">Author</label>
        <input type="text" name="book_author" id="form4Example1" class="form-control" />
        @error('book_author')
        <span class="text-danger">{{$message}}</span> @enderror
    </div>

    <!-- Email input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form4Example2">Image</label>
        <input type="text" name="book_image" id="form4Example2" class="form-control " />
        @error('book_image')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>

    <!-- Message input -->
    <div class="form-outline">
        <label class="form-label" for="textAreaExample">Description</label>
        <textarea class="form-control" name=" book_description" id="textAreaExample1" rows="4"></textarea>
        @error('book_description')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mt-4 w-100">Submit</button>
</form>

@endsection

</html>
