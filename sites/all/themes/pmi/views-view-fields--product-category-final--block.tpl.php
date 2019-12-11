<?php
/*
 Formats the rows of the Product categories Block that appears on the shop pages
 */
$name = $row->term_data_name;
$link = strtolower(str_replace ( ' ', '-', $name ));
 ?>
<ul class="proName">
       <li><a href="/shop/<?php print $link; ?>"><?php print $name; ?></a></li>
</ul>