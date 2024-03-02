<?php
	include('header.php');
?>

<section class="pt-3 pb-3">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-12">
        <div class="border p-3 mb-5">
          <div class="table-box">
            <table id="shoppingCart" class="table table-bordered table-sm table-condensed table-responsive">
             
              <thead>

                <tr>
                  
                  <th style="width:20%">Product Title</th> 
                  <th style="width:20%">Product Image</th>
                  <th style="width:20%">Quantity</th>
                  <th style="width:20%">Total Price</th>
                  <th style="width:20%">Remove</th>
                  <th style="width:20%">Operations</th>
                  
                </tr>
               
              </thead>
              <tbody>
             
                <tr>
                  <td data-th="Product Title" class="border">
                    <h5>Product Name</h5>
                  </td>
                  <td data-th="Product Image" class="border">
                    <img src="./img/shirt-1.jpg" alt="" class="img-fluid d-none d-md-block rounded mb-2 shadow">
                  </td>
                  <td data-th="Quantity" class="border">
                    <div class="col-auto">
                      <input type="number" class="form-control form-control-xs text-center" value="1">
                    </div>
                  </td>
                  <td data-th="Total Price" class="border">$49.00</td>
                  <td class="border">
  <div class="d-flex justify-content-center ">
    <input type="checkbox" class="form-check-input" style="transform: scale(1.5);">
  </div>
</td>



<td class="actions border" data-th="Operations">
  <div class="d-flex flex-column align-items-center">
    <div style="background-color: inherit;">
      <button class="btn btn-danger btn-sm mb-2" style="font-size: 0.8rem;">Update</button>
    </div>
    <div style="background-color: inherit;">
      <button class="btn btn-danger btn-sm mb-2" style="font-size: 0.8rem;">Remove</button>
    </div>
  </div>
</td>


                </tr>
               
              </tbody>
            </table>
          </div>
		<div class="price">
		<h5>Subtotal:</h5>
            <h3 class="subtotal">$99.00</h3>
		</div>
       
            
          


          <div class="text-right mt-3">
            <a href="#" class="btn btn-primary btn-md pl-4 pr-4 mr-3" style="background-color: #be4d25;">Checkout</a>
            &nbsp; 
            <a href="#" class="btn btn-primary btn-md pl-4 pr-4" style="background-color: #be4d25;">Continue Shopping</a>
          </div>
        
        </div>
       
      </div>
    </div>
  </div>
</section>






<?php
include('footer.php');
?>

