<?php
//written by touya kenshin
//github/touyashi
//stem 2019 rpl skariga
//9-6-2019

$title = 'STEM 2019';
ob_start();
page_Home();
$page = ob_get_contents();
ob_end_clean();

if (isset($_GET['page'])) {
	$materi = null;

	if (isset($_GET['materi'])) {
		$materi = $_GET['materi'];
	}
	
	
	if ($_GET['page'] == "matematika") {
		$title = 'STEM 2019 - Matematika';
		if ($materi == 'menghitungmatriks') {
			$title = 'STEM 2019 - Matematika <span style="font-size: 15px;">Menghitung Matriks</span>';
		} else if ($materi == 'transposematriks') {
			$title = 'STEM 2019 - Matematika <span style="font-size: 15px;">Transpose Matriks</span>';
		}
		ob_start();
		page_Matematika($materi);
		$page = ob_get_contents();
		ob_end_clean();
	} else if ($_GET['page'] == "fisika") {
		$title = 'STEM 2019 - Fisika';
		ob_start();
		page_Fisika($materi);
		$page = ob_get_contents();
		ob_end_clean();
	} else if ($_GET['page'] == "kimia") {
		$title = 'STEM 2019 - Kimia';
		ob_start();
		page_Kimia($materi);
		$page = ob_get_contents();
		ob_end_clean();
	} else {
		$title = 'STEM 2019';
		ob_start();
		page_Home();
		$page = ob_get_contents();
		ob_end_clean();
	}

}

function page_Home() {
	echo '<div class="menu-list">';
	echo '<a href="?page=matematika">Matematika</a>';
	echo '<a href="?page=fisika">Fisika</a>';
	echo '<a href="?page=kimia">Kimia</a>';
	echo '</div>';
}

function page_Matematika($materi) {
	$parameter = $_SERVER['QUERY_STRING'];
	$baris = 0;
	$kolom = 0;

	if (isset($_POST['baris'])) {
		$baris = $_POST['baris'];
	}

	if (isset($_POST['kolom'])) {
		$kolom = $_POST['kolom'];
	}

	if ($materi == "transposematriks") {
		$transpus = false;
		if (isset($_POST['transpus']) && $_POST['transpus'] == 'true') {
			$transpus = true;
		}

		echo "<form action='?$parameter' method='post'>	";
		echo "Baris <input class='input-touya' type='number' name='baris' placeholder='Baris' value='$baris'>";
		echo "Kolom <input class='input-touya' type='number' name='kolom' placeholder='Kolom' value='$kolom'>";
		echo "<button class='button-touya'>Tampilkan Form</button>";
		echo "</form>";

		if ($baris != 0 && $kolom != 0) {
			echo "<hr>";
			echo "<h3>Form</h3>";
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
						echo "<input class='matrix-input-touya' type='number' name='yikez$a$i' value='$watnani'>";
					}
					echo "<br>";
				}
			
			echo "<button class='button-touya'>Tanspus</button>";
			echo "</form>";
		}

		if ($transpus) {
			echo "<hr>";
			echo "<h3>Hasil</h3>";
			echo "Baris <input class='input-touya' type='number' name='baris' placeholder='baris' value='$kolom' disabled>";
			echo "Kolom <input class='input-touya' type='number' name='kolom' placeholder='kolom' value='$baris' disabled>";
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
					echo "<input class='matrix-input-touya' type='number' name='yikez$a$i' value='".$watt[$i][$a]."' disabled>";
				}
				echo "<br>";
			}

		}

	} else if ($materi == "menghitungmatriks") {
		$transpus = false;
		if (isset($_POST['transpus']) && $_POST['transpus'] == 'true') {
			$transpus = true;
		}
		$operasi = 'penjumlahan';

		if (isset($_POST['operasi'])) {
			$operasi = $_POST['operasi'];
		}

		echo "<form action='?$parameter' method='post'>	";
		echo "Baris <input class='input-touya' type='number' name='baris' placeholder='Baris' value='$baris'>";
		echo "Kolom <input class='input-touya' type='number' name='kolom' placeholder='Kolom' value='$kolom'>";
		echo "<button class='button-touya'>Tampilkan Form</button>";
		echo "</form>";

		if ($baris != 0 && $kolom != 0) {
			echo "<hr>";
			echo "<h3>Form</h3>";
			echo "<form action='?$parameter' method='post'>	";
			echo "<input type='hidden' name='baris' value='$baris'>";
			echo "<input type='hidden' name='kolom' value='$kolom'>";
			echo "<input type='hidden' name='transpus' value='true'>";
				echo "Bagian 1<br>";
				for ($a=0; $a < $baris; $a++) { 
					for ($i=0; $i < $kolom; $i++) {
						$watnani = '';
						if (isset($_POST['yikez'.$a.$i]) && $_POST['yikez'.$a.$i] != null) {
							$watnani = $_POST['yikez'.$a.$i];
						}
						echo "<input class='matrix-input-touya' type='number' name='yikez$a$i' value='$watnani'>";
					}
					echo "<br>";
				}
				echo "Bagian 2<br>";
				for ($a=0; $a < $baris; $a++) { 
					for ($i=0; $i < $kolom; $i++) {
						$watnani = '';
						if (isset($_POST['zekiy'.$a.$i]) && $_POST['zekiy'.$a.$i] != null) {
							$watnani = $_POST['zekiy'.$a.$i];
						}
						echo "<input class='matrix-input-touya' type='number' name='zekiy$a$i' value='$watnani'>";
					}
					echo "<br>";
				}
			
			echo "<button>Hitung</button>";
			echo "</form>";
		}

		if ($transpus) {
			echo "<hr>";
			echo "<h3>Hasil</h3>";
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
					echo "<input class='matrix-input-touya' type='number' name='result$a$i' value='".$watt[$a][$i]."'>";
				}
				echo "<br>";
			}

		}
	} else {
		echo '<div class="menu-list">';
		echo '<a href="?page=matematika&materi=transposematriks">Transpose Matriks</a>';
		echo '<a href="?page=matematika&materi=menghitungmatriks">Menghitung Matriks</a>';
		echo '</div>';
	}
}

