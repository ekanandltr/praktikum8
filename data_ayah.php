<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<style>
		.warning {color:  #FF0000;}
	</style>
</head>
<body>

	
	<?php
	$error_nama_ayah = "";
	$error_lahir_ayah = "";
	$error_pend_ayah = "";
	$error_job_ayah = "";
	$error_gaji_ayah = "";


	$nama_ayah = "";
	$lahir_ayah = "";
	$pend_ayah = "";
	$job_ayah = "";
	$gaji_ayah = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		if (empty($_POST["nama_ayah"])) {
			$error_nama_ayah = "Nama ayah tidak boleh kososng";
		}
		else {
			$nama_ayah = cek_input($_POST["nama_ayah"]);
			if (!preg_match("/^[a-zA-Z ]*S/", $nama_ayah)) {
				$nameErr = "Inputan Hanya boleh huruf dan spasi";
			}
		}

		//tanggal lahir
		if (empty($_POST["lahir_ayah"])) {
			$error_lahir_ayah = "Tanggal Lahir Tidak Boleh Kosong";
		}
		else {
			$lahir_ayah = cek_input($_POST["lahir_ayah"]);
			if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$lahir_ayah)){
				$nameErr = "Inputan tanggal tidak valid";
			}
		}

		//pendidikan ayah
		if (empty($_POST["pend_ayah"])) {
			$error_pend_ayah = "Data Tidak Boleh Kosong";
		}
		else {
			$pend_ayah = $_POST["pend_ayah"];
		}

		//pekerjaan ayah
		if (empty($_POST["job_ayah"])) {
			$error_job_ayah = "Data Tidak Boleh Kosong";
		}
		else {
			$job_ayah = $_POST["job_ayah"];
		}

		//gaji ayah
		if (empty($_POST["gaji_ayah"])) {
			$error_gaji_ayah = "Data Tidak Boleh Kosong";
		}
		else {
			$gaji_ayah = $_POST["gaji_ayah"];
		}
	}

$host="localhost";
$username="root";
$password="";
$namadb ="db_siswa_baru";
try {
$conn = mysqli_connect($host, $username, $password, $namadb) or die("Koneksi gagal dibangun");
$sql = "INSERT INTO `siswa`(`nama_ayah`, `lahir_ayah`, `pend_ayah`, `job_ayah`, `gaji_ayah`) VALUES ('$nama_ayah','$lahir_ayah','$pend_ayah','$job_ayah','$gaji_ayah');";
mysqli_query($conn,$sql);
mysqli_close($conn);	
} catch (Exception $e) {
	echo $e;
	
}


	function cek_input($siswa) {
		$siswa = trim($siswa);
		$siswa = stripcslashes($siswa);
		$siswa = htmlspecialchars($siswa);
		return $siswa;
	}

	?>

	<center><h2>Formulir Peserta Didik</h2></center><br>
<div class="row">
<div class="col-md-12">
<div class="card">
	<div class="card-header">
		Data Ayah
	</div>
	<div class="card-body">
	
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> <div class="form-group row">
		<label for="nama_ayah" class="col-sm-2 col-form-label">Nama Ayah Kandung</label>
		<div class="col-sm-10">
		<input type="text" name="nama_ayah" class="form-control <?php echo ($error_nama_ayah !="" ? "is-invalid" : "");?>" id="nama_ayah" placeholder="Nama Ayah" value="<?php echo $nama_ayah;?>"><span class="warning"><?php echo $error_nama_ayah;?></span>
		</div>
		</div>

		<div class="form-group row">
			<label for="lahir_ayah" class="col-sm-2 col-form-label">Tanggal Lahir</label>
			<div class="col-sm-2">
				<input type="date" name="lahir_ayah" class="form-control <?php echo($error_lahir_ayah !="" ? "is-invalid" : ""); ?>" id="lahir_ayah" placeholder="YYYY-MM-DD" value="<?php echo $lahir_ayah;?>">
			</div>
			<span class="warning"><?php echo $error_lahir_ayah; ?></span>
		</div>

		<div class="form-group row">
			<label for="pend_ayah" class="col-sm-2 col-form-label">Pendidikan</label>
			<div class="col-sm-10">
				<select class="form-control <?php echo($error_pend_ayah !="" ? "is-invalid" : ""); ?>" id="pend_ayah" name = "pend_ayah">
					<option value="" selected= "selected">---Pilih---</option>
					<option value="Tidak_Sekolah">Tidak Sekolah</option>
					<option value="SD/Sederajat">SD/Sederajat</option>
					<option value="SMP">SMP/Sederajat</option>
					<option value="SMA">SMA/Sederajat</option>
					<option value="Diploma">Diploma</option>
					<option value="Sarjana">Sarjana</option>
				</select>
			</div>
		</div>	

		<div class="form-group row">
			<label for="job_ayah" class="col-sm-2 col-form-label">Pekerjaan</label>
			<div class="col-sm-10">
				<select class="form-control <?php echo($error_job_ayah !="" ? "is-invalid" : ""); ?>" id="job_ayah" name = "job_ayah">
					<option value="" selected= "selected">---Pilih Pekerjaan---</option>
					<option value="Tidak_Bekerja">Tidak Bekerja</option>
					<option value="Nelayan">Nelayan</option>
					<option value="Petani">Petani</option>
					<option value="Peternak">Peternak</option>
					<option value="PNS">PNS/TNI/POLRI</option>
					<option value="Swasta">Karyawan Swasta</option>
					<option value="Pedagang">Pedagang</option>
					<option value="Wiraswasta">Wiraswasta</option>
					<option value="Wirausaha">Wirausaha</option>
					<option value="Buruh">Buruh</option>
					<option value="Pensiunan">Pensiunan</option>
					<option value="lain-lain">Lain-lain</option>
				</select>
			</div>
		</div>	

		<div class="form-group row">
			<label for="gaji_ayah" class="col-sm-2 col-form-label">Penghasilan Bulanan</label>
			<div class="col-sm-10">
				<select class="form-control <?php echo($error_gaji_ayah !="" ? "is-invalid" : ""); ?>" id="gaji_ayah" name = "gaji_ayah">
					<option value="" selected= "selected">---Pilih---</option>
					<option value="Kurang">Kurang dari 500 ribu</option>
					<option value="Sedang1">500 ribu - 1 juta </option>
					<option value="Sedang2">1 juta - 2.5 juta</option>
					<option value="Sedang3">2.5 juta - 4 juta</option>
					<option value="Besar">4 juta - 6 juta</option>
					<option value="Besar2">6 juta - 10 juta</option>
					<option value="Besar3">Lebih dari 10 juta</option>
				</select>
			</div>
		</div>
		
		<div class="form-group row">
			<div class="col-sm-10">
				<button type="submit" class="btn btn-primary">Kirim</button>
				<a href="data_ibu.php" button type="button" class="btn btn-secondary">Data Ibu</a>
			</div>
		</div>
	</form>
</div>
</div>
</div>
</div>

</body>
</html>