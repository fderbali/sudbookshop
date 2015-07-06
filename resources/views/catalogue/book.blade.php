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
<br />
<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Overview</a></li>
    <li><a href="#tabs-2">Further information</a></li>
    <li><a href="#tabs-3">Downloads</a></li>
  </ul>
  <div id="tabs-1">
    <p>{{ $book->full_description }}</p>
  </div>
  <div id="tabs-2">
    <p>ISBN : {{ $book->isbn }}</p>
    <p>Shipping fees :
        @if($book->is_pdf == 0)
            0 $
        @else
            {{ $book->shipping_cost }}
        @endif
    </p>
    <p>Category : {{ $book->category->name }}</p>
  </div>
  <div id="tabs-3">
    <p>
        @if($book->additional_docs == 0)
            No downloads for this book
        @else
        <a href="{{ asset("/zip/".$book->isbn.".zip") }}"><img width="60" src="{{ asset("/images/rar.png") }}"/></a>
        @endif
    </p>
  </div>
</div>
<script>
    $(document).ready(function(){
       $("#tabs").tabs({fx:{opacity: 'toggle'}}); 
    });
</script>
@endsection

