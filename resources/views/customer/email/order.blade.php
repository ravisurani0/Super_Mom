<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Order Received</title>
</head>

<body>
    <table
        style="width: 950px;max-width: 100%;margin: auto;text-align: center;font-family: sans-serif;background-color: #ffffff;">
        <tr>
            <td colspan="3" style="background-color: #FFEC00; padding: 20px 0;">
                <img src="{{ asset('media/logos/gopal-namkeen-logo.png') }}" alt="logo"
                    style="width: 160px; max-width: 100%" />
            </td>
        </tr>
        <tr>
            <td colspan="3"
                style="font-size: 16px; font-weight: bold; color: #CEC225; border-bottom: solid 7px #0b5ed7; padding: 4px 0;">
                WE HAVE RECEIVED YOUR ORDER</td>
        </tr>
        <tr>
            <td colspan="3">
                <p style="font-size: 26px; font-weight: bold; color: #000000; padding: 0 50px; margin: 20px 0 10px;">Hi
                    {{ $order->customer->name }}</p>
                <p style="font-size: 17px; color: #000000; padding: 0 50px; line-height: 135%; margin: 0 0 20px;">Thank
                    you for your interest in Gopal Snacks products.
                    Your order has been received and will be processed
                    once payment has been conﬁrmed.</p>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <table
                    style="width: 100%;border: none;border-top: solid 4px #0b5ed7;border-spacing: 0;text-align: left;table-layout: fixed;">
                    <tbody>
                        <tr>
                            <td
                                style="border-bottom: solid 4px #0b5ed7;padding: 5px 0;font-size: 15px;font-weight: bold;color: #000000;">
                                Order ID</td>
                            <td
                                style="border-bottom: solid 4px #0b5ed7;padding: 5px 0;font-size: 14px;font-weight: bold;color: #000000;">
                                {{ $order->id }}</td>
                            <td
                                style="border-bottom: solid 4px #0b5ed7;padding: 5px 0;font-size: 15px;font-weight: bold;color: #000000;">
                                Email</td>
                            <td
                                style="border-bottom: solid 4px #0b5ed7;padding: 5px 0;font-size: 14px;font-weight: bold;;color: #000000;">
                                {{ $order->customer->email }}</td>
                        </tr>
                        <tr>
                            <td
                                style="border-bottom: solid 4px #0b5ed7;padding: 5px 0;font-size: 15px;font-weight: bold;color: #000000;">
                                Order Date</td>
                            <td
                                style="border-bottom: solid 4px #0b5ed7;padding: 5px 0;font-size: 14px;font-weight: bold;;color: #000000;">
                                {{ $order->created_at }} </td>
                            <td
                                style="border-bottom: solid 4px #0b5ed7;padding: 5px 0;font-size: 15px;font-weight: bold;color: #000000;">
                                Mobile</td>
                            <td
                                style="border-bottom: solid 4px #0b5ed7;padding: 5px 0;font-size: 14px;font-weight: bold;;color: #000000;">
                                {{ $order->customer->phone_no }}</td>
                        </tr>
                        <tr>
                            <td
                                style="border-bottom: solid 4px #0b5ed7;padding: 5px 0;font-size: 15px;font-weight: bold;color: #000000;">
                                Payment Method</td>
                            <td
                                style="border-bottom: solid 4px #0b5ed7;padding: 5px 0;font-size: 14px;font-weight: bold;;color: #000000;">
                                Online</td>
                            <td
                                style="border-bottom: solid 4px #0b5ed7;padding: 5px 0;font-size: 15px;font-weight: bold;color: #000000;">
                                Order Status</td>
                            <td
                                style="border-bottom: solid 4px #0b5ed7;padding: 5px 0;font-size: 14px;font-weight: bold;;color: #000000;">
                                {{ $order->orderstatus->name }} </td>
                        </tr>
                    </tbody>
                </table>

                <table style="width: 100%; border: none; border-spacing: 0;">
                    <tbody>
                        <tr>
                            <td colspan="2"
                                style="padding: 12px 0 10px; font-size: 15px; font-weight: bold; color: #000000;">
                                Billing Address</td>
                            <td colspan="2"
                                style="padding: 12px 0 10px; font-size: 15px; font-weight: bold; color: #000000;">
                                Shipping Address</td>
                        </tr>
                        <tr>
                            @foreach ($order->orderaddresses as $orderAdress)
                                @if ($orderAdress)
                                    <td colspan="2"
                                        style="border: solid 4px #0b5ed7;border-right: solid 4px #0b5ed7;padding: 10px; text-align: left;">
                                        <p style="font-size: 16px; font-weight: bold; color: #000000; margin: 0 0 4px;">
                                            {{ $orderAdress->name }}
                                        </p>
                                        <p style="font-size: 16px; font-weight: bold; color: #000000; margin: 0 0 4px;">
                                            {{ $orderAdress->address_1 }} {{ $orderAdress->address_2 }}
                                            <br>
                                            {{ $orderAdress->landmark }},
                                            {{ $orderAdress->postcode }}<br>
                                            {{ $orderAdress->city }}
                                        </p>
                                        <p style="font-size: 16px; font-weight: bold; color: #000000; margin: 0 0 4px;">
                                            <span style="color: #000000;">Phone Number:</span>
                                            {{ $orderAdress->phone }}
                                        </p>
                                        <p style="font-size: 16px; font-weight: bold; color: #000000; margin: 0;"><span
                                                style="color: #000000;">Email:</span> {{ $orderAdress->email }}</p>
                                    </td>
                                @endif
                                @if ($orderAdress)
                                    <td colspan="2"
                                        style="border: solid 4px #0b5ed7;border-right: solid 4px #0b5ed7;padding: 10px; text-align: left;">
                                        <p style="font-size: 16px; font-weight: bold; color: #000000; margin: 0 0 4px;">
                                            {{ $orderAdress->name }}
                                        </p>
                                        <p style="font-size: 16px; font-weight: bold; color: #000000; margin: 0 0 4px;">
                                            {{ $orderAdress->address_1 }} {{ $orderAdress->address_2 }}
                                            <br>
                                            {{ $orderAdress->landmark }},
                                            {{ $orderAdress->postcode }}<br>
                                            {{ $orderAdress->city }}
                                        </p>
                                        <p style="font-size: 16px; font-weight: bold; color: #000000; margin: 0 0 4px;">
                                            <span style="color: #000000;">Phone Number:</span>
                                            {{ $orderAdress->phone }}
                                        </p>
                                        <p style="font-size: 16px; font-weight: bold; color: #000000; margin: 0;"><span
                                                style="color: #000000;">Email:</span> {{ $orderAdress->email }}</p>
                                    </td>
                                @else
                                    <p style="text-align:center; 16px; font-weight: bold; color: #000000; margin: 0;">
                                        Address not provided.</p>
                                @endif
                            @endforeach
                            {{-- <td colspan="2"
                                style="border: solid 4px #0b5ed7;border-left: solid 0;padding: 10px; text-align: left;">
                                <p style="font-size: 16px; font-weight: bold; color: #000000; margin: 0 0 4px;">
                                    US
                                    User</p>
                                <p style="font-size: 16px; font-weight: bold; color: #000000; margin: 0 0 4px;">
                                    1600 Amphitheatre Parkway1
                                    <br>
                                    Mountain View,
                                    94043<br>United States
                                </p>
                                <p style="font-size: 16px; font-weight: bold; color: #000000; margin: 0 0 4px;">
                                    <span style="color: #000000;">Phone Number:</span> 1 650-555-5555
                                </p>
                                <p style="font-size: 16px; font-weight: bold; color: #000000; margin: 0;"><span
                                        style="color: #000000;">Email:</span> devvaibhav1234@gmail.com</p>
                            </td>
                            <td colspan="2"
                                style="border: solid 4px #0b5ed7;border-left: solid 0;padding: 10px; text-align: left;">
                                <p style="font-size: 16px; font-weight: bold; color: #000000; margin: 0 0 4px;">
                                    US
                                    User</p>
                                <p style="font-size: 16px; font-weight: bold; color: #000000; margin: 0 0 4px;">
                                    1600 Amphitheatre Parkway1
                                    <br>
                                    Mountain View,
                                    94043<br>United States
                                </p>
                                <p style="font-size: 16px; font-weight: bold; color: #000000; margin: 0 0 4px;">
                                    <span style="color: #000000;">Phone Number:</span> 1 650-555-5555
                                </p>
                                <p style="font-size: 16px; font-weight: bold; color: #000000; margin: 0;"><span
                                        style="color: #000000;">Email:</span> devvaibhav1234@gmail.com</p>
                            </td> --}}

                        </tr>
                    </tbody>
                </table>

                <table style="width: 100%; border: none; border-spacing: 0;">
                    <tbody>
                        <tr>
                            <p
                                style="font-size: 26px; font-weight: bold; color: #000000; padding: 0 50px; margin: 20px 0 10px;">
                                Order details</p>
                        </tr>
                        <tr>
                            <td
                                style="padding: 12px 0 10px; font-size: 15px; font-weight: bold; color: #000000;text-align: left; padding-left: 10px;">
                                Product name</td>
                            <td style="padding: 12px 0 10px; font-size: 15px; font-weight: bold; color: #000000;">
                                Quantity</td>
                            <td style="padding: 12px 0 10px; font-size: 15px; font-weight: bold; color: #000000;">Price
                            </td>
                            <td style="padding: 12px 0 10px; font-size: 15px; font-weight: bold; color: #000000;">Total
                            </td>
                        </tr>
                        @foreach ($order->orderitems as $orderitems)
                            <tr style="vertical-align: top;">
                                <td style="border: solid 4px #0b5ed7; border-right: 0; padding: 8px;">
                                    <p
                                        style="padding: 0 0 5px; font-size: 15px; font-weight: bold; color: #000000; margin: 0;text-align: left">
                                        {{ $orderitems->products->title }}</p>
                                </td>
                                <td
                                    style="border: solid 4px #0b5ed7; border-right: 0; padding: 8px;font-size: 14px;font-weight: bold;color: #000000;">
                                    {{ $orderitems->quantity }}
                                </td>
                                <td
                                    style="border: solid 4px #0b5ed7; border-right: 0; padding: 8px;font-size: 14px;font-weight: bold;;color: #000000;">
                                    {{ $orderitems->price }}</td>
                                <td
                                    style="border: solid 4px #0b5ed7; padding: 10px;font-size: 14px;font-weight: bold;;color: #000000;">
                                    {{ $orderitems->price * $orderitems->quantity }}
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="4"
                                style="font-size: 15px;font-weight: bold;border: none; text-align: left;padding: 10px 10px;color: #000000;">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="3"
                                style="font-size: 15px;font-weight: bold;border: solid 4px #0b5ed7; border-right: 0; text-align: left;padding: 6px;color: #000000;">
                                Sub Total</td>
                            <td
                                style="font-size: 14px;font-weight: bold;border: solid 4px #0b5ed7; padding: 6px;color: #000000;">
                                {{ $order->total_price }}</td>
                        </tr>
                        {{-- <tr>
                            <td colspan="3"
                                style="font-size: 15px;font-weight: bold;border: solid 4px #0b5ed7; border-right: 0; text-align: left;padding: 6px;color: #000000;">
                                Coupon</td>
                            <td
                                style="font-size: 14px;font-weight: bold;border: solid 4px #0b5ed7; padding: 6px;color: #000000;">
                                $-30.00</td>
                        </tr> --}}
                        {{-- <tr>
                            <td colspan="3"
                                style="font-size: 15px;font-weight: bold;border: solid 4px #0b5ed7; border-right: 0; text-align: left;padding: 6px;color: #000000;">
                                Shipping</td>
                            <td
                                style="font-size: 14px;font-weight: bold;border: solid 4px #0b5ed7; padding: 6px;color: #000000;">
                                $19.99</td>
                        </tr> --}}
                        <tr>
                            <td colspan="3"
                                style="font-size: 15px;font-weight: bold;border: solid 4px #0b5ed7; border-right: 0; text-align: left;padding: 6px;color: #000000;">
                                Total</td>
                            <td
                                style="font-size: 14px;font-weight: bold;border: solid 4px #0b5ed7; padding: 6px;color: #000000;">
                                {{ $order->total_price }}
                            </td>
                        </tr>

                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td style="vertical-align: bottom;">
                <p style="margin: 0; color: #0b5ed7; font-size: 23px; font-weight: bold; margin-bottom: 10px;">CONTACT
                    US</p>
                <p style="margin: 0; color: #000000; font-size: 14px; font-weight: bold; margin-bottom: 4px;">GOPAL
                    SNACKS PVT. LTD.</p>
                <p style="display: table;margin: 0 auto 4px;">
                <p><i class="fas fa-phone-alt fa-sm"></i> 02827 297060
                <p> (+91) 85112 12345</p>
                </p>
                <p style="display: table;margin: 0 auto 4px;">
                <p> <i class="far fa-envelope fa-lg"></i> info@gopalsnacks.com</p>
                </p>
                <p style="display: table;margin: 0 auto 20px;">
                    <a href="{{ route('front.home') }}"
                        style="color: #000000;font-size: 14px;font-weight: bold;text-decoration: none;display: table-cell;vertical-align: middle;line-height: 100%;padding-left: 3px;">gopalnamkeen.com</a>
                </p>
            </td>

        </tr>
    </table>

</html>
