@extends('maincontent')

@section('main')
<h2 class="headtitle">Shopping Cart</h2>
    @foreach ($books_in_cart as $book)
        <div class="row listing_books">
            <div class="col-md-2">
                <a class="thumbnail" href="{{ url('catalogue/book/'.$book->id) }}">
                    <img class="fixed_height" src="{{ asset("/images/".$book->isbn.".jpg") }}"/>
                </a>
            </div>
            <div class="col-md-2 property" >
                <b>Price : </b><br /> {{ $book->price }} $
            </div>
            <div class="col-md-2 property" >
                <b>Quantity : </b><br /> {{ $cart[$book->isbn] }} 
            </div> 
            <div class="col-md-2 property">
                <b>Subtotal : </b><br /> {{ $sub_totals[$book->isbn] }} $
            </div> 
            <div class="col-md-3 property">
                <a class="btn btn-success moreinfosbutton" role="button" href="{{ url('catalogue/book/'.$book->id) }}"> More infos...</a>
            </div>            
        </div>
    @endforeach
        <hr />
        <div class="row">
            <div class="col-md-2 col-md-offset-4" >
                <b>Total items : </b><br /> {{ $total_books or 0}}
            </div> 
            <div class="col-md-2 property">
                <b>Total : </b><br /> {{ $total or 0 }} $
            </div>           
        </div>        
        <div>
            
        </div>
@endsection


