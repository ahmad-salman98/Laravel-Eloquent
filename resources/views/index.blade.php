@extends('master')
@section('title','Home')
@section('styleBook')
<style>
    .card img {

        width: 100%;
        height: 20rem;
    }

    .description {
        height: 5rem;
        overflow-y: scroll;
    }

    .description::hover {
        height: fit-content;
    }
</style>
@endsection



</html>

@section('updatedMsg')
<p>{{ session('updateMsg') }}</p>
@endsection

@section('books')
@php
class book
{
public $name;
public $description;
public $author;
public $image;

function __construct($name, $description, $author, $image)
{
$this->name = $name;
$this->description = $description;
$this->author = $author;
$this->image = $image;
}
}




@endphp
<div class="container">

    <div class="row ">

        @foreach ($all_books as $book)

        <div class="card col-md-3 me-4 mb-5" style="width:18rem">
            <a class=" mb-auto" href="/show/{{$book->id}}">
                <img src="{{ asset('images/' . $book->book_image) }}">
            </a>
            <div class="card-body">
                <h5 class="card-title"> {{$book->book_title}}</h5>
                <p class="card-title">
                    <a style="color:black; text-decoration:none;"
                        href="/author/{{$book->book_author}}">{{$book->author->name}}</a>
                </p>
                <hr>
                <p class="card-text description">{{$book->book_description}}</p>
                @can('isAdmin')

                <a href="update/{{$book->id}}" class="btn btn-success">Update</a>
                <a href="/delete/{{$book->id}}" class="btn btn-danger">Delete</a>
                @endcan
            </div>
        </div>
        @endforeach
    </div>
</div>




@endsection
</div>
