<?php
    error_reporting(0);
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

    
    <!-- new product-->
    <div class="section">
        <div class="container">
            <h3>Produk</h3>
            <div class="box">
                <?php
                    if($_GET['search'] != '' ||$_GET['kat'] != ''){
                        $where = "AND product_name LIKE '%".$_GET['search']."%' AND category_id LIKE '&".$_GET['kat']."' ";
                    }
                    $produk = mysqli_query($conn, "SELECT *FROM tb_product WHERE product_status = 1 $where ORDER BY product_id DESC ");
                    if(mysqli_num_rows($produk )> 0){
                        while($p = mysqli_fetch_array($produk)){
                ?>
                    <a href="detail-produk.php?id=<?php echo $p['product_id'] ?>">
                        <div class="col-4">
                            <img src="product/<?php echo $p['product_image']?>" alt="">
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
</body>
<footer>
    <div class="container">
        <h4>Costumer Service</h4>
        <a href="Bukawarung@gmail.com">Bukawarung@gmail.com</a>
        <small>Copyright &copy; maile</small>
    </div>
</footer>
</html>
