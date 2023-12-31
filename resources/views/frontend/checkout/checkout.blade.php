@extends('frontend.main')

@section('main')
    <!-- Inner Banner -->
    <div class="inner-banner inner-bg7">
        <div class="container">
            <div class="inner-title">
                <ul>
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li> Check Out</li>
                </ul>
                <h3> Check Out</h3>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- Checkout Area -->
    <section class="checkout-area pt-100 pb-70">
        <div class="container">
            <form method="POST" role="form" action="{{ route('checkout.store') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="billing-details">
                            <h3 class="title">Billing Details</h3>

                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Country <span class="required">*</span></label>
                                        <div class="select-box">
                                            <select name="country" class="form-control">
                                                <option value="Indonesia">Indonesia</option>
                                                <option value="Malaysia">Malaysia</option>
                                                <option value="Thailand">Thailand</option>
                                                <option value="China">China</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="Germany">Germany</option>
                                                <option value="France">France</option>
                                                <option value="Japan">Japan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Name <span class="required">*</span></label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ \Auth::user()->name }}">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Email <span class="required">*</span></label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ \Auth::user()->email }}">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" name="phone" class="form-control"
                                            value="{{ \Auth::user()->phone }}">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Address <span class="required">*</span></label>
                                        <input type="text" name="address" class="form-control"
                                            value="{{ \Auth::user()->address }}">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>State <span class="required">*</span></label>
                                        <input type="text" name="state" class="form-control">
                                        @if ($errors->has('state'))
                                            <div class="text-danger">{{ $errors->first('state') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Zipcode <span class="required">*</span></label>
                                        <input type="text" name="zip_code" class="form-control">
                                        @if ($errors->has('zip_code'))
                                            <div class="text-danger">{{ $errors->first('zip_code') }}</div>
                                        @endif
                                    </div>
                                </div>

                                {{-- <p>Session Value : {{ json_encode(session('book_date')) }}</p> --}}

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="create-an-account">
                                        <label class="form-check-label" for="create-an-account">Create an account?</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4">
                        <section class="checkout-area pb-70">
                            <div class="card-body">
                                <div class="billing-details">
                                    <h3 class="title">Booking Summary</h3>
                                    <hr>

                                    <div style="display: flex">
                                        <img style="height:100px; width:120px;object-fit: cover"
                                            src="{{ !empty($room->image) ? url('upload/room_img/' . $room->image) : url('upload/no_image.jpg') }}"
                                            alt="Images" alt="Images">
                                        <div style="padding-left: 10px;">
                                            <a href=" "
                                                style="font-size: 20px; color: #595959;font-weight: bold">{{ @$room->roomType->name }}</a>
                                            <p><b>Rp. {{ $room->price }} / Night</b></p>
                                        </div>

                                    </div>

                                    <br>

                                    <table class="table" style="width: 100%">
                                        @php
                                            $subtotal = $room->price * $nights * $book_data['number_of_rooms'];
                                            $discount = ($room->discount / 100) * $subtotal;
                                        @endphp
                                        <tr>
                                            <td>
                                                <p>Total Night <br><b>( {{ $book_data['check_in'] }} -
                                                        {{ $book_data['check_out'] }})</b></p>
                                            </td>
                                            <td style="text-align: right">
                                                <p> {{ $nights }} Days</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>Total Room</p>
                                            </td>
                                            <td style="text-align: right">
                                                <p>{{ $book_data['number_of_rooms'] }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>Subtotal</p>
                                            </td>
                                            <td style="text-align: right">
                                                <p>Rp. {{ $subtotal }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>Discount</p>
                                            </td>
                                            <td style="text-align:right">
                                                <p>Rp. {{ $discount }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>Total</p>
                                            </td>
                                            <td style="text-align:right">
                                                <p>Rp. {{ $subtotal - $discount }}</p>
                                            </td>
                                        </tr>
                                    </table>

                                </div>
                            </div>
                        </section>

                    </div>


                    <div class="col-lg-8 col-md-8">
                        <div class="payment-box">
                            <div class="payment-method">
                                {{-- <p>
                                    <input type="radio" id="direct-bank-transfer" name="radio-group" checked>
                                    <label for="direct-bank-transfer">Direct Bank Transfer</label>
                                    Make your payment directly into our bank account. Please use your Order
                                    ID as the payment reference. Your order will not be shipped until the funds have cleared
                                    in our account.
                                </p>
                                <p>
                                    <input type="radio" id="paypal" name="radio-group">
                                    <label for="paypal">PayPal</label>
                                </p> --}}
                                <p>
                                    <input type="radio" id="cash-on-delivery" name="payment_method" value="COD">
                                    <label for="cash-on-delivery">Cash On Delivery</label>
                                </p>
                            </div>

                            <button type="submit" class="order-btn">
                                Place to Order
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Checkout Area End -->
@endsection
