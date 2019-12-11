<?php

$dateblog=date('M d',strtotime($fields['created']->content));
$nodes=node_load($row->nid);
$bodytotal = trim($nodes->field_content_article[0][value]);
$shortbody = substr($bodytotal,0,300);	
$count_shortbody=strlen($shortbody); //add read more for a certain no. of character


$datearticle=date('M d', $nodes->created);


// print "<pre>";
// print_r($nodes);
// print "</pre>";

?>




<div class="yeloBord marg-B20">
            <span class="yrCorn"></span> 
            <span class="RhtArrow"></span>
            <div class="rss-icon2"><img height="16" width="16" src="/sites/all/themes/pmi/images/rss-icon.png" alt=""></div>
            <div class="pmi_art marg-B14">
            <p><span class="pmi">PMI</span><span class="featr">feature</span><span class="featrArt">article</span></p>
            </div>
            <label class="forTarget"></label>
          <p class="pmiF_titl leftPad68 "><?php echo $nodes->field_heading_article[0][value]; ?></p><br>

	    <p class="left marg-left68 nutritalic"> by&nbsp;<?php echo $nodes->field_author_article[0][value]; ?> </p>
  <p class="left marg-left68 nutritalic">Posted On:<?php echo $datearticle ; ?> </p><br>
	               <p>&nbsp;</p>
            <p class="txt-helv-14 leftPad68 padR85"><?php echo strip_tags($shortbody); ?>&nbsp;<?php print l('Read more...', 'node/' . $nodes->nid, array('html' => TRUE, 'attributes' => array('class' => 'link-class')));?></p>
            <p>&nbsp;</p>
  

<p>&nbsp;</p>

 
<div class="addthis_toolbox addthis_default_style leftPad68 ">

<a fb:like:layout="button_count" class="addthis_button_facebook_like" id="382"></a>&nbsp;&nbsp;
<a class="addthis_button_tweet" id="tweet_382"></a>

</div>
<div class="atclear"></div>



              <p>&nbsp;</p>
            </div>