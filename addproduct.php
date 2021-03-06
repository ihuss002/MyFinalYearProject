<?php
	session_start();
	error_reporting(0);
    include('includes/config.php');
    if (strlen($_SESSION['login']) == 0) {
        header('location:login.php');
    } else {
        if (isset($_POST['submit'])) {
            
            $productname = $_POST['productName'];
            $productcompany = $_POST['productCompany'];
            $productprice = $_POST['productprice'];
            $productdescription = $_POST['productDescription'];
            $productimage1 = $_FILES["productimage1"]["name"];
            $productimage2 = $_FILES["productimage2"]["name"];
            $productimage3 = $_FILES["productimage3"]["name"];  
            $category = $_POST['category'];
            $subcat = $_POST['subcategory'];
            $productavailability = $_POST['productAvailability'];
            $user_Id=$_SESSION['id'];
            $query = mysqli_query($con, "select max(id) as pid from products");
            $result = mysqli_fetch_array($query);
            $productid = $result['pid'] + 1;
            $dir = "productimages/$productid";
            if (!is_dir($dir)) {
                mkdir("productimages/" . $productid);
            }
        move_uploaded_file($_FILES["productimage1"]["tmp_name"], "productimages/$productid/" . $_FILES["productimage1"]["name"]);
        move_uploaded_file($_FILES["productimage2"]["tmp_name"], "productimages/$productid/" . $_FILES["productimage2"]["name"]);
        move_uploaded_file($_FILES["productimage3"]["tmp_name"], "productimages/$productid/" . $_FILES["productimage3"]["name"]);
        $sql = mysqli_query($con, "insert into products(productName,productCompany,productPrice,productDescription,productImage1,productImage2,productImage3,category,subCategory,userId,productAvailability) values('$productname','$productcompany','$productprice','$productdescription','$productimage1','$productimage2','$productimage3','$category','$subcat',$user_Id,'$productavailability')");
        $_SESSION['msg'] = "Product Inserted Successfully !!";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Student Buy and Sell</title>
    <?php include('includes/header-files-css.php');?>
    <script>
    function getSubcat(val) {
        $.ajax({
            type: "POST",
            url: "get_subcat.php",
            data: 'cat_id=' + val,
            success: function(data) {
                $("#subcategory").html(data);
            }
        });
    }

    function selectCountry(val) {
        $("#search-box").val(val);
        $("#suggesstion-box").hide();
    }
    </script>
</head>

<body class="cnt-home">
    <header class="header-style-1">
        <?php include('includes/top-header.php');?>
        <?php include('includes/main-header.php');?>
        <?php include('includes/menu-bar.php');?>
    </header>
    <section>
        <div class="body-content outer-top-xs" id="top-banner-and-menu">
            <div class="container">
                <div class="furniture-container homepage-container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-3 sidebar">
                            <?php include('includes/side-menu.php');?>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                            <div id="hero" class="homepage-slider3">
                                <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                                    <div class="full-width-slider">
                                        <div class="item"
                                            style="background-image: url(assets/images/sliders/3.jpg);">
                                        </div>
                                    </div>
                                    <div class="full-width-slider">
                                        <div class="item full-width-slider"
                                            style="background-image: url(assets/images/sliders/6.jpg);">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- === SCROLL TABS == -->
                    <div id="product-tabs-slider" class="scroll-tabs inner-bottom-vs  wow fadeInUp">
                        <div class="more-info-tab clearfix">
                            <h3 class="new-product-title pull-left">Add New Product</h3>
                            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                                <li class="active"><a href="#all" data-toggle="tab">All</a></li>
                                
                            </ul><!-- /.nav-tabs -->
                        </div>
                        <div class="tab-content outer-top-xs">

                        <?php if (isset($_POST['submit'])) {?>
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">??</button>
                                    <?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?>
                                </div>
                                <?php }?>


                                <?php if (isset($_GET['del'])) {?>
                                <div class="alert alert-error">
                                    <button type="button" class="close" data-dismiss="alert">??</button>
                                    <strong>Oh snap!</strong>
                                    <?php echo htmlentities($_SESSION['delmsg']); ?><?php echo htmlentities($_SESSION['delmsg'] = ""); ?>
                                </div>
                                <?php }?>

                                <br />

                            <form class="form-horizontal row-fluid" name="insertproduct" method="post"
                                enctype="multipart/form-data">

                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Category</label>
                                    <div class="controls">
                                        <select name="category" class="form-control" onChange="getSubcat(this.value);"
                                            required>
                                            <option value="">Select Category</option>
                                            <?php $query=mysqli_query($con,"SELECT DISTINCT(subcategory.categoryid), category.categoryName FROM subcategory inner join category on subcategory.categoryid=category.id");
                                            while($row=mysqli_fetch_array($query))
                                            {?>
                                            <option value="<?php echo $row['categoryid'];?>"><?php echo $row['categoryName'];?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Sub Category</label>
                                    <div class="controls">
                                        <select name="subcategory" id="subcategory" class="form-control" required>
                                        </select>
                                    </div>
                                </div>


                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Product Name</label>
                                    <div class="controls">
                                        <input type="text" name="productName" placeholder="Enter Product Name"
                                            class="form-control" required>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Product Company</label>
                                    <div class="controls">
                                        <input type="text" name="productCompany"
                                            placeholder="Enter Product Company Name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Product Price After Discount(Selling
                                        Price)</label>
                                    <div class="controls">
                                        <input type="text" name="productprice" placeholder="Enter Product Price"
                                            class="form-control" required>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Product Description</label>
                                    <div class="controls">
                                        <textarea name="productDescription" placeholder="Enter Product Description"
                                            rows="6" class="form-control">
</textarea>
                                    </div>
                                </div>


                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Product Availability</label>
                                    <div class="controls">
                                        <select name="productAvailability" id="productAvailability" class="form-control"
                                            required>
                                            <option value="">Select</option>
                                            <option value="In Stock">In Stock</option>
                                            <option value="Out of Stock">Out of Stock</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Product Image1</label>
                                    <div class="controls">
                                        <input type="file" name="productimage1" id="productimage1" value=""
                                            class="form-control" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Product Image2</label>
                                    <div class="controls">
                                        <input type="file" name="productimage2" class="form-control" required>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Product Image3</label>
                                    <div class="controls">
                                        <input type="file" name="productimage3" class="form-control">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <div class="controls">
                                        <button type="submit" name="submit" class="btn btn-outline-primary">Insert</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>


                </div>
    </section>
    <?php include('includes/brands-slider.php');?>
    </div>
    </div>
    <?php include('includes/footer.php');?>
    <?php include('includes/footer-files-script.php');?>
</body>

</html>