<?php
	if(!isset($_GET['act'])){
		echo "Selamat Datang di ";
	}else if($_GET['act']=='home'){
		echo "Home | ";
	}else if($_GET['act']=='nilai'){
		echo "Nilai | ";
	}else if($_GET['act']=='admin'){
		echo "Admin | ";
	}else if($_GET['act']=='siswa'){
		echo "Siswa | ";
	}else if($_GET['act']=='jadwal'){
		echo "Jadwal | ";
	}else if($_GET['act']=='presensi'){
		echo "Presensi | ";
	}else if($_GET['act']=='mapel'){
		echo "Mata Pelajaran | ";
	}else if($_GET['act']=='kelas'){
		echo "Kelas | ";
	}else if($_GET['act']=='materi'){
		echo "Perangkat Pembelajaran | ";
	}else if($_GET['act']=='upload'){
		echo "Perangkat Pembelajaran | ";
	}else if($_GET['act']=='kelas'){
		echo "Kelas | ";
	}else if($_GET['act']=='guru'){
		echo "Data Guru | ";
	}
?>