<?php
	require_once "view/header.php";
?>
<div class="content-wrapper">
    <div class="page-content fade-in-up">
        <div class="row">
            <!-- Total Semua Pemesanan -->
            <div class="col-lg-3 col-md-6">
                <div class="ibox bg-success color-white widget-stat">
                    <div class="ibox-body">
                        <?php
                        $sql_total_pemesanan = $pdo->query("SELECT COUNT(*) as total FROM pemesanan");
                        $data_total_pemesanan = $sql_total_pemesanan->fetch();
                        $total_pemesanan = $data_total_pemesanan['total'];
                        ?>
                        <h2 class="m-b-5 font-strong"><?php echo $total_pemesanan; ?></h2>
                        <div class="m-b-5">Total Pemesanan</div><i class="ti-shopping-cart widget-stat-icon"></i>
                        <div><small>Ekost Waiheru</small></div>
                    </div>
                </div>
            </div>

            <!-- Total Pemesanan Dibatalkan -->
            <div class="col-lg-3 col-md-6">
                <div class="ibox bg-danger color-white widget-stat">
                    <div class="ibox-body">
                        <?php
                        $sql_total_batal = $pdo->query("SELECT COUNT(*) as total FROM pemesanan WHERE status = 'Dibatalkan'");
                        $data_total_batal = $sql_total_batal->fetch();
                        $total_batal = $data_total_batal['total'];
                        ?>
                        <h2 class="m-b-5 font-strong"><?php echo $total_batal; ?></h2>
                        <div class="m-b-5">Pesanan Dibatalkan</div><i class="ti-bar-chart widget-stat-icon"></i>
                        <div><small>Ekost Waiheru</small></div>
                    </div>
                </div>
            </div>

            <!-- Total Pemasukan dari Pemesanan Berhasil -->
            <div class="col-lg-3 col-md-6">
                <div class="ibox bg-warning color-white widget-stat">
                    <div class="ibox-body">
                        <?php
                        $sql_total_pemasukan = $pdo->query("SELECT SUM(totalbayar) as total FROM pemesanan WHERE status = 'Berhasil'");
                        $data_total_pemasukan = $sql_total_pemasukan->fetch();
                        $total_pemasukan = number_format($data_total_pemasukan['total'], 0, ",", ".");
                        ?>
                        <h2 class="m-b-5 font-strong">Rp. <?php echo $total_pemasukan; ?>,-</h2>
                        <div class="m-b-5">TOTAL Pemasukan</div><i class="fa fa-money widget-stat-icon"></i>
                        <div><small>Ekost Waiheru</small></div>
                    </div>
                </div>
            </div>

            <!-- Total Semua User -->
            <div class="col-lg-3 col-md-6">
                <div class="ibox bg-info color-white widget-stat">
                    <div class="ibox-body">
                        <?php
                        $sql_total_user = $pdo->query("SELECT COUNT(*) as total FROM tamu");
                        $data_total_user = $sql_total_user->fetch();
                        $total_user = $data_total_user['total'];
                        ?>
                        <h2 class="m-b-5 font-strong"><?php echo $total_user; ?></h2>
                        <div class="m-b-5">User</div><i class="ti-user widget-stat-icon"></i>
                        <div><small>Ekost Waiheru</small></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- START PAGE CONTENT-->
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Data Pemesanan</div>
                <div class="ibox-tools">
                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                </div>
            </div>
            <div class="ibox-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID Pesan</th>
                                <th width="91px">Tanggal Pesan</th>
                                <th>Tipe Kamar</th>
                                <th>Nama User</th>
                                <th>Alamat User</th>
                                <th>No.Tlp User</th>
                                <th width="91px">Tgl Masuk</th>
                                <th width="91px">Tgl Keluar</th>
                                <th>Total Bayar</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID Pesan</th>
                                <th width="91px">Tanggal Pesan</th>
                                <th>Tipe Kamar</th>
                                <th>Nama User</th>
                                <th>Alamat User</th>
                                <th>No.Tlp User</th>
                                <th width="91px">Tgl Masuk</th>
                                <th width="91px">Tgl Keluar</th>
                                <th>Total Bayar</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $sql = $pdo->query("SELECT * FROM pemesanan ORDER BY idpesan DESC");
                            while ($datax = $sql->fetch()) {
                                $idpesan = $datax['idpesan'];
                                $tglpesan = date('d/m/Y', strtotime($datax['tglpesan']));
                                $tipe = $datax['tipe'];
                                $namax = $datax['nama'];
                                $alamat = $datax['alamat'];
                                $telepon = $datax['telepon'];
                                $tglmasuk = date('d/m/Y', strtotime($datax['tglmasuk']));
                                $tglkeluar = date('d/m/Y', strtotime($datax['tglkeluar']));
                                $totalbayar = number_format($datax['totalbayar'], 0, ",", ".");
                                $status = $datax['status'];
                                $batasbayar = strtotime($datax['batasbayar']);

                                // Menentukan badge status
                                $badgeStatus = '';
                                if ($status == 'Pending...') {
                                    $badgeStatus = '<span class="badge badge-default">Pending...</span>';
                                } elseif ($status == 'Berhasil') {
                                    $badgeStatus = '<span class="badge badge-success">Berhasil</span>';
                                } elseif ($status == 'Dibatalkan') {
                                    $badgeStatus = '<span class="badge badge-danger">Dibatalkan</span>';
                                } elseif ($status == 'Kadaluarsa' || $batasbayar < time()) {
                                    $badgeStatus = '<span class="badge badge-warning">Kadaluarsa</span>';
                                }

                                echo "<tr>
                                        <td><a href='#'>{$idpesan}</a></td>
                                        <td>{$tglpesan}</td>
                                        <td>{$tipe}</td>
                                        <td>{$namax}</td>
                                        <td>{$alamat}</td>
                                        <td>{$telepon}</td>
                                        <td>{$tglmasuk}</td>
                                        <td>{$tglkeluar}</td>
                                        <td>Rp.{$totalbayar}</td>
                                        <td>{$badgeStatus}</td>
                                    </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
<?php
	require_once "view/footer.php";
?>
