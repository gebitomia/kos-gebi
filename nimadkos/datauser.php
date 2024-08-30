<?php
require_once "view/header.php";
?>

<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Data</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#"><i class="la la-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item">Data User</li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Data User</div>
                <div class="ibox-tools">
                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                </div>
            </div>
            <div class="ibox-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Nama Lengkap</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th style="width:50px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $sql = $pdo->query("SELECT * FROM tamu");
                            while ($caridata = $sql->fetch()) {
                                $id = $caridata['idtamu'];
                                $username = htmlspecialchars($caridata['username']);
                                $email = htmlspecialchars($caridata['email']);
                                $nama = htmlspecialchars($caridata['nama']);
                                $alamat = htmlspecialchars($caridata['alamat']);
                                $telepon = htmlspecialchars($caridata['telepon']);
                        ?>
                            <tr>
                                <td><?php echo $id ?></td>
                                <td><?php echo $username ?></td>
                                <td><?php echo $email ?></td>
                                <td><?php echo $nama ?></td>
                                <td><?php echo $alamat ?></td>
                                <td><?php echo $telepon ?></td>
                                <td>
                                    <a href="edituser.php?idtamu=<?php echo $id ?>">
                                        <button class="btn btn-primary btn-xs m-r-5" data-toggle="tooltip" data-original-title="Edit">
                                            <i class="fa fa-pencil font-14"></i>
                                        </button>
                                    </a>
                                    <a href="fungsi/hapususer.php?id=<?php echo $id ?>" onclick="return confirm('Hapus User?')">
                                        <button class="btn btn-danger btn-xs" data-toggle="tooltip" data-original-title="Hapus">
                                            <i class="fa fa-trash font-14"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php
require_once "view/footer.php";
?>
