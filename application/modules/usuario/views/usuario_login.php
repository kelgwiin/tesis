<!doctype html>
<html lang="es" xmlns="http://www.w3.org/1999/xhtml"
      xmlns:og="http://ogp.me/ns#"
      xmlns:fb="https://www.facebook.com/2008/fbml">
  <head>
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="msvalidate.01" content="36A28D9109C077BA3E623651FC1656F4" />
    <meta name="author" content="f6rnando">
    <base href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/'; ?>" />
    <title>Login</title>
    <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-144x144-precomposed.png">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://bootsnipp.com/css/bootsnipp.css?ver=2">
    <style type="text/css">
	
	body{
		background-image: url('assets/back/img/imagen.png');
	}
	.form-signin input[type="text"] {
	  margin-bottom: -1px;
	  border-bottom-left-radius: 0;
	  border-bottom-right-radius: 0;
	}
	.form-signin input[type="password"] {
	  margin-bottom: 10px;
	  border-top-left-radius: 0;
	  border-top-right-radius: 0;
	}
	.form-signin .form-control {
	  position: relative;
	  font-size: 16px;
	  height: auto;
	  padding: 10px;
	  -webkit-box-sizing: border-box;
	     -moz-box-sizing: border-box;
	          box-sizing: border-box;
	}

	.colorgraph {
	  height: 5px;
	  border-top:0;
	  background: #c4e17f;
	  border-radius: 5px;
	  background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
	  background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
	  background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
	  background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
	}

</style>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    	<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
    	<script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.2.0/respond.js"></script>
    <![endif]-->
    <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-34731274-1']);
      _gaq.push(['_trackPageview']);
      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    </script>
    <script type="text/javascript">
    var fb_param = {};
    fb_param.pixel_id = '6007046190250';
    fb_param.value = '0.00';
    (function(){
      var fpw = document.createElement('script');
      fpw.async = true;
      fpw.src = '//connect.facebook.net/en_US/fp.js';
      var ref = document.getElementsByTagName('script')[0];
      ref.parentNode.insertBefore(fpw, ref);
    })();
    </script>
    <noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/offsite_event.php?id=6007046190250&amp;value=0" /></noscript>
  </head>

  <body>
    <div id="wrap">
        <nav class="navbar navbar-default" role="navigation" style="margin-bottom: 0;">
  <div class="container">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-bootsnipp-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <div class="animbrand"><a class="navbar-brand" href="<?php echo base_url().'usuario'; ?>">Tesis suprema</a></div>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
 <!-- <div class="collapse navbar-collapse navbar-bootsnipp-collapse">
    <ul class="nav navbar-nav">
     <li class=""><a href="http://bootsnipp.com"><span class="glyphicon glyphicon-home"></span> Home</a></li>
     <li class="dropdown ">
      <a href="http://bootsnipp.com/snippets" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-list"></span> Snippets <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li class=""><a href="http://bootsnipp.com/snippets/featured"><span class="glyphicon glyphicon-star"></span> Featured</a></li>
        <li class="divider"></li>
        <li class=""><a href="http://bootsnipp.com/tags"><span class="glyphicon glyphicon-tags"></span> Tags</a></li>
        <li class="divider"></li>
        <li class="dropdown-header">By Bootstrap version:</li>
                <li><a href="http://bootsnipp.com/tags/3.0.1"><span class="label label-info tip">3.0.1</span></a></li>
                <li><a href="http://bootsnipp.com/tags/3.0.0"><span class="label label-info tip">3.0.0</span></a></li>
                <li><a href="http://bootsnipp.com/tags/2.3.2"><span class="label label-info tip">2.3.2</span></a></li>
              </ul>
      </li>
      <li class="dropdown ">
       <a href="http://bootsnipp.com/resources" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-book"></span> Resources <b class="caret"></b></a>
       <ul class="dropdown-menu">
         <li class=""><a href="http://bootsnipp.com/resources"><span class="glyphicon glyphicon-align-justify"></span> List of resources</a></li>
         <!-- <li  class=""><a href="http://bootsnipp.com/blog"><span class="glyphicon glyphicon-list-alt"></span> Boostnipp Blog</a></li> --
         <li><a href="http://getbootstrap.com" target="_blank"><span class="glyphicon glyphicon-cloud-download"></span> Download bootstrap</a></li>
         <li class="divider"></li>
         <li class="dropdown-header">Builders</li>
         <li class=""><a href="http://bootsnipp.com/forms"><span class="glyphicon glyphicon-tasks"></span> Form Builder</a></li>
         <li class=""><a href="http://bootsnipp.com/buttons"><span class="glyphicon glyphicon-edit"></span> Button builder</a></li>
       </ul>
     </li>

     <li class=""><a href="http://bootsnipp.com/about"><span class="glyphicon glyphicon-info-sign"></span> About</a></li>
         </ul>
    <form class="navbar-form navbar-left" action="http://bootsnipp.com/search" method="GET" id="search-form" role="search">
     <div class="form-group form-slide" style="overflow: hidden;">
       <input type="text" class="form-control form-input-slide" name="q" placeholder="Search by title or tag" style="margin-left:-170px;">
    </div>
     <button type="submit" class="btn btn-default search-btn"><span class="glyphicon glyphicon-search"></span></button>
    </form>
    <ul class="nav navbar-nav navbar-right">
            <li id="nav-register-btn" class=""><a href="http://bootsnipp.com/register">Register</a></li>
       <li id="nav-login-btn" class="active"><a href="http://bootsnipp.com/login"><i class="icon-login"></i>Login</a></li>
         </ul>
  </div> /.navbar-collapse -->
  </div>
