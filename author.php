<!DOCTYPE html>
<html lang="en">
	<?php include "components/head.php" ; ?>
<body>
    <?php
        if(!isset($_SESSION['userId']) || $_SESSION['roleId'] !== '2') {
            header('Location: /');
        }
    ?>
	<?php include "components/header.php";?>
	<?php //include "components/index/slider.php";?>
<div id="mainBody">
	<div class="container">
		<div class="row">

	<!-- Sidebar end=============================================== -->

			<div class="span12">
                <div style = "text-align:center;">	
                    <img src = "/images/me.jpg" alt"me" width="300">
                    <p>Mirko Jovic 33/15 Student Visoke ICT Skole</p>
                    

                    <div style = "display:block;">
                    Kako vam se svideo sajt?
                    </div>
                    <div style = "display:block;">
                        <input type = "radio" name = "survey" id = "survey1" value = "10">Odlican
                    </div>
                    <div style = "display:block;">
                        <input type = "radio" name = "survey" id = "survey2" value = "9">Fenomenalan
                    </div>
                    <div style = "display:block;">
                        <input type = "radio" name = "survey" id = "survey3" value = "8">Fantastican
                    </div>
                    <div style = "display:block;">
                        <button id = "survey_submt" name = "survey_submt" >Submit</button>
                    </div>
                    <?php
                        $getscore = sprintf('SELECT * FROM anketa');
                        $score = 0;
                        $count = 0;
                        $fetch = mysqli_query($conn, $getscore);
            
                        while($sc = mysqli_fetch_array($fetch)) {
                            $count++;
                            $score += $sc['score'];
                        }
            
                        $total =  $score/$count;
                    ?>

                    <span> Score: <span id = "survey_value"><?php echo $total?></span> </span>
                </div>
			</div>
		</div>
	</div>
</div>
<?php include "components/footer.php"; ?>
<?php include "components/usedScripts.php";?>
<script src="/js/MainAjax.js"></script>
</body>
</html>