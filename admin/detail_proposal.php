<?php include('config.php');
$nim_p = $_GET['nim'];
$jns_dsn = $_GET['dsn'];
$sql_cmnt = "select comment from proposal where nim='$nim_p'";
$query_cmnt = mysqli_query($koneksi, $sql_cmnt);
$data_cmnt = mysqli_fetch_assoc($query_cmnt);
$nama = $_SESSION['nama'];
$id_dosen = $_SESSION['id_dosen'];
$sql_proposal = "select * from proposal where nim='$nim_p'";
$query_proposal = mysqli_query($koneksi, $sql_proposal);
$data_prop = mysqli_fetch_array($query_proposal);
$sql_proposal1 = "select * from proposal_dpen1 where nim='$nim_p'";
$query_proposal1 = mysqli_query($koneksi, $sql_proposal1);
$data_prop1 = mysqli_fetch_array($query_proposal1);
$sql_proposal2 = "select * from proposal_dpen2 where nim='$nim_p'";
$query_proposal2 = mysqli_query($koneksi, $sql_proposal2);
$data_prop2 = mysqli_fetch_array($query_proposal2);
$sql_proposal3 = "select * from proposal_dpen3 where nim='$nim_p'";
$query_proposal3 = mysqli_query($koneksi, $sql_proposal3);
$data_prop3 = mysqli_fetch_array($query_proposal3);
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
<script src="//cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>

