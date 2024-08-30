<?php require_once "view/header.php"; ?>

<div id="preloder">
	<div class="loader"></div>
</div>

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
                                <td>: Jl. Waiheru Asrama Blok B, Ambon, Maluku, Kode Pos 12345</td>
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
                <form action="#" class="contact-form needs-validation" novalidate>
                    <div class=" row">
                        <div class="col-lg-12">
                            <textarea style="height: 200px;" class="form-control" id="validationCustom03" placeholder="Silahkan isi pesan komplainnya..." required></textarea>
                            <div class="invalid-feedback">
                                Tolong di isi pesannya!
                            </div>
                            <div class="valid-feedback">
                                Bagus sekali!
                            </div>
                            <button type="submit">Submit Now</button>
                        </div>
                    </div>
                </form>
                <!-- akhir pesan komplain -->

            </div>
        </div>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d18352.31731214629!2d128.15955598715814!3d-3.696065299999993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d6ce8454347818b%3A0xd507f40415dcaa71!2sKampus%20STIKOM%20Ambon!5e1!3m2!1sen!2sid!4v1722367639599!5m2!1sen!2sid" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.0606825994123!2d-72.8735845851828!3d40.760690042573295!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e85b24c9274c91%3A0xf310d41b791bcb71!2sWilliam%20Floyd%20Pkwy%2C%20Mastic%20Beach%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1578582744646!5m2!1sen!2sbd" height="470" style="border:0;" allowfullscreen=""></iframe> -->
        </div>
    </div>
</section>
<!-- Contact Section End -->

<?php require_once "view/footer.php"; ?>