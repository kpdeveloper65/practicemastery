
<?php

// alternative way to get nid
// if ($node = menu_get_object()) {
//  $nid = $node->nid;
// echo $nid;

// }





/*
echo $view->result[$id]->nid;*/
/*
$vnids=node_load($view->result[$id]->nid);
print "<pre>";
print_r($vnids);
print "</pre>";*/


$terms=arg(2);

$categry=db_result(db_query("SELECT nid FROM {term_node} where 
tid=%d",$terms));
$nodeids=arg(1);
// echo $nodeids;
if(!empty($categry))
{
$nhd=node_load($categry);

}
else{
$nhd=node_load($nodeids);
}

// print "<pre>";
// print_r($nhd);
// print "</pre>";
$dateblog=date('M d', $nhd->created);

?>
<!--<div class="blog-bx618 padd-R5" style="position: relative;">

<div class="rss-icon"><img width="16" height="16" alt=""
src="images/rss-icon.png"></div>

<div class="blog-top-bx marg-B20">


	  <div style="top: 0pt;" class="blg-dte">PMI Blog<br><span><?php /*echo
$dateblog;*/ ?></span></div><p class="left marg-left68 marg-T22"><?php /*echo
$nhd->title;*/ ?></p>
          <p class="clear"></p>
          <p class="left marg-left68 nutritalic">by &nbsp; <?php /*echo
$nhd->name;*/ ?></p>
          
          </div>

<p class="txt-helv-14 marg-L18"> <?php/* echo $nhd->body;*/ ?></p>

     
</div>-->



<!-- test -->


      <div>

          <div class="clear"></div>
        </div>
 		 <div class="clear"></div>
          <div class="">
      
          <div style="position: relative;" class="blog-bx618 padd-R5"><div
class="rss-icon"><img width="16" height="16" alt=""
src="/sites/all/themes/pmi/images/rss-icon.png"> 
<?php
//MUST ENABLE IT TO BRING ORIGINAL rss FEED ----------------IMPORTANT
//  $block = module_invoke('node','block','view', 0);
//  print_r($block['content']) ;

?></div>
          <div class="blog-top-bx marg-B20"><div style="top: 0pt;"
class="blg-dte">PMI Blog<br><span><?php echo $dateblog; ?></span></div><p
class="left marg-left68 marg-T22"><?php echo $nhd->title; ?></p>
          <p class="clear"></p>
          <p class="left marg-left68 nutritalic">by <?php echo
$nhd->field_author[0][value]; ?></p>
          
          </div>
         <span class="right  nutritalic">

    <?php if(!empty($nhd->field_images[0][filepath])){  ?>

<img width="118" height="150" class="right marg-L10" alt="" src="/<?php echo
$nhd->field_images[0][filepath] ; ?>">


<?php  } ?>

<p class="clear"></p><p align="right" class="marg-L20 marg-R7 line-h16">knowing
your clients<br> really matters</p></span>
		 <p class="txt-helv-14 marg-L18"> <?php echo
$nhd->body; ?> </p>

          <p>&nbsp;</p>


<p class="txt-helv-14 marg-L18">&nbsp;</p>
<div class="left marg-B6 marg-T10 marg-L18">


<!-- code added by chenna -->
<?php 
// echo "test";
// $block1 = module_invoke('addthis', 'block', 'view', 0);
// print $block1['content'];
// echo "<br>testing";
$block = module_invoke('addtoany', 'block', 'view', 0);
print $block['content'];
// if (page != 0){
//   print '<div class="facebook-like"><iframe
// src="http://www.facebook.com/plugins/like.php?href=' . $_SERVER['HTTP_HOST'] .
// request_uri() .
// '&amp;layout=standard&amp;show_faces=false&amp;width=400&amp;action=like&amp;
// font=arial&amp;colorscheme=light&amp;height=35" scrolling="no" frameborder="0"
// style="border:none; overflow:hidden; width:400px; height:35px;"
// allowTransparency="true"></iframe></div>';
// }

?>


<!--<div>
<a
href="http://www.facebook.com/sharer.php?u=http://www.practicemastery.com<?php
print $node_url; ?>" target="_blank" rel="nofollow"><img src="<?php global
$base_url; echo $base_url.'/'.$directory.'/'; ?>/images/facebook.png"
alt="facebook"></a> 
<a href="http://twitter.com/home?status=<?php print $title ?>
http://www.domain.com<?php print $node_url; ?>" target="_blank"
rel="nofollow"><img src="<?php global $base_url; echo
$base_url.'/'.$directory.'/'; ?>/images/twitter.png" alt="twitter"></a>
</div>-->



<!--<div class="social-buttons">
<iframe src="http://www.facebook.com/plugins/like.php?href=<?php $curr_url =
check_plain("http://" .$_SERVER['HTTP_HOST'] .$node_url); echo $curr_url;
?>&amp;layout=button_count&amp;show_faces=false&amp;width=200&amp;action=like&
amp;font=verdana&amp;colorscheme=light&amp;height=21" scrolling="no"
frameborder="0" style="border:none; overflow:hidden; width:200px; height:21px;"
allowTransparency="true"></iframe>
<a href="http://twitter.com/share" class="twitter-share-button"
data-count="horizontal" data-url="<?php $curr_url = check_plain("http://"
.$_SERVER['HTTP_HOST'] .$node_url); echo $curr_url; ?>" data-text="<?php echo
$title; ?>" data-via="practicemastery">Tweet</a><script type="text/javascript"
src="http://platform.twitter.com/widgets.js"></script>-->
</div>
<!-- code added by chenna -->
<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style leftPad68 ">
<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
<a class="addthis_button_tweet"></a>

</div>




</div>
          </div>
          </div>
             <div class="clear"></div>
          <div class="clear"></div>
      	  <div class=" padd-T35">
      	    <div class="clear"></div>
            <div class="clear"></div>
            </div>
            
      <div class="clear"></div>
     
