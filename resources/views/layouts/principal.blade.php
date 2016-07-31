
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Catchy Login and Registration Flat Responsive Widget Template :: w3layouts</title>
<link href="css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Catchy Login and Registration Widget Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery-1.11.1.min.js"></script> 
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600,300italic,300' rel='stylesheet' type='text/css'>
</head>

<body>
<!-- /start-main -->
    <h1>Catchy Login and Registration</h1>
    <!-- /register -->  
        <div class="container w3l">
            <span title="REGISTER" class="button"> +</span>
          <div class="content">
            <div class="head">
              <h3>Register</h3>
            </div>
            <div class="body">
                <div class="login-top sign-top w3-agile">
                {!!Form::open(['route'=>'usuario.store', 'method'=>'POST'])!!}
                                    <input type="text" name="name" class="name active" placeholder="Ingresa tu nombre" required="">
                                    <input type="text" name="email" class="email" placeholder="Email" required="">
                                    <input type="text" name="Phone" class="phone" placeholder="Phone" required="">
                                    <input type="password" name="password" class="password" placeholder="Password" required="">     
                                    <input type="checkbox" id="brand1" value="">
                                    <label for="brand1"><span></span> Remember me</label>
                                    <div class="login-bottom">
                                        <div class="forgot">
                                            <a href="#">Forgot password?</a>
                                        </div>
                                        <div class="sub">
                                            
                                                <input type="submit" value="SIGN UP">
                                            
                                        </div>
                            
                                    <div class="clear"></div>
                                </div>  
                                
                {!!Form::close()!!}        
                            </div>
            </div>
          </div>
        </div>
    <!-- //register --> 
        <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script> 
        <script>
        $('.button').click(function (e) {
          e.preventDefault();
          $(this).parent().toggleClass('expand');
          $(this).parent().children().toggleClass('expand');
        });
        </script>
          <!-- /login-inner --> 
            <div class="login-inner">
                <div class="log-head">
                            <h2>Login</h2>
                        </div>
                                <div class="login-top">
                                {!!Form::open(['route'=>'log.store', 'method'=>'POST'])!!}
                                    <div class="vali-form form-group1">
                                        {!!Form::label('correo','Correo:')!!}   
                                        {!!Form::email('email',null,['class'=>'form-control', 'placeholder'=>'Ingresa tu correo'])!!}

                                        {!!Form::label('contrasena','Contraseña:')!!}   
                                        {!!Form::password('password',['class'=>'form-control', 'placeholder'=>'Ingresa tu contraseña'])!!}
                                    </div>
                                {!!Form::submit('Iniciar',['class'=>'btn blue one'])!!}
                                {!!Form::close()!!}
                                
                                <div class="clearfix"></div>
                                                    
                            </div>
                            <div class="social-icons">
                            <ul> 
                                <li><a href="facebook/login"><span class="icons"></span><span class="text">Facebook</span></a></li>
                                <li class="twt"><a href="#"><span class="icons"></span><span class="text">Twitter</span></a></li>
                                <li class="ggp"><a href="#"><span class="icons"></span><span class="text">Google+</span></a></li>
                                
                                <div class="clearfix"> </div>
                            </ul> 
                        </div>
                        </div>  
                        <!-- //login-inner -->  
    <div class="clearfix"> </div>   
  <!-- /copy-right -->  
<div class="copy-right w3ls">
        <p> © 2016 Catchy Login and Registration . All Rights Reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
    </div>
      <!-- //copy-right --> 
     <!-- //end-main -->
</body>
</html>
