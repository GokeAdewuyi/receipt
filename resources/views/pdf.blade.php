<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
{{--    <link rel="stylesheet" href="{{asset('/css/app.css ')}}">--}}
    <title>Receipt</title>

    <style>
        /*@import url('https://fonts.googleapis.com/css2?family=Dancing+Script&family=Roboto+Slab&display=swap');*/

        @page { margin: 0; }

        html{
            width: 100%;
            height: 100%;
            padding: 0;
            margin: 0;
        }

        body {
            padding: 0;
            margin: 0;
        }

        /*.mx-auto {*/
        /*    margin-right: auto !important;*/
        /*}*/

        .col-md-12 {
            position: relative;
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
        }

        .col-12 {
            flex: 0 0 100%;
            max-width: 100%;
        }

        .d-flex {
            display: flex !important;
        }

        .align-self-center {
            align-self: center !important;
        }

        .justify-content-center {
            justify-content: center !important;
        }

        .text-center {
            text-align: center !important;
        }

        .text-capitalize {
            text-transform: capitalize !important;
        }

        .mx-2 {
            margin-right: 0.5rem !important;
        }

        /*.mx-auto {*/
        /*    margin-right: auto !important;*/
        /*}*/

        .mt-3 {
            margin-top: 1rem !important;
        }

        .mt-4 {
            margin-top: 1.5rem !important;
        }

        .my-5

        .font-weight-bold {
            font-weight: 700 !important;
        }

        .table {
            border-collapse: collapse !important;
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table-borderless {
            border: 0;
        }

        /*.table-responsive-sm {*/
        /*    display: block;*/
        /*    width: 100%;*/
        /*    overflow-x: auto;*/
        /*    -webkit-overflow-scrolling: touch;*/
        /*}*/

        .wrapper{
            background: #F8F7F9 !important;
            padding: 0;
            margin: 0;
            color: #383737;
            overflow: hidden;
            font-family: sans-serif;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
        }

        .receipt{
            padding: 0;
            margin: 0;
            border: 1px solid rgba(124,119,119, 0.2);
            font-family: 'Roboto Slab', serif;
        }

        .receipt-header{
            background: #3A5683;
            border-bottom: 6px solid #ffc107;
            padding: 20px 30px;
        }

        .receipt-body{
            padding: 30px 300px;
            font-weight: 400;
            background-color: #eae6e6;
        }

        .receipt-footer{
            background: #3A5683;
            padding: 28px;
            border-top: 6px solid #ffc107;
            text-align: right;
            font-size: 11px;
            color: #e6e5e7;
        }

        .hotel-logo-receipt{
            width: 50px;
        }

        .hotel-name-receipt{
            font-size: 26px;
            color: #F8F7F9;
            font-weight: 500;
        }

        .hotel-info-header{
            color: #c4c4c4;
            font-size: 12px;
        }

        .receipt-body h5{
            margin-bottom: 10px !important;
        }

        .line{
            width: 200px;
            border-bottom: 2px solid #3A5683;
        }

        .payment-method{
            padding: 10px 20px;
            border-radius: 3px;
            background: #7c7777;
            color: #F8F7F9;
        }

        .payment-details{
            padding: 5px 10px;
            border-radius: 3px;
            background: #7c7777;
            color: #F8F7F9;
        }

        td{
            font-size: 13px;
            border-color: #a5a3a3;
        }

        .stripe-row{
            background: #7c7777;
        }

        .stripe-row td{
            color: #F8F7F9;
            border-color: #727171;
        }

        .info-table tr td{
            padding-left: 0 !important;
            padding-right: 50px !important;
            color: #383737;
        }
        .payment-details.full, .payment-details.paid{
            background: #28A745;
            color: #F8F7F9;
        }

        .payment-details.part{
            background: #ffc107;
            color: #F8F7F9;
        }

        .payment-details.balance{
            background: #dc3545;
            color: #F8F7F9;
        }

        .greeting{
            margin: 20px 15px 0;
            font-family: 'Dancing Script', cursive;
            font-size: 16px;
            letter-spacing: 2px;
        }

        .print-button, .check-in-button{
            padding: 10px 20px;
            border: none;
            color: #F8F7F9;
            border-radius: 3px;
            font-size: 15px;
        }

        .payment-amount-info{
            margin-bottom: 28px;
        }

        .print-button{
            background: #3A5683;
        }

        .print-button:hover{
            background: #28406b;
            color: #ffc107;
        }

        .check-in-button{
            background: #28A745;
        }

        .check-in-button:hover{
            background: #198431;
        }

        @media screen and (max-width: 950px) {
            .receipt-body{
                padding: 20px;
                font-weight: 400;
            }
            .wrapper-div{
                padding: 20px 30px;
            }
        }

        @media screen and (max-width: 700px) {
            .hotel-name-receipt{
                font-size: 23px;
            }
            .hotel-info-header{
                font-size: 10px;
            }
            .print-button{
                display: none;
            }
            .print-button, .check-in-button{
                padding: 7px 10px;
                font-size: 13px;
            }
            .greeting{
                font-size: 13px;
            }
        }
        @media screen and (max-width: 500px) {
            .hotel-logo-receipt{
                width: 50px;
            }
            .hotel-name-receipt{
                font-size: 20px;
            }
            .hotel-info-header{
                font-size: 9px;
            }
            .payment-amount-info td{
                font-size: 9px;
            }
            .receipt-body{
                padding: 10px;
            }
        }
        @media screen and (max-width: 350px) {
            .payment-amount-info td{
                font-size: 8px;
            }
        }
        @media screen and (max-width: 700px) {
            .wrapper{
                padding: 20px;
            }
        }
    </style>
</head>

<body>
<div class="wrapper">
    <div>
        <div class="row">
            <div class="receipt mx-auto col-md-12">
                <div class="receipt-header col-12">
                    <div class="d-flex justify-content-center">
                        <div class="logo d-flex align-self-center">
                            <img src="../../../../assets/logo.png" alt="logo" class="hotel-logo-receipt mx-2">
                        </div>
                        <div class="hotel-name-receipt">
                            <div class="text-center text-capitalize">{{ $hotel['name'] }}</div>
                            <div class="col-12 text-center mx-auto hotel-info-header">{{ $hotel['address'] }}</div>
                            <div class="col-12 text-center mx-auto hotel-info-header">{{ $hotel['phone'] }} - {{ $hotel['email'] }} {{ $hotel['website'] ? '-' : '' }} {{ $hotel['website'] }}</div>
                        </div>
                    </div>
                </div>
                <div class="receipt-body col-12">
                    <div class="logo-watermark"></div>
                    <h5 class="font-weight-bold mt-3 receipt-title">{{ $reservationType }} Reservation</h5>
                    <div class="line"></div>
                    <div>
                        <table class="table info-table table-responsive-sm table-borderless mt-4">
                            <tr>
                                <td class="font-weight-bold">Reservation ID</td>
                                <td>{{ $booking_id }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Receptionist Name</td>
                                <td>{{$s_name}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Customer Name</td>
                                <td>{{$first_name.' '. $last_name}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Customer Phone</td>
                                <td>{{ $phone }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Customer Email</td>
                                <td>{{ $email }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Reservation Date</td>
                                <td>{{ $date }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Check In Date</td>
                                <td>{{ $check_in }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Check Out Date</td>
                                <td>{{ $check_out }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Payment Method</td>
                                <td><span class="payment-method text-capitalize">{{ $payment_details['payment_method'] }}</span></td>
                            </tr>
                        </table>
                        <table class="table table-responsive-sm table-bordered my-5">
                            <tr class="stripe-row">
                                <td></td>
                                <td class="text-capitalize">{{ $selection }} Type</td>
                                <td class="text-capitalize">{{ $selection }} No</td>
                                <td>No of days</td>
                                <td>Price per day (NGN)</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td class="text-capitalize">{{ $type['type']['name'] }}</td>
                                <td>{{ $type['number'] }}</td>
                                <td>{{ $days }}</td>
                                <td>{{ $payment_details['actual_amount'] / $days }}</td>
                            </tr>
                        </table>
                    </div>
                    <table class="ml-auto payment-amount-info">
                        <tr>
                            <td class="mr-4 font-weight-bold">Total Amount:</td>
                            <td class="py-2"><span class="mx-2 payment-details">NGN {{ $payment_details['actual_amount'] }}</span></td>
                        </tr>
                        <tr>
                            <td class="mr-4 font-weight-bold">Discount:</td>
                            <td class="py-2"><span class="mx-2 payment-details">NGN 0.00</span></td>
                        </tr>
                        <tr>
                            <td class="mr-4 font-weight-bold">Amount Paid:</td>
                            <td class="py-2"><span class="mx-2 payment-details paid">NGN {{ $payment_details['amount_paid'] }}</span><span class="payment-details">{{ $payment_details['payment_type'] }} payment</span></td>
                        </tr>
                        <tr>
                            <td class="mr-4 font-weight-bold">Balance:</td>
                            <td class="py-2"><span class="mx-2 payment-details balance">NGN {{ $payment_details['balance'] }}</span></td>
                        </tr>
                    </table>
                    <p class="greeting">Have a wonderful stay at {{ $hotel['name'] }}</p>
                </div>
                <div class="receipt-footer col-12">
                    <p>Powered by www.crudng.com <img src="../../../../assets/logo.png" alt="logo" width="20px" class="crud-logo-receipt mx-2"></p>
                </div>
            </div>
        </div>
    </div>
</div>
{{--<script src="{{asset('/js/app.js')}}"></script>--}}
</body>