function page_Fisika($materi) {
	$parameter = $_SERVER['QUERY_STRING'];
	echo "<h3>Periode Gentaran</h3>";
	echo "<input type='number' placeholder='Periode (T)'>";
	echo "<input type='number' placeholder='Waktu (t)'>";
	echo "<input type='number' placeholder='Jumlah Getaran (n)'>";
	echo "<br>";
	echo "<select><option>Periode (T)</option><option>Waktu (t)</option><option>Jumlah Getaran (n)</option></select>";
	echo "<button>Hitung</button>";
	echo "<br>";
	echo "<h3>Hasil</h3>";
	echo "<input type='number' placeholder='Periode (T)'>";
	echo "<input type='number' placeholder='Waktu (t)'>";
	echo "<input type='number' placeholder='Jumlah Getaran (n)'><br>";
	
	echo "<hr>";
	echo "<h3>Frekuensi Gentaran</h3>";
	echo "<input type='number' placeholder='Periode (T)'>";
	echo "<input type='number' placeholder='Waktu (t)'>";
	echo "<input type='number' placeholder='Jumlah Getaran (n)'>";
	echo "<br>";
	echo "<select><option>Periode (T)</option><option>Waktu (t)</option><option>Jumlah Getaran (n)</option></select>";
	echo "<button>Hitung</button>";
	echo "<br>";
	echo "<h3>Hasil</h3>";
	echo "<input type='number' placeholder='Periode (T)'>";
	echo "<input type='number' placeholder='Waktu (t)'>";
	echo "<input type='number' placeholder='Jumlah Getaran (n)'>";
	echo "<br>";
	
	echo "<br>";
	
	$hasil3 = null;
	$frekuensi3 = null;
	
	if (isset($_POST['frekuensi3']) && $_POST['frekuensi3'] != null) {
		$hasil3 = 1/$_POST['frekuensi3'];
		$frekuensi3 = $_POST['frekuensi3'];
	}
	echo "<hr>";
	echo "<h3>Hubungan Periode Getaran dan Frekuensi</h3>";
	echo "<form action='?$parameter' method='post'>Frekuensi (f) <input type='number' name='frekuensi3' value='$frekuensi3'> T = 1/f <button>Hitung</button> Periode (T) <input type='number' value='$hasil3' placeholder=''></form>";
	echo "<br>";
	
	$hasil4 = null;
	$periode4 = null;
	
	if (isset($_POST['periode4']) && $_POST['periode4'] != null) {
		$hasil4 = 1/$_POST['periode4'];
		$periode4 = $_POST['periode4'];
	}
	
	echo "<form action='?$parameter' method='post'>Periode (T) <input type='number' name='periode4' value='$periode4'> f = 1/t <button>Hitung</button> Frekuensi (f) <input type='number' value='$hasil4' placeholder=''></form>";
	echo "<br>";
	
	
}

