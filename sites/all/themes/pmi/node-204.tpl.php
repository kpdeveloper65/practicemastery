<?php
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
    <?php print $content ?>

  </div>

  <div class="clear-block">
    <div class="meta">

    </div>
<!--banners of courses on the front page-->
   <div class="gray-bx ">
<p align="center" class="Neutratxt-24 marg-T30">Want $861 worth of practice building resources for FREE</p>
<p align="center" class="marg-T25">
<a href="/user/register" style="width: 135px;" class="signup-button"><span>Sign up now!</span></a></p>
</div>

  </div>

</div>
