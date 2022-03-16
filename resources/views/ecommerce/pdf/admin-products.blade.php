<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th{
            background: rgb(189, 185, 189);
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

    </style>
</head>

<body>

    <h2>Products <span style="font-size: 10px;">{{auth('admin')->user()->email}}</span></h2> 
    <p>This docuement is exported from @manarat-free.com</p>
    <code>note.</code> <span style="font-weight: bold;">PAF</span> is a product price affer store offer. <br>
    <code>note.</code> <span style="font-weight: bold;">SP</span> is a prouduct static offer. <br>
    <code>note.</code> <span style="font-weight: bold;">AIS</span> is the amount is avilable in the store to start buying. <br><br>

    <div style="overflow-x: auto;">
        <table>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Price</th>
                <th>Status</th>
                <th>Store</th>
                <th>Offer</th>
                <th>PAF</th>
                <th>SP</th>
                <th>AIS</th>
            </tr>
            @php
                $no = 1;
            @endphp
            @foreach ($products as $product)
                <tr>
                    <td>{{$no}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price . ' $'}}</td>
                    <td>
                        @if ($product->status)
                            <span style="color: rgb(22, 184, 22);">Avilable</span>
                        @else
                            <span style="color: red;">Un-avilable</span>
                        @endif
                    </td>
                    <td>{{$product->store->name}}</td>
                    <td>{{'%' . $product->store->offer}}</td>
                    <td>{{$product->store->price_after_offer . ' $'}}</td>
                    <td style="text-decoration: line-through">{{$product->store->price  . ' $'}}</td>
                    <td>{{$product->store->amount}}</td>
                </tr>
                @php
                    ++$no;
                @endphp
            @endforeach
        </table>
    </div>

</body>

</html>
