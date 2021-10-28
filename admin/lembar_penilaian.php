<?php
//memasukkan file config.php
include('config.php');
?>
	<?php
		if(isset($_GET['Nim'])){
			$Nim = $_GET['Nim'];

			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM registrasi WHERE Nim='$Nim'") or die(mysqli_error($koneksi));

			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>
<?php
        if(isset($_POST['submit'])){
            $skor1    =$_POST['skor1'];
			$skor2    =$_POST['skor2'];
			$skor3    =$_POST['skor3'];
			$skor4    =$_POST['skor4'];
			$skor5    = $skor1+$skor2+$skor3+$skor4+$skor5;
            
        }
    ?>

	<div class="container" style="margin-top:20px">
		<center><font size="6">Penilaian Proposal</font></center>
		<hr>
		<form action="index.php?page=edit_mhs&Nim=<?php echo $Nim; ?>">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">NIM</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Nim" class="form-control" size="4" value="<?php echo $data['']; ?>" readonly required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Mahasiswa</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Nama" class="form-control" value="<?php echo $data['Nama']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Judul Proposal</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Judul" class="form-control" value="<?php echo $data['Judul']; ?>" required>
				</div>
			</div>
			</form>
		<form action="index.php?page=penilaian" method="post">
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>NO.</th>
					<th>Krekterian Penilaian</th>
					<th>indikator Penilaian</th>
					<th>Bobot (%)</th>
					<th>Skor</th>
					<th>nilai</th>
					</tr>
			</thead>
		<tr>
            <td>1</td>
			<td>Perumusan Masalah</td>
            <td>Ketajaman Perumusan Masalah dan Tujuan Penelitian</td>
            <td>30%</td>
            <td><div class="col-md-3 col-sm-6">
					<input type="text" name="skor1" class="form-control" value="<?php echo $data['Judul']; ?>" required>
			</div> </td>
			<td> </td>
        </tr>
		<tr>
            <td>2</td>
			<td>Manfaat hasil Penelitian</td>
            <td>Pengembanagan Iptek, pembangunan dll</td>
            <td>20%</td>
            <td><div class="col-md-3 col-sm-6">
					<input type="text" name="skor2" class="form-control" value="<?php echo $data['Judul']; ?>" required>
			</div> </td>
			<td> </td>
        </tr>
		<tr>
            <td>3</td>
			<td>Tujuan Pustaka</td>
            <td>Relevansi,Kemutakhiran dan Penyusun Daftar Pustaka</td>
            <td>25%</td>
            <td><div class="col-md-3 col-sm-6">
					<input type="text" name="skor3" class="form-control" value="<?php echo $data['Judul']; ?>" required>
			</div> </td>
			<td> </td>
        </tr>
		<tr>
            <td>4</td>
			<td>Metode Penelitian</td>
            <td>Ketetapan Metode Yang digunakan</td>
            <td>25%</td>
            <td>
			<div class="col-md-3 col-sm-3">
					<input type="text" name="skor4" class="form-control" value="<?php echo $data['Judul']; ?>" required>
			</div> </td>
			<td> </td>
        </tr>
		<tr>
            <td></td>
			<td>TOTAL NILAI</td>
            <td></td>
            <td>100%</td>
            <td> <?php echo $skor5; ?></td>
			<td> </td>
        </tr>	
		</table>
	</div>
	<td><input type="submit" name="submit" value="Hitung"></td>		
	</form>
	</div>
