<?php
    if (empty($_POST)) {
        header('Location: soal2a.php');
    }
?>

<p>Nama: <?=$_POST['nama'] ?></p>
<p>Umur: <?=$_POST['umur'] ?></p>
<p>Hobi: <?=$_POST['hobi'] ?></p>