<?php
    if (empty($_POST)) {
        header('Location: soal2a.php');
    }
?>

<form action="soal2c.php" method="POST" style="display: table; border:1px solid black; padding: 10px">
    <input type="hidden" name='nama' value='<?= $_POST['nama'] ?>'>

    <label for="">Umur Anda : </label>
    <input type="number" name='umur'>
    <br>
    <br>
    <input type="submit" value="SUBMIT">
</form>
