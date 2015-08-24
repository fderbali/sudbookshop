<div id="addresses">
    <br />
    <div class="shipping_address">
        <input type="radio" name="shipping_address" />&nbsp;&nbsp;You may choose your billing address as shipping address
    </div>
    <div class="well">
        {{ Auth::user()->billing_address1 }} <br />
        @if(Auth::user()->billing_address2)
            {{ Auth::user()->billing_address2 }} <br />
        @endif
        {{ Auth::user()->city }}
        {{ Auth::user()->country }}
        {{ Auth::user()->zip_code }}       
    </div>

    @if($shipping_adresses)
        @foreach($shipping_adresses as $shipping_adress)
            <div class="shipping_address">
                <input type="radio" name="shipping_address" />&nbsp;&nbsp;Select this address
            </div>            
            <div class="well">
                {{ $shipping_adress->shipping_address1 }} <br />
                @if($shipping_adress->shipping_address2)
                    {{ $shipping_adress->shipping_address2 }} <br />
                @endif
                {{ $shipping_adress->city }}
                {{ $shipping_adress->country }}
                {{ $shipping_adress->zip_code }}       
            </div>    
        @endforeach
    @endif
    <br />
    <div class="shipping_address">
        <input type="radio" name="shipping_address" id="new_address" />&nbsp;&nbsp;Create a new address
    </div>
    <form class="form-horizontal" id="form-new-address" >
        <div class="form-group">
            <label class="col-md-3 control-label">Shipping address line 1</label> 
            <div class="col-md-5">
                <input type="text" id="shipping_address1" name="shipping_address1" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Shipping address line 1</label>
            <div class="col-md-5">
                <input type="text" id="shipping_address2" class="form-control col-md-4">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">City</label>
            <div class="col-md-3">
                <input type="text" id="city" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Country</label>
            <div class="col-md-3">
                <input type="text" id="country" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Zip code</label>
            <div class="col-md-3">
                <input type="text" id="zip_code" class="form-control">
            </div>
        </div>            
        <div class="form-group">
            <div class="col-md-offset-3 col-md-3">
                <button type="button" id="submit_new_address" class="btn btn-primary">
                    Submit <i class="fa fa-check"></i>
                </button>
            </div>
        </div>
    </form>
    <script>
        $(".shipping_address input[id!='new_address']").click(function(){
            $("#form-new-address").slideUp();
        });
        $("input[id='new_address']").click(function(){
            $("#form-new-address").slideDown();
        });
        $("#submit_new_address").click(function(){
            shipping_address_ligne1 = $("#shipping_address1").val();
            shipping_address_ligne2 = $("#shipping_address2").val();
            city = $("#city").val();
            country = $("#country").val();
            zip_code = $("#zip_code").val();
            $.ajax({
                method: "GET",
                url: "{{ route('save_new_address') }}",
                data: { 
                    shipping_address_ligne1: shipping_address_ligne1,
                    shipping_address_ligne2: shipping_address_ligne2,
                    city: city, 
                    country: country,
                    zip_code: zip_code
                }
            })
            .done(function( msg ){
                if(msg=="Ok"){
                    $("#form-new-address").slideUp();
                    $("#addresses").load("{{ route('checkout') }}");
                }
            });  
        });
    </script>
</div>