<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $page_aboutus[0]['seo_title']; ?></title>
   <meta name="description" content="<?php echo $page_aboutus[0]['seo_description']; ?>">
   <meta name="Keyword" content="<?php echo $page_aboutus[0]['seo_keywords']; ?>">
   <link rel="icon" href="<?php echo base_url('images/favicon.png'); ?>">
  <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
 <meta name="google-site-verification" content="BKzvAcFYwru8LXadU4sFBBoqd0Z_zEVPOtF0dSxVyQ4" />
        <meta name="msvalidate.01" content="41CAD663DA32C530223EE3B5338EC79E" />
  <link rel="stylesheet" href="css/common-style.css">
  <link rel="stylesheet" href="css/style-main.css">
   <link rel="stylesheet" href="css/style_new.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <!--script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script-->
  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script>
          (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-6060111582812113",
            enable_page_level_ads: true
          });
        </script>
</head>
<body class="about-us">
<div class="main-inner">
  <header>
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-3">
          <h2 class="logo"><a href="<?php echo base_url(); ?>">Aileensoul</a></h2>
        </div>
        <div class="col-md-8 col-sm-9">
            <div class="btn-right pull-right">
              <a href="<?php echo base_url('login'); ?>" class="btn2">Login</a>
              <a href="<?php echo base_url('registration'); ?>" class="btn3">Create an account</a>
            </div>
        </div>
      </div>
    </div>
  </header>
  <section class="middle-main">
    <div class="container">
      <div class="pt10">
        <div class="titlea">
          <h1 class="pb20"><?php echo  $page_aboutus[0]['page_name']; ?></h1>
        </div>
        <div class="about-content">
            <?php echo $page_aboutus[0]['page_description'];  ?>
        </div>
        <p class="text-center"><img src="img/message.png"></p>
        <div class="text-center">
          <ul class="mail-sent">
            <li><a href="mailto:hr@aileensoul.com">hr@aileensoul.com</a></li>
            <li><a href="mailto:info@aileensoul.com">info@aileensoul.com</a></li>
            <li><a href="mailto:inquiry@aileensoul.com">inquiry@aileensoul.com</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <footer>
    <div class="container pt-20">
      <div class="row">
        
        <div class="col-md-6 col-sm-8 pull-right col-xs-12">
          <ul>
            <li><a href="<?php echo base_url('about-us'); ?>" target="_blank">About Us</a>|</li>
            <li><a href="<?php echo base_url('contact-us'); ?>" target="_blank">Contact Us</a>|</li>
            <li><a href="<?php echo base_url('blog'); ?>" target="_blank">Blog</a>|</li>
            <li><a href="<?php echo base_url('feedback'); ?>" target="_blank">Send Us Feedback</a></li>
          </ul>
        </div>
		<div class="col-md-6 col-sm-4">
          © 2017 | by Aileensoul
        </div>
      </div>
    </div>
  </footer>
</div>
<script>
  $( document ).ready(function() {
    
    // text animation effect 
    var $lines = $('.top-middle h3.text-effect');
      $lines.hide();
      var lineContents = new Array();

      var terminal = function() {

        var skip = 0;
        typeLine = function(idx) {
        idx == null && (idx = 0);
        var element = $lines.eq(idx);
        var content = lineContents[idx];
        if(typeof content == "undefined") {
          $('.skip').hide();
          return;
        }
        var charIdx = 0;

        var typeChar = function() {
          var rand = Math.round(Math.random() * 150) + 25;

          setTimeout(function() {
          var char = content[charIdx++];
          element.append(char);
          if(typeof char !== "undefined")
            typeChar();
          else {
            element.append('<br/><span class="output">' + element.text().slice(9, -1) + '</span>');
            element.removeClass('active');
            typeLine(++idx);
          }
          }, skip ? 0 : rand);
        }
        content = '' + content + '';
        element.append(' ').addClass('active');
        typeChar();
        }

        $lines.each(function(i) {
        lineContents[i] = $(this).text();
        $(this).text('').show();
        });

        typeLine();
      }

      terminal();
      
      
      
      //  login form css
      // button ripple effect from @ShawnSauce 's pen http://codepen.io/ShawnSauce/full/huLEH
      
      $(function(){
        
        var animationLibrary = 'animate';
        
        $.easing.easeOutQuart = function (x, t, b, c, d) {
        return -c * ((t=t/d-1)*t*t*t - 1) + b;
        };
        $('[ripple]:not([disabled],.disabled)')
        .on('mousedown', function( e ){
        
        var button = $(this);
        var touch = $('<touch><touch/>');
        var size = button.outerWidth() * 1.8;
        var complete = false;
        
        $(document)
        .on('mouseup',function(){
          var a = {
          'opacity': '0'
          };
          if( complete === true ){
          size = size * 1.33;
          $.extend(a, {
            'height': size + 'px',
            'width': size + 'px',
            'margin-top': -(size)/2 + 'px',
            'margin-left': -(size)/2 + 'px'
          });
          }
          
          touch
          [animationLibrary](a, {
          duration: 500,
          complete: function(){touch.remove();},
          easing: 'swing'
          });
        });
        
        touch
        .addClass( 'touch' )
        .css({
          'position': 'absolute',
          'top': e.pageY-button.offset().top + 'px',
          'left': e.pageX-button.offset().left + 'px',
          'width': '0',
          'height': '0'
        });
        
        /* IE8 will not appendChild */
        button.get(0).appendChild(touch.get(0));
        
        touch
        [animationLibrary]({
          'height': size + 'px',
          'width': size + 'px',
          'margin-top': -(size)/2 + 'px',
          'margin-left': -(size)/2 + 'px'
        }, {
          queue: false,
          duration: 500,
          'easing': 'easeOutQuart',
          'complete': function(){
          complete = true
          }
        });
        });
      });

      var username = $('#username'), 
        password = $('#password'), 
        erroru = $('erroru'), 
        errorp = $('errorp'), 
        submit = $('#submit'),
        udiv = $('#u'),
        pdiv = $('#p');

      username.blur(function() {
        if (username.val() == '') {
        udiv.attr('errr','');
        } else {
        udiv.removeAttr('errr');
        }
      });

      password.blur(function() {
      if(password.val() == '') {
        pdiv.attr('errr','');
        } else {
        pdiv.removeAttr('errr');
        }
      });

      submit.on('click', function(event) {
        event.preventDefault();
        if (username.val() == '') {
        udiv.attr('errr','');
        } else {
        udiv.removeAttr('errr');
        } 
        if(password.val() == '') {
        pdiv.attr('errr','');
        } else {
        pdiv.removeAttr('errr');
        }
      });
      

      
      
  
  });
</script>

</body>
</html>