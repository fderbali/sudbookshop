@extends('maincontent')

@section('main')
<h2 class="headtitle">{{ $categoryname }}</h2>
    @foreach ($books as $book)
        <div class="row listing_books">
            <div class="col-md-2">
                <a class="thumbnail" href="{{ url('catalogue/book/'.$book->id) }}">
                    <img width="120" src="{{ asset("/images/".$book->isbn.".jpg") }}"/>
                </a>
            </div>
            <div class="col-md-10">
                <ul>
                    <li>Title : <b>{{ $book->title }}</b></li>
                    <li>Author : {{ $book->author }}</li>
                    <li>Price : {{ $book->price }}</li>
                    <li>Short description : {{ $book->brief_description }}</li>
                </ul>
                <a class="btn btn-success moreinfosbutton" role="button" href="{{ url('catalogue/book/'.$book->id) }}"> More infos...</a>
            </div>
        </div>
        <br />
    @endforeach 
@endsection


