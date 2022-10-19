<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <title>view</title>
    </head>

    <body>


        <div class=" offset-5 col-md-4">

            <img width="300px" src="{{ asset('images/' . $book->book_image) }}" alt="">
            <p>Book Name : {{$book->book_title}}</p>
            <p> Author: {{$book->author->name}}</p>
            <p>Description: {{$book->book_description}}</p>
            <a href="/">Back</a>
        </div>
    </body>

</html>
