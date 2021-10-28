<?php include('config.php');
$nim = $_GET['nim'];
$id_dosen = $_SESSION['id_dosen'];
?>

<div style="text-align: center;"><span style="font-size: x-large; ">Tampil Proposal</span></div>
<hr>
<div class="container-fluid">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">

                            <?php
                            $nim = $_GET['nim'];
                            $dirproposal = 'proposal';
                            $folder = '../file/' . $nim . '/' . $dirproposal;
                            $sql_p = "SELECT proposal FROM upload_berkas WHERE nim = '$nim'";
                            $query_p = mysqli_query($koneksi, $sql_p);
                            $info_p = mysqli_fetch_array($query_p);
                            $file = $folder . '/' . $info_p['proposal'];
                            if (file_exists($file)) {
                                echo '
                             <div style="text-align: center;">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Proposal</div>
                            </div>
							<div>
                                <div class="embed-responsive embed-responsive-21by9" style="text-align: center;">
                                <iframe class="embed-responsive-item" src="' . $file . '"></iframe>
                                 </div>
								<div style="text-align: center; margin-top: 30px">
								    <a href="' . $file . '" target="_blank"><button class="btn btn-success">View pdf</button></a>
                                </div>
                            </div>
                                ';
                            } else {
                                echo '
                                <div style="text-align: center;">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Proposal</div>
                                </div>
							    <div style="text-align: center; margin-top: 50px;">
                                    <span style="font-size: large; ">File Tidak Ditemukan</span>
                                </div>
                                ';
                            }
                            ?>

                </div>
            </div>
        </div>

        <!-- tampil KTM -->
        <?php
        $sql_proposal = "SELECT p.nilai1, p.nilai2, p.nilai3, p.nilai4, p.nilai_hsl, dp.dosen_pembimbing1, dp.dpen1, dp.dpen2, dp.dpen3 from proposal p, dosen_pembimbing dp where nim='118063' AND (dp.dosen_pembimbing1 = '$nama_dosen'
                OR dp.dpen1 = '$nama_dosen' OR dp.dpen2 = '$nama_dosen' OR dp.dpen3 = '$nama_dosen')";
        $query_proposal = mysqli_query($koneksi, $sql_proposal);
        $data = mysqli_fetch_assoc($query_proposal);
        ?>
# Dosen Pembimbing
<div class="card border-left-success shadow h-100 py-2" style="margin-top: 50px; margin-bottom: 50px">
    <div class="card-body">
        <form action="" method="post" id="nilaiform">
            <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                <tr>
                                    <th>NO.</th>
                                    <th>Krekterian Penilaian</th>
                                    <th>indikator Penilaian</th>
                                    <th>Bobot (%)</th>
                                    <th>Nilai</th>
                                    <th>Keterangan</th>
                                </tr>
                                </thead>
                                <tr>
                                    <td>1</td>
                                    <td>Perumusan Masalah</td>
                                    <td>Ketajaman Perumusan Masalah dan Tujuan Penelitian</td>
                                    <td>30%</td>
                                    <td>
                                        <div class="col-md-5 col-sm-6">
                                            <input type="text" class="form-control form-responsive" id="hasil_nilai1"
                                                   length="5" value="<?php echo $data['nilai1']; ?>" disabled>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Manfaat hasil Penelitian</td>
                                    <td>Pengembanagan Iptek, pembangunan dll</td>
                                    <td>20%</td>
                                    <td>
                                        <div class="col-md-5 col-sm-6">
                                            <input type="text" class="form-control form-responsive" id="hasil_nilai2"
                                                   length="5" value="<?php echo $data['nilai2']; ?>" disabled>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Tujuan Pustaka</td>
                                    <td>Relevansi,Kemutakhiran dan Penyusun Daftar Pustaka</td>
                                    <td>25%</td>
                                    <td>
                                        <div class="col-md-5 col-sm-6">
                                            <input type="text" class="form-control form-responsive" id="hasil_nilai3"
                                                   length="5" value="<?php echo $data['nilai3']; ?>" disabled>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Metode Penelitian</td>
                                    <td>Ketetapan Metode Yang digunakan</td>
                                    <td>25%</td>
                                    <td>
                                        <div class="col-md-5 col-sm-6">
                                            <input type="text" class="form-control form-responsive" id="hasil_nilai4"
                                                   length="5" value="<?php echo $data['nilai4']; ?>" disabled>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>TOTAL NILAI</td>
                                    <td></td>
                                    <td>100%</td>
                                    <td>
                                        <div class="col-md-5 col-sm-6">
                                            <input type="text" class="form-control form-responsive" id="hasil_total"
                                                   length="5" value="<?php echo $data['nilai_hsl']; ?>" disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-9 col-sm-6">
                                            <input type="text" class="form-control form-keterangan" id="ket_nilai"
                                                   length="5" disabled>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <div class="result">
                            </div>
                        </div>
        </form>
    </div>
