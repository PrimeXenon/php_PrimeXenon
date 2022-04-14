<?php
    if (empty($_POST)) {
        header('Location: soal2a.php');
    }
?>

<form action="soal2d.php" method="POST" style="display: table; border:1px solid black; padding: 10px">
    <input type="hidden" name='nama' value='<?= $_POST['nama'] ?>'>
    <input type="hidden" name='umur' value='<?= $_POST['umur'] ?>'>

    <label for="">Hobi Anda : </label>
    <input type="text" name='hobi'>
    <br>
    <br>
    <input type="submit" value="SUBMIT">
</form>