<?php
include "config.php";

?>

<div style="text-align: center;">
    <span style="font-size: x-large; ">Berkas Persyaratan</span>
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
                <th>Surat Pernyataan</th>
                <th>KTM</th>
                <th>Transkip Nilai</th>
                <th>Slip UKT</th>
                <th>Kartu Her-Registrasi</th>
                <th>KRS Terakhir</th>
                <th class="text-center">Aksi</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php
                $sql_mhs = mysqli_query($koneksi, "
                SELECT mahasiswa.NIM, nilai_berkas.srt_permohonan, nilai_berkas.ktm, nilai_berkas.transkip_nilai, nilai_berkas.slip_ukt, nilai_berkas.kartu_her, nilai_berkas.krs_terakhir FROM mahasiswa, registrasi, nilai_berkas
                WHERE nilai_berkas.nim = mahasiswa.NIM
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
							<td>' . $data_mhs['srt_permohonan'] . '</td>
							<td>' . $data_mhs['ktm'] . '</td>
							<td>' . $data_mhs['transkip_nilai'] . '</td>
							<td>' . $data_mhs['slip_ukt'] . '</td>
							<td>' . $data_mhs['kartu_her'] . '</td>
							<td>' . $data_mhs['krs_terakhir'] . '</td>
							<td class="text-center">
								<a href="index.php?page=detail_berkas&nim=' . $data_mhs['NIM'] . '" class="btn btn-secondary btn-sm">Detail Berkas</a>
							</td>
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