</div>

# Dosen Penguji
<div class="card border-left-success shadow h-100 py-2" style="margin-top: 50px; margin-bottom: 50px">
    <div class="card-body">
        <form action="" method="post" id="nilaiform">
            <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                    <thead>
                    <tr>
                        <th>NO.</th>
                        <th>Krekterian Penilaian</th>
                        <th>indikator Penilaian</th>
                        <th>Bobot (%)</th>
                        <th>Nilai</th>
                        <th>Keterangan</th>
                    </tr>
                    </thead>
                    <tr>
                        <td>1</td>
                        <td>Perumusan Masalah</td>
                        <td>Ketajaman Perumusan Masalah dan Tujuan Penelitian</td>
                        <td>30%</td>
                        <td>
                            <div class="col-md-5 col-sm-6">
                                <input type="text" class="form-control form-responsive" id="hasil_nilai1"
                                       length="5" value="<?php echo $data['nilai1']; ?>" disabled>
                            </div>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Manfaat hasil Penelitian</td>
                        <td>Pengembanagan Iptek, pembangunan dll</td>
                        <td>20%</td>
                        <td>
                            <div class="col-md-5 col-sm-6">
                                <input type="text" class="form-control form-responsive" id="hasil_nilai2"
                                       length="5" value="<?php echo $data['nilai2']; ?>" disabled>
                            </div>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Tujuan Pustaka</td>
                        <td>Relevansi,Kemutakhiran dan Penyusun Daftar Pustaka</td>
                        <td>25%</td>
                        <td>
                            <div class="col-md-5 col-sm-6">
                                <input type="text" class="form-control form-responsive" id="hasil_nilai3"
                                       length="5" value="<?php echo $data['nilai3']; ?>" disabled>
                            </div>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Metode Penelitian</td>
                        <td>Ketetapan Metode Yang digunakan</td>
                        <td>25%</td>
                        <td>
                            <div class="col-md-5 col-sm-6">
                                <input type="text" class="form-control form-responsive" id="hasil_nilai4"
                                       length="5" value="<?php echo $data['nilai4']; ?>" disabled>
                            </div>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>TOTAL NILAI</td>
                        <td></td>
                        <td>100%</td>
                        <td>
                            <div class="col-md-5 col-sm-6">
                                <input type="text" class="form-control form-responsive" id="hasil_total"
                                       length="5" value="<?php echo $data['nilai_hsl']; ?>" disabled>
                            </div>
                        </td>
                        <td>
                            <div class="col-md-9 col-sm-6">
                                <input type="text" class="form-control form-keterangan" id="ket_nilai"
                                       length="5" disabled>
                            </div>
                        </td>
                    </tr>
                </table>
                <div class="result">
                </div>
            </div>
        </form>
    </div>
</div>

