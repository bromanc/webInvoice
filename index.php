<?php
session_start();
include('header.php');

$loginError = '';
if (!empty($_POST['email']) && !empty($_POST['pwd'])) {
    include 'Invoice.php';
    $invoice = new Invoice();
    $user = $invoice->loginUsers($_POST['email'], $_POST['pwd']);
    if (!empty($user)) {
        $_SESSION['user'] = $user[0]['first_name'] . "" . $user[0]['last_name'];
        $_SESSION['userid'] = $user[0]['id'];
        $_SESSION['email'] = $user[0]['email'];
        $_SESSION['address'] = $user[0]['address'];
        $_SESSION['mobile'] = $user[0]['mobile'];
        header("Location:invoice_list.php");
    } else {
        $loginError = "Invalid email or password! ";
    }
}
?>
<title>Simple Invoice System</title>
<script src="js/invoice.js"></script>
<link href="css/style.css" rel="stylesheet">
<div style="width: 800px; margin: 200px auto;">	
    <div class="col-xs-6">
        <div class="heading">
            <h2>Simple Invoice System</h2>
        </div>
        <div class="login-form">
            <form action="" method="post">
                <div class="form-group">
                    <?php if ($loginError) { ?>
                        <div class="alert alert-warning"><?php echo $loginError; ?></div>
                    <?php } ?>
                </div>         
                <div class="form-group">
                    <input name="email" id="email" type="email" class="form-control" placeholder="Email address" autofocus required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="pwd" placeholder="Password" required>
                </div> 
                <div class="form-group">
                    <button type="submit" name="login" class="btn btn-primary" style="width: 100%;">Login</button>
                </div>
                <div class="clearfix">
                    <label class="pull-left checkbox-inline"><input type="checkbox">Remember me</label>
                </div>        
            </form>
        </div>   
    </div>
</div>