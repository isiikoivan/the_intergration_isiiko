  <?php
  // header('Access-Control-Allow-Origin: *');
  include ('../headers/header.php');

  $name=$_POST['name'];
  $brand=$_POST['brand'];
  $image=$_FILES['image'];
  //$file_path_name='image';
  $quantity=$_POST['quantity'];
  $specification=$_POST['specification'];
  $price=$_POST['price'];
  $description=$_POST['description'];
  

  $d=['products','pdt_name','pdt_brand','pdt_image','pdt_quantity','pdt_specification','pdt_price','pdt_description',
  $name,$brand,$image,$quantity,$specification,$price,$description];
  $access->universal_insert($pdo,$d,'submit');
//$access->universal_insert($pdo,$d,'submit',$file_path_name);
  //$image_naming for use in getting filepath

  ?>
      <div class="  container-fluid mt-2">
       <div class="row justify-content-center">Product details</div>
      <!-- form row -->
      <div class="row justify-content-center">

        <div class="col-6  ">


              <form action="" method="POST" enctype="multipart/form-data">

                      <div class="form-group mb-3 ">
                        <label for="name" class="text_secondary">Product Name</label>
                        <input type="text" name="name" autocomplete="on" class="form-control" placeholder="Enter product name" required>

                      </div>
                      <div class="form-group mb-3 ">
                        <label for="brand" class="text_secondary">Product Brand</label>
                        <input type="text" name="brand" autocomplete="on" class="form-control" placeholder="Enter Your product brand">

                      </div>
                      <div class="form-group mb-3 ">
                        <label for="quantity" class="text_secondary">Product Quantity</label>
                        <input type="text" name="quantity" autocomplete="on" class="form-control" placeholder="Enter product quantity" required>

                      </div>

                      <div class="form-group mb-3 ">
                        <label for="image" class="text_secondary">Product Image</label>
                        <input type="file" name="image"  class="form-control"  required>

                      </div>

                      <div class="form-group mb-3 ">
                        <label for="price" class="text_secondary">Product Price</label>
                        <input type="text" name="price" autocomplete="on" class="form-control" placeholder="Set product price">

                      </div>

                      <div class="row">
                      <div class="form-group col-6">
                      <div>
                        <label for="description" class="text_secondary">Product Description</label>
                      </div>
                        <!-- <input type="textarea" name="txtarea" autocomplete="on" class="form-control" placeholder="Enter Your Email"> -->
                        <textarea name="description" cols="40" rows="10"></textarea>
                      </div>

                    <div class="form-group col-6">
                      <div>
                        <label for="specification" class="text_secondary">Product Specifications</label>
                        </div>
                        <!-- <input type="textarea" name="txtarea" autocomplete="on" class="form-control" placeholder="Enter Your Email"> -->
                        <textarea name="specification"  cols="40" rows="10"></textarea>
                      </div>
                    </div>

                                      <!-- button row -->
                    <div class="py-1">
                    <!-- <div class="col"> -->
                    <div class="row">
                      <div class=" btn-group col-6">
                        <button type="submit" class="btn btn-success" name="submit">Add Product</button>

                      </div>
                      <div class=" btn-group col-6">
                        <button type="cancel" class="btn btn-danger" name="cancel">Cancel</button>

                      </div>
                    </div>
                      <!-- </div> -->
                   </div>


                </form>

              <!-- form end -->
  </div>

 </div>
</div>
  <?php
  include('../footers/footer.php');
  ?>
