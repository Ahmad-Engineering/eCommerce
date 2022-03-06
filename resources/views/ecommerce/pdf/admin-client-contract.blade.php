<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contract</title>
</head>

<body>
    {{-- <h1>Manarat</h1>
    <p>This contract is entered into on: {{ $contract->id }}</p>
    {{-- <p>And expired at on: {{ $contract->to_date }}</p> --}}

    {{-- Contract Information --}}
    {{-- Contract  Title --}}
    Title: Manarat <br>
    Contract Name: {{ $contract->title }}
    <hr>

    {{-- Admin Information Company --}}
    Admin Name: {{ $contract->admin->id }}<br>
    Admin Name: {{ $contract->admin->name }}<br>
    Admin E-mail: {{ $contract->admin->email }}<br>
    Admin Phone: {{ $contract->admin->phone }}<br>
    Admin Bio: {{ $contract->admin->bio }}<br>

    <hr>
    {{-- Client Information Company --}}
    Client id: {{ $contract->client->id }} <br>
    Client Name: {{ $contract->client->name }}<br>
    Client E-mail: {{ $contract->client->email }}<br>
    Client Phone: {{ $contract->client->phone }}<br>
    Client Location: {{ $contract->client->location }}<br>

    <hr>
    {{-- Contract Information Company --}}
    Contract Title: {{ $contract->title }} <br>
    Contract Begin Date: {{ $contract->from_date }}<br>
    Contract End Date: {{ $contract->to_date }}<br>
    Contract Type: {{ $contract->type }}<br>
    Contract Tax: <span style="font-weight: bold;">#</span> {{ round($contract->tax) }} <span style="font-weight: bold;">#</span><br>
    Contract Status: {{ $contract->status }}<br>
    Contract Price: <span style="font-weight: bold;">#</span> {{ $contract->price }} <span style="font-weight: bold;">#</span><br>

    <hr>



    <section class="contract" id="contract">
        <div class="container" id="container">
            <div class="head">
                <h2 class="contract-compny">contract-compny</h2>
                <h2 class="contract-title">contract title </h2>
            </div>

        </div>

        <div class="information">
            <span class="date">date</span>
            <span class="ID-contract-main">ID: {{ $contract }}</span>
        </div>
    </section>
</body>

</html>
