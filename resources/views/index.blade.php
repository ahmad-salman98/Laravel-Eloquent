@extends('master')

@section('styleBook')
<style>
    .card {
        background-color: rgb(242, 221, 168);
        border: 1px black solid;
        border-radius: 2rem;
        justify-content: center;
        align-items: center;

    }

    .card img {
        border-radius: 1rem;
        height: 30rem;
        width: 22rem;
        margin-top: 2rem;
    }
</style>
@endsection


@section('links')
<a href="{{route('add')}}">Add new book</a>
@endsection


</html>

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



// $books = array();
// $book1 = new book('since', 'a book of since', 'newton',
// 'https://media.wiley.com/product_data/coverImage300/55/11195906/1119590655.jpg');
// $book2 = new book('math', 'a book of math', 'taher',
// 'https://media.wiley.com/product_data/coverImage300/55/11195906/1119590655.jpg');
// $book3 = new book('technology', 'a book of technology', 'elon musk',
// 'https://media.wiley.com/product_data/coverImage300/55/11195906/1119590655.jpg');
// $book4 = new book('history', 'a book of history', 'khaled',
// 'https://media.wiley.com/product_data/coverImage300/55/11195906/1119590655.jpg');
// $book5 = new book('arabic', 'a book of arabic', 'bin khaldoon',
// 'https://media.wiley.com/product_data/coverImage300/55/11195906/1119590655.jpg');
// $book6 = new book('english', 'a book of english', 'Josh',
// 'https://media.wiley.com/product_data/coverImage300/55/11195906/1119590655.jpg');
// $book7 = new book('art', 'a book of art', 'leonardo',
// 'https://media.wiley.com/product_data/coverImage300/55/11195906/1119590655.jpg');

// array_push($books, $book1, $book2, $book3, $book4, $book5, $book6, $book7);

@endphp

<div class="row ">

    <?php
    foreach ($all_books as $book) { ?>

    <div class="col-md-3 offset-md-1 my-3 d-flex flex-column card">
        <div>
            <img src=" @php echo $book->book_image; @endphp">
        </div>

        <div>
            <h3>
                Name: @php echo $book->book_title; @endphp
            </h3>
        </div>
        <div>
            <h3>
                Description: @php echo $book->book_description; @endphp
            </h3>
        </div>
        <div>
            <h3>
                Author: @php echo $book->book_author; @endphp
            </h3>
        </div>

    </div>
    @php

    }
    @endphp
    @endsection
</div>
