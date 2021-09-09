<?php
// header('Access-Control-Allow-Origin: *');
 require ('../crud-api/update.php');
  $name=$_POST['name'];
  $brand=$_POST['brand'];
  $image=$_FILES['pimage'];
  //$file_path_name='image';
  $quantity=$_POST['quantity'];
  $specification=$_POST['specification'];
  $price=$_POST['price'];
  $description=$_POST['description'];

  $d=['products','pdt_name','pdt_brand','pdt_image','pdt_quantity','pdt_specification','pdt_price','pdt_description',
  $name,$brand,$image,$quantity,$specification,$price,$description];

$access->updating($pdo,$d,$id,'update','../product_managment/view_pdt.php')
?>


<div>
  <div class="  container-fluid mt-2">
   <div class="row justify-content-center">Product details</div>
  <!-- form row -->
  <div class="row justify-content-center">

    <div class="col-6  ">


          <form action="" method="POST" enctype="multipart/form-data">

                  <div class="form-group mb-3 ">
                    <label for="name" class="text_secondary">Product Name</label>
                    <input type="text"  value="<?= $dataling->pdt_name;?>" name="name" autocomplete="on" class="form-control" placeholder="Product name">

                  </div>
                  <div class="form-group mb-3 ">
                    <label for="brand" class="text_secondary">Product Brand</label>
                    <input type="text"  value="<?= $dataling->pdt_brand;?>"  name="brand" autocomplete="on" class="form-control" placeholder="Enter Your product brand">

                  </div>
                  <div class="form-group mb-3 ">
                    <label for="quantity" class="text_secondary">Product Quantity</label>
                    <input type="text" value="<?= $dataling->pdt_quantity;?>"  name="quantity" autocomplete="on" class="form-control" placeholder="Enter product quantity" required>

                  </div>
                  <div class="row">
                    <div class="form-group mb-3 col-6">
                      <label for="quantity" class="text_secondary">Product Current Image</label>
                      <label for="quantity" class="text_secondary"><?= $dataling->pdt_image;?></label>

                    </div>

                    <div class="form-group mb-3 col-6">
                      <label for="pimage" class="text_secondary">Product Image</label>
                      <input type="file" value="<?= $dataling->pdt_image;?>"  name="pimage"  class="form-control">

                    </div>
                  </div>



                  <div class="form-group mb-3 ">
                    <label for="price" class="text_secondary">Product Price</label>
                    <input type="text" value="<?= $dataling->pdt_price;?>"  name="price" autocomplete="on" class="form-control" placeholder="Set product price">

                  </div>

                  <div class="row">
                  <div class="form-group col-6">
                  <div>
                    <label for="article" class="text_secondary">Product Description</label>
                  </div>
                    <!-- <input type="textarea" name="txtarea" autocomplete="on" class="form-control" placeholder="Enter Your Email"> -->
                    <textarea name="description" cols="40" rows="8"><?= $dataling->pdt_description;?> </textarea>
                  </div>

                <div class="form-group col-6">
                  <div>
                    <label for="specification" class="text_secondary">Product Specifications</label>
                    </div>
                    <!-- <input type="textarea" name="txtarea" autocomplete="on" class="form-control" placeholder="Enter Your Email"> -->
                    <textarea name="specification"  cols="40" rows="8"><?= $dataling->pdt_specification;?> </textarea>
                  </div>
                </div>

                                  <!-- button row -->
                <div class="py-1">
                <!-- <div class="col"> -->
                <div class="row">
                  <div class=" btn-group col-6">
                    <button type="submit" class="btn btn-success" name="update">Update</button>

                  </div>
                  <div class=" btn-group col-6">
                    <button type="" class="btn btn-danger" name="cancel">Cancel</button>

                  </div>
                </div>
                  <!-- </div> -->
               </div>


            </form>

          <!-- form end -->
</div>

</div>
</div>
</div>
<?php
include('../footers/footer.php');
?>
