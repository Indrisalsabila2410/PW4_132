<?php
    include 'db.php';
?>

<!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bukawarung</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display-swap" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>    
    </head>

<body>
    <header>
        <div class="container">
            <h1><a href="index.php">Bukawarung</a></h1>
            <ul> 
                <li><a href="produk.php">Produk</a></li>
                <li><a href="login.php">Login Penjual</a></li>
            </ul>                
        </div>
    </header>

    <!-- search-->
    <div class="search">
        <div class="container">
            <form action="produk.php" >
                <input type="text" name="search" placeholder="Cari Produk">
                <input type="submit" name="cari" value="Cari Produk">
            </form>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <h3>Kategori</h3>
            <div class="box">
                <?php
                    $kategori = mysqli_query($conn, "SELECT *FROM tb_category ORDER BY category_id DESC");
                    if(mysqli_num_rows($kategori ) > 0){
                        while($k = mysqli_fetch_array($kategori)){
                ?>
                            <a href="produk.php?ket=<?php echo$k['category_id'] ?>"> 
                                <div class="col-5">
                                    <img src="img/ikon.png" width="50px" alt="">
                                    <p><?php echo $k['category_name'] ?></p>
                                </div>
                                </a>
                        <?php }}else{ ?>
                            <p>kartegori tidak ada</p>
                            <?php }?>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <h3>Produk Terbaru</h3>
            <div class="box">
                <?php
                    $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 ORDER BY product_id DESC LIMIT 8");
                    if(mysqli_num_rows($produk ) > 0){
                        while($p = mysqli_fetch_array($produk)){
                ?>
                    <a href="detail-produk.php?id=<?php echo $p['product_id'] ?>">
                        <div class="col-4">
                            <img src="produk/<?php echo $p['product_image']?>" alt="">
                            <p class="nama"><?php echo substr($p['product_name'], 0, 20)?></p>
                            <p class="harga">Rp. <?php echo number_format($p['product_price'])?></p>
                        </div>
                    </a>
                <?php }} else{?> 
                <p>Produk tidak ada</p>
             <?php }?>
            </div>
        </div>
    </div>

<footer>
    <div class="container">
        <h4>Costumer Service</h4>
        <a href="Bukawarung@gmail.com">Bukawarung@gmail.com</a>
        <small>Copyright &copy; maile</small>
    </div>
</footer>
</body>
</html>
