<?php
	if(isset($_REQUEST['contact_submit'])) {

		$error          = "";
		$success 		= "";
		$inputEmail     = $_REQUEST['contact_email'];
		$inputName  	= $_REQUEST['contact_name'];
		$inputTitle  	= $_REQUEST['contact_title'];
		$inputMessage  	= $_REQUEST['contact_text'];
		if(empty($inputEmail)) {
			$error .= "Molimo unesite Email. ";
		} else if (!preg_match("/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/", $inputEmail)) {
			$error .= "E-mail nije validnog formata. ";
		} else {
			$email      = $inputEmail;
		}

		if(empty($inputName)) {
			$error .= "Molimo unesite ime";
		} else {
			$name = $inputName;
		}

		if(empty($inputTitle)) {
			$error .= "Molimo unesite naslov poruke";
		} else {
			$title = $inputTitle;
		}

		if(empty($inputMessage)) {
			$error .= "Molimo unesite poruku";
		} else {
			$message = $inputMessage;
		}

		if($error !== "") {
			header('Location: /contact?error='.$error);
		} else {
			
			$sql = sprintf("INSERT INTO Messages (title, text, status, email, name)
			VALUES ('%s', '%s', '%d', '%s', '%s')", $title, $message, 0, $email, $name);
			if(mysqli_query($conn, $sql)) {
				$success.= "Poruka poslata";
				header('Location: /contact?success='.$success);
			} else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
		}	
	}
?>

<hr class="soften">
	<h1>Visit us</h1>
	<hr class="soften"/>	
	<div class="row">
		<div class="span4">
		<h4>Contact Details</h4>
		<p>	Pere Perica 18,<br/> Beograd, Srbija
			<br/><br/>
			info@phonestore.com<br/>
			﻿Tel XXX-XXX-XXXX<br/>
			Fax XXX-XXX-XXXX<br/>
		</p>		
		</div>
			
		<div class="span4">
		<h4>Opening Hours</h4>
			<h5> Monday - Friday</h5>
			<p>09:00am - 09:00pm<br/><br/></p>
			<h5>Saturday</h5>
			<p>09:00am - 07:00pm<br/><br/></p>
			<h5>Sunday</h5>
			<p>12:30pm - 06:00pm<br/><br/></p>
		</div>
		<div class="span4">
		<h4>Email Us</h4>

            <?php
                if(isset($_REQUEST['success'])) {
                echo '<span style = "color:green">'.$_REQUEST['success'].'</span>';
                }
            ?>
			<?php
                if(isset($_REQUEST['error'])) {
                echo '<span style = "color:red">'.$_REQUEST['error'].'</span>';
                }
            ?>
		<form class="form-horizontal" action = "contact" method = "post">
        <fieldset>
          <div class="control-group">
           
              <input type="text" placeholder="name" name = "contact_name" class="input-xlarge"/>
           
          </div>
		   <div class="control-group">
           
              <input type="text" placeholder="email" name = "contact_email" class="input-xlarge"/>
           
          </div>
		   <div class="control-group">
           
              <input type="text" placeholder="subject" name = "contact_title" class="input-xlarge"/>
          
          </div>
          <div class="control-group">
              <textarea rows="3" id="textarea" class="input-xlarge" name = "contact_text"></textarea>
           
          </div>

            <button class="btn btn-large" type="submit" name = "contact_submit" >Send Messages</button>

        </fieldset>
      </form>
		</div>
	</div>
