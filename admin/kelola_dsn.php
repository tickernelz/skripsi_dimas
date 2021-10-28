<?php
include "config.php";

?>

<div style="text-align: center;">
    <span style="font-size: x-large; ">Kelola User Dosen</span>
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
                <th>NIP</th>
                <th>Nama Dosen</th>
                <th>Alamat</th>
                <th>Telpon</th>
                <th class="text-center">Aksi</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php
                $sql_mhs = mysqli_query($koneksi, "
                SELECT nip, nama_dosen, alamat, telp FROM dosen;
                ") or die(mysqli_error($koneksi));
                if (mysqli_num_rows($sql_mhs) > 0) {
                    $no = 1;
                    while ($data_dosen = mysqli_fetch_assoc($sql_mhs)) {
                        echo '
						    <tr>
						    <th scope="row">' . $no . '</th>
							<td>' . $data_dosen['nip'] . '</td>
							<td>' . $data_dosen['nama_dosen'] . '</td>
							<td>' . $data_dosen['alamat'] . '</td>
							<td>' . $data_dosen['telp'] . '</td>
							<td class="text-center">
								<a href="index.php?page=edit_dsn&nip=' . $data_dosen['nip'] . '" class="btn btn-secondary btn-sm">Edit</a>
								<a href="index.php?page=hapus_dsn&nip=' . $data_dosen['nip'] . '" onclick="return checkDelete()" class="btn btn-danger btn-sm">Hapus</a>
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
