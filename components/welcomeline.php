<div id="welcomeLine" class="row">
<?php if(isset($_SESSION['username'])) {
    echo '<div class="span6">Welcome!<strong> '.$_SESSION["username"].'</strong></div>';
    } else {
        echo '<div class="span6"></div>';
    }
?>

<?php if(isset($_SESSION['username'])) { ?>
        <div class="span6">
        <div class="pull-right">
            <a href="cart"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> Cart </span> </a> 
        </div>
    </div>
<?php }?>
</div>
