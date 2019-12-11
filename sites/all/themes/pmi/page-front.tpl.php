<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">


  <head>
    <title><?php print $head_title; ?></title>
    <?php print $styles ?>
    <?php print $scripts; ?>
    <!--[if IE 6]>
<script src="/sites/all/themes/pmi/js/DD_belatedPNG.js"></script>
<![endif]-->
<?php
date_default_timezone_set("Australia/Canberra");

?>
        <link rel="shortcut icon" href="/sites/default/files/pmi_favicon.ico" type="image/x-icon" />
	<link href="/sites/all/themes/pmi/css/layout.css" rel="stylesheet" type="text/css" />
	<link href="/sites/all/themes/pmi/fonts/font-style.css" rel="stylesheet" type="text/css" />
<link href="/sites/all/themes/pmi/slider/slide-show.css" rel="stylesheet" type="text/css" />

	<link href="/sites/all/themes/pmi/css/ssubnav.css" rel="stylesheet" type="text/css" />
<script src="/sites/all/themes/pmi/js/swfobject_modified.js" type="text/javascript"></script>
	<script type="text/javascript">

	$(document).ready(function() {

	//alert($('.tweet-text').text().length);
	var text = $('.tweet-text').text();
	

	$('.tweet-text').text(text.substr(0,70));
	//$('.tweet-text').append(text.substr(100,70));

	$("ul#topnav li").hover(function() { //Hover over event on list item
		$(this).css({ 'background' : 'url(/sites/all/themes/pmi/images/nav_dvder.png) repeat-x'}); //Add background color + image on hovered list item
		$(this).find("span").show(); //Show the subnav
	} , function() { //on hover out...
		$(this).css({ 'background' : 'none'}); //Ditch the background
		$(this).find("span").hide(); //Hide the subnav
	});

	});
	</script>
	<!--Dropdow menu JS end -->

	<!-- Checkbox JS start -->
	<script type="text/javascript" src="/sites/all/themes/pmi/js/check-box.js"></script>
	<!-- Checkbox JS END -->
	<!--Slideshow JS -->

	<script type="text/javascript" src="/sites/all/themes/pmi/slider/slide-show.js"></script>

	<!--Slideshow JS -->
	<!-- LOGIN popup JS start -->

	<!--janrain script start here-->

	<div id="fb-root"></div>
	<script src="http://connect.facebook.net/en_US/all.js"></script>


	<script>
	FB.init({
	appId : 'hnomamefakdkjgiobhbf',
	status : true, // check login status
	cookie : true, // enable cookies to allow the server to access the session
	xfbml : true // parse XFBML
	});
	</script>

	<!--janrain script ends here-->
	<script language="javascript" type="text/javascript">
	function popup(sw) {


			if (sw == 1) {
			// Show popup
			document.getElementById('blackout').style.visibility = 'visible';
			document.getElementById('login_bx').style.visibility = 'visible';
			document.getElementById('blackout').style.display = 'block';
			document.getElementById('login_bx').style.display = 'block';
			}
			else{
			// Hide popup
			document.getElementById('blackout').style.visibility = 'hidden';
			document.getElementById('login_bx').style.visibility = 'hidden';
			document.getElementById('blackout').style.display = 'none';
			document.getElementById('login_bx').style.display = 'none';
			}

			if (sw == 2) {
			// Show popup
			document.getElementById('blackout1').style.visibility = 'visible';
			document.getElementById('signup_bx').style.visibility = 'visible';
			document.getElementById('blackout1').style.display = 'block';
			document.getElementById('signup_bx').style.display = 'block';
			}
			else{
			// Hide popup
			document.getElementById('blackout1').style.visibility = 'hidden';
			document.getElementById('signup_bx').style.visibility = 'hidden';
			document.getElementById('blackout1').style.display = 'none';
			document.getElementById('signup_bx').style.display = 'none';
			}
	}
	</script>
	<!--<script language="javascript" type="text/javascipt"
	src="/sites/all/themes/pmi/script.js"></script>-->
	<!-- LOGIN popup JS end -->
