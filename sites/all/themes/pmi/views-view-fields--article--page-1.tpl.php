
<?php
//IMPORTANT
// print "<pre>";
// print_r($row);
// print "</pre>";
$dateblog=date('M d', $row->node_created);

$shortbody = substr( $row->node_data_field_heading_article_field_content_article_value,0,300);	

?>



<div class="yeloBord marg-B20">
            <span class="yrCorn"></span> 
            <span class="RhtArrow"></span>
            <div class="rss-icon2"><img height="16" width="16" alt="" src="/sites/all/themes/pmi/images/rss-icon.png"></div>
            <div class="pmi_art marg-B14">
            <p><span class="pmi">PMI</span><span class="featr">feature</span><span class="featrArt">article</span></p>
            </div>
            <label class="forTarget"></label>
          <p class="pmiF_titl leftPad68 "><?php print $row->node_data_field_heading_article_field_heading_article_value ;?></p><br>

	    <p class="left marg-left68 nutritalic">by  <?php echo $row->node_data_field_heading_article_field_author_article_value; ?></p>
  <p class="left marg-left68 nutritalic">Posted On:<?php  print $dateblog ; ?></p><br>
	               <p>&nbsp;</p>
            
            <?php if ($fields['field_content_article_value']): ?>
              <p class="txt-helv-14 leftPad68 padR85"><?php print $fields['field_content_article_value']->content; ?> <?php print $fields['view_node']->content; ?></p>
            <?php endif ?>
            
            <p>&nbsp;</p>
  

<?php if(!empty( $row->node_data_field_heading_article_field_about_author_article_value))  {  ?>
  <p class="pmiF_titl leftPad68 marg-B12">About The Author</p>

<p class="txt-helv-14 leftPad68 padR85">
<?php echo  $row->node_data_field_heading_article_field_about_author_article_value;   ?><br>
</p>

<?php   } ?>
<p>&nbsp;</p>

          <!-- AddThis Button BEGIN -->
<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style leftPad68 ">

<a id="<?php echo $row->nid; ?>" class="addthis_button_facebook_like" fb:like:layout="button_count"></a>&nbsp;&nbsp;
<a id="tweet_<?php echo $row->nid; ?>" class="addthis_button_tweet"></a>

</div>
<div class="atclear"></div>



              <p>&nbsp;</p>
            </div>