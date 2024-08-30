<?php
require_once "view/header.php";
?>
<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Input</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#"><i class="la la-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item">Input Kamar</li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-6">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Input Data Kamar</div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        </div>
                    </div>
                    <div class="ibox-body">
                        <form method="post" action="fungsi/prosesinput" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>ID Kamar</label>
                                    <input class="form-control" type="text" placeholder="Masukkan Id Kamar" name="id" required>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Tipe</label>
                                    <select name="tipe" class="form-control" required>
                                        <option selected="selected" disabled="disabled">--Pilih--</option>
                                        <option>Kamar 1</option>
                                        <option>Kamar 2</option>
                                        <option>Kamar 3</option>
                                        <option>Kamar 4</option>
                                        <option>Kamar 5</option>
                                        <option>Kamar 6</option>
                                        <option>Kamar 7</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input class="form-control" type="number" placeholder="Masukkan Jumlah Kamar" name="jumlah" required>
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <input class="form-control" type="number" placeholder="Harga Kamar" name="harga" required>
                            </div>
                            <div class="form-group">
                                <label>Gambar</label>
                                <input class="form-control" type="file" name="gambar">
                            </div>
                            <div class="form-group">
                                <label>Fasilitas</label>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="check-list">
                                            <label class="ui-checkbox ui-checkbox-success">
                                                <input type="checkbox" name="fasilitas[]" value="Tempat Tidur">
                                                <span class="input-span"></span>Tempat Tidur
                                            </label>
                                            <label class="ui-checkbox ui-checkbox-success">
                                                <input type="checkbox" name="fasilitas[]" value="Kamar Mandi Dalam">
                                                <span class="input-span"></span>Kamar Mandi Dalam
                                            </label>
                                            <label class="ui-checkbox ui-checkbox-success">
                                                <input type="checkbox" name="fasilitas[]" value="WiFi">
                                                <span class="input-span"></span>WiFi
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="check-list">
                                            <label class="ui-checkbox ui-checkbox-success">
                                                <input type="checkbox" name="fasilitas[]" value="Air">
                                                <span class="input-span"></span>Air
                                            </label>
                                            <label class="ui-checkbox ui-checkbox-success">
                                                <input type="checkbox" name="fasilitas[]" value="Dapur Mini">
                                                <span class="input-span"></span>Dapur Mini
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea class="form-control" rows="3" placeholder="Deskripsi Kamar" name="deskripsi"></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
<?php
require_once "view/footer.php";
?>
