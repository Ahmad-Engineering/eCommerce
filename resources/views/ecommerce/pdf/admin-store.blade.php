<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>stores</title>

    <style>
        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 90%;
            border: 1px solid #ddd;

        }

        th,
        td {
            text-align: left;
            font-size: 13px;
            padding: 5px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }

    </style>
</head>

<body>

    <h1 style="text-align: center;">Manarat</h1>
    <h4 style="text-align: center;">{{ auth('admin')->user()->name }}</h4>
    <div class="str">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Price</th>
                    <th scope="col">Offer</th>
                    <th scope="col">Price After Offer</th>
                    <th scope="col">Created at</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($stores as $store)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $store->id }}</td>
                        <td>{{ $store->name }}</td>
                        <td>{{ $store->amount }}</td>
                        <td>{{ $store->price }}</td>
                        <td>{{ $store->offer }}</td>
                        <td>{{ $store->price_after_offer }}</td>
                        <td>{{ $store->created_at->format('m/d/y') }}</td>
                    </tr>
                    @php
                        ++$no;
                    @endphps
                @endforeach
            </tbody>
        </table>
        <h6>
            {{ Date::now() }}
        </h6>
    </div>

</body>

</html>
