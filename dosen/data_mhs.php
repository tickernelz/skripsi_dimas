<?php
include "config.php";
$nama_dosen = $_SESSION['nama'];
?>

<div style="text-align: center;">
    <span style="font-size: x-large; ">Kelola User Mahasiswa</span>
</div>
<hr>

<script type="text/javascript">
    function checkDelete(){
        return confirm('Apakah Anda Yakin Ingin Menghapus Data ?');
    }
</script>

<div class="container-fluid">
    <span>DP 1 = Dosen Pembimbing I</span>
    <span>DP 2 = Dosen Pembimbing II</span>
    <span>DPe = Dosen Penguji</span>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>NO</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Status</th>
                <th>Judul</th>
                <th>Dosen Pembimbing I</th>
                <th>Dosen Penguji I</th>
                <th>Dosen Penguji II</th>
                <th>Dosen Penguji III</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php
                $sql_mhs = mysqli_query($koneksi, "
                SELECT m.NIM, m.nama, r.status, r.judul, dp.dosen_pembimbing1, dp.dpen1, dp.dpen2, dp.dpen3
                FROM mahasiswa m, registrasi r, dosen_pembimbing dp
                WHERE r.NIM = m.NIM AND dp.nim_mhs = m.NIM AND (dp.dosen_pembimbing1 = '$nama_dosen'
                OR dp.dpen1 = '$nama_dosen' OR dp.dpen2 = '$nama_dosen' OR dp.dpen3 = '$nama_dosen')
                GROUP BY m.NIM
                ORDER BY m.NIM ASC
                ") or die(mysqli_error($koneksi));
                if (mysqli_num_rows($sql_mhs) > 0) {
                    $no = 1;
                    while ($data_mhs = mysqli_fetch_assoc($sql_mhs)) {
                        echo '
						    <tr>
						    <th scope="row">' . $no . '</th>
							<td>' . $data_mhs['NIM'] . '</td>
							<td>' . $data_mhs['nama'] . '</td>
							<td>' . $data_mhs['status'] . '</td>
							<td>' . $data_mhs['judul'] . '</td>
							<td>' . $data_mhs['dosen_pembimbing1'] . '</td>
							<td>' . $data_mhs['dpen1'] . '</td>
							<td>' . $data_mhs['dpen2'] . '</td>
                            <td>' . $data_mhs['dpen3'] . '</td>
							</tr>
						';
                        $no++;
                    }
                    //jika query menghasilkan nilai 0
                } else {
                    echo '
					<tr>
						<td colspan="9">Tidak ada data.</td>
					</tr>
					';
                }
                ?>
            </tr>
            </tbody>
        </table>
    </div>
</div>