<div style="text-align: center;"><span style="font-size: x-large; ">Tampil Proposal</span></div>
<hr>
<div class="container-fluid">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
			<?php
			$dirproposal = 'proposal';
			$folder = '../file/' . $nim_p . '/' . $dirproposal;
			$sql_p = "SELECT proposal FROM upload_berkas WHERE nim = '$nim_p'";
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


    <div class="card border-left-success shadow h-100 py-2" style="margin-top: 50px; margin-bottom: 50px">
        <div class="card-body">
            <form action="" method="post" id="dp1_nilaiform">
                <div class="table-responsive">
                    <div style="text-align: left;">
                        <span style="font-size: large; ">Dosen Pembimbing 1 : <?php echo $data_prop['nama_dosen']; ?></span>
                    </div>
                    <table class="table table-striped jambo_table bulk_action">
                        <thead>
                        <tr>
                            <th>NO.</th>
                            <th>Krekterian Penilaian</th>
                            <th>indikator Penilaian</th>
                            <th>Bobot (%)</th>
                            <th>Skor</th>
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
                                    <input type="number" class="form-control form-responsive validatefield"
                                           id="dp1_input_nilai1"
                                           length="5">
                                </div>
                            </td>
                            <td>
                                <div class="col-md-5 col-sm-6">
                                    <input type="text" class="form-control form-responsive" id="dp1_hasil_nilai1"
                                           length="5" value="<?php echo $data_prop['nilai1']; ?>" disabled>
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
                                    <input type="number" class="form-control form-responsive validatefield"
                                           id="dp1_input_nilai2"
                                           length="5">
                                </div>
                            </td>
                            <td>
                                <div class="col-md-5 col-sm-6">
                                    <input type="text" class="form-control form-responsive" id="dp1_hasil_nilai2"
                                           length="5" value="<?php echo $data_prop['nilai2']; ?>" disabled>
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
                                    <input type="number" class="form-control form-responsive validatefield"
                                           id="dp1_input_nilai3"
                                           length="5">
                                </div>
                            </td>
                            <td>
                                <div class="col-md-5 col-sm-6">
                                    <input type="text" class="form-control form-responsive" id="dp1_hasil_nilai3"
                                           length="5" value="<?php echo $data_prop['nilai3']; ?>" disabled>
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
                                    <input type="number" class="form-control form-responsive validatefield"
                                           id="dp1_input_nilai4"
                                           length="5">
                                </div>
                            </td>
                            <td>
                                <div class="col-md-5 col-sm-6">
                                    <input type="text" class="form-control form-responsive" id="dp1_hasil_nilai4"
                                           length="5" value="<?php echo $data_prop['nilai4']; ?>" disabled>
                                </div>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>TOTAL NILAI</td>
                            <td></td>
                            <td>100%</td>
                            <td></td>
                            <td>
                                <div class="col-md-5 col-sm-6">
                                    <input type="text" class="form-control form-responsive" id="dp1_hasil_total"
                                           length="5" value="<?php echo $data_prop['nilai_hsl']; ?>" disabled>
                                </div>
                            </td>
                            <td>
                                <div class="col-md-9 col-sm-6">
                                    <input type="text" class="form-control form-keterangan" id="dp1_ket_nilai"
                                           length="5" value="<?php echo $data_prop['ket']; ?>" disabled>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div class="result">
                    </div>
                </div>
                <div style="text-align: right; margin-top: 20px">
                    <button class="btn btn-primary" id="submit" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <form id="komen"
                  action="index.php?page=aksi_stat_cmnt_proposal&dsn=dp1&nim=<?php echo $nim_p; ?>"
                  method="post">
                <h1 style="margin-bottom: 20px"> Komentar </h1>
                <textarea name="pesan" class="ckeditor"><?= $data_prop['comment'] ?></textarea>
                <br>
                <button class="btn btn-primary" name="kirim" value="kirim" type="submit">Simpan</button>
            </form>
        </div>
    </div>
    <div class="card border-left-success shadow h-100 py-2" style="margin-top: 50px; margin-bottom: 50px">
        <div class="card-body">
            <form action="" method="post" id="dpen1_nilaiform">
                <div class="table-responsive">
                    <div style="text-align: left;">
                        <span style="font-size: large; ">Dosen Penguji 1 : <?php echo $data_prop1['nama_dosen']; ?></span>
                    </div>
                    <table class="table table-striped jambo_table bulk_action">
                        <thead>
                        <tr>
                            <th>NO.</th>
                            <th>Krekterian Penilaian</th>
                            <th>indikator Penilaian</th>
                            <th>Bobot (%)</th>
                            <th>Skor</th>
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
                                    <input type="number" class="form-control form-responsive validatefield"
                                           id="dpen1_input_nilai1"
                                           length="5">
                                </div>
                            </td>
                            <td>
                                <div class="col-md-5 col-sm-6">
                                    <input type="text" class="form-control form-responsive" id="dpen1_hasil_nilai1"
                                           length="5" value="<?php echo $data_prop1['nilai1']; ?>" disabled>
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
                                    <input type="number" class="form-control form-responsive validatefield"
                                           id="dpen1_input_nilai2"
                                           length="5">
                                </div>
                            </td>
                            <td>
                                <div class="col-md-5 col-sm-6">
                                    <input type="text" class="form-control form-responsive" id="dpen1_hasil_nilai2"
                                           length="5" value="<?php echo $data_prop1['nilai2']; ?>" disabled>
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
                                    <input type="number" class="form-control form-responsive validatefield"
                                           id="dpen1_input_nilai3"
                                           length="5">
                                </div>
                            </td>
                            <td>
                                <div class="col-md-5 col-sm-6">
                                    <input type="text" class="form-control form-responsive" id="dpen1_hasil_nilai3"
                                           length="5" value="<?php echo $data_prop1['nilai3']; ?>" disabled>
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
                                    <input type="number" class="form-control form-responsive validatefield"
                                           id="dpen1_input_nilai4"
                                           length="5">
                                </div>
                            </td>
                            <td>
                                <div class="col-md-5 col-sm-6">
                                    <input type="text" class="form-control form-responsive" id="dpen1_hasil_nilai4"
                                           length="5" value="<?php echo $data_prop1['nilai4']; ?>" disabled>
                                </div>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>TOTAL NILAI</td>
                            <td></td>
                            <td>100%</td>
                            <td></td>
                            <td>
                                <div class="col-md-5 col-sm-6">
                                    <input type="text" class="form-control form-responsive" id="dpen1_hasil_total"
                                           length="5" value="<?php echo $data_prop1['nilai_hsl']; ?>" disabled>
                                </div>
                            </td>
                            <td>
                                <div class="col-md-9 col-sm-6">
                                    <input type="text" class="form-control form-keterangan" id="dpen1_ket_nilai"
                                           length="5" value="<?php echo $data_prop1['ket']; ?>" disabled>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div class="result">
                    </div>
                </div>
                <div style="text-align: right; margin-top: 20px">
                    <button class="btn btn-primary" id="submit" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <form id="komen"
                  action="index.php?page=aksi_stat_cmnt_proposal&dsn=dpen1&nim=<?php echo $nim_p; ?>"
                  method="post">
                <h1 style="margin-bottom: 20px"> Komentar </h1>
                <textarea name="pesan" class="ckeditor"><?= $data_prop1['comment'] ?></textarea>
                <br>
                <button class="btn btn-primary" name="kirim" value="kirim" type="submit">Simpan</button>
            </form>
        </div>
    </div>
    <div class="card border-left-success shadow h-100 py-2" style="margin-top: 50px; margin-bottom: 50px">
        <div class="card-body">
            <form action="" method="post" id="dpen2_nilaiform">
                <div class="table-responsive">
                    <div style="text-align: left;">
                        <span style="font-size: large; ">Dosen Penguji 2 : <?php echo $data_prop2['nama_dosen']; ?></span>
                    </div>
                    <table class="table table-striped jambo_table bulk_action">
                        <thead>
                        <tr>
                            <th>NO.</th>
                            <th>Krekterian Penilaian</th>
                            <th>indikator Penilaian</th>
                            <th>Bobot (%)</th>
                            <th>Skor</th>
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
                                    <input type="number" class="form-control form-responsive validatefield"
                                           id="dpen2_input_nilai1"
                                           length="5">
                                </div>
                            </td>
                            <td>
                                <div class="col-md-5 col-sm-6">
                                    <input type="text" class="form-control form-responsive" id="dpen2_hasil_nilai1"
                                           length="5" value="<?php echo $data_prop2['nilai1']; ?>" disabled>
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
                                    <input type="number" class="form-control form-responsive validatefield"
                                           id="dpen2_input_nilai2"
                                           length="5">
                                </div>
                            </td>
                            <td>
                                <div class="col-md-5 col-sm-6">
                                    <input type="text" class="form-control form-responsive" id="dpen2_hasil_nilai2"
                                           length="5" value="<?php echo $data_prop2['nilai2']; ?>" disabled>
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
                                    <input type="number" class="form-control form-responsive validatefield"
                                           id="dpen2_input_nilai3"
                                           length="5">
                                </div>
                            </td>
                            <td>
                                <div class="col-md-5 col-sm-6">
                                    <input type="text" class="form-control form-responsive" id="dpen2_hasil_nilai3"
                                           length="5" value="<?php echo $data_prop2['nilai3']; ?>" disabled>
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
                                    <input type="number" class="form-control form-responsive validatefield"
                                           id="dpen2_input_nilai4"
                                           length="5">
                                </div>
                            </td>
                            <td>
                                <div class="col-md-5 col-sm-6">
                                    <input type="text" class="form-control form-responsive" id="dpen2_hasil_nilai4"
                                           length="5" value="<?php echo $data_prop2['nilai4']; ?>" disabled>
                                </div>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>TOTAL NILAI</td>
                            <td></td>
                            <td>100%</td>
                            <td></td>
                            <td>
                                <div class="col-md-5 col-sm-6">
                                    <input type="text" class="form-control form-responsive" id="dpen2_hasil_total"
                                           length="5" value="<?php echo $data_prop2['nilai_hsl']; ?>" disabled>
                                </div>
                            </td>
                            <td>
                                <div class="col-md-9 col-sm-6">
                                    <input type="text" class="form-control form-keterangan" id="dpen2_ket_nilai"
                                           length="5" value="<?php echo $data_prop2['ket']; ?>" disabled>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div class="result">
                    </div>
                </div>
                <div style="text-align: right; margin-top: 20px">
                    <button class="btn btn-primary" id="submit" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <form id="komen"
                  action="index.php?page=aksi_stat_cmnt_proposal&dsn=dpen2&nim=<?php echo $nim_p; ?>"
                  method="post">
                <h1 style="margin-bottom: 20px"> Komentar </h1>
                <textarea name="pesan" class="ckeditor"><?= $data_prop2['comment'] ?></textarea>
                <br>
                <button class="btn btn-primary" name="kirim" value="kirim" type="submit">Simpan</button>
            </form>
        </div>
    </div>

    <div class="card border-left-success shadow h-100 py-2" style="margin-top: 50px; margin-bottom: 50px">
        <div class="card-body">
            <form action="" method="post" id="dpen3_nilaiform">
                <div class="table-responsive">
                    <div style="text-align: left;">
                        <span style="font-size: large; ">Dosen Penguji 3 : <?php echo $data_prop3['nama_dosen']; ?></span>
                    </div>
                    <table class="table table-striped jambo_table bulk_action">
                        <thead>
                        <tr>
                            <th>NO.</th>
                            <th>Krekterian Penilaian</th>
                            <th>indikator Penilaian</th>
                            <th>Bobot (%)</th>
                            <th>Skor</th>
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
                                    <input type="number" class="form-control form-responsive validatefield"
                                           id="dpen3_input_nilai1"
                                           length="5">
                                </div>
                            </td>
                            <td>
                                <div class="col-md-5 col-sm-6">
                                    <input type="text" class="form-control form-responsive" id="dpen3_hasil_nilai1"
                                           length="5" value="<?php echo $data_prop3['nilai1']; ?>" disabled>
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
                                    <input type="number" class="form-control form-responsive validatefield"
                                           id="dpen3_input_nilai2"
                                           length="5">
                                </div>
                            </td>
                            <td>
                                <div class="col-md-5 col-sm-6">
                                    <input type="text" class="form-control form-responsive" id="dpen3_hasil_nilai2"
                                           length="5" value="<?php echo $data_prop3['nilai2']; ?>" disabled>
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
                                    <input type="number" class="form-control form-responsive validatefield"
                                           id="dpen3_input_nilai3"
                                           length="5">
                                </div>
                            </td>
                            <td>
                                <div class="col-md-5 col-sm-6">
                                    <input type="text" class="form-control form-responsive" id="dpen3_hasil_nilai3"
                                           length="5" value="<?php echo $data_prop3['nilai3']; ?>" disabled>
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
                                    <input type="number" class="form-control form-responsive validatefield"
                                           id="dpen3_input_nilai4"
                                           length="5">
                                </div>
                            </td>
                            <td>
                                <div class="col-md-5 col-sm-6">
                                    <input type="text" class="form-control form-responsive" id="dpen3_hasil_nilai4"
                                           length="5" value="<?php echo $data_prop3['nilai4']; ?>" disabled>
                                </div>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>TOTAL NILAI</td>
                            <td></td>
                            <td>100%</td>
                            <td></td>
                            <td>
                                <div class="col-md-5 col-sm-6">
                                    <input type="text" class="form-control form-responsive" id="dpen3_hasil_total"
                                           length="5" value="<?php echo $data_prop3['nilai_hsl']; ?>" disabled>
                                </div>
                            </td>
                            <td>
                                <div class="col-md-9 col-sm-6">
                                    <input type="text" class="form-control form-keterangan" id="dpen3_ket_nilai"
                                           length="5" value="<?php echo $data_prop3['ket']; ?>" disabled>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div class="result">
                    </div>
                </div>
                <div style="text-align: right; margin-top: 20px">
                    <button class="btn btn-primary" id="submit" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <form id="komen"
                  action="index.php?page=aksi_stat_cmnt_proposal&dsn=dpen3&nim=<?php echo $nim_p; ?>"
                  method="post">
                <h1 style="margin-bottom: 20px"> Komentar </h1>
                <textarea name="pesan" class="ckeditor"><?= $data_prop3['comment'] ?></textarea>
                <br>
                <button class="btn btn-primary" name="kirim" value="kirim" type="submit">Simpan</button>
            </form>
        </div>
    </div>
