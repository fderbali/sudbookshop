@extends('maincontent')

@section('main')
<h2 class="headtitle">Shopping Cart</h2>
    @foreach ($books_in_cart as $book)
        <div class="row listing_books">
            <div class="col-md-2">
                <a class="thumbnail" href="{{ url('catalogue/book/'.$book->id) }}">
                    <img width="120" src="{{ asset("/images/".$book->isbn.".jpg") }}"/>
                </a>
            </div>
            <div class="col-md-2">
                <b>Price : </b><br /><br /> {{ $book->price }}
            </div>
            <div class="col-md-2">
                <b>Quantity : </b><br /><br /> {{ $cart[$book->isbn] }}
            </div> 
            <div class="col-md-2">
                <b>Subtotal : </b><br /><br /> {{ $sub_totals[$book->isbn] }}
            </div> 
            <div class="col-md-3">
                <a class="btn btn-success moreinfosbutton" role="button" href="{{ url('catalogue/book/'.$book->id) }}"> More infos...</a>
            </div>            
        </div>
        <div>

        </div>
        <br />
    @endforeach 
@endsection


