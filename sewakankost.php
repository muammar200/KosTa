<head>
    <link rel="stylesheet" href="css/sewakankost.css">
</head>

<?php
    if(isset($_GET['insert_kost_success'])){
        echo "
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Data Berhasil Ditambahkan',
            text: 'Data kost berhasil ditambahkan ke dalam antrian pendaftaran',
        });
        history.pushState('', document.title, window.location.pathname);
    </script>
    ";
    }
?>
<div class="container sewakost">
    <div class="row">
        <div class="col-12 img" style="border-radius: 8px;">
            <div class="title">
                <p class="">Tingkatkan Penghasilan <br> Bersama KosTa'</p>
            </div>
            <div class="desc">
                <p class="">Jadilah partner Kami untuk maksimalkan profit kost Anda dan <br> nikmati keuntungan bebas ribet.</p>
            </div>
            <div class="button-more d-flex align-items-center">
                <div class="div-modal me-4">
                    <button type="button" class="btn modal-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Daftarkan Kost
                    </button>

                    <!-- Modal -->
                    <?php if($user_id == false) : ?>
                    <!-- user_id tidak ada -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Anda belum masuk/login, silahkan
                                        masuk terlebih dahulu untuk bisa mendaftarkan kost Anda</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <a href='<?=BASE_URL."index.php?page=login"?>'
                                        class="btn btn-daftar-kost mt-2">Masuk</a>
                                    </form>
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <p class="">Punya Pertanyaan?</p>
                                    <div class="whatsapp">
                                        <a class="text-wa" href="https://wa.me//+6282192789513?Assalamualaikum"
                                            target="_blank">
                                            <i class="bi bi-whatsapp"></i>
                                            WhatsApp</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php else : ?>
                    <!-- user_id ada -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Daftarkan Kost</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="card p-3">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-exclamation-circle me-2"></i>
                                            <p class="">Segera daftarkan kost Anda. Tim kami akan menghubungi Anda segera.</p>
                                        </div>
                                    </div>
                                    <form action="<?= BASE_URL."module/pendaftaran_kost/action.php"?>" method="POST">
                                        <h2 class="mt-3 mb-3 data-kost">Data Kost</h2>
                                        <div class="mb-3">
                                            <label for="nama_kost" class="form-label">Nama Kost</label>
                                            <input type="text" class="form-control" id="nama_kost" name="nama_kost"
                                                placeholder="isi nama lengkap kost" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="lokasi" class="form-label">Lokasi Kost</label>
                                            <textarea type="text" class="form-control" id="lokasi" name="lokasi"
                                                placeholder="Masukkan Nama Kelurahan, Nama Kecamatan. Contoh: Samata, Somba Opu"
                                                required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="alamat" class="form-label">Alamat</label>
                                            <textarea type="text" class="form-control" id="alamat" name="alamat"
                                                placeholder="Isi alamat lengkap kost" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="jumlah_kamar" class="form-label">Jumlah Kamar</label>
                                            <input type="text" class="form-control" id="jumlah_kamar"
                                                name="jumlah_kamar" placeholder="Nilai minimum adalah 1" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="kategori" class="form-label">Kategori Kost</label>
                                            <select class="form-control" id="kategori" name="kategori" required>
                                                <option value="" disabled selected>--Pilih Kategori--</option>
                                                <?php
                $queryKategori = "SELECT * FROM kategori WHERE status='on'";
                $result = mysqli_query($koneksi, $queryKategori);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='".$row['kategori_id']."'>".$row['kategori']."</option>";
                }
            ?>
                                            </select>

                                        </div>
                                        <button name="Add" type="submit" class="btn btn-daftar-kost mt-2">Daftarkan
                                            Kost</button>
                                    </form>
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <p class="">Punya Pertanyaan?</p>
                                    <div class="whatsapp">
                                        <a class="text-wa" href="https://wa.me//+6282192789513?Assalamualaikum"
                                            target="_blank">
                                            <i class="bi bi-whatsapp"></i>
                                            WhatsApp</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="call-contact">
                    <div class="whatsapp">
                        <a class="btn-wa" href="https://wa.me//+6282192789513?Assalamualaikum" target="_blank">
                            <i class="bi bi-whatsapp me-2"></i>
                            Hubungi Tim Kami</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container partner">
    <div class="row">
        <div class="col-12 mb-4">
            <p class="main-title">Kenapa Perlu Jadi Partner Kami?</p>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="d-flex mb-3 align-items-center">
                <img class="me-3" src="img/check.png" alt="" width="28px">
                <p class="title">Penghasilan Bebas Ribet</p>
            </div>
            <p class="desc">Penghasilan Bebas Ribet adalah salah satu manfaat yang dapat didapatkan oleh pemilik kost
                dengan menjadi mitra dari website kami. </p>
            <div class="d-flex mb-3 mt-5 align-items-center">
                <img class="me-3" src="img/check.png" alt="" width="28px">
                <p class="title">Penghasilan Bebas Ribet</p>
            </div>
            <p class="desc">Penghasilan Bebas Ribet adalah salah satu manfaat yang dapat didapatkan oleh pemilik kost
                dengan menjadi mitra dari website kami. </p>
            <div class="d-flex mb-3 mt-5 align-items-center">
                <img class="me-3" src="img/check.png" alt="" width="28px">
                <p class="title">Penghasilan Bebas Ribet</p>
            </div>
            <p class="desc">Penghasilan Bebas Ribet adalah salah satu manfaat yang dapat didapatkan oleh pemilik kost
                dengan menjadi mitra dari website kami. </p>
            <div class="d-flex mb-3 mt-5 align-items-center">
                <img class="me-3" src="img/check.png" alt="" width="28px">
                <p class="title">Penghasilan Bebas Ribet</p>
            </div>
            <p class="desc">Penghasilan Bebas Ribet adalah salah satu manfaat yang dapat didapatkan oleh pemilik kost
                dengan menjadi mitra dari website kami. </p>
        </div>
        <div class="col-6 p-0 col-img">
            <img class="img-partner" src="img/partner.jpg" alt="" style="border-radius: 4px;">
        </div>
    </div>
