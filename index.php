<?php

// initialize variables
$pswd = "";
$code = "";
$error = "";
$valid = true;
$color = "#638146";

// if form was submit
if ($_SERVER['REQUEST_METHOD'] == "POST")
{
	// declare encrypt and decrypt funtions
	require_once('vigenere.php');
	
	// set the variables
	$pswd = $_POST['pswd']; //menangkap isi dari inputan pswd
	$code = $_POST['code']; //menangkap isi dari inputan code
	
	// inputs valid
	if ($valid)
	{
		// if encrypt button was clicked
		if (isset($_POST['encrypt'])) //pengecekan menggunakan perintah isset, jika encrypt dijalankan maka menjalankan kode line 26-28
		{
			$code = encrypt($pswd, $code); //menjalankan encrypt
			$error = "Encrypted Successfully!"; // jika line 26 berhasil dijalankan maka akan muncul "Encrypted Successfully!"
			$color = "#638146";
		}
			
		// if decrypt button was clicked
		if (isset($_POST['decrypt'])) //pengecekan menggunakan perintah isset, jika decrypt dijalankan maka menjalankan kode line 34-36
		{
			$code = decrypt($pswd, $code); //menjalankan decrypt
			$error = "Decrypted Successfully!"; // jika line 34 berhasil dijalankan maka akan muncul "Encrypted Successfully!"
			$color = "#638146";
		}
	}
}

?>

<html>
	<head>
		<title>Vigenere Cipher SKD</title> <!-- memberi judul website -->
		<link rel="stylesheet" type="text/css" href="style.css"> <!-- menghubungkan index.php dengan style.css untuk mengubah desain -->
		<script type="text/javascript" src="Script.js"></script>
	</head>
	<body>
        <h1><hr><b>Vigenere Cipher</b> <h3>Enkripsi dan Dekripsi</h3><hr></h1> <!-- memberi judul dihalaman index -->
        <h2>Silahkan Masukkan Key dan Text</h2>
        <div class="kotak_vigenere">
            <br>
		<form action="index.php" method="post"> <!-- form dekripsi enkripsi -->
                <tr>
                <label>Text</label> <!-- memberi label pada kolom input -->
                <br>
                <textarea type="text" name="code" placeholder="Masukkan Kata" class="form_vigenere"><?php echo htmlspecialchars($code); ?></textarea></td>
				</tr>

                <tr>
                <label>Key</label>
                <br>
                <input type="text" name="pswd" id="pass" placeholder="Masukkan Key" class="form_vigenere" value="<?php echo htmlspecialchars($pswd); ?>" /></td>
				</tr>
				
				<tr>
					<td><input type="submit" name="encrypt" class="button" value="Encode" onclick="validate(1)" /></td> <!-- memberi button untuk submit -->
				</tr>
                <br>
                <br>
				<tr>
					<td><input type="submit" name="decrypt" class="button" value="Decode" onclick="validate(2)" /></td>
				</tr>
				
					<td><center><div style="color: <?php echo htmlspecialchars($color) ?>"><?php echo htmlspecialchars($error) ?></div></center></td>
				</tr>
			</table>
		</form>
	</body>
</html>