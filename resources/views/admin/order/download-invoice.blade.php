<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>A simple, clean, and responsive HTML invoice template</title>

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>


<div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
        <tr class="top">
            <td colspan="4">
                <table>
                    <tr>
                        <td class="title">
                            <img src="{{asset('/')}}website/assets/images/logo/logome.png" style="width: 100%; max-width: 300px" alt="Logo">
                        </td>

                        <td>
                            Order #  {{$order->id}}<br />
                            Order Date : {{$order->order_date}}<br />
                            Time : {{ \Carbon\Carbon::now()->setTimezone('Asia/Dhaka')->format('g:i a') }}<br/>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="4">
                <table>
                    <tr>
                        <td>
                            <h4><b>Customer Info</b></h4>
                            Customer: {{$order->customer->name}}<br />
                            Mobile : {{$order->customer->mobile}}<br />
                            Email :{{$order->customer->email}}<br />
                            Invoice Date: {{ date('Y-m-d') }}<br />

                        </td>

                        <td>
                            <h4><b>Company info</b></h4>
                            Boneek<br />
                            Mobile : +880 170000000<br />
                            Email : boneek@com.bd<br />
                            Address : Bonanee West<br />

                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="heading">
            <td>Order Info</td>

            <td colspan="3"></td>
        </tr>

        <tr class="">
            <td>Delivery Address</td>

            <td colspan="3"> {{$order->delivery_address}}</td>
        </tr>


        <tr class="">
            <td>Payment Method</td>

            <td colspan="3">{{$order->payment_method}}</td>
        </tr>

        <tr class="heading">
            <td>Item</td>
            <td style="text-align: center;">Price</td>
            <td style="text-align: center;">Quantity</td>
            <td style="text-align: right;">Total Price</td>
        </tr>

        @foreach($order->orderDetail as $product)

            <tr class="item">
                <td>{{$product->product_name}}</td>
                <td style="text-align: center;">{{$product->product_price}} </td>
                <td style="text-align: center;">{{$product->product_qty}}</td>
                <td style="text-align: right;">{{$product->product_price * $product->product_qty}} TK.</td>

            </tr>
        @endforeach

        <tr class="">
            <td></td>
            <td colspan="3">Sub Total : {{$order->order_total}} TK.</td>
        </tr>

        <tr class="">
            <td></td>
            <td colspan="3">Tax Total : {{$order->tax_total}} TK.</td>
        </tr>

        <tr class="">
            <td></td>
            <td colspan="3">Shipping Amount : {{$order->shipping_total}} TK.</td>
        </tr>

        <tr class="total">
            <td></td>
            <td colspan="3"> Total Payable : {{$order->total_payable}} TK.</td>
        </tr>
    </table>
</div>



</body>
</html>
