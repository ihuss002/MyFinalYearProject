<?php
session_start();
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
    header('location:login.php');
} else {
    $pid = intval($_GET['id']); // product id
    if (isset($_POST['submit'])) {
        $productname = $_POST['productName'];
        $productimage3 = $_FILES["productimage3"]["name"];

        move_uploaded_file($_FILES["productimage3"]["tmp_name"], "productimages/$pid/" . $_FILES["productimage3"]["name"]);
        $sql = mysqli_query($con, "update  products set productimage3='$productimage3' where id='$pid' ");
        $_SESSION['msg'] = "Product Image Updated Successfully !!";
		

    }
    
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Update Product Image</title>
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

<body>
    <header class="header-style-1">
        <?php include('includes/top-header.php');?>
        <?php include('includes/main-header.php');?>
        <?php include('includes/menu-bar.php');?>
    </header>

    <div class="wrapper">
        <div class="container">
            <div class="row">

                <div class="span9">
                    <div class="content">

                        <div class="module">
                            <div class="module-head">
                                <h3>Update Product Image 3</h3>
                            </div>
                            <div class="module-body">

                                <?php if (isset($_POST['submit'])) {?>
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>Well done!</strong>
                                    <?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?>
                                </div>
                                <?php }?>



                                <br />

                                <form class="form-horizontal row-fluid" name="insertproduct" method="post"
                                    enctype="multipart/form-data">

                                    <?php

    $query = mysqli_query($con, "select productName,productimage3 from products where id='$pid'");
    $cnt = 1;
    while ($row = mysqli_fetch_array($query)) {

        ?>


                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Product Name</label>
                                        <div class="controls">
                                            <input type="text" name="productName" readonly
                                                value="<?php echo htmlentities($row['productName']); ?>"
                                                class="span8 tip" required>
                                        </div>
                                    </div>


                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Current Product Image1</label>
                                        <div class="controls">
                                            <img src="productimages/<?php echo htmlentities($pid); ?>/<?php echo htmlentities($row['productimage3']); ?>"
                                                width="200" height="100">
                                        </div>
                                    </div>



                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">New Product Image1</label>
                                        <div class="controls">
                                            <input type="file" name="productimage3" id="productimage3" value=""
                                                class="span8 tip" required>
                                        </div>
                                    </div>


                                    <?php }?>

                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" name="submit" class="btn">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <!--/.content-->
                </div>
                <!--/.span9-->
            </div>
        </div>
        <!--/.container-->
    </div>
    <!--/.wrapper-->

    <?php include 'includes/footer.php';?>

    <?php include('includes/footer-files-script.php');?>
</body>
<?php }?>