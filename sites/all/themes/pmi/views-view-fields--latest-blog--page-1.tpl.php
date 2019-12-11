

<?php /*print $fields['some_id']->content;*/ ?>


<?php
/**
 * @file views-view-fields.tpl.php
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->separator: an optional separator that may appear before a field.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>
<?php

// echo $row->nid;
// print "<pre>";
// print_r($row);
// print "</pre>";
// 
// echo $dateblog;
// print $fields['title']->content; 
// echo $fields['name']->content;
// echo $shortbody ;
// echo $fields['field_images_fid']->content; 


$dateblog=date('M d',strtotime($fields['created']->content));
$nodes=node_load($row->nid);
// $bodytotal = trim($nodes->teaser);
// $shortbody = substr($bodytotal,0,1500);	
/*$count_shortbody=strlen($shortbody);*/ //add read more for a certain no. of character

$bodytotal = explode(' ', $nodes->body);
$short = implode(' ', array_slice($bodytotal, 0, 50));


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
              <div class="rss-icon"><img width="16" height="16" src="/sites/all/themes/pmi/images/rss-icon.png" alt=""><?php
$block = module_invoke('aggregator', 'block', 'view', 'feed-1');
print $block['content'];
?></div>                
                <p class="left marg-left68 marg-T22"> <?php print $fields['title']->content; ?></p>
                <p class="clear"></p>
                <p class="left marg-left68 nutritalic">by <?php echo $fields ['field_author_value'] ->content; ?></p>
              </div>
              <?php if ($fields['body']): ?>
                <p class="txt-helv-14 leftPad68">
                <?php print $fields['body']->content; ?> <?php print $fields['view_node']->content; ?>
                </p>
              <?php endif ?>
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








