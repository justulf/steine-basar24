<?php
  include_once "header.php";
  require_once 'inc/functions.inc.php';
  require_once 'inc/dbh.inc.php';
  createUsersList($conn);
  createProductsList($conn);

  $query ="SELECT productsId, productsName, productsPicture, productsShortDescription, productsAmount, productsRating, productsPrice
         FROM products";
  $result = mysqli_query($conn,$query);
?>

<head>
  <title>Steine-Basar24.de</title>

</head>
<body>
  <div class="container" id="products">
    <div class="row">
      <?php while($row = mysqli_fetch_array($result)):?>
        <div class="col">
          <?php include 'card.php'?>
        </div>
      <?php endwhile;?>
    </div>

  </div>

</body>
