<html xmlns='http://www.w3.org/1999/xhtml'>

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <style type="text/css">
        @media print {
            @page {
                size: A4 portrait;
            }

            .main-table {
                border: 1px solid;
            }

            .logo-wrap {
                text-align: center;
            }

            .order-item .order-item-title {
                background-color: #dadada;
                border-bottom: 1px solid black;
            }

            .order-item tfoot {
                border: 1px solid black;
            }

            /*.order-caClculations tbody { width: 100%; }*/
            .order-calculations tr:last-of-type {
                background-color: #dadada;
                padding: 5px;
            }

            /*body .order-item-wrap .order-item:not(:last-child) {*/
            /*page-break-before: auto;*/
            /*page-break-after:always}*/
        }

        .main-table {
            border: 1px solid;
        }

        .logo-wrap {
            text-align: center;
        }

        .order-item .order-item-title {
            background-color: #dadada;
            border-bottom: 1px solid black;
        }

        .order-item tfoot {
            border: 1px solid black;
        }

        /*.order-calculations tbody { width: 100%; }*/
        .order-calculations tr:last-of-type {
            background-color: #dadada;
            padding: 5px;
        }

        /*body .order-item-wrap .order-item:not(:last-child) {*/
        /*page-break-before: auto;*/
        /*page-break-after:always}*/
    </style>
</head>

