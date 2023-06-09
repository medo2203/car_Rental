@extends('layouts.app')
@section('content')
    <style>
        ul {
            list-style: none;
            margin-bottom: 0px
        }

        .cart_section {
            width: 100%;
            padding-top: 93px;
            padding-bottom: 111px
        }

        .cart_title {
            font-size: 30px;
            font-weight: 500
        }

        .cart_items {
            margin-top: 8px
        }

        .cart_list {
            border: solid 1px #e8e8e8;
            box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1);
            background-color: #fff
        }

        .cart_item {
            width: 100%;
            padding-right: 46px
        }

        .statusDot {
            display: inline-block;
            width: 15px;
            height: 15px;
            border-radius: 50%;
            -webkit-transform: translateY(4px);
            -moz-transform: translateY(4px);
            -ms-transform: translateY(4px);
            -o-transform: translateY(4px);
            transform: translateY(4px);
        }
    </style>
    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <div class="cart_container">
                <div class="cart_title">My bookings<small> ({{ $orders->count() }})</small></div>
                <div class="cart_items">
                    @if ($orders)
                        @foreach ($orders as $order)
                            <ul class="list-group mb-4">
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-12 d-flex align-items-center">
                                            <img src="{{ asset('storage/' . $order->photo ?? '') }}" class="img-fluid">
                                        </div>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3 mt-3">
                                                        <strong>Car</strong>
                                                        <br>
                                                        {{ $order->brand }} {{ $order->model }}
                                                    </div>
                                                    <div class="mb-3">
                                                        <strong>Pick up</strong>
                                                        <br>
                                                        <span
                                                            id="myDateInput_{{ $order->id }}">{{ $order->pick_up_date }}</span>
                                                        in
                                                        {{ $order->pick_up_location }}
                                                    </div>
                                                    <div class="mb-3">
                                                        <strong>Drop off</strong>
                                                        <br>
                                                        <span
                                                            id="DropDate_{{ $order->id }}">{{ $order->drop_off_date }}</span>
                                                        in
                                                        {{ $order->drop_off_location }}
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3 mt-3">
                                                        <strong>Renting days</strong>
                                                        <br>
                                                        <span id="days_{{ $order->id }}"></span>
                                                    </div>
                                                    <div class="mb-3">
                                                        <strong>Price</strong>
                                                        <br>
                                                        <span id="carPrice_{{ $order->id }}">{{ $order->price }}</span>
                                                    </div>
                                                    <div class="mb-3">
                                                        <strong>Total</strong>
                                                        <br>
                                                        <span id="price_{{ $order->id }}"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <strong>Status</strong>
                                                    <br>
                                                    <span id="status">
                                                        @if (!$order->validated)
                                                            <span class="statusDot"
                                                                style="background-color: #f7f70ac3"></span>
                                                            Pending validation
                                                        @elseif ($order->approval_status == 'approved')
                                                            <span class="statusDot"
                                                                style="background-color: #49d364"></span>
                                                            Approved
                                                        @elseif ($order->approval_status == 'rejected')
                                                            <span class="statusDot"
                                                                style="background-color: #ff2727"></span>
                                                            Rejected
                                                        @else
                                                            <span class="statusDot"
                                                                style="background-color: #006aff"></span>
                                                            Pending approval
                                                        @endif
                                                    </span>
                                                    {{-- 49d364 --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center align-items-center">
                                            @if (!$order->validated)
                                                <a href="{{ route('Orders.edit', $order->id) }}">
                                                    <button class="btn btn-warning btn-lg m-2 text-white">Edit
                                                        Order</button>
                                                </a>
                                                <button class="btn btn-danger m-2 btn-lg">
                                                    Delete Order
                                                </button>
                                                <a href="{{ route('Orders.validate', $order->id) }}">
                                                    <button class="btn btn-primary btn-lg">
                                                        Validate Order
                                                    </button>
                                                </a>
                                                @elseif ($order->approval_status == 'approved')
                                                We are honored to be a part of your journey.
                                                <a onclick="printTargetPage({{ $order->id }})">
                                                    <button class="btn btn-outline-success m-4">Download contrat</button>
                                                </a>
                                                @elseif ($order->approval_status == 'rejected')
                                                Your order has been rejected by the admin
                                                <button type="button" class="btn btn-outline-primary ms-4"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                Show details
                                            </button>
                                            <button class="btn btn-danger ms-2">
                                                Delete Order
                                            </button>
                                            @else
                                                <h4>Waiting for your order to be approved ...</h4>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="orderForm" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="d-flex justify-content-start text-bold">
                        <h5>Order Rejection Details</h5>
                    </div>
                    <div class="d-flex justify-content-center text-bold">
                        <p><span class="ms-4"> Dear {{ Auth::user()->fullName ?? Auth::user()->name }},</span><br>
                            <br>
                            <span class="ms-4"></span> We regret to inform you that your order has been rejected by our
                            admin. We apologize for any
                            inconvenience this may have caused.

                            Possible reasons for rejection could include unavailability of the requested car, conflicting
                            scheduling, or other unforeseen circumstances.

                            Please feel free to make the necessary changes to your order or contact our support team for
                            further assistance. We appreciate your understanding.

                            Best regards,<br>
                            <br>
                            Auto Maroc"
                        </p>

                    </div>
                    <div class="modal-footer">
                        <a href="/contact">
                            <div class="d-flex justify-content-end text-bold">
                                <button class="btn btn-primary">Contact support</button>
                            </div>
                        </a>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

    {{-- ................................................. --}}
    <script>
        window.onload = function() {
            var orderData = @json($orders);

            orderData.forEach(function(order) {
                var pickDate = document.getElementById('myDateInput_' + order.id).innerHTML;
                var dropDate = document.getElementById('DropDate_' + order.id).innerHTML;
                var startDate = new Date(pickDate);
                var endDate = new Date(dropDate);
                var dayPrice = document.getElementById('carPrice_' + order.id).innerHTML;
                var timeDiff = endDate.getTime() - startDate.getTime();
                var daysDiff = Math.ceil(timeDiff / (1000 * 3600 * 24));
                document.getElementById("days_" + order.id).innerHTML = daysDiff;
                var totalPrice = Number(dayPrice) * Number(daysDiff);
                document.getElementById("price_" + order.id).innerHTML = totalPrice;
            });
        };

        function printTargetPage(id) {
            console.log(id)
            var targetPageUrl = 'http://127.0.0.1:8000/pdf/preview/' + id; // Replace with the URL of the target page
            var targetWindow = window.open(targetPageUrl, '_blank');

            targetWindow.onload = function() {
                targetWindow.print();
            };
        }
    </script>

@endsection
