<?php
$user_Id=$_SESSION['id'];
?>
	
	<div class="col-md-4">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Your Account</h4>
		    </div>
		    <div class="panel-body">
				<ul class="nav nav-checkout-progress list-unstyled">
					<li><a href="addproduct.php">Add Product</a></li>
					<li><a href="user-products.php?uid=<?php echo htmlentities($_SESSION['id']);?>">My Products</a></li>
					<!-- <li><a href="pending-orders.php">Payment Pending Order</a></li> -->
				</ul>		
			</div>
		</div>
	</div>
</div> 
</div>