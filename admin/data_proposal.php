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
                <th>Nilai DP</th>
                <th>Nilai DPe 1</th>
                <th>Nilai DPe 2</th>
                <th>Nilai DPe 3</th>
                <th>Nilai Akhir</th>
                <th class="text-center">Aksi</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php
                $sql_mhs = mysqli_query($koneksi, "
                SELECT mahasiswa.NIM, mahasiswa.Nama, registrasi.status, registrasi.judul, nilai_proposal.dpem1, nilai_proposal.dpen1, nilai_proposal.dpen2, nilai_proposal.dpen3, nilai_proposal.avg FROM mahasiswa, registrasi, nilai_proposal
                WHERE registrasi.nim = mahasiswa.NIM and registrasi.status = 'Proposal' and nilai_proposal.nim = registrasi.nim
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
							<td>' . $data_mhs['dpem1'] . '</td>
							<td>' . $data_mhs['dpen1'] . '</td>
							<td>' . $data_mhs['dpen2'] . '</td>
							<td>' . $data_mhs['dpen3'] . '</td>
							<td>' . $data_mhs['avg'] . '</td>
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
