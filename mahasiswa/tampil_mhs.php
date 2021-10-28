<?php
//memasukkan file config.php
include('config.php');
?>


<div class="container" style="margin-top:20px">
    <div style="text-align: center;"><span style="font-size: x-large; ">Data Mahasiswa</span></div>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
            <tr>
                <th>NO.</th>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Judul Skripsi</th>
                <th>Status Proposal</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php
            //query ke database SELECT tabel mahasiswa urut berdasarkan NIM yang paling besar
            $sql = mysqli_query($koneksi, "SELECT * FROM registrasi ORDER BY Nim DESC") or die(mysqli_error($koneksi));
            //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
            if (mysqli_num_rows($sql) > 0) {
                //membuat variabel $no untuk menyimpan nomor urut
                $no = 1;
                //melakukan perulangan while dengan dari dari query $sql
                while ($data = mysqli_fetch_assoc($sql)) {
                    //menampilkan data perulangan
                    echo '
						<tr>
						
							<td>' . $no . '</td>
							<td>' . $data['Nim'] . '</td>
							<td>' . $data['Nama'] . '</td>
							<td>' . $data['Judul'] . '</td>
							<td>' . $data['Status'] . '</td>
							<td>
								<a href="index.php?page=edit_mhs&Nim=' . $data['Nim'] . '" class="btn btn-secondary btn-sm">Edit</a>
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
            <tbody>
        </table>
    </div>
</div>
