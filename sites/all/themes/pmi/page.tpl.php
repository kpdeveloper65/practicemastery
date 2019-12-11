<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
<head>
  <?php print $head ?>
	<title><?php print $head_title ?></title>
	<?php print $styles ?>
	<?php print $scripts ?>

  <!--<meta http-equiv="X-UA-Compatible" value="IE=9">-->
  <!--[if IE 6]>
  <script src="/sites/all/themes/pmi/js/DD_belatedPNG.js"></script>
  <![endif]-->
	<!--[if lt IE 7]>
	<?php print phptemplate_get_ie_styles(); ?>
	<![endif]-->
	<!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />-->
	
	<!--<style type="text/css" media="all">@import "<?php //print base_path() . path_to_theme() ?>/user_bar.css";</style>-->



<script src="/sites/all/themes/pmi/js/swfobject_modified.js" type="text/javascript"></script>

	<!--Dropdow menu JS start -->
	<script type="text/javascript">
	$(document).ready(function() {

	$("ul#topnav li").hover(function() { //Hover over event on list item
		$(this).css({ 'background' : 'url(images/nav_dvder.png) repeat-x'}); //Add background color + image on hovered list item
		$(this).find("span").show(); //Show the subnav
	} , function() { //on hover out...
		$(this).css({ 'background' : 'none'}); //Ditch the background
		$(this).find("span").hide(); //Hide the subnav
	});

	});
	</script>
<!--	<a id="atbutton"></a>
	<script type="text/javascript">
	addthis.button("#atbutton");
	</script>-->
	<!--Dropdow menu JS end -->

	<!-- Checkbox JS start and show hide menu-->
	<script type="text/javascript" src="/sites/all/themes/pmi/js/check-box.js"></script>


<!-- Checkbox JS END -->
<!--Slideshow JS -->

<!--<script type="text/javascript" src="slider/slide-show.js"></script>-->
<!--<link href="/sites/all/themes/pmi/slider/slide-show.css" rel="stylesheet" type="text/css" />-->
<!--Slideshow JS -->

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
  </head>
  <body <?php print phptemplate_body_attributes($is_front, $layout); ?> onload="MM_preloadImages('/sites/all/themes/pmi/images/icon-f-h.png','/sites/all/themes/pmi/images/icon-t-h.png','/sites/all/themes/pmi/images/icon-in-h.png','/sites/all/themes/pmi/images/icon-digg-h.png','/sites/all/themes/pmi/images/twiter-h.png')">


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

<div class="top-nav">

       <a href="/cart" class="right shop-cart underline">Shopping cart</a>



     			<?php if ($user->uid > 0){
        print l('My Account','user/'.$user->uid);
        print l("logout ","logout");
			}
      else {
        print '<a href="/user/register" class="blktxt">Signup</a>
            <a href="/user" class="blktxt">Login</a>';
        //<a class="blktxt" href = "javascript:void(0)" onclick = "javascript:popup(1);">Login</a>';
			}
      ?>
      <!--welcome end here-->




                <!--<div class="login_bx" id="login_bx" >
     		<input name="" type="text" class="login-inpt marg_T4 marg-L6" value="username" />
     		<input name="" type="text" class="login-inpt marg_T4 marg-L6" value="password" />
     		<span class="right marg-T7"><span class="marg-L6 marg-R14 right"><input name="go" type="button" value="go" class="btn-go" onclick="document.getElementById('login_bx').style.display='none'"  /></span><a href="#" class="right">forgot password?</a></span>

     		<div class="clear"></div>
     		</div>-->
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

           <!--header end -->



          <!--here is code for the left sidebar in the pages of pmi. -->
     <div class="cont-bg padd-T58 marg-T48IE6">

	<?php if (!empty($header)): ?>
	<?php print $header; ?>
	<?php endif; ?>



