<?php 
    $phone = "";
    $email = "";

    $coba = isset($_GET['phone']) ? $_GET['phone'] : false; 
    $coba2 = isset($_GET['pass']) ? $_GET['pass'] : false; 
    if($user_id){
        $query = mysqli_query($koneksi, "SELECT * FROM pengguna where user_id = '$user_id' AND status = 'on' ");
        $row = mysqli_fetch_assoc($query);
        $phone = $row['phone'];
        $email = $row['email'];
    } else{
        header("location:".BASE_URL);
    }


?>
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

<div class="container container-personal-info edit-nohp">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-6">
            <?php if($coba == "phone"):?>
            <p class="top-title-hp">Perbarui No. Handphone kamu</p>
            <?php else:?>
                <p class="top-title-hp">Perbarui Email kamu</p>
            <?php endif;?>
            <form action='<?=BASE_URL."module/user/action.php"?>' method="POST">
                <?php if($coba == "phone") :?>
                <div class="mb-4">
                    <label class="title" for="phone">No Handphone Baru*</label>
                    <input type="tel" name="phone" id="phone" class="form-control" placeholder="cth: 082xxx" required>
                </div>
                <?php else:?>
                    <div class="mb-4">
                    <label class="title" for="email">Email Baru*</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="cth: 082xxx" required>
                </div>
                <?php endif;?>
                <div class="mb-4">
                    <label class="title" for="password">Password*</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" required>
                </div>
                <div>
                    <button>Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>