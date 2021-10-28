<?php
include "config.php";

?>

<div style="text-align: center;">
    <span style="font-size: x-large; ">Kelola Dosen Pembimbing</span>
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

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>NO</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Status</th>
                <th>Judul</th>
                <th>DP I</th>
                <th>DP II</th>
                <th class="text-center">Aksi</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php
                $sql_mhs = mysqli_query($koneksi, "
                SELECT mahasiswa.NIM, mahasiswa.Nama, registrasi.status, registrasi.judul, dosen_pembimbing.dosen_pembimbing1, dosen_pembimbing.dpen1, dosen_pembimbing.dosen_pembimbing2
                FROM mahasiswa, registrasi, dosen_pembimbing
                WHERE registrasi.nim = mahasiswa.NIM AND dosen_pembimbing.nim_mhs = mahasiswa.NIM
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
							<td>' . $data_mhs['dosen_pembimbing1'] . '</td>
							<td>' . $data_mhs['dosen_pembimbing2'] . '</td>
							<td class="text-center">
								<a href="index.php?page=edit_dpem&nim=' . $data_mhs['NIM'] . '" class="btn btn-secondary btn-sm">Edit</a>
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
