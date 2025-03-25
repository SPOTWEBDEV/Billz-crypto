    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .b-dock-main {
            height: fit-content;
            padding: 15px 0;
            width: 97%;
            position: fixed;
            bottom: 10px;
            border-radius: 15px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 30;
            background: var(--custom-white);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 0 26px 0 var(--custom-white);
        }

        .b-dock-main .b-dock-holder {
            display: flex;
            align-items: center;
            gap: 40px;
        }

        .b-dock-main .b-dock-holder .anchor {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-decoration: none;
        }

        .b-dock-main .b-dock-holder .anchor i {
            font-size: 24px;
        }

        .b-dock-main .b-dock-holder .anchor span {
            font-size: 10px;
        }
    </style>


    <div class="b-dock-main">
        <div class="b-dock-holder">
            <a class="anchor" href="<?= $domain . 'app/' ?>">
                <i class="bx bx-home-circle"></i>
                <span>Home</span>
            </a>
            <a class="anchor" href="<?= $domain . 'app/' ?>deposit.php">
                <i class="bx bx-money"></i>
                <span>Deposit</span>
            </a>
            <a class="anchor" href="<?= $domain . 'app/' ?>investment.php">
                <i class="bx bx-layer-plus"></i>
                <span>Invest</span>
            </a>
            <a class="anchor" onclick="showPopin(true)">
                <i class="bx bx-money-withdraw"></i>
                <span>Withdraw</span>
            </a>
        </div>
    </div>