function page_Kimia($materi) {
	$parameter = $_SERVER['QUERY_STRING'];
	$daboo = array(
		array(
			'namaunsur' => 'Hidrogen (H)',
			'massa' =>22,
			'atom' =>11
		),
		
		array(
			'namaunsur' => 'Carbon (C)',
			'massa' =>20,
			'atom' =>10
		),

		array(
			'namaunsur' => 'Oksigen',
			'massa' => 12,
			'atom' =>6
		)
	);
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
				echo "<table>";
				echo "<tr><td>Nama Unsur</td><td>:</td><td><input type='text' value='".$daboo[$i]['namaunsur']."' disabled></td></tr>";
				echo "<tr><td>Nomor Massa (A)</td><td>:</td><td><input type='number' value='".$daboo[$i]['massa']."' disabled></td></tr>";
				echo "<tr><td>Nomor Atom (Z)</td><td>:</td><td><input type='number' value='".$daboo[$i]['atom']."' disabled></td></tr>";
				echo "<tr><td>Jumlah Elektron (e)</td><td>:</td><td><input type='number' value='".$daboo[$i]['atom']."' disabled></td></tr>";
				echo "<tr><td>Jumlah Proton (P=e)</td><td>:</td><td><input type='number' value='".$daboo[$i]['atom']."' disabled></td></tr>";
				echo "<tr><td>Jumlah Neutron(n),n=A-Z</td><td>:</td><td><input type='number' value='".($daboo[$i]['massa']-$daboo[$i]['atom'])."' disabled></td></tr>";
				echo "</table>";
			}
		}
	}
}

function minify_html($input) {
    if(trim($input) === "") return $input;
    // Remove extra white-space(s) between HTML attribute(s)
    $input = preg_replace_callback('#<([^\/\s<>!]+)(?:\s+([^<>]*?)\s*|\s*)(\/?)>#s', function($matches) {
        return '<' . $matches[1] . preg_replace('#([^\s=]+)(\=([\'"]?)(.*?)\3)?(\s+|$)#s', ' $1$2', $matches[2]) . $matches[3] . '>';
    }, str_replace("\r", "", $input));
    // Minify inline CSS declaration(s)
    if(strpos($input, ' style=') !== false) {
        $input = preg_replace_callback('#<([^<]+?)\s+style=([\'"])(.*?)\2(?=[\/\s>])#s', function($matches) {
            return '<' . $matches[1] . ' style=' . $matches[2] . minify_css($matches[3]) . $matches[2];
        }, $input);
    }
    if(strpos($input, '</style>') !== false) {
      $input = preg_replace_callback('#<style(.*?)>(.*?)</style>#is', function($matches) {
        return '<style' . $matches[1] .'>'. minify_css($matches[2]) . '</style>';
      }, $input);
    }
    if(strpos($input, '</script>') !== false) {
      $input = preg_replace_callback('#<script(.*?)>(.*?)</script>#is', function($matches) {
        return '<script' . $matches[1] .'>'. minify_js($matches[2]) . '</script>';
      }, $input);
    }

    return preg_replace(
        array(
            // t = text
            // o = tag open
            // c = tag close
            // Keep important white-space(s) after self-closing HTML tag(s)
            '#<(img|input)(>| .*?>)#s',
            // Remove a line break and two or more white-space(s) between tag(s)
            '#(<!--.*?-->)|(>)(?:\n*|\s{2,})(<)|^\s*|\s*$#s',
            '#(<!--.*?-->)|(?<!\>)\s+(<\/.*?>)|(<[^\/]*?>)\s+(?!\<)#s', // t+c || o+t
            '#(<!--.*?-->)|(<[^\/]*?>)\s+(<[^\/]*?>)|(<\/.*?>)\s+(<\/.*?>)#s', // o+o || c+c
            '#(<!--.*?-->)|(<\/.*?>)\s+(\s)(?!\<)|(?<!\>)\s+(\s)(<[^\/]*?\/?>)|(<[^\/]*?\/?>)\s+(\s)(?!\<)#s', // c+t || t+o || o+t -- separated by long white-space(s)
            '#(<!--.*?-->)|(<[^\/]*?>)\s+(<\/.*?>)#s', // empty tag
            '#<(img|input)(>| .*?>)<\/\1>#s', // reset previous fix
            '#(&nbsp;)&nbsp;(?![<\s])#', // clean up ...
            '#(?<=\>)(&nbsp;)(?=\<)#', // --ibid
            // Remove HTML comment(s) except IE comment(s)
            '#\s*<!--(?!\[if\s).*?-->\s*|(?<!\>)\n+(?=\<[^!])#s'
        ),
        array(
            '<$1$2</$1>',
            '$1$2$3',
            '$1$2$3',
            '$1$2$3$4$5',
            '$1$2$3$4$5$6$7',
            '$1$2$3',
            '<$1$2',
            '$1 ',
            '$1',
            ""
        ),
    $input);
}

