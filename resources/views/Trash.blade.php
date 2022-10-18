@extends('master')
@section('title','Trash')
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
@section('trashed')

<div class="container">
    <button class="btn btn-primary col-md-2 me-auto mb-5 mt-2 "> <a style="text-decoration: none; color:white"
            href="/restoreAll">
            Restore All</a> </button>
    <div class="row">
        @foreach ($trash as $book)

        <div class="card col-md-3 me-4 mb-5" style="width:18rem">
            <a class=" mb-auto" href="/show/{{$book->id}}">
                <img class="w-100" src="{{ asset('images/' . $book->book_image) }}">
            </a>
            <div class="card-body">
                <h5 class="card-title">@php echo $book->book_title @endphp</h5>
                <p class="card-text description">@php echo $book->book_description; @endphp</p>
                <a href="/forceDelete/{{$book->id}}" class="btn btn-danger">Delete</a>
                <a href="restore/{{$book->id}}" class="btn btn-success">Restore</a>
            </div>
        </div>

        @endforeach
    </div>
</div>
@endsection
