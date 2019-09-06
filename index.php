<?php
//written by touya kenshin
//github/touyashi
//stem 2019 rpl skariga
//9-6-2019


function page_Home() {
	echo '<a href="?page=matematika">Matematika</a>';
	echo '<a href="?page=fisika">Fisika</a>';
	echo '<a href="?page=kimia">Kimia</a>';
}

function page_Matematika($materi) {
	$parameter = $_SERVER['QUERY_STRING'];
	$baris = 0;
	$kolom = 0;
	$baris2 = 0;
	$kolom2 = 0;

	if (isset($_POST['baris'])) {
		$baris = $_POST['baris'];
	}

	if (isset($_POST['kolom'])) {
		$kolom = $_POST['kolom'];
	}

	if (isset($_POST['baris2'])) {
		$baris2 = $_POST['baris2'];
	}

	if (isset($_POST['kolom2'])) {
		$kolom2 = $_POST['kolom2'];
	}

	if ($materi == "transposematriks") {
		echo '<a href="?page=matematika">Kembali</a>';
		$transpus = false;
		if (isset($_POST['transpus']) && $_POST['transpus'] == 'true') {
			$transpus = true;
		}

		echo "<form action='?$parameter' method='post'>	";
		echo "<input type='number' name='baris' placeholder='baris' value='$baris'>";
		echo "<input type='number' name='kolom' placeholder='kolom' value='$kolom'>";
		echo "<button>Tampilkan Form</button>";
		echo "</form>";

		if ($baris != 0 && $kolom != 0) {
			echo "<form action='?$parameter' method='post'>	";
			echo "<input type='hidden' name='baris' value='$baris'>";
			echo "<input type='hidden' name='kolom' value='$kolom'>";
			echo "<input type='hidden' name='transpus' value='true'>";
			
				for ($a=0; $a < $baris; $a++) { 
					for ($i=0; $i < $kolom; $i++) {
						$watnani = '';
						if (isset($_POST['yikez'.$a.$i]) && $_POST['yikez'.$a.$i] != null) {
							$watnani = $_POST['yikez'.$a.$i];
						}
						echo "<input type='number' name='yikez$a$i' value='$watnani'>";
					}
					echo "<br>";
				}
			
			echo "<button>Tanspus</button>";
			echo "</form>";
		}

		if ($transpus) {
			echo "RESULT<br>";
			echo "<input type='number' name='baris' placeholder='baris' value='$kolom'>";
			echo "<input type='number' name='kolom' placeholder='kolom' value='$baris'>";
			echo "<br><br>";
			$watt = null;

			for ($a=0; $a < $baris; $a++) { 
				for ($i=0; $i < $kolom; $i++) {
					if (isset($_POST['yikez'.$a.$i]) && $_POST['yikez'.$a.$i] != null) {
						$watt[$a][$i] = $_POST['yikez'.$a.$i];
					} else {
						$watt[$a][$i] = 0;
					}
				}
			}

			//print_r($watt);

			for ($a=0; $a < $kolom; $a++) { 
				for ($i=0; $i < $baris; $i++) {
					echo "<input type='number' name='yikez$a$i' value='".$watt[$i][$a]."'>";
				}
				echo "<br>";
			}

		}

	} else if ($materi == "menghitungmatriks") {
		echo '<a href="?page=matematika">Kembali</a>';
		$transpus = false;
		if (isset($_POST['transpus']) && $_POST['transpus'] == 'true') {
			$transpus = true;
		}
		$operasi = 'penjumlahan';

		if (isset($_POST['operasi'])) {
			$operasi = $_POST['operasi'];
		}

		echo "<form action='?$parameter' method='post'>	";
		echo "BAGIAN 1";
		echo "<input type='number' name='baris' placeholder='baris' value='$baris'>";
		echo "<input type='number' name='kolom' placeholder='kolom' value='$kolom'>";
		echo "<br>";
		echo "BAGIAN 2";
		echo "<input type='number' name='baris2' placeholder='baris' value='$baris2'>";
		echo "<input type='number' name='kolom2' placeholder='kolom' value='$kolom2'>";

		echo "<button>Tampilkan Form</button>";
		echo "</form>";

		if ($baris != 0 && $kolom != 0 && $baris2 != 0 && $kolom2 != 0) {
			echo "<form action='?$parameter' method='post'>	";
			echo "<input type='hidden' name='baris' value='$baris'>";
			echo "<input type='hidden' name='kolom' value='$kolom'>";
			echo "<input type='hidden' name='baris2' value='$baris2'>";
			echo "<input type='hidden' name='kolom2' value='$kolom2'>";
			echo "<input type='hidden' name='transpus' value='true'>";
			echo "<select name='operasi'><option value='penjumlahan'>Penjumlahan</option><option value='pengurangan'>Pengurangan</option></select>";
				echo "BAGIAN 1<br>";
				for ($a=0; $a < $baris; $a++) { 
					for ($i=0; $i < $kolom; $i++) {
						$watnani = '';
						if (isset($_POST['yikez'.$a.$i]) && $_POST['yikez'.$a.$i] != null) {
							$watnani = $_POST['yikez'.$a.$i];
						}
						echo "<input type='number' name='yikez$a$i' value='$watnani'>";
					}
					echo "<br>";
				}
				echo "BAGIAN 2<br>";
				for ($a=0; $a < $baris2; $a++) { 
					for ($i=0; $i < $kolom2; $i++) {
						$watnani = '';
						if (isset($_POST['zekiy'.$a.$i]) && $_POST['zekiy'.$a.$i] != null) {
							$watnani = $_POST['zekiy'.$a.$i];
						}
						echo "<input type='number' name='zekiy$a$i' value='$watnani'>";
					}
					echo "<br>";
				}
			
			echo "<button>Hitung</button>";
			echo "</form>";
		}

		if ($transpus) {
			echo "RESULT";
			echo "<input type='number' name='baris' placeholder='baris' value='$baris'>";
			echo "<input type='number' name='kolom' placeholder='kolom' value='$kolom'>";
			echo "<br>";
			$watt = null;

			for ($a=0; $a < $baris; $a++) { 
				for ($i=0; $i < $kolom; $i++) {
					if ($operasi == 'penjumlahan') {
						$watt[$a][$i] = $_POST['yikez'.$a.$i]+$_POST['zekiy'.$a.$i];
					} else if ($operasi == 'pengurangan') {
						$watt[$a][$i] = $_POST['yikez'.$a.$i]-$_POST['zekiy'.$a.$i];
					}
				}
			}

			//print_r($watt);

			for ($a=0; $a < $baris; $a++) { 
				for ($i=0; $i < $kolom; $i++) {
					echo "<input type='number' name='result$a$i' value='".$watt[$a][$i]."'>";
				}
				echo "<br>";
			}

		}
	} else {
		echo '<a href="?page=menu">Kembali</a>';
		echo "Matematika";
		echo '<a href="?page=matematika&materi=transposematriks">Transpose Matriks</a>';
		echo '<a href="?page=matematika&materi=menghitungmatriks">Menghitung Matriks</a>';
	}
}

