<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Cairo:wght@200;400;500;700&display=swap");

        * {
            font-family: "Cairo", sans-serif;
            margin: 0;
            padding: 0;
        }

        html {
            display: flex;
            justify-content: center;
        }

        .contract {
            margin-top: 30px;
            border: 2px solid black;
            height: 750px;
            width: 900px;
        }

        .information-end {
            position: relative;
            display: flex;
            justify-content: space-between;
            margin: 5px 20px;
        }

        .contract-compny {
            margin-top: 30px;
            text-decoration: underline;
        }

        .information-end .date {
            position: absolute;
            top: 0;
            right: 0;
        }

        .head {
            position: relative;
            text-align: center;
        }

        .head::before {
            margin: 0;
            content: "";
            position: absolute;
            top: 120px;
            right: 0px;
            background-color: #000;
            width: 100%;
            height: 3px;
        }

        .Infromation-Company {
            margin: 50px 30px;
        }

        .m1 {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .m1 label {
            width: 50%;
            margin-top: 10px;

            font-size: 17px;
        }

        .Infromation-client {
            margin: 20px 30px;
        }

    </style>
</head>

<body>
    <section class="contract" id="contract">
        <div class="container" id="container">
            <div class="head">
                <!-- Logo in Company -->
                <!-- <img src="" alt=""> -->
                <h1 class="contract-Company">Contract Company</h1>
                <h2 class="contract-title">contract title</h2>
            </div>
        </div>
        <div class="Infromation-Company">
            <h2>▪ Infromation AlManara</h2>
            <p class="m1">
                <label><strong>Name :</strong> Eslam El Beak</label>
                <label><strong>Phone :</strong> 00000222222</label>
                <br />
                <label><strong>Email :</strong> example@example.com</label>
                <label><strong>Address : </strong>Dbai ,Gaza steet-9</label>
            </p>
        </div>
        <hr />
        <div class="Infromation-client">
            <h2>▪ Infromation Client</h2>
            <p class="m1">
                <label><strong>Name :</strong> Eslam El Beak</label>
                <label><strong>Phone :</strong> 00000222222</label>
                <br />
                <label><strong>Email :</strong> example@example.com</label>
                <label><strong>Address : </strong>Dbai ,Gaza steet-9</label>
            </p>
        </div>
        <hr />
        <div class="Infromation-client">
            <h2>▪ Infromation contract</h2>
            <p class="m1">
                <label><strong>Ttitle :</strong> Eslam El Beak</label>
                <label><strong>Email :</strong> example@example.com</label>
                <br />
                <label><strong>date to :</strong> 20/2/2022</label>
                <label><strong>date for :</strong> 20/2/2022</label>
                <label><strong>Address : </strong>Dbai ,Gaza steet-9</label>
                <label><strong>Type : </strong>Dbai</label>
                <label><strong>Price : </strong>887 $</label>
                <label><strong>stats : </strong>887 $</label>
            </p>
        </div>
    </section>

    <div class="information-end">
        <span class="date"><strong>Date :</strong> 20/2/2022</span>
        <span class="ID-contract-main"><strong>ID :</strong>:2220222522</span>
    </div>
</body>

</html>
