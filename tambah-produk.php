<?php
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, inital-scale=1"> 
    <title>Bukawarung</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    
<header>
    <div class="container">
        <h1><a href="dashboard.php">Bukawarung</a></h1>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="profil.php">Profil</a></li>
            <li><a href="data-kategori.php">Data Kategori</a></li>
            <li><a href="data-produk.php">Data Produk</a></li>
            <li><a href="keluar.php">Keluar</a></li>
    </ul>
</div>
</header>
<div class="section">
    <div class="container">
        <h3>Tambah Data Produk</h3>
        <div class="box">
            <form action="" method="POST" enctype="multipart/form-data">
                <select class="input-control" name="kategori" required> 
                    <option value->--Pilih--</option>
                    <?php
                    $kategori= mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC"); 
                    while($r = mysqli_fetch_array($kategori)){
                    ?>
                    <option value="<?php echo $r['category_id']?>"><?php echo $r["category_name"] ?></option> 
                    <?php } ?>
                </select>

                    <input type="text" name="nama" class="input-control" placeholder="Nama Produk" required>
                    <input type="text" name="harga" class="input-control" placeholder="Harga" required> 
                    <input type="file" name="gambar" class="input-control"  required> 
                    <textarea name="deskripsi" class="input-control" placeholder="Deskripsi " id="" cols="30" rows="10"></textarea>
                    <select class="input-control" name="status">
                        <option value="">--pilih-- </option>
                        <option value="1">Aktif</option>
                        <option value="9">Tidak Aktif</option>
                    </select>
                    <input type="submit" name="submit" value="Submit" class="btn">
            </form>
            <?php
                    if(isset($_POST['submit'])){
                        $kategori   = $_POST['kategori']; 
                        $nama       = $_POST['nama'];
                        $harga      = $_POST['harga']; 
                        $deskripsi  = $_POST['deskripsi']; 
                        $status     = $_POST['status'];
                        
                        $filename = $_FILES['gambar']['name']; 
                        $tmp_name = $_FILES['gambar']['tmp_name'];
                        
                        $type1 = explode('.', $filename);
                        $type2 = $type1[1];

                        $newname = 'produk'.time().'.'.$type2;
                        
                        $tipe_diizinkan = array('jpeg', 'jpg', 'png', 'gif'); 
                        
                        
                        if(!in_array($type2, $tipe_diizinkan)){
                        
                        echo 'Format file tidak diizinkan';
                        } else{

                            move_uploaded_file($tmp_name, './produk/'.$filename);

                            $insert = mysqli_query($conn, "INSERT INTO tb_product VALUES (
                                null,
                                '".$kategori."',
                                '".$nama."',
                                '".$harga."',
                                '".$deskripsi."',
                                '".$newname."',
                                '".$status."',
                                null
                                )");

                            if($insert){
                                echo '<script>alert("Tambah data berhasil")</script>';
                                echo '<script>window.location="data-produk.php"</script>';
                            } else{
                                echo 'Gagal'.mysqli_error($conn); 
                            }
                        }
                         
                    }

                    ?>
        </div>
        
    </div>
</div>
<footer>
    <div class="container">
        <small>Copyright &copy; 2023 - Bukawarung.</small>
    </div>
</footer>
</body>
</html>