</div>

<div class="container kontrak black-overlay">
    <div class="row d-flex">
        <div class="col-lg-12 img " style="border-radius: 8px;">
        
        <!-- <div class="color"> -->
                        <p class="top-title text-responsive">3 Langkah untuk Jadi Partner Kami</p>
                        <div class="step-section" style="width: 90%;">
                            <div class="konten">
                                <p class="number bg-warning">1</p>
                                <div class="card card-form">
                                    <button type="button" class="btn modal-btn" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">Daftarkan Kost</button>
                                            <p class="title">dan Tim Kami Lakukan Evaluasi
                                    </p>
                                </div>
                            </div>
                            <div class="konten">
                                <p class="number bg-warning">2</p>
                                <div class="card card-text">
                                            <p class="title">Periksa & Tanda Tangan Isi Kontrak
                                    </p>
                                </div>
                            </div>
                            <div class="konten">
                                <p class="number bg-warning">3</p>
                                <div class="card card-text">
                                            <p class="title">Duduk Manis & Nikmati Hasilnya
                                    </p>
                                </div>
                            </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Daftarkan Kost</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card p-3">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-exclamation-circle me-2"></i>
                                                <p class="">Segera daftarkan kost Anda. Tim kami akan menghubungi Anda segera.
                                                </p>
                                            </div>
                                        </div>
                                        <form action="<?= BASE_URL."module/pendaftaran_kost/action.php"?>" method="POST">
                                        <h2 class="mt-3 mb-3 data-kost">Data Kost</h2>
                                        <div class="mb-3">
                                            <label for="nama_kost" class="form-label">Nama Kost</label>
                                            <input type="text" class="form-control" id="nama_kost" name="nama_kost"
                                                placeholder="isi nama lengkap kost" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="lokasi" class="form-label">Lokasi Kost</label>
                                            <textarea type="text" class="form-control" id="lokasi" name="lokasi"
                                                placeholder="Masukkan Nama Kelurahan, Nama Kecamatan. Contoh: Samata, Somba Opu"
                                                required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="alamat" class="form-label">Alamat</label>
                                            <textarea type="text" class="form-control" id="alamat" name="alamat"
                                                placeholder="Isi alamat lengkap kost" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="jumlah_kamar" class="form-label">Jumlah Kamar</label>
                                            <input type="text" class="form-control" id="jumlah_kamar"
                                                name="jumlah_kamar" placeholder="Nilai minimum adalah 1" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Pastikan Email yang anda daftarkan sama dengan email akun anda"
                                                aria-describedby="emailHelp">
                                            <div id="emailHelp" class="form-text">We'll never share your email with
                                                anyone else.</div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Nomor Handphone</label>
                                            <input type="tel" class="form-control" id="phone"
                                                pattern="^(\+62\s?)[0-9]{9,13}$" name="phone" required
                                                placeholder="Contoh Format : +6282192789513">
                                        </div>
                                        <div class="mb-3">
                                            <label for="kategori" class="form-label">Kategori Kost</label>
                                            <select class="form-control" id="kategori" name="kategori" required>
                                                <option value="" disabled selected>--Pilih Kategori--</option>
                                                <?php
                $queryKategori = "SELECT * FROM kategori WHERE status='on'";
                $result = mysqli_query($koneksi, $queryKategori);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='".$row['kategori_id']."'>".$row['kategori']."</option>";
                }
            ?>
                                            </select>

                                        </div>
                                        <button name="Add" type="submit" class="btn btn-daftar-kost mt-2">Daftarkan
                                            Kost</button>
                                    </form>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-center">
                                        <p class="">Punya Pertanyaan?</p>
                                        <div class="whatsapp">
                                            <a class="text-wa" href="https://wa.me//+6282192789513?Assalamualaikum"
                                                target="_blank">
                                                <i class="bi bi-whatsapp"></i>
                                                WhatsApp</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
        </div>
    </div>
    </div>
</div>