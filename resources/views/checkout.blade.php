@extends('layout.app')
@section('content')
        <div class="py-5 text-center">
            <i class="material-icons"> add_shopping_cart </i>
            <h2>Checkout</h2>
        </div>

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-secondary badge-pill">{{App\Models\Cart::where('user_id',Auth::user()->id)->sum('count')}}</span>
                </h4>
                <ul class="list-group mb-3">
                    @foreach ($carts as $product)
                    <li class="list-group-item d-flex justify-content-between lh-condensed" *ngFor="let c of cart">
                        <div>
                            <h6 class="my-0">{{$product->name}}</h6>
                            <small class="text-muted">{{$product->title}}</small>
                        </div>
                        <span class="text-muted"> Count({{$product->pivot->count}})</span>
                        <span class="text-muted"> {{$products=($product->pivot->count * $product->price)}}$ </span>
                    </li>
                    @endforeach


                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (USD)</span> <strong>
                            {{$total}}

                        $
                        </strong>
                    </li>
                </ul>
            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Billing address</h4>
                <form  action="{{route('sendCheckout')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="firstName">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{Auth::user()->name}}"
                                required="" />
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                        {{-- <div class="col-md-6 mb-3">
                            <label for="lastName">Last name</label>
                            <input type="text" class="form-control" id="lastName" placeholder="" value="" required="" />
                            <div class="invalid-feedback">Valid last name is required.</div>
                        </div> --}}
                    </div>

                    <div class="mb-3">
                        <label for="email">Email<span class="text-muted">(Optional)</span></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" value="{{Auth::user()->email}}" />
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" required="" />
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address2">Address 2<span class="text-muted">(Optional)</span></label>
                        <input type="text" class="form-control" id="address2" name="address2" placeholder="Apartment or suite" />
                    </div>

                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="country">Country</label>
                            <select class="custom-select d-block w-100 dynamic" id="country" name="country"
                            data-dependent="state" required="">
                           {{--  <option value="1">palestine</option> --}}
                            @foreach ($country_list as $item)
                            <option value="{{$item->id}}">{{$item->country}}</option>
                            @endforeach




                            </select>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div>



                     {{--    <div class="col-md-4 mb-3">
                            <label for="state">State</label>
                            <select class="custom-select d-block w-100 dynamic" id="state" name="state" required="">

                                <option>Gaza</option>


                                <option>Qahera</option>


                            </select>
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                        </div> --}}
                        {{-- <div class="col-md-3 mb-3">
                            <label for="zip">Zip</label>
                            <input type="text" class="form-control" id="zip" name="zip" placeholder="" required="" />
                            <div class="invalid-feedback">Zip code required.</div>
                        </div> --}}
                    </div>
                    <hr class="mb-4" />

                    {{-- <h4 class="mb-3">Payment</h4> --}}

                    {{-- <div class="d-block my-3">
                        <div class="custom-control custom-radio">
                            <input id="credit" name="paymentMethod"  type="radio" class="custom-control-input" checked=""
                                required="" />
                            <label class="custom-control-label" for="credit">Credit card</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="debit" name="paymentMethod" type="radio" class="custom-control-input"
                                required="" />
                            <label class="custom-control-label" for="debit">Debit card</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input"
                                required="" />
                            <label class="custom-control-label" for="paypal">PayPal</label>
                        </div>
                    </div> --}}
                    <hr class="mb-4" />
                    <button class="btn btn-primary btn-lg btn-block" type="submit">
                        Continue to checkout
                    </button>
                </form>
            </div>
        </div>
     @endsection
     {{-- <script>
         $(document).ready(function(){
             $('.dynamic').change(function(){
                if($(this).val()!= ''){
                    var select= $(this).attr("id");
                    var value= $(this).val();
                    var dependent= $(this).data('dependent');
                    var _token=$('input[name="_token"]').val();
                    $.ajax({
                        url:"{{url(route('fetch'))}}",
                        method:"POST",
                        data:{
                            select:select, value:value , _token:_token , dependent:dependent
                        },
                        success:function(result){
                            $('#'+dependent).html(result);
                        }
                    });
                },
             });
         });

     </script>
 --}}
