@extends('master')

@section('authorInfo')

<div class="container">
    <div class="row">
        <div class="col-md-6 d-flex flex-column" style="padding-right:2px black solid;">
            <h3>Author's information</h3>
            <ul>
                <li>Name: {{$author->name}} </li>
                <li>Email:{{$author->email}} </li>
                <li>Nationality: {{$author->nationality}}</li>
            </ul>
        </div>
        <div class="col-md-6">
            <table class="table align-middle mb-0 bg-white">
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                </tr>

                @foreach($books as $book)

                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('images/' . $book->book_image) }}" alt=""
                                style="width: 45px; height: 45px" class="" />
                        </div>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">{{$book->book_title}}</p>
                    </td>
                    <td>{{$book->book_description}}</td>
                    <td>
                        <button type="button" class="btn btn-link btn-sm btn-rounded">
                            <a class="text-dark" href="/update/{{$book->id}}">Edit</a>
                        </button>
                    </td>
                </tr>

                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
