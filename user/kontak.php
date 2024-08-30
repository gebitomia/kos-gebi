<?php
require_once "view/header.php";

if (isset($_POST['submit'])) {
    $ambil2 = $_POST['txtid'];
    $teks = $_POST['teks'];
    $sqlx = $pdo->query("SELECT * FROM tamu WHERE idtamu=$ambil2");
    $datax = $sqlx->fetch();
    $idt = $datax['idtamu'];
    $user = $datax['username'];

    $sqlsimpan = $pdo->query("INSERT INTO kontak VALUES('', '$idt', '$user', '$teks', '')");

    echo "<script>window.location.replace('kontak.php');</script>";
}
?>

<!-- Breadcrumb Section Begin -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>Kontak Kami</h2>
                    <div class="bt-option">
                        <a href="index">Beranda</a>
                        <span>Kontak</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Blog Details Section Begin -->
<section class="blog-details-section">
    <div class="container">
	<div class="col-lg-3 col-md-2 col-sm-4">
                <div class="blog-details-text">
                    <div class="comment-option">
                        <?php
                        $sqly = $pdo->query("SELECT * FROM kontak WHERE idtamu=$ambil");
                        while ($datay = $sqly->fetch()) {
                            $idkontak = $datay['idkontak'];
							$idtamu = $datay['idtamu'];
							$usern = $datay['username'];
							$pesanuser = $datay['pesanuser'];
							$pesanadmin = $datay['pesanadmin'];
                        ?>
                        <!-- User's Message -->
                        <?php if ($pesanuser != '') { ?>
                            <div class="single-comment-item first-comment">
                                <div class="sc-author">
                                    <img src="../simpangambar/<?php
												if ($foto != '') {
													echo $foto;
												} else {
													echo 'profil.png';
												}
												?>" alt="" style="font-size:2px;">
                                </div>
                                <div class="sc-text">
                                    <h6><?php echo $nama; ?></h6>
                                    <p><?php echo $pesanuser ?></p>
                                </div>
                            </div>
                        <?php } ?>

                        <!-- Admin's Reply -->
                        <?php if ($pesanadmin != '') { ?>
                            <div class="single-comment-item reply-comment">
                                <div class="sc-author">
                                </div>
                                <div class="sc-text">
                                    <h6>Admin</h6>
                                    <p><?php echo $pesanadmin ?></p>
                                </div>
                            </div>
                        <?php } } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details Section End -->

<!-- Contact Section Begin -->
<section class="contact-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg">
                <div class="contact-text">
                    <h2>Info Kontak</h2>
                    <p>Kami selalu siap membantu Anda! Jika Anda memiliki pertanyaan, membutuhkan informasi lebih lanjut, atau ingin berbicara dengan kami mengenai layanan yang kami tawarkan, jangan ragu untuk menghubungi kami melalui cara-cara berikut:</p>
                    <table>
                        <tbody>
                            <tr>
                                <td class="c-o">Alamat</td>
                                <td>: Jl. Leo watimena,RT.25/RW.3,Waiheru,Baguala,Ambon maluku</td>
                            </tr>
                            <tr>
                                <td class="c-o">Telp/WA</td>
                                <td>: +62 813-4300-9779</td>
                            </tr>
                            <tr>
                                <td class="c-o">Email</td>
                                <td>: gebitomia@gmail.com</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg">
                <!-- pesan komplain -->
                <form method="post" action="kontak" class="contact-form needs-validation" novalidate>
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="hidden" name="txtid" value="<?php echo $id ?>">
                            <textarea name="teks" style="height: 200px;" class="form-control" id="validationCustom03" placeholder="Silahkan isi pesan komplainnya..." required></textarea>
                            <div class="invalid-feedback">
                                Tolong di isi pesannya!
                            </div>
                            <div class="valid-feedback">
                                Bagus sekali!
                            </div>
                            <button type="submit" name="submit" value="Kirim" id="tombol" class="btn btn-primary mt-3">Kirim</button>
                        </div>
                    </div>
                </form>
                <!-- akhir pesan komplain -->
            </div>
        </div>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d177.25053974420027!2d128.21385148799533!3d-3.628925931096291!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d6cef0031f241ef%3A0x888d04c83ec02024!2sWaiheru%20BIP%20biliard!5e1!3m2!1sid!2sid!4v1724572434679!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>
<!-- Contact Section End -->

<?php
require_once "view/footer.php";
?>
