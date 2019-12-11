<?php
// $Id: phpbbforum.theme.custom-sample.inc,v 1.3 2011/02/13 14:05:55 vb Exp $
/**
 * @file
 * @copyright  Copyright (C) 2007-2011 Vadim G.B. (http://vgb.org.ru)
 */

////////////////////////////////////////////////////////////////////////////////
// See examples of code in file phpbbforum.theme.inc
////////////////////////////////////////////////////////////////////////////////

/*
 * example_embed or example-embed
 */

function phpbbforum_set_style_example_embed($phpbb_theme_path) {

  // edit your code here

  //_phpbbforum_set_theme_css($phpbb_theme_path, 'example');

  /*
   // uncomment if your theme from prosilver
   phpbbforum_set_style_prosilver($phpbb_theme_path);
   */

  /*
   // uncomment if your theme from subsilver2
   phpbbforum_set_style_subsilver2($phpbb_theme_path);
   */
}

function phpbbforum_style_example_embed($phpbb_theme_path, $output) {

  // edit your code here

  phpbbforum_set_style_example_embed($phpbb_theme_path);

  /*
   // uncomment if your theme from prosilver
   $endpos = _phpbbforum_set_head_script_prosilver(0, $output);
   $endpos = _phpbbforum_set_head_links_prosilver($endpos, $output);
   */

  /*
   // uncomment if your theme from subsilver2
   $endpos = _phpbbforum_set_head_links_subsilver2(0, $output);
   $endpos = _phpbbforum_set_head_script_subsilver2($endpos, $output);
   */

  $output = _phpbbforum_get_html_body($endpos, $output);

  return $output;
}
