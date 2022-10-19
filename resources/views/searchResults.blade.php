@extends('master')
@section('title','Search Results')

@section('search_results')

<div class="container">
    @if(count($results)>0)
    <div class="row ">

        @foreach ($results as $book)

        <div class="card col-md-3 me-4 mb-5" style="width:18rem">
            <a class=" mb-auto" href="/show/{{$book->id}}">
                <img height="400px" class="w-100" src="{{ asset('images/' . $book->book_image) }}">
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
                <a href="/delete/{{$book->id}}" class="btn btn-danger">Delete</a>
                <a href="update/{{$book->id}}" class="btn btn-success">Update</a>
                @endcan
            </div>
        </div>
        @endforeach
    </div>
    @else
    <h3>No mathching results</h3>
    @endif

    @endsection
