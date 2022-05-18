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
	$error_nama_ibu = "";
	$error_lahir_ibu = "";
	$error_pend_ibu = "";
	$error_job_ibu = "";
	$error_gaji_ibu = "";


	$nama_ibu = "";
	$lahir_ibu = "";
	$pend_ibu = "";
	$job_ibu = "";
	$gaji_ibu = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		if (empty($_POST["nama_ibu"])) {
			$error_nama_ibu = "Nama ibu tidak boleh kososng";
		}
		else {
			$nama_ibu = cek_input($_POST["nama_ibu"]);
			if (!preg_match("/^[a-zA-Z ]*S/", $nama_ibu)) {
				$nameErr = "Inputan Hanya boleh huruf dan spasi";
			}
		}

		//tanggal lahir
		if (empty($_POST["lahir_ibu"])) {
			$error_lahir_ayah = "Tanggal Lahir Tidak Boleh Kosong";
		}
		else {
			$lahir_ibu = cek_input($_POST["lahir_ibu"]);
			if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$lahir_ibu)){
				$nameErr = "Inputan tanggal tidak valid";
			}
		}

		if (empty($_POST["pend_ibu"])) {
			$error_pend_ibu = "Data Tidak Boleh Kosong";
		}
		else {
			$pend_ibu = $_POST["pend_ibu"];
		}

		//pekerjaan ibu
		if (empty($_POST["job_ibu"])) {
			$error_job_ibu = "Data Tidak Boleh Kosong";
		}
		else {
			$job_ibu = $_POST["job_ibu"];
		}

		//gaji ibu
		if (empty($_POST["gaji_ibu"])) {
			$error_gaji_ibu = "Data Tidak Boleh Kosong";
		}
		else {
			$gaji_ibu = $_POST["gaji_ibu"];
		}
	}

$host="localhost";
$username="root";
$password="";
$namadb ="db_siswa_baru";
try {
$conn = mysqli_connect($host, $username, $password, $namadb) or die("Koneksi gagal dibangun");
$sql = "INSERT INTO `siswa`(`nama_ibu`, `lahir_ibu`, `pend_ibu`, `job_ibu`, `gaji_ibu`) VALUES ('$nama_ibu','$lahir_ibu','$pend_ibu','$job_ibu','$gaji_ibu');";
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
		Data Ibu
	</div>
	<div class="card-body">
	
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> <div class="form-group row">
		<label for="nama_ibu" class="col-sm-2 col-form-label">Nama Ibu Kandung</label>
		<div class="col-sm-10">
		<input type="text" name="nama_ibu" class="form-control <?php echo ($error_nama_ibu !="" ? "is-invalid" : "");?>" id="nama_ibu" placeholder="Nama Ibu" value="<?php echo $nama_ibu;?>"><span class="warning"><?php echo $error_nama_ibu;?></span>
		</div>
		</div>

		<div class="form-group row">
			<label for="lahir_ibu" class="col-sm-2 col-form-label">Tanggal Lahir</label>
			<div class="col-sm-2">
				<input type="date" name="lahir_ibu" class="form-control <?php echo($error_lahir_ibu !="" ? "is-invalid" : ""); ?>" id="lahir_ibu" placeholder="YYYY-MM-DD" value="<?php echo $lahir_ibu;?>">
			</div>
			<span class="warning"><?php echo $error_lahir_ibu; ?></span>
		</div>

		<div class="form-group row">
			<label for="pend_ibu" class="col-sm-2 col-form-label">Pendidikan</label>
			<div class="col-sm-10">
				<select class="form-control <?php echo($error_pend_ibu !="" ? "is-invalid" : ""); ?>" id="pend_ibu" name = "pend_ibu">
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
			<label for="job_ibu" class="col-sm-2 col-form-label">Pekerjaan</label>
			<div class="col-sm-10">
				<select class="form-control <?php echo($error_job_ibu !="" ? "is-invalid" : ""); ?>" id="job_ibu" name = "job_ibu">
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
			<label for="gaji_ibu" class="col-sm-2 col-form-label">Penghasilan Bulanan</label>
			<div class="col-sm-10">
				<select class="form-control <?php echo($error_gaji_ibu !="" ? "is-invalid" : ""); ?>" id="gaji_ibu" name = "gaji_ibu">
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
			</div>
		</div>
	</form>
</div>
</div>
</div>
</div>

</body>
</html>