</nav>
        <div class="container">
	<div class="row" style="margin-top:60px;">
		<div class="col-md-4 col-md-offset-4">
			
			<form method="POST" action="http://bootsnipp.com/login" accept-charset="UTF-8" role="form" id="loginform" class="form-signin"><input name="_token" type="hidden" value="H8BBcMF2hthiyv4uylnUBnwVwadm9qPfPNxPGnZs">				<fieldset>
			  		<h2 class="sign-up-title">Inicia Sesión</h2>
			  		<hr>
				    <input class="form-control email-title" placeholder="E-mail" name="email" type="text">
				    <input class="form-control" placeholder="Contraseña" name="password" type="password" value="">
				    <a class="pull-right" href="http://bootsnipp.com/password">¿Olvidó la contraseña?</a>
					<div class="checkbox">
				    	<label><input name="remember" type="checkbox" value="Remember Me"> Recordarme</label>
				    </div>
				    <input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
				    <!--<p class="text-center" style="margin-top:10px;">OR</p>
				    <a class="btn btn-default btn-block" href="http://bootsnipp.com/login/github"><i class="icon-github"></i> Login with Github</a>-->
				  	<br>
				  	<!--<p class="text-center"><a href="http://bootsnipp.com/register">Register for an account?</a></p>-->
			  	</fieldset>
		  	</form>		</div>
  	</div>
</div>
    </div>
    <footer class="bs-footer" role="contentinfo">
  <div class="container">
    <div class="bs-social">
      <ul class="bs-social-buttons">
        <li class="facebook-button">
          <iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fbootsnipp.com&amp;width=130&amp;height=20&amp;colorscheme=light&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;send=true&amp;appId=112989545392380" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:130px; height:20px;" class="facebook-btn" allowTransparency="true"></iframe>
        </li>
        <li class="follow-btn">
          <iframe allowtransparency="true" frameborder="0" scrolling="no"
            src="//platform.twitter.com/widgets/follow_button.html?screen_name=bootsnipp"
            style="width:236px; height:20px;" class="twitter-follow-button twitter-follow-button"></iframe>
        </li>
        <li class="tweet-btn">
          <iframe allowtransparency="true" frameborder="0" scrolling="no"
                 src="https://platform.twitter.com/widgets/tweet_button.html?lang=en&via=bootsnipp&url=http%3A%2F%2Fbootsnipp.com&text=RT%20Design%20elements%20and%20code%20snippets%20for%20%23twbootstrap%20HTML%2FCSS%2FJS%20framework"
                 style="width:107; height:20px;" class="twitter-share-button twitter-count-horizontal"></iframe>
        </li>
        <li style="display:none;">
          <a href="https://plus.google.com/105903585856466454536?
            rel=author">Google</a>
        </li>
      </ul>
    </div>
    <p>Bootsnipp.com was crafted by <a href="http://maxoffsky.com" target="_blank">Maks Surguy</a>. | <a href="http://bootsnipp.com/privacy" target="_blank">Site Privacy policy</a> | Featured snippets are <a href="http://bootsnipp.com/license">MIT license.</a> | Built with <a href="http://laravel.com" target="_blank" title="laravel php framework"><img src="http://bootsnipp.com/img/laravel.jpg" alt="laravel php framework"></a> Hosted on <a href="http://pagodabox.com" target="_blank" title="pagodabox php cloud hosting"><img src="http://bootsnipp.com/img/pagoda.jpg" alt="pagodabox php cloud hosting"></a> | Bootstrap CDN by <a href="http://maxcdn.com" target="_blank"><img src="http://bootsnipp.com/img/maxcdn.png"></a></p>
  </div>
</footer>    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="http://bootsnipp.com/js/vendor/placeholder.min.js"></script>
        <script type="text/javascript">
    $(function() {
      $('.tip').tooltip();
      $('input, textarea').placeholder(); 
      $( ".search-btn").mouseover(function(e) {
        var $marginLefty = $('.form-input-slide');
        $marginLefty.animate({  marginLeft: 0});
      });
      $( "#search-form" ).mouseleave(function(e) {
        var $marginLefty = $('.form-input-slide');
        $marginLefty.animate({  marginLeft: -$marginLefty.outerWidth()});
      });
    });
    </script>
    <script type="text/javascript" src="http://cdn.buysellads.com/ac/audience.js"></script>   
  </body>
</html>