function page_Fisika($materi) {
	echo '<a href="?page=menu">Kembali</a>';
	echo "Fisika";

}

function page_Kimia($materi) {
	$parameter = $_SERVER['QUERY_STRING'];
	$daboo = array(
		array(
			'namaunsur' => 'Hidrogen (H)',
			'nomormassa' =>5,
			'nomoratom' =>1,
			'jumlahelektron' =>2,
			'jumlahproton' =>3,
			'jumlahneutron' =>1
		),
		
		array(
			'namaunsur' => 'Carbon (C)',
			'nomormassa' =>1,
			'nomoratom' =>4,
			'jumlahelektron' =>2,
			'jumlahproton' =>2,
			'jumlahneutron' =>3
		),

		array(
			'namaunsur' => 'Oksigen',
			'nomormassa' => 2,
			'nomoratom' =>1,
			'jumlahelektron' =>2,
			'jumlahproton' =>4,
			'jumlahneutron' =>2
		)
	);

	echo '<a href="?page=menu">Kembali</a>';
	echo "Kimia";
	echo "<form action='?$parameter' method='post'>";
	echo "<select name='unsur'>";
	for ($i=0; $i < count($daboo); $i++) { 
		echo "<option value='$i'>".$daboo[$i]['namaunsur']."</option>";
	}
	echo "</select>";
	echo "<button>Tampilkan</button>";
	echo "</form>";
	if (isset($_POST['unsur'])) {
		for ($i=0; $i < count($daboo); $i++) { 
			if ($i == $_POST['unsur']) {
				echo "Nama Unsur: <input type='text' value='".$daboo[$i]['namaunsur']."'><br>";
				echo "Nomor Massa (A): <input type='number' value='".$daboo[$i]['nomormassa']."'><br>";
				echo "Nomor Atom (Z): <input type='number' value='".$daboo[$i]['nomoratom']."'><br>";
				echo "Jumlah Elektron (e): <input type='number' value='".$daboo[$i]['jumlahelektron']."'><br>";
				echo "Jumlah Proton (P=e): <input type='number' value='".$daboo[$i]['jumlahproton']."'><br>";
				echo "Jumlah Neutron(n),n=A-Z: <input type='number' value='".$daboo[$i]['jumlahneutron']."'><br>";
			}
		}
	}
}

if (isset($_GET['page'])) {
	$materi = null;

	if (isset($_GET['materi'])) {
		$materi = $_GET['materi'];
	}

	if ($_GET['page'] == "matematika") {
		page_Matematika($materi);
	} else if ($_GET['page'] == "fisika") {
		page_Fisika($materi);
	} else if ($_GET['page'] == "kimia") {
		page_Kimia($materi);
	} else {
		page_Home();
	}

} else {
	page_Home();
}