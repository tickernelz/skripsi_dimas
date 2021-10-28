<?php
include "config.php";

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
<div style="text-align: center;">
    <span style="font-size: x-large; ">Kelola User Mahasiswa</span>
</div>
<hr>

<script type="text/javascript">
    function checkDelete() {
        return confirm('Apakah Anda Yakin Ingin Menghapus Data ?');
    }
</script>

<div class="container-fluid">
    <span>DP 1 = Dosen Pembimbing I</span>
    <span>DPe 1 = Dosen Penguji 1</span>
    <span>DPe 2 = Dosen Penguji 2</span>
    <span>DPe 2 = Dosen Penguji 3</span>
    <select id="myInput" class="form-control">
        <option value="">SEMUA PERIODE</option>
        <?php
        $sql = mysqli_query($koneksi, "SELECT * from periode");
        while ($isi = mysqli_fetch_array($sql)) {
            $id_periode = $isi['id'];
            $nama_periode = $isi['nama_prd'];
            $tahun = $isi['tahun'];
            ?>
            <option value="<?php echo $nama_periode; ?>"> <?php echo $nama_periode ?> (<?php echo $tahun; ?>)</option>
        <?php } ?>
    </select>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>NO</th>
                <th>ID Periode</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Status</th>
                <th>Judul</th>
                <th>DP I</th>
                <th>DPe I</th>
                <th>DPe II</th>
                <th>DPe III</th>
                <th class="text-center">Aksi</th>
            </tr>
            </thead>
            <tbody id="myTable">
            <tr>
                <?php
                $sql_mhs = mysqli_query($koneksi, "
                SELECT registrasi.id_periode, mahasiswa.NIM, mahasiswa.Nama, registrasi.status, registrasi.judul, dosen_pembimbing.dosen_pembimbing1, dosen_pembimbing.dpen1, dosen_pembimbing.dpen2, dosen_pembimbing.dpen3
                FROM mahasiswa, registrasi, dosen_pembimbing
                WHERE registrasi.nim = mahasiswa.NIM AND dosen_pembimbing.nim_mhs = mahasiswa.NIM
                GROUP BY mahasiswa.NIM
                ORDER BY mahasiswa.NIM ASC
                ") or die(mysqli_error($koneksi));
                if (mysqli_num_rows($sql_mhs) > 0) {
                    $no = 1;
                    while ($data_mhs = mysqli_fetch_assoc($sql_mhs)) {
                        $id_periode_mhs = $data_mhs['id_periode'];
                        $sql_periode = "select * from periode where id='$id_periode_mhs'";
                        $query_periode = mysqli_query($koneksi, $sql_periode);
                        $data_periode = mysqli_fetch_assoc($query_periode);
                        $nama_prd = $data_periode['nama_prd'];
                        $thn_prd = $data_periode['tahun'];
                        echo '
						    <tr>
						    <th scope="row">' . $no . '</th>
						    <td>' . $data_periode['nama_prd'] . '</td>
							<td>' . $data_mhs['NIM'] . '</td>
							<td>' . $data_mhs['Nama'] . '</td>
							<td>' . $data_mhs['status'] . '</td>
							<td>' . $data_mhs['judul'] . '</td>
							<td>' . $data_mhs['dosen_pembimbing1'] . '</td>
							<td>' . $data_mhs['dpen1'] . '</td>
							<td>' . $data_mhs['dpen2'] . '</td>
                            <td>' . $data_mhs['dpen3'] . '</td>
							<td class="text-center">
								<a href="index.php?page=edit_mhs&nim=' . $data_mhs['NIM'] . '" class="btn btn-secondary btn-sm">Edit</a>
								<a href="index.php?page=hapus_mhs&nim=' . $data_mhs['NIM'] . '" onclick="return checkDelete()" class="btn btn-danger btn-sm">Hapus</a>
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
<script type="text/javascript">
    $(document).ready(function(){
        $("#myInput").on("change", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>