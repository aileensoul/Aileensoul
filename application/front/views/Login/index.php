     <head> 
       <link rel="stylesheet" type="text/css" href="css/style_login.css">
       <link rel="stylesheet" type="text/css" href="css/common-style.css">
       <link rel="stylesheet" type="text/css" href="css/media.css">
     </head>



<body class="main_bdy_c">
<header>
    
        <div class="header3">
    <div class="container">
    <div class="row">
  <div class="col-md-6 col-sm-5">
                        <div class="logo"><a href="<?php echo base_url('main') ?>"><!-- <img src="<?php// echo base_url('images/logo.png'); ?>"> --> <span >Aileensoul</span></a></div>
                    </div>
 
           <div class="col-md-6 col-sm-7 header-left-menu">
                   <ul class="fr">
                 <!--    <li class=""><a class="login_butn"  href="<?php echo base_url('login') ?>">Login</a></li> -->
                    <li class=""><a class="login_butn"  href="<?php echo base_url('registration') ?>">Create an account</a></li>
                      
                    </ul>

                                <!-- Friend Request End-->

                                <!-- END USER LOGIN DROPDOWN -->
                        </div>
    </div>    
    </div>
     
    </div>


</header>
   <div class="container">
        <div class="row">
          <div class="col-md-12">
          <div class="reg1">
          
            <div class="abt_a">
              <h1><span>Welcome to Aileensoul</span></h1>
            </div>
       
                

                    <form action="<?php echo base_url(); ?>login/check_login" method="post" id="login_form" name="login_form">
                        
                          <fieldset class="col-md-12 lgn-s">
                          <label>Email Address</label>
                                <input id="user_name" placeholder="Enter Email Address"  type="text" name="user_name" autocomplete="off"  />
                            </fieldset>


                            <fieldset class="col-md-12 lgn-s">
                                 <label>Password</label>
                                <input type="password" id="password" placeholder="Enter Password" name="password" class="showpassword"  style="padding-right: 8%;" 
                               />
                            </fieldset>
                            <fieldset class="col-md-12">
                             <div class="checkbox2" style="display: block;">

                                    <input type="checkbox" name="remember">
                                    <h6>Remember me</h6>
                                </div>
                                    <div class="forgot" style="margin-top: -54px;">
                                    <a  id="myBtn"> <h6>Forgot Password?</h6></a>
                                </div>

                            </fieldset>

<fieldset class="col-md-12">
     <button type="submit" id="btnShow" name="login" value="Login" class="button button-block vfhh" style="background:#1b8ab8!important; background-repeat: no-repeat; background-position: right center; margin-top: 0px;">Log In</button>
                           
</fieldset>
    
<fieldset class="col-md-12">
     <div class="c_account">
                                <span style="font-size: 14px;">Don't have an account?</span>
                                <a  href="<?php echo base_url('registration'); ?>">Create an account</a>
                            </div>
</fieldset>
               
            </div>

          </div> 
</div>           
</div>
<footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="padding-bottom: 1px!important; padding: 12px;">
                <div class="footer-menu pull-left">
                    <p style="color: #fff;">&copy; 2017 | by <a href="#" style="color: #fff;">Aileensoul</a></p>
                </div>
                </div>
                <div class="col-md-6">
                <div class="footer-menu pull-right">
                    <nav>
                        <ul>
                          <li> <b><a class="" href="<?php echo base_url('about_us'); ?>">About Us</a> </b></li>
                                    <li> <b><a class="" href="<?php echo base_url('contact_us'); ?>">Contact Us</a> </b></li>
                                    <li><b><a class="" href="javascript:void(0);">Blog</a> </b></li>
                                    <li> <b><a class="" href="<?php echo base_url('feedback'); ?>">Send Us Feedback</a> </b></li>
                        </ul>
                    </nav>
                </div>
                </div>
            </div>
        </div>
        </footer>
</body>