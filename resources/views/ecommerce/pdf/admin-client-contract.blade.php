<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        .receipt-content .logo a:hover {
            text-decoration: none;
            color: #7793C4;
        }

        .receipt-content .invoice-wrapper {
            background: #FFF;
            border: 1px solid #CDD3E2;
            box-shadow: 0px 0px 1px #CCC;
            padding: 40px 40px 60px;
            margin-top: 40px;
            border-radius: 4px;
        }

        .receipt-content .invoice-wrapper .payment-details span {
            color: #A9B0BB;
            display: block;
        }

        .receipt-content .invoice-wrapper .payment-details a {
            display: inline-block;
            margin-top: 5px;
        }

        .receipt-content .invoice-wrapper .line-items .print a {
            display: inline-block;
            border: 1px solid #9CB5D6;
            padding: 13px 13px;
            border-radius: 5px;
            color: #708DC0;
            font-size: 13px;
            -webkit-transition: all 0.2s linear;
            -moz-transition: all 0.2s linear;
            -ms-transition: all 0.2s linear;
            -o-transition: all 0.2s linear;
            transition: all 0.2s linear;
        }

        .receipt-content .invoice-wrapper .line-items .print a:hover {
            text-decoration: none;
            border-color: #333;
            color: #333;
        }

        .receipt-content {
            background: #ECEEF4;
        }

        @media (min-width: 1200px) {
            .receipt-content .container {
                width: 900px;
            }
        }

        .receipt-content .logo {
            text-align: center;
            margin-top: 50px;
        }

        .receipt-content .logo a {
            font-family: Myriad Pro, Lato, Helvetica Neue, Arial;
            font-size: 36px;
            letter-spacing: .1px;
            color: #555;
            font-weight: 300;
            -webkit-transition: all 0.2s linear;
            -moz-transition: all 0.2s linear;
            -ms-transition: all 0.2s linear;
            -o-transition: all 0.2s linear;
            transition: all 0.2s linear;
        }

        .receipt-content .invoice-wrapper .intro {
            line-height: 25px;
            color: #444;
        }

        .receipt-content .invoice-wrapper .payment-info {
            margin-top: 25px;
            padding-top: 15px;
        }

        .receipt-content .invoice-wrapper .payment-info span {
            color: #A9B0BB;
        }

        .receipt-content .invoice-wrapper .payment-info strong {
            display: block;
            color: #444;
            margin-top: 3px;
        }

        @media (max-width: 767px) {
            .receipt-content .invoice-wrapper .payment-info .text-right {
                text-align: left;
                margin-top: 20px;
            }
        }

        .receipt-content .invoice-wrapper .payment-details {
            border-top: 2px solid #EBECEE;
            margin-top: 30px;
            padding-top: 20px;
            line-height: 22px;
        }


        @media (max-width: 767px) {
            .receipt-content .invoice-wrapper .payment-details .text-right {
                text-align: left;
                margin-top: 20px;
            }
        }

        .receipt-content .invoice-wrapper .line-items {
            margin-top: 40px;
        }

        .receipt-content .invoice-wrapper .line-items .headers {
            color: #A9B0BB;
            font-size: 13px;
            letter-spacing: .3px;
            border-bottom: 2px solid #EBECEE;
            padding-bottom: 4px;
        }

        .receipt-content .invoice-wrapper .line-items .items {
            margin-top: 8px;
            border-bottom: 2px solid #EBECEE;
            padding-bottom: 8px;
        }

        .receipt-content .invoice-wrapper .line-items .items .item {
            padding: 10px 0;
            color: #696969;
            font-size: 15px;
        }

        @media (max-width: 767px) {
            .receipt-content .invoice-wrapper .line-items .items .item {
                font-size: 13px;
            }
        }

        .receipt-content .invoice-wrapper .line-items .items .item .amount {
            letter-spacing: 0.1px;
            color: #84868A;
            font-size: 16px;
        }

        @media (max-width: 767px) {
            .receipt-content .invoice-wrapper .line-items .items .item .amount {
                font-size: 13px;
            }
        }

        .receipt-content .invoice-wrapper .line-items .total {
            margin-top: 30px;
        }

        .receipt-content .invoice-wrapper .line-items .total .extra-notes {
            float: left;
            width: 40%;
            text-align: left;
            font-size: 13px;
            color: #7A7A7A;
            line-height: 20px;
        }

        @media (max-width: 767px) {
            .receipt-content .invoice-wrapper .line-items .total .extra-notes {
                width: 100%;
                margin-bottom: 30px;
                float: none;
            }
        }

        .receipt-content .invoice-wrapper .line-items .total .extra-notes strong {
            display: block;
            margin-bottom: 5px;
            color: #454545;
        }

        .receipt-content .invoice-wrapper .line-items .total .field {
            margin-bottom: 7px;
            font-size: 14px;
            color: #555;
        }

        .receipt-content .invoice-wrapper .line-items .total .field.grand-total {
            margin-top: 10px;
            font-size: 16px;
            font-weight: 500;
        }

        .receipt-content .invoice-wrapper .line-items .total .field.grand-total span {
            color: #20A720;
            font-size: 16px;
        }

        .receipt-content .invoice-wrapper .line-items .total .field span {
            display: inline-block;
            margin-left: 20px;
            min-width: 85px;
            color: #84868A;
            font-size: 15px;
        }

        .receipt-content .invoice-wrapper .line-items .print {
            margin-top: 50px;
            text-align: center;
        }



        .receipt-content .invoice-wrapper .line-items .print a i {
            margin-right: 3px;
            font-size: 14px;
        }

        .receipt-content .footer {
            margin-top: 40px;
            margin-bottom: 110px;
            text-align: center;
            font-size: 12px;
            color: #969CAD;
        }

    </style>
