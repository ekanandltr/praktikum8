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
	$error_nama = "";
	$error_jk = "";
	$error_nisn = "";
	$error_nik = "";
	$error_tempatlahir = "";
	$error_tgllahir = "";
	$error_agama = "";
	$error_berkebutuhan = "";
	$error_alamat = "";
	$error_kodepos = "";
	$error_temptinggal = "";
	$error_modetrans = "";
	$error_nohp = "";
	$error_email ="";
	$error_pkh = "";
	$error_kwn = "";


	$nama_lengkap = "";
	$jenis_kelamin = "";
	$nisn = "";
	$nik = "";
	$tempat_lahir = "";
	$tgl_lahir = "";
	$agama = "";
	$berkebutuhan = "";
	$alamat_lengkap = "";
	$kode_pos = "";
	$temp_tinggal = "";
	$mode_trans = "";
	$nomor_hp = "";
	$email = "";
	$pkh = "";
	$kwn = "";
	

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		//nama
		if (empty($_POST["nama_lengkap"])) {
			$error_nama = "Nama tidak boleh kososng";
		}
		else {
			$nama_lengkap = cek_input($_POST["nama_lengkap"]);
			if (!preg_match("/^[a-zA-Z ]*S/", $nama_lengkap)) {
				$nameErr = "Inputan Hanya boleh huruf dan spasi";
			} }

		//jenis kelamin
		if (empty($_POST["jenis_kelamin"])) {
			$error_jk = "Jenis Kelamin Tidak Boleh Kosong";
		}
		else {
			$jenis_kelamin = $_POST["jenis_kelamin"];
		}

		//nisn
		if (empty($_POST["nisn"])) {
			$error_nisn = "NISN Tidak Boleh Kosong !";
		}
		else {
			$nisn = cek_input($_POST["nisn"]);
		}

		//nik
		if (empty($_POST["nik"])) {
			$error_nik = "NIK Tidak Boleh Kosong";
		}
		else {
			$nik = cek_input($_POST["nik"]);
			
		}

		//tempat lahir
		if (empty($_POST["tempat_lahir"])) {
			$error_tempatlahir = "Tempat Lahir Tidak Boleh Kosong";
		}
		else {
			$tempatlahir = cek_input($_POST["tempat_lahir"]);
			if (!preg_match("/^[a-zA-Z ]*S/", $tempatlahir)) {
				$nameErr = "Inputan Hanya boleh hururf dan spasi";
			}
		}

		//tanggal lahir
		if (empty($_POST["tgl_lahir"])) {
			$error_tgl = "Tanggal Lahir Tidak Boleh Kosong";
		}
		else {
			$tgl_lahir = cek_input($_POST["tgl_lahir"]);
			if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$tgl_lahir)){
				$nameErr = "Inputan tanggal tidak valid";
			}
		}


		//agama
		$agama = $_POST["agama"];

		//berkebutuhan khusus
		$berkebutuhan = $_POST["berkebutuhan"];

		//alamat lengkap
		if (empty($_POST["alamat_lengkap"])) {
			$error_alamat = "Alamat tidak boleh kosong ! ";
		}
		else {
			$alamat_lengkap = cek_input($_POST["alamat_lengkap"]);
		}

		if (empty($_POST["kode_pos"])) {
			$error_kodepos = "Kode Pos Tidak Boleh Kosong !";
		}
		else {
			$kode_pos = cek_input($_POST["kode_pos"]);
		}

		//tempat tinggal
		if (empty($_POST["temp_tinggal"])) {
			$error_temptinggal = "Status Tempat Tinggal Tidak Boleh Kosong !";
		}
		else {
			$temp_tinggal = cek_input($_POST["temp_tinggal"]);
		} 

		//mode transportasi
		$mode_trans = $_POST["mode_trans"];

		//no hp
		if (empty($_POST["nomor_hp"])){
			$error_nohp = "Telp tidak boleh kosong";
		}else{
			$nomor_hp = cek_input($_POST["nomor_hp"]);
			if (!is_numeric($nomor_hp)){
				$error_nohp = 'Nomor HP hanya boleh angka';
			} }

		if (empty($_POST["email"])) {
			$error_email = "Email tidak boleh kosong";
		} else {
			$email = cek_input($_POST["email"]);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$error_email = "Format email Invalid";
			} }

		$pkh = $_POST["pkh"];

		//kewarganegaraan
		if (empty($_POST["kwn"])) {
			$error_kwn = "Kewarganegaraan Tidak Boleh Kosong";
		}
		else {
			$kwn = $_POST["kwn"];
		}
	}

