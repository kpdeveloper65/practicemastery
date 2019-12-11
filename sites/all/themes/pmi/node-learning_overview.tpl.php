<?php
/*print_r($node);*/
?>
<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?>">

<?php print $picture ?>

<?php if ($page == 0): ?>
  <h1><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h1>
<?php endif; ?>

  <?php if ($submitted): ?>
    <span class="submitted"><?php print $submitted; ?></span>
  <?php endif; ?>

  <div class="content clear-block">
  
  <?php print $node->field_lesson_intro[0]['view'] ?>
  <?php print $node->field_video[0]['view'] ?>
  <?php if ($node->field_manual[0]['view'] != '' OR $node->field_audio_lessons[0]['view'] != ''):?>
  <div class="lesson-rcol">
  <?php endif; ?>
    <?php if ($node->field_manual[0]['view'] != ''):?>
      <div class="lesson-manual">
      <a href="/<?php print $node->field_manual[0]['view'] ?>" ><img src="/sites/all/themes/pmi/images/supp_material.png" alt="" /><br />Download Manual</a>
      </div>
    <?php endif; ?>

    <?php if ($node->field_audio_lessons[0]['view'] != ''):?>
      <div class="lesson-mp3">
      <a href="/<?php print $node->field_audio_lessons[0]['view'] ?>" ><img src="/sites/all/themes/pmi/images/mp3.png" alt="" /><br />Download mp3</a>
      </div>
    <?php endif; ?>
  <?php if ($node->field_manual[0]['view'] != '' OR $node->field_audio_lessons[0]['view'] != ''):?>
  </div>
  <?php endif; ?>

  </div>

  <?php
    $view_name = 'nodehierarchy_children_list';
    $display_id = 'block_1';
    $arg = $node->nid;
    print views_embed_view($view_name, $display_id , $arg);
  ?>
  <div class="clear-block">
    <div class="meta">
    <!--<?php if ($taxonomy): ?>
      <div class="terms"><?php print $terms ?></div>
    <?php endif;?>-->
    </div>

    <?php if ($links): ?>
      <div class="links"><?php print $links; ?></div>
    <?php endif; ?>
  </div>

</div>