<body>
    <div style="border:1px solid #ccc;color: #000;font-family: Arial,Helvetica,sans-serif;font-size:14px;">
        <table rules="all" style=" width: 100%" class="main-table">
            <tbody>
                <tr style="width: 100%">
                    <td style="width: 75%">
                        <h2 style="display: inline-block; margin: 0;">YOGI PRODUCTS</h2><br />
                        Vavdi, Rajkot.<br />
                        <h2 style="display: inline-block; margin: 0;">FACHARA PLASTECH PVT LTD</h2><br />
                        Virva, Rajkot.<br />
                        Tele/Fax. :(0281) 2930306 E-mail : yogiproduct@yahoo.in<br />
                        OUR GST No:24AAAFY3262G1ZC
                    </td>
                    <td style="width: 25%; display: table-cell;" class="logo-wrap">
                        <img src="{{url('/media/Apex_logo.png')}}" style="width: 200px;">
                    </td>
                </tr>
                <tr style="width: 100%">
                    <td style="width: 75%; border-top: none;"></td>
                    <td style="width: 25%"><b>Mfrs : KITCHENWARE</b></td>
                </tr>
                <tr style="width: 100%">
                    <td style="width: 50%">
                        <span style="text-transform: uppercase; margin-bottom: 5px;"><b>From : {{$order->user->company_name}}</b></span><br />
                        <span> {{$order->user->address}}</span><br />
                        <span>MO.{{$order->user->mobile_no}}</span><br />
                        <span>MO.{{$order->user->whatsapp_no}}</span><br />
                    </td>
                    <td style="width: 50%">
                        <table rules="none" style=" width: 100%;">
                            <tbody>
                                <tr style="background-color: #dadada;">
                                    <td style="width: 50%; padding: 5px;">PO No: PO {{$order->id}}</td>

                                    <td style="width: 50%; padding: 5px;">Date: <?= date('d/m/Y', strtotime($order->created_at)); ?></td>
                                </tr>
                                <tr>
                                    <td>Transport</td>
                                    <td>{{$order->transporter}}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

                @php
                $totalCartoons = 0;
                @endphp
                <tr style="width: 100%">
                    <td colspan='2' class="order-item-wrap">
                        <table class="order-item" rules="cols" style="width: 100%; <?php echo count($order->orderItems) > 19 ? "page-break-after:always" : ""; ?>">
                            <thead>
                                <tr style="border-bottom: 1px solid black; background-color: #dadada;">
                                    <th style="width: 5%;">No.</th>
                                    <th style="width: 35%">Particulars</th>
                                    <th style="width: 15%">HSN No.</th>
                                    <th style="width: 10%">Qty</th>
                                    <th style="width: 10%">Rate</th>
                                    <th style="width: 10%">GST%</th>
                                    <th style="width: 15%; text-align: right;">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->orderItems as $item)
                                @php
                                $totalCartoons += $item->qnt;
                                @endphp
                                <tr>
                                    <td style="width: 5%">{{$item->product->id}}</td>
                                    <td style="width: 35%">{{$item->product->name}}
                                        <br>
                                        {{ $item->product->carton_capacity.' X '.$item->qnt }}
                                    </td>
                                    <td style="width: 15%">{{$item->product->hsn_code}}</td>
                                    <td style="width: 10%">{{$item->product->carton_capacity * $item->qnt}}</td>
                                    <td style="width: 10%">{{number_format($item->product->price, 2 ) }}</td>
                                    <td style="width: 10%">{{number_format($item->product->gst_rate, 2)}}</td>
                                    <td style="width: 15%; text-align: right;">{{number_format($item->price * $item->qnt, 2 )}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr style="border:1px solid black;">
                                    <td style="width: 5%"></td>
                                    <td style="width: 35%">Particular : {{$totalCartoons}} CARTOON</td>
                                    <td style="width: 15%"></td>
                                    <td style="width: 10%"></td>
                                    <td style="width: 10%"></td>
                                    <td style="width: 10%">Sub Total</td>
                                    <td style="width: 15%; text-align: right;">{{number_format($order->order_total, 2)}}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </td>
                </tr>
                <tr style="width: 100%">
                    <td>
                        <table rules="all" style="width: 100%;">
                            <tr>
                                <td colspan="6">
                                    <table style="width: 100%;">
                                        <tr>
                                            <td>Bank Name</td>
                                            <td> : </td>
                                            <td>SBI, Rajkot.</td>
                                        </tr>
                                        <tr>
                                            <td>Bank A/c No.</td>
                                            <td> : </td>
                                            <td>32848039684</td>
                                        </tr>
                                        <tr>
                                            <td>IFSC CODE</td>
                                            <td> : </td>
                                            <td>SBIN0016034</td>
                                        </tr>
                                    </table>
                                </td>
                                <td colspan="6">
                                    <table style="width: 100%;">
                                        <tr>
                                            <td>Bank Name</td>
                                            <td> : </td>
                                            <td>YES BANK</td>
                                        </tr>
                                        <tr>
                                            <td>Bank A/c No.</td>
                                            <td> : </td>
                                            <td>047584600002218</td>
                                        </tr>
                                        <tr>
                                            <td>IFSC CODE</td>
                                            <td> : </td>
                                            <td>YESB0000475 / YESB0000098</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table style="width: 100%">
                            @if($order->user->commission > 0)
                            <tr>
                                <td>DISCOUNT%</td>
                                <td>{{ $order->user->commission }}%</td>
                                <td style="text-align: right;">{{ $order->user->discount }}%</td>
                            </tr>
                            @endif
                            <tr>
                                <td>Sub Total</td>
                                <td></td>
                                <td style="text-align: right;">{{ $order->order_subtotal }}</td>
                            </tr>
                            <tr>
                                <td>IGST</td>
                                <td></td>
                                <td style="text-align: right;">{{ $order->tax_amount }}</td>
                            </tr>
                        </table>

                    </td>
                </tr>
                @php
                $total_igst = 0;
                @endphp
                <tr style="width: 100%">
                    <td style="width: 75%">
                        <table rules="all" style=" width: 100%;" border="1">
                            <thead>
                                <tr>
                                    <th style="width: 20%">GST Summary</th>
                                    <th style="width: 20%">Taxable Amnt</th>
                                    <th style="width: 20%">IGST</th>
                                    <th style="width: 20%">IGST AMT</th>
                                    <th style="width: 20%">Total GST</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orderTaxes as $tax => $value)
                                @php
                                $total_igst += $tax
                                @endphp
                                <tr>
                                    <td style="width: 20%">IGST {{'@'.number_format($tax, 2 )}}</td>
                                    <td style="width: 20%; text-align: right;">{{number_format($value, 2) }}</td>
                                    <td style="width: 20%">{{number_format($tax, 2)}}</td>
                                    <td style="width: 20%;">{{number_format($tax, 2)}}</td>
                                    <td style="width: 20%;">{{number_format($tax, 2)}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td style="width: 20%">IGST</td>
                                    <td style="width: 20%;">{{number_format($order->tax_amount, 2)}}</td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 20%;">{{number_format($total_igst, 2)}}</td>
                                    <td style="width: 20%;">{{number_format($total_igst, 2)}}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </td>
                    <td style="width: 25%">
                        <table style=" width: 100%;" rules="none" class="order-calculations">
                            <tbody>

                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Round Of</td>
                                    <td></td>
                                    <td style="text-align: right;">
                                        {{
                                            number_format(floor($order->order_total + $order->tax_amount - $order->user->discount) - ($order->order_total + $order->tax_amount - $order->user->discount),2)
                                        }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Grand Total</td>
                                    <td></td>
                                    <td style="text-align: right;">
                                        {{number_format($order->order_total)}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 100%" colspan="3">
                                        Rs. : {{$order->getOrderTotal($order->order_total)}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>


                </tr>
            </tbody>
            <tfoot>

                <tr style="width: 100%">
                    <td style="width: 75%">
                        <h3 style="display: inline-block; padding-left: 10px; margin: 5px 0 5px 0;">Terms &amp; Conditions:</h3>
                        <ol style="padding-left: 17px; margin: 0 0 0 10px;">
                            <li>Our risk & responsibilities ceases as soon as goods leaves our premises.</li>
                            <li>This bill must be paid on or before due date otherwise interest at 21.5% will be charged.</li>
                            <li>Goods once sold, will not be taken back.</li>
                            <li>Our responsibility ceases as soon as goods leaves our premises.</li>
                            <li>Subject to RAJKOT Jurisdiction.</li>
                            <li>E. & O. E.</li>
                        </ol>
                    </td>
                    <td style="width: 25%; text-align: right;">
                        <p>For, YOGI PRODUCTS</p>
                        <p></p>
                        <p></p>
                        <p>Authorised Signatory</p>
                    </td>
                </tr>
                <tr style="width: 100%">
                    <td colspan='2' style="width: 100%; text-align: center;">K i t c h e n w a r e M a n u f a c t u r e r</td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>

</html>