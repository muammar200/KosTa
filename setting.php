<?php
    $query = mysqli_query($koneksi, "SELECT chgpassword FROM pengguna WHERE user_id = '$user_id'");
    $result = mysqli_fetch_assoc($query);

    $kode = isset($_GET['code'])? $_GET['code'] : false;
    if ($kode == 'sucess') {
        echo "<div class='popup'><div class='popup-content'><p>Password telah berhasil diubah.</p></div></div>
        <script>
        history.pushState('', document.title, window.location.pathname);
        setTimeout(function(){ window.location.href = 'index.php?page=setting'; }, 3000);
        </script>"
        ;
    }  
?>
<style>
.popup {
  position: fixed;  
  width: 100%;
  height: 100%;
  z-index: 9;
}

.popup-content {
  position: absolute;
  top: 300px;
  left: 0;
  right: 0;
  /* bottom: 0; */
  margin: auto;
  width: 300px;
  height: 50px;
  background-color: #0ba40a;
  color: #f4f5f6;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
  animation: pop-up 0.5s ease-in-out forwards;
  justify-content: center;
}

.popup-content p{
    text-align: center;
    margin-top: 15px;
}

@keyframes pop-up {
  0% {
    transform: translateY(-100%);
  }
  100% {
    transform: translateY(0);
  }
}
</style>

<script>
  // Menghilangkan pesan alert setelah 3 detik
  setTimeout(function() {
    var popup = document.querySelector('.popup');
    if (popup) {
      popup.parentNode.removeChild(popup);
    }
  }, 3000);
</script>
<svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
    xmlns:svgjs="http://svgjs.com/svgjs" width="100%" height="200" preserveAspectRatio="none" viewBox="0 0 1500 200">
    <g mask="url(&quot;#SvgjsMask2381&quot;)" fill="none">
        <rect width="100%" height="200" x="0" y="0" fill="url(#SvgjsLinearGradient2382)"></rect>
        <use xlink:href="#SvgjsSymbol2389" x="0" y="0"></use>
        <use xlink:href="#SvgjsSymbol2389" x="720" y="0"></use>
        <use xlink:href="#SvgjsSymbol2389" x="1440" y="0"></use>
    </g>
    <defs>
        <mask id="SvgjsMask2381">
            <rect width="100%" height="200" fill="#ffffff"></rect>
        </mask>
        <linearGradient x1="21.67%" y1="-162.5%" x2="78.33%" y2="262.5%" gradientUnits="userSpaceOnUse"
            id="SvgjsLinearGradient2382">
            <stop stop-color="rgba(235, 243, 243, 1)" offset="1"></stop>
            <stop stop-color="rgba(235, 243, 243, 1)" offset="1"></stop>
        </linearGradient>
        <path d="M-1 0 a1 1 0 1 0 2 0 a1 1 0 1 0 -2 0z" id="SvgjsPath2386"></path>
        <path d="M-3 0 a3 3 0 1 0 6 0 a3 3 0 1 0 -6 0z" id="SvgjsPath2387"></path>
        <path d="M-5 0 a5 5 0 1 0 10 0 a5 5 0 1 0 -10 0z" id="SvgjsPath2383"></path>
        <path d="M2 -2 L-2 2z" id="SvgjsPath2388"></path>
        <path d="M6 -6 L-6 6z" id="SvgjsPath2384"></path>
        <path d="M30 -30 L-30 30z" id="SvgjsPath2385"></path>
    </defs>
    <symbol id="SvgjsSymbol2389">
        <use xlink:href="#SvgjsPath2383" x="30" y="30" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2384" x="30" y="90" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2385" x="30" y="150" stroke="rgba(3, 140, 136, 1)" stroke-width="3"></use>
        <use xlink:href="#SvgjsPath2386" x="30" y="210" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2383" x="90" y="30" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2383" x="90" y="90" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2384" x="90" y="150" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2384" x="90" y="210" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2383" x="150" y="30" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2384" x="150" y="90" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2387" x="150" y="150" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2383" x="150" y="210" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2386" x="210" y="30" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2387" x="210" y="90" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2384" x="210" y="150" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2388" x="210" y="210" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2384" x="270" y="30" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2383" x="270" y="90" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2385" x="270" y="150" stroke="rgba(3, 140, 136, 1)" stroke-width="3"></use>
        <use xlink:href="#SvgjsPath2384" x="270" y="210" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2384" x="330" y="30" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2384" x="330" y="90" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2383" x="330" y="150" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2383" x="330" y="210" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2387" x="390" y="30" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2384" x="390" y="90" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2386" x="390" y="150" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2384" x="390" y="210" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2383" x="450" y="30" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2384" x="450" y="90" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2384" x="450" y="150" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2388" x="450" y="210" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2384" x="510" y="30" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2388" x="510" y="90" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2383" x="510" y="150" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2383" x="510" y="210" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2384" x="570" y="30" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2386" x="570" y="90" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2386" x="570" y="150" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2383" x="570" y="210" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2388" x="630" y="30" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2384" x="630" y="90" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2384" x="630" y="150" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2386" x="630" y="210" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2383" x="690" y="30" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2384" x="690" y="90" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2384" x="690" y="150" stroke="rgba(3, 140, 136, 1)"></use>
        <use xlink:href="#SvgjsPath2384" x="690" y="210" stroke="rgba(3, 140, 136, 1)"></use>
    </symbol>
</svg>

<div class="container container-edit-info container-setting">
    <div class="row top-title">
        <div class="col-12 ">
            <p class="text-center">Pengaturan Akun</p>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-lg-6">
            <div class="main-title">
                <p>Kemanan Akun</p>
            </div>
            <div class="password">
                    <div class="d-flex justify-content-between">
                        <p class="title">Password</p>
                        <div class="edit">
                            <a href='<?=BASE_URL. "index.php?page=edit-pass"?>'>Ganti Password</a>
                        </div>
                    </div>
                    <p style="line-height:20px;" class="fill">Password terakhir diperbarui <?=date('d F', strtotime($result['chgpassword']));?>, <br>
                <?=date('H:i', strtotime($result['chgpassword']));?></p>
                    <hr>
                </div>
        </div>
    </div>
</div>