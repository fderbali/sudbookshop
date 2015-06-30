@extends('maincontent')
@section('main')
<h2 class="headtitle">{{ $book->title }}</h2>
<div class="row">
    <div class="col-md-4">
        <p><b>Author : </b>{{ $book->author }}</p>
        <p><b>ISBN : </b>{{ $book->isbn }}</p> 
        <p><b>Format : </b>
            @if($book->is_pdf == "0")
                Paper book
            @else
                PDF ({{ $book->size }})
            @endif
        </p>
        <img width="120" src="{{ asset("/images/".$book->isbn.".jpg") }}" longdesc="{{ asset("/images/zoom/".$book->isbn."-zoom.jpg") }}"/>
    </div>
    <div class="col-md-3">
        <p><b>Availability : </b>
        @if($book->in_stock >= 0 || $book->is_pdf == 1 )
            Available</p>
            
            <p><b>In stock : </b> {{ $book->in_stock }}</p>
            <p><b>Quantity : </b> <input type="number" name="quantity" class="quantity" min="1" max="{{ $book->in_stock }}" size="2"></p>
        @else
            Out of stock
        @endif
        <br />
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-success addtocart">Add to cart</button>
        <br />
        <img src="{{ asset("/images/ajouter_au_panier.png") }}"/>
    </div>    
</div>
        <!--div class="row listing_books">
            <div class="col-md-2">
                <a class="thumbnail" href="{{ $book->id }}">
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
                <a class="btn btn-success moreinfosbutton" role="button" href="{{ $book->id }}"> More infos...</a>
            </div>
        </div>
        <br /-->
@endsection


