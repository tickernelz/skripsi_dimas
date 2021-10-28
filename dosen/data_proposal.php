<?php
include "config.php";
$nama_dosen = $_SESSION['nama'];
# DP1
$sql_dp1 = "select * from proposal where nama_dosen='$nama_dosen'";
$query_dp1 = mysqli_query($koneksi, $sql_dp1);
$data_dp1 = mysqli_fetch_assoc($query_dp1);
$id_dp1 = $data_dp1['id'];
$nama_dp1 = $data_dp1['nama_dosen'];
# DPen1
$sql_dpen1 = "select * from proposal_dpen1 where nama_dosen='$nama_dosen'";
$query_dpen1 = mysqli_query($koneksi, $sql_dpen1);
$data_dpen1 = mysqli_fetch_assoc($query_dpen1);
$id_dpen1 = $data_dpen1['id'];
$nama_dpen1 = $data_dpen1['nama_dosen'];
# DPen2
$sql_dpen2 = "select * from proposal_dpen2 where nama_dosen='$nama_dosen'";
$query_dpen2 = mysqli_query($koneksi, $sql_dpen2);
$data_dpen2 = mysqli_fetch_assoc($query_dpen2);
$id_dpen2 = $data_dpen2['id'];
$nama_dpen2 = $data_dpen2['nama_dosen'];
# DPen3
$sql_dpen3 = "select * from proposal_dpen3 where nama_dosen='$nama_dosen'";
$query_dpen3 = mysqli_query($koneksi, $sql_dpen3);
$data_dpen3 = mysqli_fetch_assoc($query_dpen3);
$id_dpen3 = $data_dpen3['id'];
$nama_dpen3 = $data_dpen3['nama_dosen'];
?>

<div style="text-align: center;">
    <span style="font-size: x-large; ">Data Proposal</span>
</div>
<hr>

<script type="text/javascript">
    function checkDelete() {
        return confirm('Apakah Anda Yakin Ingin Menghapus Data ?');
    }
</script>

