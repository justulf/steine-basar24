<head>
  <link rel="stylesheet" href="css\style.css">
</head>
<body>
  <div class="container">
    <div class="card mt-6" style="width:300px">
      <div class="px-3">
        <div class="card-overlay">
          <h5 class="card-title text-center"><?php echo $row['productsName'] ?></h5>
          <p><?php echo $row['productsShortDescription'] ?></p>
          <p><?php echo $row['productsPrice'] ?></p>
          <p><?php echo $row['productsRating'] ?></p>
          <a href="" class="btn btn-primary">Details</a>
          <a href="" class="btn btn-primary">In den Warenkorb</a>
        </div>
      </div>
      <div class="card-body">
        <?php echo '<img src="data:image;base64,'.base64_encode($row['productsPicture']).'" >' ?>
        <hr>
        <h5 class="card-title text-center"><?php echo $row['productsName'] ?></h5>
      </div>
    </div>
  </div>
</body>
