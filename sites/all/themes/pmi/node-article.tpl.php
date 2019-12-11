
<?php

$nodeids=arg(1);

// echo $nodeids;
$nhd=node_load($nodeids);
// print "<pre>";
// print_r($nhd);
// print "</pre>";
$dateblog=date('M d', $nhd->created);

?>


<div>
<div class="yeloBord marg-B20">
            <span class="yrCorn"></span>
            <span class="RhtArrow"></span>
            <div class="rss-icon2"><img width="16" height="16" alt=""
src="images/rss-icon.png"></div>
            <div class="pmi_art marg-B14">
            <p><span class="pmi">PMI</span><span class="featr">free</span><span
class="featrArt">article</span></p>
            </div>
            <label class="forTarget"></label>
	    <p class="pmiF_titl leftPad68 marg-B12"><?php echo
$nhd->field_heading_article['0']['value'] ; ?></p>



	    <p class="clear"></p>
	    <p class="left marg-left68 nutritalic">by <?php echo
$nhd->field_author_article[0][value]; ?></p><br/>
            <p class="txt-helv-14 leftPad68 padR85"> <?php echo $nhd->field_content_article['0']['value']; ?></p>
<?php
$block = module_invoke('addtoany', 'block', 'view', 0);
print $block['content'];

?>
<!--            <p>&nbsp;</p>-->
              <div class="addthis_toolbox addthis_default_style leftPad68 ">
<a class="addthis_button_facebook_like"
fb:like:layout="button_count"></a>&nbsp;&nbsp;
<a class="addthis_button_tweet"></a>





</div>
              <p>&nbsp;</p>
            </div>
<?php
if(!empty($nhd->field_about_author_article['0']['value']))
{
?>
<div class="auth-detail">
	<div >
		<p><strong>About the Author</strong>:<?php echo
$nhd->field_about_author_article['0']['value'] ; ?> </p>
	</div>
</div>

<?php }?>

  
</div>

          <div class="clear"></div>          