</div>
<script src="assets/js/nilai.js"></script>
<script type="text/javascript">
    $('#dp1_nilaiform').submit(function () {

        // Get the Login Name value and trim it
        var dp1_input1 = $.trim($('#dp1_input_nilai1').val());
        var dp1_input2 = $.trim($('#dp1_input_nilai2').val());
        var dp1_input3 = $.trim($('#dp1_input_nilai3').val());
        var dp1_input4 = $.trim($('#dp1_input_nilai4').val());

        // Check if empty of not
        if (dp1_input1 == '' || dp1_input2 == '' || dp1_input3 == '' || dp1_input4 == '') {
            alert('NILAI SKOR TIDAK BOLEH KOSONG!');
            return false;
        } else {
            $.ajax
            ({
                url: "index.php?page=post_proposal&dsn=dp1&nim=<?php echo $nim_p; ?>",
                type: "POST",
                data: {
                    dp1_hasil_nilai1: dp1_total1,
                    dp1_hasil_nilai2: dp1_total2,
                    dp1_hasil_nilai3: dp1_total3,
                    dp1_hasil_nilai4: dp1_total4,
                    dp1_hasil_total: dp1_total_nilai,
                    dp1_keterangan: dp1_keterangan
                },
                success: function() {
                    location.reload();
                }
            });
        }
    });
    $('#dpen1_nilaiform').submit(function () {

        // Get the Login Name value and trim it
        var dpen1_input1 = $.trim($('#dpen1_input_nilai1').val());
        var dpen1_input2 = $.trim($('#dpen1_input_nilai2').val());
        var dpen1_input3 = $.trim($('#dpen1_input_nilai3').val());
        var dpen1_input4 = $.trim($('#dpen1_input_nilai4').val());

        // Check if empty of not
        if (dpen1_input1 == '' || dpen1_input2 == '' || dpen1_input3 == '' || dpen1_input4 == '') {
            alert('NILAI SKOR TIDAK BOLEH KOSONG!');
            return false;
        } else {
            $.ajax
            ({
                url: "index.php?page=post_proposal&dsn=dpen1&nim=<?php echo $nim_p; ?>",
                type: "POST",
                data: {
                    dpen1_hasil_nilai1: dpen1_total1,
                    dpen1_hasil_nilai2: dpen1_total2,
                    dpen1_hasil_nilai3: dpen1_total3,
                    dpen1_hasil_nilai4: dpen1_total4,
                    dpen1_hasil_total: dpen1_total_nilai,
                    dpen1_keterangan: dpen1_keterangan
                },
                success: function() {
                    location.reload();
                }
            });
        }
    });
    $('#dpen2_nilaiform').submit(function () {

        // Get the Login Name value and trim it
        var dpen2_input1 = $.trim($('#dpen2_input_nilai1').val());
        var dpen2_input2 = $.trim($('#dpen2_input_nilai2').val());
        var dpen2_input3 = $.trim($('#dpen2_input_nilai3').val());
        var dpen2_input4 = $.trim($('#dpen2_input_nilai4').val());

        // Check if empty of not
        if (dpen2_input1 == '' || dpen2_input2 == '' || dpen2_input3 == '' || dpen2_input4 == '') {
            alert('NILAI SKOR TIDAK BOLEH KOSONG!');
            return false;
        } else {
            $.ajax
            ({
                url: "index.php?page=post_proposal&dsn=dpen2&nim=<?php echo $nim_p; ?>",
                type: "POST",
                data: {
                    dpen2_hasil_nilai1: dpen2_total1,
                    dpen2_hasil_nilai2: dpen2_total2,
                    dpen2_hasil_nilai3: dpen2_total3,
                    dpen2_hasil_nilai4: dpen2_total4,
                    dpen2_hasil_total: dpen2_total_nilai,
                    dpen2_keterangan: dpen2_keterangan
                },
                success: function() {
                    location.reload();
                }
            });
        }
    });
    $('#dpen3_nilaiform').submit(function () {

        // Get the Login Name value and trim it
        var dpen3_input1 = $.trim($('#dpen3_input_nilai1').val());
        var dpen3_input2 = $.trim($('#dpen3_input_nilai2').val());
        var dpen3_input3 = $.trim($('#dpen3_input_nilai3').val());
        var dpen3_input4 = $.trim($('#dpen3_input_nilai4').val());

        // Check if empty of not
        if (dpen3_input1 == '' || dpen3_input2 == '' || dpen3_input3 == '' || dpen3_input4 == '') {
            alert('NILAI SKOR TIDAK BOLEH KOSONG!');
            return false;
        } else {
            $.ajax
            ({
                url: "index.php?page=post_proposal&dsn=dpen3&nim=<?php echo $nim_p; ?>",
                type: "POST",
                data: {
                    dpen3_hasil_nilai1: dpen3_total1,
                    dpen3_hasil_nilai2: dpen3_total2,
                    dpen3_hasil_nilai3: dpen3_total3,
                    dpen3_hasil_nilai4: dpen3_total4,
                    dpen3_hasil_total: dpen3_total_nilai,
                    dpen3_keterangan: dpen3_keterangan
                },
                success: function() {
                    location.reload();
                }
            });
        }
    });
</script>
