<?php
$dateblog=date('M d',strtotime($fields['created']->content));
$nodes=node_load($row->nid);
$bodytotal = trim($nodes->teaser);
// dpm($nodes->teaser);
$shortbody = substr($bodytotal,0,300);	
$count_shortbody=strlen($shortbody); //add read more for a certain no. of character


$dateblog=date('M d', $nodes->created);


// print "<pre>";
// print_r($nodes);
// print "</pre>";
?>





<div class="yeloBord marg-B20">
            <span class="yrCorn"></span>
            <div class="blg-dte">PMI Blog<br>
                  <span><?php echo $dateblog; ?></span></div>
              <div class="blogTitl marg-B14">
              <div class="rss-icon2"><?php
$block = module_invoke('aggregator', 'block', 'view', 'feed-1');
print $block['content'];
?></div>                
                <p class="left marg-left68 marg-T22"> <?php print $nodes->title; ?></p>
                <p class="clear"></p>
                <p class="left marg-left68 nutritalic">by <?php echo $nodes->field_author[0][value]; ?></p>
              </div>
              <p class="txt-helv-14 leftPad68"><?php echo strip_tags($shortbody) ; ?>&nbsp; <?php print l('Read more...', 'node/' . $nodes->nid, array('html' => TRUE, 'attributes' => array('class' => 'link-class')));?></p>
              <p>&nbsp;</p>
              <p class="leftPad68">

<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style leftPad68 ">
<!--
<iframe id="iframe_like" name="fbLikeIFrame_0" class="social-iframe" scrolling="no" frameborder="0" src="http://www.facebook.com/widgets/like.php?width=100&amp;show_faces=1&amp;layout=standard&amp;colorscheme=light&amp;href=<?php /*$curr_url = check_plain("http://" .$_SERVER['HTTP_HOST'] .$node_url); echo $curr_url;*/ ?>" width="100%" height="30"></iframe>-->

<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>&nbsp;&nbsp;
<a class="addthis_button_tweet"></a>

</div>
<!--<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4ee256f25ea8f08e"></script>-->
<!-- AddThis Button END -->


</p>
              <p>&nbsp;</p>
 </div>


