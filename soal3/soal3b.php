<?php
    $conn = mysqli_connect("localhost", "root", "", "testdb"); //"host", "username", "password", "database"
    if ($conn->connect_error) {
        die("connection failed:". $conn->connect_error);
    }

    function view($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        
        if ($result) {
            while( $row = mysqli_fetch_assoc($result) ){
                $rows[] = $row;
            }
        }
        return $rows;
    }

    function where($post){
        list('nama'=>$nama, 'alamat'=>$alamat, 'hobi'=>$hobi) = $post;
        $find = [];
        if (!empty($nama)) {
            $find[] = "p.nama LIKE '%$nama%'";
        }
        if (!empty($alamat)) {
            $find[] = "p.alamat LIKE '%$alamat%'";
        }
        if (!empty($hobi)) {
            $find[] = "h.hobi LIKE '%$hobi%'";
        }

        return 'WHERE ' . join(" OR ", $find);
    }
    

    if (!empty($_POST) && ($_POST['nama'] !== '' || $_POST['alamat'] !== '' || $_POST['hobi'] !== '')) {
        $find =  where($_POST);   
    }
    else {
        $find = '';
    }
    
    $query= 
    "SELECT 
        p.nama, p.alamat, h.hobi 
    FROM hobi h JOIN person p ON p.id = h.person_id $find";
   

    $person_hobies = view($query);
?>

<table border=1>
    <tr>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Hobi</th>
    </tr>
        <?php foreach ($person_hobies as $ph) : ?>
    <tr>
            <td><?= $ph['nama'] ?></td>
            <td><?= $ph['alamat'] ?></td>
            <td><?= $ph['hobi'] ?></td>
    </tr>
        <?php endforeach; ?>
</table>
<br>
