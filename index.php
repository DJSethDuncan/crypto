<?php include ('ciphers.php'); ?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>-</title>

<style>

body {
	font-family:courier new, arial;
	font-size:14px;
}

h2 {
	font-size:16px;
	font-weight:800;
	border-bottom:1px solid #666;
	max-width:470px;
}

textarea {
	font-size:12px;
	font-family:courier new, arial;
}

.center {
	width:100%;
	max-width:470px;
	margin:0 auto;
}

</style>

</head>

<body>

	<div class="center">
		<?php
			if ($_POST['clear']=="Clear") { echo "<script>location.reload();</script>"; }
            if ($_POST['submit']!="") { 
                $original = htmlspecialchars($_POST['original']);
                $original = stripslashes($original);
                
                if ($_POST['method']=="0invert") { $encrypted = cipher_full_invert($original); }
                if ($_POST['method']=="caesar") { $encrypted = cipher_caesar($original); }
                if ($_POST['method']=="reverse_caesar") { $encrypted = reverse_caesar($original); }
                if ($_POST['method']=="scramble") { $encrypted = cipher_d_scramble($original); }
                if ($_POST['method']=="binary") { $encrypted = convert_binary($original); }
                if ($_POST['method']=="phonetic") { $encrypted = convert_phonetic($original); }
            }
			
        ?>
        
        <form action="" method="post"/>
            <h2>Text</h2>
            <textarea cols="64" rows="8" id="textarea" name="original"><?php echo $encrypted; ?></textarea><br />
            
            <h2>Cipher</h2>
            <input type="radio" name="method" value="0invert" /> Inversion <br />
            <input type="radio" name="method" value="caesar" /> Caesar <br />
            <input type="radio" name="method" value="reverse_caesar" /> Reverse Caesar <br />
            <input type="radio" name="method" value="scramble" /> D Scramble <br />
            
            <h2>Convert</h2>
            <input type="radio" name="method" value="binary" /> Binary<br />
            <input type="radio" name="method" value="phonetic" /> Phonetic <br />
            
            <br />
            <input type="submit" name="submit" value="Encrypt" />
            <button onClick="document.getElementById('textarea').value='';" />Clear</button>
        </form>
    </div> <!-- center -->

</body>
</html>
