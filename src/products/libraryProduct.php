<link rel="stylesheet" href="../../assets/css/library.css">
<?php
require_once ('./../../config.php');
require_once(ROOT_PATH .'\src\products\crudProd.php');

// // Redirect to home page if user is not logged in
// if (!isset($_SESSION['user'])) {
//     // echo '<meta http-equiv="refresh" content="0;url=\project\BSIT2102-EcoSustainable-Product-Marketplace\src\products\libraryProducts2.php?page=1">';
//     exit; // Stop further script execution
// }

    $setOffset = 0;
    $searchDump = new Products();
    if (isset($_GET['search']) && isset($_GET['page'])){
        $searchVar = htmlspecialchars($_GET['search']);
        $setoffset = htmlspecialchars($_GET['page']);

        ?>
        <div class='container-l'>
        <h1>Showing related Results for '<?= $searchVar;?>'</h1>
        <div class="product-grid">
        <?php
    } else if (isset($_GET['page'])){
        $setOffset = htmlspecialchars($_GET['page']) * 9;
        $searchVar = '';
        ?>
        <div class='container-l'>
        <h1>All Products</h1><br>
        <div class="product-grid">
        <?php
    } else {
        // $setOffset = htmlspecialchars($_GET['page']) * 9;
        $searchVar = '';
        ?>
        <div class='container-l'>
        <h1>All Products</h1><br>
        <div class="product-grid">
        <?php
    }

    $resultTemp = $searchDump->searchProducts($searchVar, 'ProductName',);

    for ($i = 0; $i < count($resultTemp) && $i < 10; $i++) { 
        $row = $resultTemp[$i];
    ?>
        <a href="productDetails.php?product=<?= $row['productCode'];?>&auth=1">
            <div class="product-card">
                <img src="<?= $row['imageDir'];?>" alt="<?= $row['ProductName'];?>" class="product-image">
                <div class="product-details">
                    <h2 class="product-title"><?= $row['ProductName'];?></h2>
                    <p><?= $row['description'];?></p>
                    <p class="product-price"><?= $row['price'];?></p>
                </div>
            </div>
        </a>
    <?php
    }

?>