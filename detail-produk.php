<?php
    error_reporting(0);
    include 'db.php';
    $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."' ");
    $p =mysqli_fetch_object($produk);
?>

<!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bukawarung</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display-swap" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>    
    </head>

<body>
    <header>
        <div class="container">
            <h1><a href="index.php">Bukawarung</a></h1>
            <ul> 
                <li><a href="produk.php">Produk</a></li>
            </ul>                
        </div>
    </header>

    <!-- search-->
    <div class="search">
        <div class="container">
            <form action="produk.php" >
                <input type="text" name="search" placeholder="Cari Produk">
                <input type="hidden" name="kat" value="<?php echo $_GET['kat']?>">
                <input type="submit" name="cari" value="Cari Produk">
            </form>
        </div>
    </div>

<!--produk detail--> 
<div class="section">
    <div class="container">
        <h3>Detail Produk</h3>
        <div class="box">
            <div class="col-2">
                <img src="produk/<?php echo $p->product_image ?>" width="100%" alt=""> 
            </div>
            <div class="col-2">
                <h3><?php echo $p->product_name ?></h3>
                <h4>Rp. <?php echo number_format($p->product_price) ?></h4>
                <p>Deskripsi :  <br>
                <?php echo $p->product_description ?>
                </p>
                <a href="https://api.whatsapp.com/send?phone=<?php echo $a->admin_telp ?>&text=Hai, saya terdorong dengan produk anda." target="_blank">Hubungi Via whatsapp</a>
            </div>
        </div>
    </div>
</div>

</body>
<footer>
    <div class="container">
        <h4>Costumer Service</h4>
        <a href="Bukawarung@gmail.com">Bukawarung@gmail.com</a>
        <small>Copyright &copy; maile</small>
    </div>
</footer>
</html>