# Dosen Penguji 2
<div class="card border-left-success shadow h-100 py-2" style="margin-top: 50px; margin-bottom: 50px">
    <div class="card-body">
        <form action="" method="post" id="nilaiform">
            <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                    <thead>
                    <tr>
                        <th>NO.</th>
                        <th>Krekterian Penilaian</th>
                        <th>indikator Penilaian</th>
                        <th>Bobot (%)</th>
                        <th>Nilai</th>
                        <th>Keterangan</th>
                    </tr>
                    </thead>
                    <tr>
                        <td>1</td>
                        <td>Perumusan Masalah</td>
                        <td>Ketajaman Perumusan Masalah dan Tujuan Penelitian</td>
                        <td>30%</td>
                        <td>
                            <div class="col-md-5 col-sm-6">
                                <input type="text" class="form-control form-responsive" id="hasil_nilai1"
                                       length="5" value="<?php echo $data['nilai1']; ?>" disabled>
                            </div>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Manfaat hasil Penelitian</td>
                        <td>Pengembanagan Iptek, pembangunan dll</td>
                        <td>20%</td>
                        <td>
                            <div class="col-md-5 col-sm-6">
                                <input type="text" class="form-control form-responsive" id="hasil_nilai2"
                                       length="5" value="<?php echo $data['nilai2']; ?>" disabled>
                            </div>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Tujuan Pustaka</td>
                        <td>Relevansi,Kemutakhiran dan Penyusun Daftar Pustaka</td>
                        <td>25%</td>
                        <td>
                            <div class="col-md-5 col-sm-6">
                                <input type="text" class="form-control form-responsive" id="hasil_nilai3"
                                       length="5" value="<?php echo $data['nilai3']; ?>" disabled>
                            </div>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Metode Penelitian</td>
                        <td>Ketetapan Metode Yang digunakan</td>
                        <td>25%</td>
                        <td>
                            <div class="col-md-5 col-sm-6">
                                <input type="text" class="form-control form-responsive" id="hasil_nilai4"
                                       length="5" value="<?php echo $data['nilai4']; ?>" disabled>
                            </div>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>TOTAL NILAI</td>
                        <td></td>
                        <td>100%</td>
                        <td>
                            <div class="col-md-5 col-sm-6">
                                <input type="text" class="form-control form-responsive" id="hasil_total"
                                       length="5" value="<?php echo $data['nilai_hsl']; ?>" disabled>
                            </div>
                        </td>
                        <td>
                            <div class="col-md-9 col-sm-6">
                                <input type="text" class="form-control form-keterangan" id="ket_nilai"
                                       length="5" disabled>
                            </div>
                        </td>
                    </tr>
                </table>
                <div class="result">
                </div>
            </div>
        </form>
    </div>
</div>
# Dosen Penguji 3

<div class="card border-left-success shadow h-100 py-2" style="margin-top: 50px; margin-bottom: 50px">
    <div class="card-body">
        <form action="" method="post" id="nilaiform">
            <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                    <thead>
                    <tr>
                        <th>NO.</th>
                        <th>Krekterian Penilaian</th>
                        <th>indikator Penilaian</th>
                        <th>Bobot (%)</th>
                        <th>Nilai</th>
                        <th>Keterangan</th>
                    </tr>
                    </thead>
                    <tr>
                        <td>1</td>
                        <td>Perumusan Masalah</td>
                        <td>Ketajaman Perumusan Masalah dan Tujuan Penelitian</td>
                        <td>30%</td>
                        <td>
                            <div class="col-md-5 col-sm-6">
                                <input type="text" class="form-control form-responsive" id="hasil_nilai1"
                                       length="5" value="<?php echo $data['nilai1']; ?>" disabled>
                            </div>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Manfaat hasil Penelitian</td>
                        <td>Pengembanagan Iptek, pembangunan dll</td>
                        <td>20%</td>
                        <td>
                            <div class="col-md-5 col-sm-6">
                                <input type="text" class="form-control form-responsive" id="hasil_nilai2"
                                       length="5" value="<?php echo $data['nilai2']; ?>" disabled>
                            </div>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Tujuan Pustaka</td>
                        <td>Relevansi,Kemutakhiran dan Penyusun Daftar Pustaka</td>
                        <td>25%</td>
                        <td>
                            <div class="col-md-5 col-sm-6">
                                <input type="text" class="form-control form-responsive" id="hasil_nilai3"
                                       length="5" value="<?php echo $data['nilai3']; ?>" disabled>
                            </div>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Metode Penelitian</td>
                        <td>Ketetapan Metode Yang digunakan</td>
                        <td>25%</td>
                        <td>
                            <div class="col-md-5 col-sm-6">
                                <input type="text" class="form-control form-responsive" id="hasil_nilai4"
                                       length="5" value="<?php echo $data['nilai4']; ?>" disabled>
                            </div>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>TOTAL NILAI</td>
                        <td></td>
                        <td>100%</td>
                        <td>
                            <div class="col-md-5 col-sm-6">
                                <input type="text" class="form-control form-responsive" id="hasil_total"
                                       length="5" value="<?php echo $data['nilai_hsl']; ?>" disabled>
                            </div>
                        </td>
                        <td>
                            <div class="col-md-9 col-sm-6">
                                <input type="text" class="form-control form-keterangan" id="ket_nilai"
                                       length="5" disabled>
                            </div>
                        </td>
                    </tr>
                </table>
                <div class="result">
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
        <h1 style="margin-bottom: 20px"> Komentar </h1>
        <textarea name="pesan" class="ckeditor" disabled><?= $data['comment'] ?><?= $data['comment'] ?></textarea>

        <br>
    </div>
</div>
</div>
<script src="//cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
</div>