<script type="text/javascript"> 
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-29788646-1']);
  _gaq.push(['_trackPageview']);
  (function() {

    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>


	</head>

 <body class="front-page" onload="MM_preloadImages('/sites/all/themes/pmi/images/icon-f-h.png','/sites/all/themes/pmi/images/icon-t-h.png',
	    '/sites/all/themes/pmi/images/icon-in-h.png','/sites/all/themes/pmi/images/icon-digg-h.png','/sites/all/themes/pmi/images/twiter-h.png')">

<!--  <body<?php //print phptemplate_body_class($left, $right); ?>>-->

<!-- Layout -->

<!--footer body start -->
<div id="body-footer">
  <!--wrapper start here -->
  <div id="wrapper">
    <!--container start here -->
    <div id="container">
      <!--header start -->
      <div class="header">
    <div id='blackout' onclick='popup(0)'>


 </div>
          <div id="login_bx" class="login_bx" >

         <?php $block = module_invoke('block','block','view',30);	print strip_tags($block['content'],'<span><input><a><form>');  ?>

                <div class="clear"></div>
         	   </div>

      <!--sign-up -->
      <div id='blackout1' onclick='popup(0)'>  </div>

          <!--<div id="signup_bx">
		<div class="left"><input name="" type="text" class="sing-inpt marg_T4 marg-L6 left" value="your email addrerss" />
		<input name="" type="text" class="sing-inpt marg_T4 marg-L6 left" value="preferred password" />
		<span class="left marg-T5"><span class="marg-L6 ">
		<input name="go" type="button" value="go" class="btn-go" /></span></span>

	</div>
		<div class="clear">	</div>

    <div class="right marg-T10 marg-R7"><span class="txtsing12">or</span>

	<a href="#"><img src="/sites/all/themes/pmi/images/facebook.png" alt="" width="154" height="22" border="0" /></a>

	</div>
	<div class="clear"></div>
  </div>-->

       <div class="top-nav">

       <a href="/cart" class="right shop-cart underline">Shopping cart</a>

   		<?php if ($user->uid > 0){
        print l('My Account','user/'.$user->uid);
        print l("logout ","logout");
			}
      else {
        print '<a href="/user/register" class="blktxt">Signup</a>
        <a href="/user" class="blktxt">Login</a>';
			}
      ?>

           <div class="login_bx" id="login_bx" >
		<input name="" type="text" class="login-inpt marg_T4 marg-L6" value="username" />
		<input name="" type="text" class="login-inpt marg_T4 marg-L6" value="password" />
		<span class="right marg-T7"><span class="marg-L6 marg-R14 right"><input name="go" type="button" value="go" class="btn-go" onclick="document.getElementById('login_bx').style.display='none'"  /></span><a href="#" class="right">forgot password?</a></span>

		<div class="clear"></div>
		</div>
       </div>

       <div class="header_bg">

       <div class="logo left"><a href="/">

	<?php if ($logo) {   print '<img src="'. check_url($logo) .'" alt="'. $site_title .'" id="logo"/>';}?> </a> </div>

     <div class="myslogan"><?php $block = module_invoke('block','block','view',16); print $block['content'];?></div>

       </div>
       <div class="nav-menu-rit"><div class="nav-menu-lft">
       <!--dropmenu start here -->
             <!--dropmenu start here -->
<?php// echo $_GET['q']; ?>
            	<?php
			$block = module_invoke('menu', 'block','view', 'primary-links');
						print $block['content'];

			?>
       <!--dropmenu end here -->

<!--
					<script type="text/javascript">
					var menu=new menu.dd("menu");
					menu.init("menu","menuhover");
					</script>-->
 <!--       <li><a href="" class="first">Home</a></li>-->
                <!--search box End here -->

        <!--search box start here -->
       		<div class="right marg-R7 marg-T7" >

 			 <?php $block = module_invoke('search','block','view', 0); print $block['content'] ;?>
   		</div>
       <!--search box End here -->


       </div></div>

      </div>
      <!--header end -->
      <div class="clear"></div>
       <!--banner --> <div class="banner">
        <?php  if ($show_messages && $messages): print $messages; endif; ?>

        <!-- Slideshow HTML -->
<div id="slideshow">
	<div id="slidesContainer">
		<div class="slide">
			<div>
				<!--<a href="#">--><img height="350" src="/sites/all/themes/pmi/img/img_slide_01.jpg" width="637" /><!--</a>-->
				<p>Transform your health care practice and increase client numbers - guaranteed! World-class courses in a flexible, online format</p>
				<span class="right marg-R10 marg-T18">
      <a class="thin-yellow-btn" href="/healthcare-training-institute"><span>Find out more</span></a>
</span></div>
		</div>
		<div class="slide">
			<div>
				<!--<a href="#">--><img height="350" src="/sites/all/themes/pmi/img/img_slide_02.jpg" width="637" /><!--</a>-->
				<p> Want $861 worth of FREE resources to help build a successful sustainable practice? Sign up for this limited offer now!</p><span class="right marg-R10 marg-T18"><a class="thin-yellow-btn" href="/user/register"><span>Sign up</span></a>
        </span></div>
		</div>
		<div class="slide">
			<div>
				<!--<a href="#">--><img height="350" src="/sites/all/themes/pmi/img/img_slide_03.jpg" width="637" /><!--</a>-->
				<p>Supercharge your health care practice now! Test drive our online practice building resources now and get a free short course!</p>
				<span class="right marg-R10 marg-T18"><a class="thin-yellow-btn" href="/user/register"><span>Sign up</span></a></span></div>
		</div>
		<div class="slide">
			<div>
				<!--<a href="#">--><img height="350" src="/sites/all/themes/pmi/img/img_slide_04.jpg" width="637" /><!--</a>-->
				<p>At the Practice Mastery Institute our <span>flexible, self-paced learning</span> can help you get from where you are now to where you always intended to be so that you can support your clients and help them to be all they can be too.</p>
				<span class="right" style="padding-top:20px;"><a class="thin-yellow-btn" href="/healthcare-training-institute"><span>Find out more</span></a></span>
			</div>
		</div>
	</div>
	<div class="button-bg">
		&nbsp;</div>
</div>
<!-- Slideshow HTML -->

      </div><!--banner end -->
      <!--mid content start -->
      <div class="mid-cont_paddLR10" >

	<div class="twit_bg">	<a href="https://twitter.com/practicemastery" target="_blank" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image13','','/sites/all/themes/pmi/images/twiter-h.png',1)">
	<img src="/sites/all/themes/pmi/images/twiter.png" name="Image13" width="24" height="24" border="0" id="Image13" class="marg-L30 marg-T22 left" />
	</a>

	<div class="twit-blog-bg left">
	<div class="right marg-R14"><a href="#"><img src="/sites/all/themes/pmi/images/arro-lft.png" width="10" height="14" alt="" /></a> <a href="#"><img src="/sites/all/themes/pmi/images/arro-rit.png" width="10" height="14" alt="" /></a></div>
	<?php 


$block = module_invoke('block','block','view',8); print $block['content'];


?>
	</div>
	</div>



      <div class="cont-bg">
	 <div style="width:942px;">
		<div class="cont1 right marg-L18">
<p class="txtdemi20-line marg-B14">&nbsp;Want more clients now?</p><p><a href="http://www.youtube.com/v/oyxQZO6gmqY" rel="lightframe"><img src="http://img.youtube.com/vi/oyxQZO6gmqY/0.jpg" alt="" width="222" height="176" /></a></p><p>&nbsp; &nbsp;<a class="neutralink13" href="content/practice-mastery-institute">&nbsp; Find out more</a></p><p>&nbsp;</p>
		</div>
		<div class="newsltr-bx left">
			<h1>FREE <span> Business Building Toolkit</span></h1>
			<div class="newsltr-bx-botbg">
      <p align="center">Sign up for free and get $861 worth of FREE practice building resources!</p>
<p align="center" class="marg-T25">
<a class="signup-button" style ="width:135px;" href="/user/register"><span>Sign up now!</span></a></p>
				<p class="clear">&nbsp;</p>
			</div>
		</div>
		<div class="cont1 left marg-L30 ie6_marg-L30">
			<!--<?php $block = module_invoke('block','block','view',9); print $block['content'];   ?>-->
<div class="left marg-L30"><p class="txtdemi20-line marg-B14">Why Practice Mastery?</p><p class="txt14">So many health care practitioners are either too busy to enjoy quality of life or can't get enough clients and so they are financially just surviving.</p><p class="txt14 txt-just">At the Practice Mastery Institute our flexible, self-paced learning can help you get from where you are now to where you always intended to be so that you can support your clients and help them to be all they can be too.</p><span class="right"><a class="red-link" href="content/programs-and-courses">Get started today</a></span></div>
		</div>
		<div class="clear"> </div>
	</div>


	<div class="clear" style="height:21px"> </div>
      <div class="marg-T25">
        <p class="txtdemi20-line marg-B14">What people are saying</p>

       <!-- <div class="testimon"> <a href="#"><img src="/sites/all/themes/pmi/images/test-ima1.jpg" alt="" width="48" height="50" border="0" class="test-ima" /></a>
          <p class="left test-txt14">Lorem ipsum dolor sit amet</p>
          <p class="ari-txt14">consectetuer adipis cing elit.</p>
          <p  class="arialBitalic">Jane McMurty, Perth</p>
          </div>

          <div class="testimon marg-L10"> <a href="#"><img src="/sites/all/themes/pmi/images/test-ima2.jpg" alt="" width="48" height="50" border="0" class="test-ima" /></a>
          <p class="left test-txt14">Lorem ipsum dolor sit amet</p>
          <p class="ari-txt14">consectetuer adipiscing elit. Sed elit. <span class="arialBitalic">Charlie Quong, Vancouver</span></p>
          </div>


          <div class="testimon marg-L10"> <a href="/content/charlie-quong-vancouver-0"><img src="/sites/all/themes/pmi/images/test-ima3.png" alt="" width="48" height="50" border="0" class="test-ima" /></a>
          <p class="left test-txt14">Lorem ipsum dolor sit amet</p>
          <p class="ari-txt14">consectetuer adipiscing elit. Sed elit.</p>
          <p class="ari-txt14"> Nulla dolor! <span class="arialBitalic">Marnie Smith, Sydney</span></p>
          </div>-->

 <?php //$block = module_invoke('views','block','view', 'mytestimonial-block_1'); print_r($block['content']) ;
?>
<?php if ($sliderfront) {
   print $sliderfront;
            	}
?>

        </div>


     <!--http://192.168.1.225:8307/admin/build/block/configure/views/mytestimonial-block_1-->
      <div class="clear"></div>

  <!--banners of courses on the front page-->
   <?php $block = module_invoke('block','block','view',21); print $block['content'];   ?>


      <div class="clear"></div>
      </div>
      </div>
       <!--mid content end -->
     <div class="footer">
       		<div class="">

            <span class="left"><a href="/" class="gray-link"  style="color:#999">Home</a> |
	<a href="/content/about" class="gray-link">About Practice Mastery</a> |
	<a href="/sitemap" class="gray-link">Sitemap</a> |
	<a href="/contact-us" class="gray-link">Contact us</a> |
	<a href="/content/faq" class="gray-link">FAQs</a> |
	<a href="/content/policies" class="gray-link">Policies</a></span>

<span class="right">
	<a href="https://www.facebook.com/practicemastery"  TARGET="_blank" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image12','','/sites/all/themes/pmi/images/icon-f-h.png',1)">
	<img src="/sites/all/themes/pmi/images/icon-f.png" name="Image12" width="24" height="24" border="0" id="Image12" class="marg-L5" /></a>
	<a href="https://twitter.com/practicemastery"  TARGET="_blank" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image8','','/sites/all/themes/pmi/images/icon-t-h.png',1)">

	<img src="/sites/all/themes/pmi/images/icon-t.png" name="Image8" width="24" height="24" border="0" id="Image8" class="marg-L5" /></a>

	<a href="http://au.linkedin.com/pub/marcus-chacos/42/b2b/296"  TARGET="_blank" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image9','','/sites/all/themes/pmi/images/icon-in-h.png',1)">
	<img src="/sites/all/themes/pmi/images/icon-in.png" name="Image9" width="24" height="24" border="0" id="Image9" class="marg-L5" /></a>
	<a href="http://www.youtube.com/user/ThePracticeMastery"  TARGET="_blank" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image10','','/sites/all/themes/pmi/images/icon-youtube-h.png',0)">
		<img src="/sites/all/themes/pmi/images/icon-youtube.png" name="Image10" width="24" height="24" border="0" id="Image10" class="marg-L5" /></a>

<!--	<a href="#" onmouseout="MM_swapImgRestore()"  TARGET="_blank" onmouseover="MM_swapImage('Image11','','/sites/all/themes/pmi/images/icon-digg-h.png',1)">
	<img src="/sites/all/themes/pmi/images/icon-digg.png" name="Image11" width="24" height="24" border="0" id="Image11" class="marg-L5" /></a>-->
</span>
		</div>
            <div class="clear"></div>
           <div style="color:#999; font-size:11px;">&copy; <?php echo date("Y"); ?> Practice Mastery, All Rights Reserved </div>

            <div class="clear"></div>

      </div>
            <div class="clear"></div>
    </div>
    <!--container end here -->
  </div>
  <!--wrapper start here -->
</div>
<!--footer body end -->

<!-- /layout -->

  <?php print $closure ;?>
  </body>
</html>

