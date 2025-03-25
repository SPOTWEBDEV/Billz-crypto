<style>
    .pop-contain {
        height: 100vh;
        width: 100%;
        background: #00000012;
        backdrop-filter: blur(20px);
        position: fixed;
        top: 0;
        left: 0;
        z-index: 20;
        transform: translateY(100vh);
        transition: .3s cubic-bezier(0.075, 0.82, 0.165, 1);
    }

    .popin-main {
        background: var(--custom-white);
        position: fixed;
        z-index: 40;
        bottom: 100px;
        left: 50%;
        transform: translateX(-50%) translateY(600px);
        border-radius: 20px;
        padding: 15px;
        width: 95%;
        max-width: 450px;
        display: flex;
        flex-direction: column;
        box-shadow: 0 0 30px 0 #00000034;
    }

    .pop-contain.show {
        transform: translateY(0px);
    }

    .popin-main.show {
        transform: translateX(-50%) translateY(0px);
    }

    .popin-header {
        text-align: center;
        width: 100%;
        margin-bottom: 13px;
    }

    .popin-wallet {
        display: flex;
        flex-direction: column;
    }

    .popin-wallet input {
        width: 100%;
        height: 50px;
        border: 0;
        border-radius: 15px;
        padding: 0 10px;
        margin-top: 5px;
        outline: none;
        background: transparent;
        border: 2px solid grey;
        color: grey;
    }

    .options-holder {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .option {
        border: 2px solid grey;
        border-radius: 15px;
        padding: 5px 10px;
        display: flex;
        flex-direction: column;
    }

    .option.active {
        border: 2px solid rgb(111, 0, 255);
    }

    .popin-btn {
        height: 45px;
        width: 100%;
        border: 0;
        border-radius: 15px;
        background: blueviolet;
        color: white;
        font-size: 18px;
        cursor: pointer;
    }
</style>
<div class="pop-contain" onclick="showPopin(false)">
</div>
<div class="popin-main">
    <div class="popin-header">
        <h2>SELECT ACCOUNT</h2>
    </div>
    <!-- <div class="popin-wallet">
        <label>Withdrawal wallet address</label>
        <input type="text">
    </div> -->
    <br>
    <div class="options-holder">
        <div class="option active" onclick="checkToSetActive(1)" key="1">
            <span>ACCOUNT BALANCE</span>
            <span><b>Balance:</b> $<?php echo $userDetails['wallet'] ?></span>
        </div>
        
        <div class="option" onclick="checkToSetActive(2)" key="2">
            <span>REFERRAL BALANCE</span>
            <span><b>Balance:</b> $<?php echo $userDetails['referral_balance'] ?></span>
        </div>
        <button class="popin-btn" onclick="sendToPage()">
            PROCEED
        </button>
    </div>
</div>

<script>
    const opt = document.querySelectorAll('.option');
    const body = document.querySelector('html');
    const popinMain = document.querySelector('.popin-main');
    const popin = document.querySelector('.pop-contain');
    const checkToSetActive = (id) => {
        opt.forEach(el => {
            if (el.getAttribute('key') == id) {
                el.classList.add('active')
            } else {
                el.classList.remove('active')
            }
        })
    }

    const showPopin = (condition) => {
        if (condition) {
            popinMain.classList.add('show');
            popin.classList.add('show');
            return;
        }
        popinMain.classList.remove('show');
        popin.classList.remove('show');
    }
    const openPage = (target) => {
        window.location.href = target
    }

    const sendToPage = () => {
        const picked = document.querySelector(".option.active");

        let pickedValue = picked.getAttribute('key');
        switch (pickedValue) {
            case '1':
                openPage('./withTwo.php');
                break;
            case '2': 
                openPage('./withThree.php');
                break;
            default:
            openPage('./withTwo.php');
        }
    }
</script>