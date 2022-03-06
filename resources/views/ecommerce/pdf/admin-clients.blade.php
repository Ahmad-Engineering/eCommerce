<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clients</title>

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
                    <th scope="col">E-mail</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Location</th>
                    <th scope="col">Created</th>
                    <th scope="col">Updated</th>
                    <th scope="col">Status</th>
                    <th scope="col">Contracts</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Tax</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($clients as $client)
                    @php
                        $contract_no = 0;
                        $contract_price = 0;
                        $tax_price = 0;
                        foreach ($client->contracts as $contract) {
                            # code...
                            ++$contract_no;
                            $contract_price += $contract->price;
                            $tax_price += round($contract->tax_no);
                        }
                    @endphp
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $client->id }}</td>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->phone }}</td>
                        <td>{{ $client->location }}</td>
                        <td>{{ $client->created_at->format('m/d/y') }}</td>
                        <td>{{ $client->updated_at->format('m/d/y') }}</td>
                        <td>
                            @if ($client->status)
                                <span style="color: green;">Actice</span>
                            @else
                                <span style="color: red;">Bolcked</span>
                            @endif
                        </td>
                        <td>
                            {{
                                '# ' . $contract_no . ' #'
                            }}
                        </td>
                        <td>
                            {{
                                '# ' . $contract_price . ' #'
                            }}
                        </td>
                        <td>
                            {{
                                $tax_price
                            }}
                        </td>
                    </tr>
                    @php
                        ++$no;
                    @endphp
                @endforeach
            </tbody>
        </table>

    </div>

</body>

</html>
