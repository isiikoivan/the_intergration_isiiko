  <?php
  // header('Access-Control-Allow-Origin: *');
   include ('../headers/header.php');
  $c=[$pdo,'products'];
  $access->retriving($c);
  ?>
      <div class="  container-fluid mt-4">
      <!-- form row -->
      <div class="row justify-content-center">
        <!-- test/display row -->
  <div class="col-8 mt-8">
                      <div class="card ">
                          <div class=" card-header">
                             <h2>Products</h2>
                          </div>
                          <div class="card-body">
                              <table class="table tabordered">
                                <tr>
                                   <th>Item</th>
                                   <th>specification</th>
                                   <th>description</th>
                                   <th>Operations</th>
                                </tr>
                                <?php foreach($GLOBALS['dat'] as $dat):?>
                                <tr>
                                    <td>
                                      <div class="card">
                                        <div class="card-header"> <?=$dat->pdt_name;?></div>
                                        <div class="card-body">
                                          <center>
                                            <img src="<?= '../files/'.$dat->pdt_image?>" width="100" height="100"/>
                                          </center>

                                        </div>
                                        <div class="card-footer"> <?=$dat->pdt_brand;?> <?=$dat->pdt_price;?>  </div>

                                      </div>

                                    </td>
                                    <td><?=$dat->pdt_description;?></td>
                                    <td><?=$dat->pdt_specification;?></td>


                                    <td>

                                        <a href="update_pdt.php?id=<?=$dat->id?>" class="btn btn-primary"> Edit</a>
                                        <a href="../crud-api/deleting.php?id=<?=$dat->id?>" class="btn btn-danger" name="delete"> Delete</a>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                              </table>
                              <div>
                        </div>

                       </div>
                    </div>
          </div>
        <!-- end test/displa row -->
 </div>
</div>
  <?php
  //add product btn
  include('../footers/footer.php');
  ?>