<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-bordered">
            <div style="text-align: left;">
                <span style="font-size: large; ">Dosen Pembimbing</span>
            </div>
            <thead>
            <tr>
                <th>NO</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Judul</th>
                <th>Nilai 1</th>
                <th>Nilai 2</th>
                <th>Nilai 3</th>
                <th>Nilai 4</th>
                <th>Nilai Hasil</th>
                <th>Keterangan</th>
                <th class="text-center">Aksi</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php
                $sql_mhs1 = mysqli_query($koneksi, "
                    SELECT m.NIM,m.nama, r.judul, p.nilai1, p.nilai2, p.nilai3, p.nilai4, p.nilai_hsl, p.ket
                    FROM mahasiswa m, registrasi r, proposal p
                    WHERE p.nama_dosen='$nama_dosen' AND r.status='Proposal' AND m.NIM = p.nim AND r.nim = p.nim
                    GROUP BY m.NIM 
                    ORDER BY m.NIM ASC  
                    ") or die(mysqli_error($koneksi));
                if (mysqli_num_rows($sql_mhs1) > 0) {
                    $no1 = 1;
                    while ($data_mhs1 = mysqli_fetch_assoc($sql_mhs1)) {
                        echo '
						    <tr>
						    <th scope="row">' . $no1 . '</th>
							<td>' . $data_mhs1['NIM'] . '</td>
							<td>' . $data_mhs1['nama'] . '</td>
							<td>' . $data_mhs1['judul'] . '</td>
							<td>' . $data_mhs1['nilai1'] . '</td>
							<td>' . $data_mhs1['nilai2'] . '</td>
							<td>' . $data_mhs1['nilai3'] . '</td>
							<td>' . $data_mhs1['nilai4'] . '</td>
							<td>' . $data_mhs1['nilai_hsl'] . '</td>
							<td>' . $data_mhs1['ket'] . '</td>
							<td class="text-center">
								<a href="index.php?page=detail_proposal&dsn=dp1&nim=' . $data_mhs1['NIM'] . '" class="btn btn-secondary btn-sm">Detail</a>
							</td>
							</tr>
						';
                        $no1++;
                    }
                    //jika query menghasilkan nilai 0
                } else {
                    echo '
					<tr>
						<td colspan="11">Tidak ada data.</td>
					</tr>
					';
                }
                ?>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <div style="text-align: left;">
                <span style="font-size: large; ">Dosen Penguji 1</span>
            </div>
            <thead>
            <tr>
                <th>NO</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Judul</th>
                <th>Nilai 1</th>
                <th>Nilai 2</th>
                <th>Nilai 3</th>
                <th>Nilai 4</th>
                <th>Nilai Hasil</th>
                <th>Keterangan</th>
                <th class="text-center">Aksi</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php
                $sql_mhs2 = mysqli_query($koneksi, "
                    SELECT m.NIM,m.nama, r.judul, p.nilai1, p.nilai2, p.nilai3, p.nilai4, p.nilai_hsl, p.ket
                    FROM mahasiswa m, registrasi r, proposal_dpen1 p
                    WHERE p.nama_dosen='$nama_dosen' AND r.status='Proposal' AND m.NIM = p.nim AND r.nim = p.nim
                    GROUP BY m.NIM 
                    ORDER BY m.NIM ASC  
                    ") or die(mysqli_error($koneksi));
                if (mysqli_num_rows($sql_mhs2) > 0) {
                    $no2 = 1;
                    while ($data_mhs2 = mysqli_fetch_assoc($sql_mhs2)) {
                        echo '
						    <tr>
						    <th scope="row">' . $no2 . '</th>
							<td>' . $data_mhs2['NIM'] . '</td>
							<td>' . $data_mhs2['nama'] . '</td>
							<td>' . $data_mhs2['judul'] . '</td>
							<td>' . $data_mhs2['nilai1'] . '</td>
							<td>' . $data_mhs2['nilai2'] . '</td>
							<td>' . $data_mhs2['nilai3'] . '</td>
							<td>' . $data_mhs2['nilai4'] . '</td>
							<td>' . $data_mhs2['nilai_hsl'] . '</td>
							<td>' . $data_mhs2['ket'] . '</td>
							<td class="text-center">
								<a href="index.php?page=detail_proposal&dsn=dpen1&nim=' . $data_mhs2['NIM'] . '" class="btn btn-secondary btn-sm">Detail</a>
							</td>
							</tr>
						';
                        $no2++;
                    }
                    //jika query menghasilkan nilai 0
                } else {
                    echo '
					<tr>
						<td colspan="11">Tidak ada data.</td>
					</tr>
					';
                }
                ?>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <div style="text-align: left;">
                <span style="font-size: large; ">Dosen Penguji 2</span>
            </div>
            <thead>
            <tr>
                <th>NO</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Judul</th>
                <th>Nilai 1</th>
                <th>Nilai 2</th>
                <th>Nilai 3</th>
                <th>Nilai 4</th>
                <th>Nilai Hasil</th>
                <th>Keterangan</th>
                <th class="text-center">Aksi</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php
                $sql_mhs3 = mysqli_query($koneksi, "
                    SELECT m.NIM,m.nama, r.judul, p.nilai1, p.nilai2, p.nilai3, p.nilai4, p.nilai_hsl, p.ket
                    FROM mahasiswa m, registrasi r, proposal_dpen2 p
                    WHERE p.nama_dosen='$nama_dosen' AND r.status='Proposal' AND m.NIM = p.nim AND r.nim = p.nim
                    GROUP BY m.NIM 
                    ORDER BY m.NIM ASC  
                    ") or die(mysqli_error($koneksi));
                if (mysqli_num_rows($sql_mhs3) > 0) {
                    $no3 = 1;
                    while ($data_mhs3 = mysqli_fetch_assoc($sql_mhs3)) {
                        echo '
						    <tr>
						    <th scope="row">' . $no3 . '</th>
							<td>' . $data_mhs3['NIM'] . '</td>
							<td>' . $data_mhs3['nama'] . '</td>
							<td>' . $data_mhs3['judul'] . '</td>
							<td>' . $data_mhs3['nilai1'] . '</td>
							<td>' . $data_mhs3['nilai2'] . '</td>
							<td>' . $data_mhs3['nilai3'] . '</td>
							<td>' . $data_mhs3['nilai4'] . '</td>
							<td>' . $data_mhs3['nilai_hsl'] . '</td>
							<td>' . $data_mhs3['ket'] . '</td>
							<td class="text-center">
								<a href="index.php?page=detail_proposal&dsn=dpen2&nim=' . $data_mhs3['NIM'] . '" class="btn btn-secondary btn-sm">Detail</a>
							</td>
							</tr>
						';
                        $no3++;
                    }
                    //jika query menghasilkan nilai 0
                } else {
                    echo '
					<tr>
						<td colspan="11">Tidak ada data.</td>
					</tr>
					';
                }
                ?>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <div style="text-align: left;">
                <span style="font-size: large; ">Dosen Penguji 3</span>
            </div>
            <thead>
            <tr>
                <th>NO</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Judul</th>
                <th>Nilai 1</th>
                <th>Nilai 2</th>
                <th>Nilai 3</th>
                <th>Nilai 4</th>
                <th>Nilai Hasil</th>
                <th>Keterangan</th>
                <th class="text-center">Aksi</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php
                $sql_mhs4 = mysqli_query($koneksi, "
                    SELECT m.NIM,m.nama, r.judul, p.nilai1, p.nilai2, p.nilai3, p.nilai4, p.nilai_hsl, p.ket
                    FROM mahasiswa m, registrasi r, proposal_dpen3 p
                    WHERE p.nama_dosen='$nama_dosen' AND r.status='Proposal' AND m.NIM = p.nim AND r.nim = p.nim
                    GROUP BY m.NIM 
                    ORDER BY m.NIM ASC  
                    ") or die(mysqli_error($koneksi));
                if (mysqli_num_rows($sql_mhs4) > 0) {
                    $no4 = 1;
                    while ($data_mhs4 = mysqli_fetch_assoc($sql_mhs4)) {
                        echo '
						    <tr>
						    <th scope="row">' . $no4 . '</th>
							<td>' . $data_mhs4['NIM'] . '</td>
							<td>' . $data_mhs4['nama'] . '</td>
							<td>' . $data_mhs4['judul'] . '</td>
							<td>' . $data_mhs4['nilai1'] . '</td>
							<td>' . $data_mhs4['nilai2'] . '</td>
							<td>' . $data_mhs4['nilai3'] . '</td>
							<td>' . $data_mhs4['nilai4'] . '</td>
							<td>' . $data_mhs4['nilai_hsl'] . '</td>
							<td>' . $data_mhs4['ket'] . '</td>
							<td class="text-center">
								<a href="index.php?page=detail_proposal&dsn=dpen3&nim=' . $data_mhs4['NIM'] . '" class="btn btn-secondary btn-sm">Detail</a>
							</td>
							</tr>
						';
                        $no4++;
                    }
                    //jika query menghasilkan nilai 0
                } else {
                    echo '
					<tr>
						<td colspan="11">Tidak ada data.</td>
					</tr>
					';
                }
                ?>
            </tr>
            </tbody>
        </table>
    </div>
</div>
