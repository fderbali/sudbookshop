<h2 class="headtitle">Shopping Cart</h2>
@if($total_books > 0)
    @foreach ($books_in_cart as $book)
        <div class="row listing_books item-shopping-cart">
            <div class="col-md-2">
                <a class="thumbnail" href="{{ url('catalogue/book/'.$book->id) }}">
                    <img class="fixed_height" src="{{ asset("/images/".$book->isbn.".jpg") }}"/>
                </a>
            </div>
            <div class="col-md-1 property" >
                <b>Price : </b><br /> {{ $book->price }} $
            </div>
            <div class="col-md-2 property" >
                <b>Shipping fee : </b><br /> {{ $book->shipping_cost }} $
            </div>
            <div class="col-md-2 property" >
                <b>Quantity : </b><br /> 
                <span>{{ $cart[$book->isbn] }}<br /></span>
                <input class="form-control hidden-input" type="text" data-isbn="{{ $book->isbn }}" value="{{ $cart[$book->isbn] }}">
                <button type="button" class="btn btn-primary btn-sm hidden-input validate-qty">Ok</button>
                <button type="button" class="btn btn-primary btn-xs modif-qty">Modify <i class="fa fa-pencil-square-o"></i></button><br />
                <button type="button" class="btn btn-warning btn-xs delete-item" data-isbn="{{ $book->isbn }}">Delete <i class="fa fa-times"></i></button>
            </div> 
            <div class="col-md-2 property">
                <b>Subtotal : </b><br /> {{ $sub_totals[$book->isbn] }} $
            </div> 
            <div class="col-md-2 property">
                <a class="btn btn-success moreinfosbutton" role="button" href="{{ url('catalogue/book/'.$book->id) }}"> More infos...</a>
            </div>            
        </div>
    @endforeach
    <hr />
    <div class="row totals">
        <div class="col-md-2 col-md-offset-1 property">
            <a class="btn btn-primary moreinfosbutton" role="button" href="{{ route('show_sections') }}"> <i class="fa fa-arrow-left"></i> Continue shopping</a>
        </div>         
        <div class="col-md-2 col-md-offset-2" >
            <b>Total items : </b><br /> {{ $total_books or 0}}
        </div> 
        <div class="col-md-2 property">
            <b>Total : </b><br /> {{ $total or 0 }} $
        </div>
        <div class="col-md-2 property">
            <a class="btn btn-primary moreinfosbutton" role="button" href="{{ route('checkout') }}"> Checkout !!!   <i class="fa fa-arrow-right"></i></a>
        </div>         
    </div>
    <script>
        $(".modif-qty").click(function(){
            $(this).hide();
            $(this).prev().show();
            $(this).prev().prev().show();
            $(this).prev().prev().prev().hide();
        });
        $(".validate-qty").click(function(){
            quantity = $(this).prev().val();
            isbn = $(this).prev().data('isbn');
            update_mini_cart(isbn, quantity)
            $(this).hide();
            $(this).prev().hide();
            $(this).prev().prev().show();
            $(this).prev().hide();
            $(this).next().show();
        });
        $(".delete-item").click(function(){
            isbn = $(this).data('isbn');
            update_mini_cart(isbn, 0)
        });
        function update_mini_cart(isbn, quantity){
            $.ajax({
              method: "GET",
              url: "{{ route('additemtocart') }}",
              data: { isbn: isbn, quantity: quantity, type: 'update' }
            })
            .done(function( msg ){
                $("#nb_items").html(msg);
                $("#shopping_cart").load("{{ route('showcart') }}");
            });        
        }         
    </script>
@else
       Your shopping cart is empty <i class="fa fa-frown-o"></i>
@endif

