<?php
include "config.php";

?>

<div style="text-align: center;">
    <span style="font-size: x-large; ">Data Proposal</span>
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
                <th>Judul</th>
                <th class="text-center">Aksi</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php
                $sql_mhs = mysqli_query($koneksi, "
                SELECT mahasiswa.NIM, mahasiswa.Nama, registrasi.status, registrasi.judul, proposal.nilai1, proposal.nilai2, proposal.nilai3, proposal.nilai4, proposal.nilai_hsl, proposal.ket FROM mahasiswa, registrasi, proposal
                WHERE registrasi.nim = mahasiswa.NIM and registrasi.status = 'Proposal' and proposal.nim = registrasi.nim
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
							<td>' . $data_mhs['judul'] . '</td>
							<td class="text-center">
								<a href="index.php?page=detail_proposal&nim=' . $data_mhs['NIM'] . '" class="btn btn-secondary btn-sm">Detail</a>
							</td>
							</tr>
						';
                        $no++;
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