function minify_css($input) {
    if(trim($input) === "") return $input;
    return preg_replace(
        array(
            // Remove comment(s)
            '#("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\')|\/\*(?!\!)(?>.*?\*\/)|^\s*|\s*$#s',
            // Remove unused white-space(s)
            '#("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\'|\/\*(?>.*?\*\/))|\s*+;\s*+(})\s*+|\s*+([*$~^|]?+=|[{};,>~+]|\s*+-(?![0-9\.])|!important\b)\s*+|([[(:])\s++|\s++([])])|\s++(:)\s*+(?!(?>[^{}"\']++|"(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\')*+{)|^\s++|\s++\z|(\s)\s+#si',
            // Replace `0(cm|em|ex|in|mm|pc|pt|px|vh|vw|%)` with `0`
            '#(?<=[\s:])(0)(cm|em|ex|in|mm|pc|pt|px|vh|vw|%)#si',
            // Replace `:0 0 0 0` with `:0`
            '#:(0\s+0|0\s+0\s+0\s+0)(?=[;\}]|\!important)#i',
            // Replace `background-position:0` with `background-position:0 0`
            '#(background-position):0(?=[;\}])#si',
            // Replace `0.6` with `.6`, but only when preceded by `:`, `,`, `-` or a white-space
            '#(?<=[\s:,\-])0+\.(\d+)#s',
            // Minify string value
            '#(\/\*(?>.*?\*\/))|(?<!content\:)([\'"])([a-z_][a-z0-9\-_]*?)\2(?=[\s\{\}\];,])#si',
            '#(\/\*(?>.*?\*\/))|(\burl\()([\'"])([^\s]+?)\3(\))#si',
            // Minify HEX color code
            '#(?<=[\s:,\-]\#)([a-f0-6]+)\1([a-f0-6]+)\2([a-f0-6]+)\3#i',
            // Replace `(border|outline):none` with `(border|outline):0`
            '#(?<=[\{;])(border|outline):none(?=[;\}\!])#',
            // Remove empty selector(s)
            '#(\/\*(?>.*?\*\/))|(^|[\{\}])(?:[^\s\{\}]+)\{\}#s'
        ),
        array(
            '$1',
            '$1$2$3$4$5$6$7',
            '$1',
            ':0',
            '$1:0 0',
            '.$1',
            '$1$3',
            '$1$2$4$5',
            '$1$2$3',
            '$1:0',
            '$1$2'
        ),
    $input);
}

function minify_js($input) {
    if(trim($input) === "") return $input;
    return preg_replace(
        array(
            // Remove comment(s)
            '#\s*("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\')\s*|\s*\/\*(?!\!|@cc_on)(?>[\s\S]*?\*\/)\s*|\s*(?<![\:\=])\/\/.*(?=[\n\r]|$)|^\s*|\s*$#',
            // Remove white-space(s) outside the string and regex
            '#("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\'|\/\*(?>.*?\*\/)|\/(?!\/)[^\n\r]*?\/(?=[\s.,;]|[gimuy]|$))|\s*([!%&*\(\)\-=+\[\]\{\}|;:,.<>?\/])\s*#s',
            // Remove the last semicolon
            '#;+\}#',
            // Minify object attribute(s) except JSON attribute(s). From `{'foo':'bar'}` to `{foo:'bar'}`
            '#([\{,])([\'])(\d+|[a-z_][a-z0-9_]*)\2(?=\:)#i',
            // --ibid. From `foo['bar']` to `foo.bar`
            '#([a-z0-9_\)\]])\[([\'"])([a-z_][a-z0-9_]*)\2\]#i'
        ),
        array(
            '$1',
            '$1$2',
            '}',
            '$1$3',
            '$1.$3'
        ),
    $input);
}

$buttonlol = 'Created by Touyashi (c) 2019';

if (isset($_GET['page']) && $_GET['page'] != 'menu') {
	$buttonlol = '<a href="?page=menu">Home</a> <a href="?page=matematika">Matematika</a> <a href="?page=fisika">Fisika</a> <a href="?page=kimia">Kimia</a>';
}

$master = '<!DOCTYPE html>	
<html>
	<head>
		<title>Science, Technology, Engineering and Math</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class="main">
			<div class="header">'.$title.'</div>
			<div class="content">
				'.$page.'
			</div>
			<div class="button-bottom">
				'.$buttonlol.'
			</div>
		</div>
	</body>
</html>';
?>
<?=minify_html($master)?>
