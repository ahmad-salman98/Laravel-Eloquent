@extends('master')
@section('title','Update Book')
@section('updateForm')

<form class="offset-md-4 col-md-4 pt-5 mt-5" action="/updateBook/{{$book->id}}" method="post">
    @csrf
    <!-- Name input -->
    <div class="form-outline mb-4 ">
        <label class="form-label" for="form4Example1">Name</label>
        <input type="text" name="book_title" id="form4Example1" class="form-control" value="{{$book->book_title}}" />
        @error('book_title')
        <span class="text-danger">{{$message}}</span> @enderror
    </div>

    <!-- author input -->
    <div class="form-outline mb-4 ">
        <label class="form-label" for="form4Example1">Author</label>
        <select class="w-100" name="book_author" id="form4Example1">

            @foreach($authors as $author)
            <option value=" {{$author->id}}" @if($author->id==$book->book_author) selected @endif>
                <p> {{$author->name}}</p>
            </option>
            @endforeach
        </select>
        @error('book_author')
        <span class="text-danger">{{$message}}</span> @enderror
    </div>

    <!-- image input -->
    <div class="form-outline mb-4 d-flex flex-column ">
        <div>
            <img style="width:5rem" class="me-5" src="{{ asset('images/' . $book->book_image) }}" alt="">
        </div>
        <div>
            <label class="form-label" for="form4Example2">Image</label>
            <input  type="file" name="book_image" id="form4Example2"
                class="form-control form-control-sm" />
            @error('book_image')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>

    <!-- desc input -->
    <div class="form-outline">
        <label class="form-label" for="textAreaExample">Description</label>
        <textarea class="form-control" name=" book_description" id="textAreaExample1"
            rows="4">{{$book->book_description}}</textarea>
        @error('book_description')
        <span class=" text-danger">{{$message}}</span>
        @enderror
    </div>
    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mt-4 w-100">Save</button>
</form>

@endsection

</html>