</head>

<body>
    <div class="receipt-content">
        <div class="container bootstrap snippets bootdey">
            <div class="row">
                <div class="col-md-12">
                    <div class="invoice-wrapper">
                        <div class="intro">
                            Hi <strong>{{ $contract->client->name }}</strong>,
                            <br>
                            This is the receipt for a payment of <strong>${{ $contract->price }}</strong> (USD) for
                            your
                            works
                        </div>

                        <div class="payment-info">
                            <div class="row">
                                <div class="col-sm-6">
                                    <span>Contract No.</span>
                                    <strong>{{ $contract->id }}</strong>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <span>Payment Date</span>
                                    <strong>{{ date('d-m-Y', strtotime($contract->from_date)) }}</strong>
                                </div>
                            </div>
                        </div>

                        <div class="payment-details">
                            <div class="row">
                                <div class="col-sm-6">
                                    <span>Client</span>
                                    <strong>
                                        {{ $contract->client->name }}
                                    </strong>
                                    <p>
                                        {{ $contract->client->clientInfo->first_address }} <br>
                                        {{-- {{$contract->client->clientInfo->second_address}} <br> --}}
                                        {{ $contract->client->clientInfo->country }} <br>
                                        {{ $contract->client->clientInfo->state }} <br>
                                        {{ $contract->client->clientInfo->city }} <br>
                                        {{ $contract->client->clientInfo->post_code }} <br>
                                        {{ $contract->client->clientInfo->second_address }} <br>
                                        <a href="#">
                                            {{ $contract->client->email }}
                                        </a>
                                    </p>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <span>Payment To</span>
                                    <strong>
                                        Manarat Comp. "{{ $contract->admin->name }}"
                                    </strong>
                                    <p>
                                        Jada <br>
                                        Al Read Str. <br>
                                        99383 <br>
                                        Saude Ariabia <br>
                                        <a href="#">
                                            manarat.1996@email.org
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="line-items">
                            <div class="headers clearfix">
                                <div class="row"><br>
                                    <div class="col-xs-4"><strong>Description:</strong> We, Manarat Company,
                                        acknowledge the agreement on the
                                        details of this contract, and that the owner of this contract is obligated to
                                        pay it when his time comes, and that the company will resort to legal methods in
                                        the event of a breach of the text of this contract.</div><br>
                                    <div class="col-xs-3"><strong>Quantity:</strong> #{{ $contract->peice_no }}#
                                        units from {{ $contract->store->name }}</div><br>
                                    <div class="col-xs-5 text-right"><strong>Total:</strong> #${{ $contract->price }}#
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="row item">
                                    <div class="col-xs-4 desc">
                                        Price / Unit
                                    </div>
                                    <div class="col-xs-5 amount text-right">
                                        #${{ $contract->store->price }}#
                                    </div>
                                </div>
                                <div class="row item">
                                    <div class="col-xs-4 desc">
                                        Offer
                                    </div>
                                    <div class="col-xs-5 amount text-right">
                                        #${{ $contract->store->offer }}#
                                    </div>
                                </div>
                                <div class="row item">
                                    <div class="col-xs-4 desc">
                                        Total
                                    </div>
                                    <div class="col-xs-5 amount text-right">
                                        #${{ $contract->price_after_offer }}#
                                    </div>
                                </div>
                            </div>
                            <div class="total text-right">
                                <p class="extra-notes">
                                    <strong>Note</strong>
                                    * This contract is activate to {{ date('d-m-Y', strtotime($contract->to_date)) }}.<br>
                                    * If there is any manipulation in the contract, it will not be spent and the
                                    client's account will be closed for at least 10 years.
                                </p>
                                <div class="field">
                                    Subtotal <span>${{$contract->store->price * $contract->peice_no}}</span>
                                </div>
                                <div class="field">
                                    Shipping <span>${{($contract->store->price * $contract->peice_no) - $contract->price_after_offer}}</span>
                                </div>
                                <div class="field">
                                    Discount <span>{{$contract->store->offer}}%</span>
                                </div>
                                <div class="field grand-total">
                                    Total <span>${{$contract->price_after_offer}}</span>
                                </div>
                            </div>

                            {{-- <div class="print">
                                <a href="#">
                                    <i class="fa fa-print"></i>
                                    Print this receipt
                                </a>
                            </div> --}}
                        </div>
                    </div>

                    <div class="footer">
                        Copyright © {{Date::now()->year}}. reserved Manarat company
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