$host="localhost";
$username="root";
$password="";
$namadb ="db_siswa_baru";
try {
$conn = mysqli_connect($host, $username, $password, $namadb) or die("Koneksi gagal dibangun");
$sql = "INSERT INTO `siswa`(`nama_lengkap`, `jenis_kelamin`, `nisn`, `nik`, `tempat_lahir`, `tgl_lahir`, `agama`, `berkebutuhan`, `alamat_lengkap`, `kode_pos`, `temp_tinggal`, `mode_trans`, `nomor_hp`, `email`, `pkh`, `kwn`) VALUES ('$nama_lengkap','$jenis_kelamin','$nisn','$nik','$tempat_lahir','$tgl_lahir','$agama','$berkebutuhan','$alamat_lengkap','$kode_pos','$temp_tinggal','$mode_trans','$nomor_hp','$email','$pkh','$kwn');";
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
		Data Pribadi
	</div>
	<div class="card-body">
	
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> <div class="form-group row">
		<label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
		<div class="col-sm-10">
		<input type="text" name="nama_lengkap" class="form-control <?php echo ($error_nama !="" ? "is-invalid" : "");?>" id="nama_lengkap" placeholder="Nama" value="<?php echo $nama_lengkap;?>"><span class="warning"><?php echo $error_nama;?></span>
		</div>
		</div>

		<div class="form-group row">
			<label for="jenis_kelamin" class="col-sm-2 col-from-label">Jenis Kelamin</label>
			<div class="col-sm-5">
			<input type="radio" id="Laki" name="jenis_kelamin" value="Laki-Laki">
			<label for="Laki">Laki-Laki</label><br>
			</div>
			<div class="col-sm-5">
			
			<input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan">
			<label for="perempuan">Perempuan</label><br>
			
			</div>
			<span class="warning"><?php echo $error_jk; ?></span>
		</div>

		<div class="form-group row">
			<label for="nisn" class="col-sm-2 col-form-label">NISN</label>
		<div class="col-sm-10">
			<input type="text" name="nisn" class="form-control <?php echo($error_nisn !="" ? "is-invalid" : ""); ?>" id="nisn" placeholder="NISN" value="<?php echo $nisn; ?>"><span class="warning"><?php echo $error_nisn; ?></span>
		</div>
		</div>
		<div class="form-group row">
			<label for="nik" class="col-sm-2 col-form-label">NIK / No.KITAS</label>
			<div class="col-sm-10">
				<input type="number" name="nik" class="form-control <?php echo($error_nik !="" ? "is-invalid" : ""); ?>" id="nik" placeholder="NIK" value="<?php echo $nik;?>"><span class="warning"><?php echo $error_nik; ?></span>
			</div>
		</div>

		<div class="form-group row">
			<label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
			<div class="col-sm-10">
				<input type="text" name="tempat_lahir" class="form-control <?php echo($error_nik !="" ? "is-invalid" : ""); ?>" id="tempat_lahir" placeholder="Tempat Kelahiran" value="<?php echo $tempat_lahir;?>"><span class="warning"><?php echo $error_tempatlahir; ?></span>
			</div>
		</div>

		<div class="form-group row">
			<label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
			<div class="col-sm-2">
				<input type="date" name="tgl_lahir" class="form-control <?php echo($error_tgllahir !="" ? "is-invalid" : ""); ?>" id="tgl_lahir" placeholder="YYYY-MM-DD" value="<?php echo $tgl_lahir;?>">
			</div>
			<span class="warning"><?php echo $error_tgllahir; ?></span>
		</div>

		<div class="form-group row">
			<label for="agama" class="col-sm-2 col-form-label">Agama</label>
			<div class="col-sm-10">
				<select class="form-control <?php echo($error_agama !="" ? "is-invalid" : ""); ?>" id="agama" name = "agama">
					<option value="" selected= "selected">---Pilih Kategori---</option>
					<option value="Islam">Islam</option>
					<option value="Kristen">Kristen Protestan</option>
					<option value="Katolik">Katolik</option>
					<option value="Hindu">Hindu</option>
					<option value="Budha">Budha</option>
					<option value="Konghucu">Konghucu</option>
				</select>
			</div>
		</div>	

		<div class="form-group row">
			<label for="berkebutuhan" class="col-sm-2 col-form-label">Berkebutuhan Khusus</label>
			<div class="col-sm-10">
				<select class="form-control <?php echo($error_berkebutuhan !="" ? "is-invalid" : ""); ?>" id="berkebutuhan" name="berkebutuhan">
					<option selected="selected" value="">---Pilih---</option>
					<option value="Tidak Ada">Tidak Ada</option>
					<option value="Tunanetra">Tunanetra</option>
					<option value="Tunarungu">Tunarungu</option>
					<option value="Tunawicara">Tunawicara</option>
					<option value="lain-lain">Gangguan Lainnya</option>
					
				</select>
				<span class="warning"><?php echo $error_berkebutuhan;?></span>
			</div>	
		</div>

		<div class="form-group row">
			<label for="alamat_lengkap" class="col-sm-2 col-form-label">Alamat Lengkap</label>
			<div class="col-sm-10">
				<input type="text" name="alamat_lengkap" class="form-control <?php echo($error_nik !="" ? "is-invalid" : ""); ?>" id="alamat_lengkap" placeholder="Alamat Jalan & Nomor Rumah" value="<?php echo $alamat_lengkap;?>"><span class="warning"><?php echo $error_alamat; ?></span>
			</div>
		</div>

		<div class="form-group row">
			<label for="kode_pos" class="col-sm-2 col-form-label">Kode Pos</label>
			<div class="col-sm-10">
				<input type="number" name="kode_pos" class="form-control <?php echo($error_kodepos !="" ? "is-invalid" : ""); ?>" id="kode_pos" placeholder="Kode Pos" value="<?php echo $kode_pos;?>"><span class="warning"><?php echo $error_kodepos; ?></span>
			</div>
		</div>

		<div class="form-group row">    
			<label for="temp_tinggal" class="col-sm-2 col-form-label"> Tempat Tinggal </label>
			<div class="col-sm-10">
			<select class="form-control <?php echo ($error_temptinggal !="" ? "is-invalid" : "");?>" id="temp_tinggal" name="temp_tinggal">
				<option value="">--Pilih Kategori--</option>
                <option value="Bersama Orang Tua">1. Bersama Orang Tua</option>
                <option value="Wali">2. Wali</option>
                <option value="Kos">3. Kos</option>
                <option value="Asrama">4. Asrama</option>
                <option value="Panti Asuhan">5. Panti Asuhan</option>
                <option value="Lainnya">6. Lainnya</option>
			</select>
			<span class="warning"><?php echo $error_temptinggal;?></span>
			</div>
		</div>

		<div class="form-group row">
			<label for="mode_trans" class="col-sm-2 col-form-label">Transportasi</label>
			<div class="col-sm-10">
				<select class="form-control <?php echo($error_modetrans !="" ? "is-invalid" : ""); ?>" id="mode_trans" name="mode_trans">
					<option value="Kendaraan Pribadi">Kendaraan Pribadi</option>
					<option value="Angkutan Umum">Angkutan Umum</option>
				</select>
			</div>
		</div>

		<div class="form-group row">
			<label for="nomor_hp" class="col-sm-2 col-form-label">Nomor HP</label>
			<div class="col-sm-10">
			<input type="text" name="nomor_hp" class="form-control <?php echo($error_nohp != "" ? "is-invalid" : ""); ?>" id=
				"nomor_hp" placeholder="Nomor Hp" value="<?php echo $nomor_hp; ?>"><span class="warning"><?php echo $error_nohp; ?></span>
			</div>
		</div>

		<div class="form-group row">
			<label for="email" class="col-sm-2 col-form-label">Email</label>
			<div class="col-sm-10">
				<input type="text" name="email" class="form-control <?php echo($error_email !="" ? "is-invalid" : ""); ?>" id="email" placeholder="Email" value="<?php echo $email; ?>"><span class="warning"><?php echo $error_email; ?></span>
			</div>
		</div>

		<div class="form-group row">
			<label for="pkh" class="col-sm-2 col-from-label">Penerima KPS/PKH</label>
			<div class="col-sm-2">
			<input type="radio" id="pkh" name="pkh" value="Ya">
			<label for="ppkh">Ya</label><br>
			</div>
			<div class="col-sm-2">
			<input type="radio" id="pkh" name="pkh" value="Tidak">
			<label for="pkh">Tidak</label><br>
			</div>
			<span class="warning"><?php echo $error_pkh;?></span>
		</div>

		<div class="form-group row">
			<label for="kwn" class="col-sm-2 col-from-label">Kewarganegaraan</label>
			<div class="col-sm-2">
			<input type="radio" id="wni" name="kwn" value="WNI">
			<label for="wni">WNI</label><br>
			</div>
			<div class="col-sm-2">
			<input type="radio" id="wna" name="kwn" value="WNA">
			<label for="wna">WNA</label><br>
			</div>
			<span class="warning"><?php echo $error_kwn;?></span>
		</div>
		
		<div class="form-group row">
			<div class="col-sm-10">
				<button type="submit" class="btn btn-primary">Kirim</button>
				<a href="data_ayah.php" button type="button" class="btn btn-secondary">Data Ayah</a>
			</div>
		</div>
	</form>
</div>
</div>
</div>
</div>

</body>
</html>