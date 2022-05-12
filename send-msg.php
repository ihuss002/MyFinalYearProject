<?php
session_start();
error_reporting(0);
include 'includes/config.php';
$puserid = intval($_GET['puserid']);
$userid = $_SESSION['id'];

if (strlen($_SESSION['login']) == 0) {
        header('location:login.php');
    }    

if (isset($_POST['submit'])) {
    $message = $_POST['msg'];
    $query = mysqli_query($con, "INSERT INTO `chats`( `user_id_sender`, `user_id_receiver`, `user_msg`) VALUES ('$userid','$puserid','$message')");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Messages</title>
    <?php include 'includes/header-files-css.php';?>
    <link rel="stylesheet" href="assets/css/chat.css">
</head>

<body class="cnt-home">

    <header class="header-style-1">
        <?php include 'includes/top-header.php';?>
        <?php include 'includes/main-header.php';?>
        <?php include 'includes/menu-bar.php';?>
    </header>
    </div>
    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row outer-bottom-sm'>
                <div class='col-md-3 sidebar'>
                    <div class="sidebar-module-container">
                        <h3 class="section-title">Chats</h3>
                        <div class="sidebar-filter">
                            <!--  SIDEBAR CATEGORY -->
                            <div class="sidebar-widget wow fadeInUp outer-bottom-xs ">
                                <div class="widget-header m-t-20">
                                    <h4 class="widget-title">Users</h4>
                                </div>
                                <div class="sidebar-widget-body m-t-10">
                                    <?php $sql = mysqli_query($con, "select  DISTINCT(`user_id_sender`), (`user_id_receiver`) from chats where user_id_sender='$userid' or user_id_receiver='$userid'");
while ($row = mysqli_fetch_array($sql)) {
    ?>
                                    <div class="accordion">
                                        <div class="accordion-group">
                                            <div class="accordion-heading">

                                                <?php if($row['user_id_sender']!=$userid) { ?>
                                                <a href="send-msg.php?puserid=<?php echo $row['user_id_sender']; ?>"
                                                    class="accordion-toggle collapsed">
                                                    <?php 
                                                                $idforname=$row['user_id_sender'];
                                                                $query1 = mysqli_query($con, "select user_name from users where Id='$idforname'");
                                                                $row1 = mysqli_fetch_array($query1);
                                                                echo $row1['user_name'];
                                                                
                                                                ?>
                                                </a>

                                                <?php } else if($row['user_id_receiver']!=$userid) { ?>
                                                <a href="send-msg.php?puserid=<?php echo $row['user_id_receiver']; ?>"
                                                    class="accordion-toggle collapsed">
                                                    <?php 
                                                                $idforname=$row['user_id_receiver'];
                                                                $query2 = mysqli_query($con, "select user_name from users where Id='$idforname'");
                                                                $row2 = mysqli_fetch_array($query2);
                                                                echo $row2['user_name'];
                                                                
                                                                ?>
                                                </a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>

                                    <?php }?>
                                </div><!-- /.sidebar-widget-body -->
                            </div><!-- /.sidebar-widget -->
                        </div><!-- /.sidebar-filter -->
                    </div><!-- /.sidebar-module-container -->
                </div><!-- /.sidebar -->
                <div class='col-md-9'>

                    <div id="category" class="category-carousel hidden-xs">
                        <div class="item">

                            <h2>Chat Messages</h2>
                            <h4>
                                <?php $query3 = mysqli_query($con, "select user_name from users where Id='$puserid'");
                                                                $row3 = mysqli_fetch_array($query3);
                                                                echo "Chatting with:  ".$row3['user_name']; ?></h4>

                            <div id="chatbody" class="chat-body">
                                <?php $sql = mysqli_query($con, "SELECT * FROM `chats` WHERE  `user_id_sender`='$userid' and `user_id_receiver`='$puserid' or `user_id_sender`='$puserid' and `user_id_receiver`='$userid' ");
                            while ($row = mysqli_fetch_array($sql)) {?>
                                <?php if ($row['user_id_sender'] = $userid) {?>
                                <div class="chat-container">
                                    <img src="assets/images/blank.png" alt="profile " style="width:100%;">
                                    <p> <?php echo htmlentities($row['user_msg']); ?></p>
                                    <span class="chat-time-right"><?php echo htmlentities($row['msg_date']); ?></span>
                                </div>
                                <?php } else{?>
                                <div class="chat-container chat-darker">
                                    <img src="assets/images/blank2.jpg" alt="profile" class="chat-right"
                                        style="width:100%;">
                                    <p><?php echo htmlentities($row['user_msg']); ?></p>
                                    <span class="chat-time-left"><?php echo htmlentities($row['msg_date']); ?></span>
                                </div>
                                <?php }?>
                                <?php }?>
                            </div>
                            <div class="chat-container chat-darker">
                                <form class="register-form outer-top-xs" role="form" method="post" name="register"
                                    onSubmit="return valid();">
                                    <p><input type="text" id="msg" name="msg" style="width:90%; font-size:20px;"
                                            required="required">
                                        <button type="submit" name="submit"
                                            class="btn-upper btn btn-primary chat-time-right " id="submit">Send</button>
                                    </p>
                                </form>
                            </div>

                            <div class="container-fluid">
                                <div class="caption vertical-top text-left">
                                    <div class="big-text">
                                        <br />
                                    </div>

                                    <?php $sql = mysqli_query($con, "select categoryName  from category where id='$cid'");
while ($row = mysqli_fetch_array($sql)) {
    ?>
                                    <div class="excerpt hidden-sm hidden-md">
                                        <?php echo htmlentities($row['categoryName']); ?>
                                    </div>
                                    <?php }?>

                                </div><!-- /.caption -->
                            </div><!-- /.container-fluid -->
                        </div>
                    </div>

                </div><!-- /.tab-pane -->
            </div><!-- /.search-result-container -->
        </div><!-- /.col -->
    </div>
    </div>
    <?php include 'includes/brands-slider.php';?>
    </div>
    </div>

    <script>
    var chatEl = document.getElementById("chatbody");
    chatEl.scrollTop = chatEl.scrollHeight;   
    </script>
    <?php include 'includes/footer.php';?>
    <?php include 'includes/footer-files-script.php';?>
</body>

</html>