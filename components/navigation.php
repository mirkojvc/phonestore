<div id="logoArea" class="navbar">
    
    <!-- Responsive toggle ================================================== -->

    <a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </a>

    <!-- END responsive toggle ================================================== -->

    <div class="navbar-inner">

        <!-- Logo ================================================== -->
        <a class="brand" href="/"><img src="themes/images/logo.png" alt="Bootsshop"/></a>

        <!-- END Logo ================================================== -->


        <!-- END Model search ================================================== -->


        <!-- Navigation ================================================== -->
        <ul id="topMenu" class="nav pull-right">
            <li class=""><a href="contact">Contact</a></li>
            <?php if(isset($_SESSION['roleId']) && $_SESSION['roleId'] === '2') : ?>

            <li class=""><a href="adminCategories">Kategorije</a></li>
            <li class=""><a href="adminProducts">Proizvodi</a></li>
            <li class=""><a href="adminOrders">Narudzbine</a></li>
            <li class=""><a href="adminMessages">Poruke</a></li>

            <?php endif; ?>
            <!-- Login/Register ================================================== -->
            <?php  if(!isset($_SESSION['userId'])) :?>
            <li class=""><a href="login"><span class="btn btn-large btn-primary">Register</span></a></li>
            <li class="">
            <a href="#login" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success">Login</span></a>
                <div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3>Login Block</h3>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal loginFrm" action = "functions/login" method = "post">
                        <div class="control-group">								
                            <input type="text" id="inputEmail" name = "inputEmail" placeholder="Email">
                        </div>
                        <div class="control-group">
                            <input type="password" id="inputPassword" name = "inputPassword" placeholder="Password">
                        </div>
                        <div class="control-group">
                            <label class="checkbox">
                            <input type="checkbox"> Remember me
                            </label>
                        </div>

                        <button type="submit" class="btn btn-success" name = "login_user__submit">Sign in</button>
                        </form>		
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    </div>
                </div>
            </li>
            <?php endif ?>
            <?php  if(isset($_SESSION['userId'])) :?>
                <li class=""><a href="logout"><span class="btn btn-large btn-primary">Logout</span></a></li>
            <?php endif?>
            <!-- END Login/Register ================================================== -->
        
        </ul>

        <!-- END Navigation ================================================== -->
    </div>
</div>