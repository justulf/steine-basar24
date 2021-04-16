<div class="card">
  <div class="card-body">
    <?php echo '<img src="data:image;base64,'.base64_encode($row['productsPicture']).'" class="card-img-top">' ?> 
    <hr>
    <?php echo $row['productsName'] ?>
    <a href="" class="btn btn-primary">Details</a>
    <a href="" class="btn btn-primary">In den Warenkorb</a>
  </div>
</div>