<?php
			if($left && $right):
				$style = "width:451px; margin-left:250px;";
			elseif($left):
				$style = "width:682px; margin-left:250px;";
			elseif($right):
				$style = "width:682px; margin-right: 232px;";
			else:
				$style = "width: 948px;";
			endif;
		?>








	<?php if (!empty($left)): $style = "margin-left:980px;";?>
	<div id="sidebar-left" >
		<?php print $left; ?>
	</div> <!-- /sidebar-left -->
	<?php endif; ?>


      <?php if (!empty($right)):?>
        <div id="sidebar-right" class="right">
          <?php print $right; ?>
        </div> <!-- /sidebar-right -->
      <?php endif; ?>


  <div id = "center">
<?php

if ($title){
    print '<h1 class="title">'. $title .'</h1>';
  }
 ?>
	<?php print  $breadcrumb;?>

	 <?php if ($mission): print '<div id="mission">'. $mission .'</div>'; endif; ?>
          <?php if ($tabs){ print '<div id="tabs-wrapper" class="clear-block">';} /*else{*/ 


?>

          <?php if ($tabs): print '<ul class="tabs primary">'. $tabs .'</ul></div>'; endif; ?>
          <?php if ($tabs2): print '<ul class="tabs secondary">'. $tabs2 .'</ul>'; endif; ?>
          <?php if ($show_messages && $messages): print $messages; endif; ?>
          <?php print $help; ?>

<?php print $content ?>

<!--<div class="comntBox">
            <span class="right">You must <a href="/user/login">Login</a> to leave comment</span>
            <h3>Leave Comment</h3>
	    <div class="clear">&nbsp;</div>
</div>-->



        	<!--rightsidebar starts here-->
	<div class="clear"></div>
		</div>
	<div class="blog310 marg-L46">
	</div>

        <div class="clear"></div>
				<div class="clear"></div>
				<div class="clear"></div>
				</div>


<div class="clear"></div>

   <div class="footer">
       		<div class="">
            <span class="left"><a href="/" class="gray-link">Home</a> |
	<a href="/about" class="gray-link">About Practice Mastery</a> |
	<a href="/sitemap" class="gray-link">Sitemap</a> |
	<a href="/contact-us" class="gray-link">Contact us</a> |
	<a href="/faq" class="gray-link">FAQs</a> |
	<a href="/policies" class="gray-link">Policies</a></span>

	<span class="right">
		<a href="https://www.facebook.com/practicemastery"  TARGET="_blank" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image12','','/sites/all/themes/pmi/images/icon-f-h.png',1)">
		<img src="/sites/all/themes/pmi/images/icon-f.png" name="Image12" width="24" height="24" border="0" id="Image12" class="marg-L5" /></a>
		<a href="https://twitter.com/#!/practicemastery"  TARGET="_blank" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image8','','/sites/all/themes/pmi/images/icon-t-h.png',1)">

		<img src="/sites/all/themes/pmi/images/icon-t.png" name="Image8" width="24" height="24" border="0" id="Image8" class="marg-L5" /></a>

		<a href="http://au.linkedin.com/pub/marcus-chacos/42/b2b/296"  TARGET="_blank" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image9','','/sites/all/themes/pmi/images/icon-in-h.png',1)">
		<img src="/sites/all/themes/pmi/images/icon-in.png" name="Image9" width="24" height="24" border="0" id="Image9" class="marg-L5" /></a>
		<a href="http://www.youtube.com/user/ThePracticeMastery"  TARGET="_blank" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image10','','/sites/all/themes/pmi/images/icon-youtube-h.png',0)">
		<img src="/sites/all/themes/pmi/images/icon-youtube.png" name="Image10" width="24" height="24" border="0" id="Image10" class="marg-L5" /></a>
	</span>

	</div>
            <div class="clear"></div>
            <div style="color:#999; font-size:11px;">&copy; <?php echo date("Y");?> Practice Mastery, All Rights Reserved </div>

            <div class="clear"></div>

      </div>
        </div>
            <div class="clear"></div>
  	</div>
      	  <div class=" padd-T35">
         <p class="txt-helv-14">&nbsp;</p></div>

      <div class="clear"></div>
       <!--container end here -->
  </div>
  <!--wrapper start here -->
   </div>

  <?php print $closure ?>
  </body>
</html>
