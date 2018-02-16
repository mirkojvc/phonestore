<h3> Login</h3>	
<hr class="soft"/>

<div class="row">
    <div class="span4">
        <div class="well">
            <?php
                if(isset($_REQUEST['error'])) {
                echo '<span style = "color:red">'.$_REQUEST['error'].'</span>';
                }
            ?>
            <h5>CREATE YOUR ACCOUNT</h5><br/>
            Enter your e-mail address to create an account.<br/><br/><br/>
            <form action="/functions/register" method = "post">
                <div class="control-group">
                    <label class="control-label" for="inputEmail">E-mail address</label>
                    <div class="controls">
                        <input class="span3"  type="text" id="inputEmail" name="inputEmail" placeholder="Email">
                    </div>
                    <label class="control-label" for="inputUsername">Username</label>
                    <div class="controls">
                        <input class="span3"  type="text" id="inputUsername" name="inputUsername" placeholder="Username">
                    </div>
                    <label class="control-label" for="inputPassword">Password</label>
                    <div class="controls">
                        <input class="span3"  type="password" id="inputPassword" name="inputPassword" placeholder="Password">
                    </div>
                </div>
                <div class="controls">
                    <button type="submit" class="btn block" name = "register_user__submit">Create Your Account</button>
                </div>
            </form>
        </div>
    </div>
    <div class="span1"> &nbsp;</div>
    <div class="span4">
        <div class="well">
            <?php
                if(isset($_REQUEST['errorl'])) {
                echo '<span style = "color:red">'.$_REQUEST['errorl'].'</span>';
                }
            ?>
            <h5>ALREADY REGISTERED ?</h5>
            <form action = "/functions/login" method = "post">
                <div class="control-group">
                    <label class="control-label" for="inputEmail">Email</label>
                    <div class="controls">
                        <input class="span3"  type="text" id="inputEmail" name = "inputEmail" placeholder="Email">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputPassword">Password</label>
                    <div class="controls">
                        <input type="password" class="span3"  id="inputPassword" name = "inputPassword" placeholder="Password">
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                    <button type="submit" class="btn" name = "login_user__submit">Sign in</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
