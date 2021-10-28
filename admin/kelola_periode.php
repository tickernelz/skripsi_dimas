<?php
include "config.php";

?>

<div style="text-align: center;">
    <span style="font-size: x-large; ">Kelola Periode</span>
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
                <th>Nama Periode</th>
                <th>Tahun Periode</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th class="text-center">Aksi</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php
                $sql_prd = mysqli_query($koneksi, "
                SELECT * FROM periode;
                ") or die(mysqli_error($koneksi));
                if (mysqli_num_rows($sql_prd) > 0) {
                    $no = 1;
                    while ($data_prd = mysqli_fetch_assoc($sql_prd)) {
                        echo '
						    <tr>
						    <th scope="row">' . $no . '</th>
							<td>' . $data_prd['nama_prd'] . '</td>
							<td>' . $data_prd['tahun'] . '</td>
							<td>' . $data_prd['start_date'] . '</td>
							<td>' . $data_prd['end_date'] . '</td>
							<td>' . $data_prd['stat'] . '</td>
							<td class="text-center">
								<a href="index.php?page=edit_prd&id=' . $data_prd['id'] . '" class="btn btn-secondary btn-sm">Edit</a>
								<a href="index.php?page=hapus_prd&id=' . $data_prd['id'] . '" onclick="return checkDelete()" class="btn btn-danger btn-sm">Hapus</a>
							</td>
							</tr>
						';
                        $no++;
                    }
                    //jika query menghasilkan nilai 0
                } else {
                    echo '
					<tr>
						<td colspan="7">Tidak ada data.</td>
					</tr>
					';
                }
                ?>
            </tr>
            </tbody>
        </table>
    </div>
</div>
