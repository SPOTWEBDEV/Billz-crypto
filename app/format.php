<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="  ">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .wrapper {
            width: 70%;
        }

        .wrapper h3 {
            text-transform: uppercase;
            text-decoration: underline;
            text-align: center;
            margin-bottom: 3rem;
        }


        .wrapper form {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .wrapper .parent {
            width: 100%;
            margin: .5rem 0;
        }

        .wrapper .flex {
            display: flex;
            align-items: center;
            gap: 0.5px;
        }

        input {
            width: 50%;
            border: 0;
            outline: 0;
            border-bottom: 1.5px solid;
        }

        .justify-between {
            justify-content: space-between;
        }

        @media(max-width:800px) {
            .wrapper {
                width: 90%;
            }

            form {
                font-size: 12px;
            }

            .wrapper p {
                font-size: 12px;
                text-align: jusKtify;
            }
        }
    </style>
</head>

<body>
    <div class=" wrapper">
    <h3>teaching experience certificate</h3>
    <form action="">
        <div class="flex parent">
            <label for="">Certified that Mr/Miss/Mrs/</label>
            <input type="text" name="">
        </div>
        <div class="flex parent">
            <label for="">S/o D/o Shri</label>
            <input type="text" name="">

        </div>
        <div class="flex parent">
            <div class="flex">
                <label for="">resident of village/town</label>
                <input type="text" name="">
            </div>
            <div class="flex">
                <label for="">Tehsil</label>
                <input type="text" name="">
            </div>
        </div>
        <div class="flex parent">
            <div class="flex">
                <label for="">Distt.</label>
                <input type="text" name="">
            </div>
            <div class="flex">
                <label for="">having qualification</label>
                <input type="text" name="">
            </div>
        </div>
        <div class="flex parent">
            <label for="">has been workin in this school since</label>
            <input type="text" name="">
        </div>
        <div class="flex parent">
            <label for="">as a Nursery Teacher/ Primary Teacher/TGT/PGT till</label>
            <input type="text" name="">.
        </div>
        <div class="flex parent">
            <div class="flex">
                <label for="">He/She has</label>
                <input type="text" name="">
            </div>
            <div class="flex">
                <label for="">years</label>
                <input type="text" name="">
            </div>
            <p class="flex">months of teaching experience</p>
        </div>
    </form>
    <br>
    <div>
        <p>During his/her stay in this school, his/her work and conduct remained good.
        <p>
            <br>
        <p>We wish for his/her bright future.</p>
    </div>
    <br><br>
    <div class="flex justify-between">
        <p>Date</p>
        <p>Principal</p>
    </div>
    </div>

    </body>

</html>