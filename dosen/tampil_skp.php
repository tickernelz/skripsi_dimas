<?php
include "config.php";
$nama_dosen = $_SESSION['nama'];
?>

<div style="text-align: center;">
    <span style="font-size: x-large; ">Data SK Perpanjangan</span>
</div>
<hr>

<script type="text/javascript">
    function checkDelete(){
        return confirm('Apakah Anda Yakin Ingin Menghapus Data ?');
    }
</script>

<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>NO</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Status</th>
                <th>Judul</th>
                <th class="text-center">Aksi</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php
                $sql_mhs = mysqli_query($koneksi, "
                SELECT mahasiswa.NIM, mahasiswa.Nama, registrasi.status, registrasi.judul, dp.dosen_pembimbing1, dp.dpen1, dp.dpen2, dp.dpen3 FROM mahasiswa, registrasi, dosen_pembimbing dp
                WHERE registrasi.nim = mahasiswa.NIM AND (dp.dosen_pembimbing1 = '$nama_dosen'
                OR dp.dpen1 = '$nama_dosen' OR dp.dpen2 = '$nama_dosen' OR dp.dpen3 = '$nama_dosen')
                GROUP BY mahasiswa.NIM
                ORDER BY mahasiswa.NIM ASC
                ") or die(mysqli_error($koneksi));
                if (mysqli_num_rows($sql_mhs) > 0) {
                    $no = 1;
                    while ($data_mhs = mysqli_fetch_assoc($sql_mhs)) {
                        echo '
						    <tr>
						    <th scope="row">' . $no . '</th>
							<td>' . $data_mhs['NIM'] . '</td>
							<td>' . $data_mhs['Nama'] . '</td>
							<td>' . $data_mhs['status'] . '</td>
							<td>' . $data_mhs['judul'] . '</td>
							<td class="text-center">
								<a href="index.php?page=detail_sk&nim=' . $data_mhs['NIM'] . '" class="btn btn-secondary btn-sm">Detail SK</a>
							</td>
							</tr>
						';
                        $no++;
                    }
                    //jika query menghasilkan nilai 0
                } else {
                    echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
                }
                ?>
            </tr>
            </tbody>
        </table>
    </div>
</div>
