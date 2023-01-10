<x-layout>
    <x-slot name="title">Cart</x-slot>
    <x-slot name="data">
         <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
            <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">About Us</h1>
            <div class="d-inline-flex mb-lg-5">
                <p class="m-0 text-white"><a class="text-white" href="">Home</a></p>
                <p class="m-0 text-white px-2">/</p>
                <p class="m-0 text-white">About Us</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container-fluid table-cont">
        <div class="section-title">
            <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Add To Cart</h4>
            <h1 class="display-4">{{session("name")}} Cart </h1>
        </div>
        <div class="row">
            <div class="col-md-8">
                <table class="table table-sm mt-5 mx-5">
                    <thead>
                        <tr>
                            <th>S.no</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Total Price</th>
                            <th>Cancel</th>
                        </tr>
                    </thead>
                    <tbody>
                    <form method="post" action="handle_cart" id="cart-form">
                        @csrf
                    @if(session("add_to_cart"))
                    <?php $count=1; ?>
                    @foreach(session('add_to_cart') as $key => $data)
                            <tr>
                                <td>{{$count}}</td>
                                <td>{{p_find($data['id'])['name']}}
                                <input type="hidden" name="name[]" value="{{p_find($data['id'])['name']}}">
                                </td>
                                <td>${{p_find($data['id'])['price']}}
                                <input type="hidden" name="price[]" value="{{p_find($data['id'])['price']}}">
                                </td>
                                <div class="input-group mb-3">
                                    <td>
                                        <span style="display: flex;">
                                            <button class="input-group-text decrement-btn">-</button>
                                            <input type="number" style="width: 50px;" class="quantity inp-quantity text-center" name="quantity[]" value="{{session('add_to_cart')[$key]['quantity']}}">
                                            <button class="input-group-text increment-btn">+</button>
                                        </span>
                                    </td>
                                    <input type="hidden" name="id[]" value="{{p_find($data['id'])['id']}}">
                                </div>
                                <td>${{$total = session('add_to_cart')[$key]['quantity']*p_find($data['id'])['price']}}</td>
                                    <td>
                                        <button data-id="{{p_find($data['id'])['id']}}" class="btn btn-danger del_btn"><i class="bi bi-trash"></i></button>
                                        
                                    </td>
                            </tr>
                         <?php $count++; ?>
                    @endforeach 
                            
                            @endif 
                            <tr><td><button class="btn btn-success mt-5" type="submit">Updated</button></td></tr>
                        </form>
                    </tbody>
                </table>
            </div>  
            <div class="col-md-4">
                <div class="data mt-5 mx-5 bg-primary text-white" style="padding: 44px;">
                        <h1 class="mx-5">Checkout</h1>
                        @if(session("loggedin") == "true")
                        <p>Card Types</p>
                        <div>
                            <div class="icons mb-3">
                                <i class="fa fa-cc-visa" style="font-size:36px"></i>
                                <i class="fa fa-cc-paypal" style="font-size:36px"></i>
                                <i class="fa fa-credit-card" style="font-size:36px"></i>
                                <i class="fa fa-cc-mastercard" style="font-size:36px"></i>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input card-payment" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label card-payment" for="flexRadioDefault1">
                                    Card Payment
                                </label>
                                <div id="card-form" class="mt-3 mb-3">
                                    <form action="payment" method="post">
                                        @csrf
                                        <input type="text" class="form-control mb-2" style="width: 207px;" placeholder="Cardholder's Name" name="name">
                                        <input type="text" class="form-control mb-2" style="width: 207px;" placeholder="Card Number" name="card_number">
                                        <span style="display: flex;">
                                        <input type="text" class="form-control mb-2" style="width: 106px;" placeholder="Expiration" name="expiration">
                                        <input type="password" class="form-control mx-2 mb-2" style="width: 95px;" placeholder="Cvv" name="Cvv">
                                    </span>
                                    <button class="mt-2 mr-5 btn btn-success" type="submit" id="btn-pay">Checkout <i class="bi bi-arrow-right"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input delivery-inp" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label delivery-inp" for="flexRadioDefault1">
                                    Cash on delivery 
                                </label><br>
                                <hr class="text-white">
                                <a href="delivery" class="mt-2 mr-5 btn btn-success" id="btn-Checkout">Checkout <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                        @else
                        <h3 class="mt-5 text-primary mx-4">First You Logged In</h3>
                        @endif
                </div>    
            </div> 
        </div>

    </div>

    </x-slot>
</x-layout>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function(){
            $(".card-payment").click(function(){
                $("#card-form").show();
                $("#btn-Checkout").hide();
                $("#btn-pay").show();
            });
            
            $("#card-form").hide();
            $("#btn-pay").hide();
            $("#btn-Checkout").hide();
            $(".delivery-inp").click(function(){
                $("#btn-pay").hide();
                $("#card-form").hide();
                $("#btn-Checkout").show();
            });

            $('.increment-btn').click(function(e){
                e.preventDefault();
                var input = $(this).prev('.quantity');
                // console.log(input.val());
                if ( input != '' ) {
                    var value = parseInt(input.val()) + 1;
                } else {
                    var value = 1;
                }
                input.val(value);
            });

            $('.decrement-btn').click(function(e){
                e.preventDefault();
                var input = $(this).next('.quantity');
                if ( input.val() > 1 ) {
                    var value = parseInt(input.val()) - 1;
                    input.val(value);
                }
            });
        })


    </script>
