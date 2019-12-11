<?php

// $Id: autoresponder.theme.inc,v 1.1.2.2 2010/02/22 21:31:40 cyberpunk Exp $

function theme_autoresponder_set_list_form($form) {
 $header = array(
    '',
    array('data' => t('Name')),
    array('data' => t('Functions'), 'colspan' => 5)
    );
 if ($form['checks'])
   foreach ($form['checks'] AS $key => $value) {
     if (is_int($key)) {
       $form['checks'][$key]['#description'] = "";
       $row = explode('%%%', $value['#description']);
       $row[0] = drupal_render($form['checks'][$key]);
       $class = array_pop($row);
       $rows[] = array(
         'data' => $row,
         'class' => $class
       );
     }
 }
 if (!$form['no_sets'])
   $output = theme('table', $header, $rows);
 $output .= '<br />'.drupal_render($form);
 return $output;
}

function theme_autoresponder_mail_list_form($form) {
 $header = array(
   '',
   array('data' => t('Subject')),
   array('data' => t('Day #')),
   array('data' => t('Set')),
   array('data' => t('Functions'), 'colspan' => 2)
 );
 if ($form['checks'])
   foreach ($form['checks'] AS $key => $value) {
     if (is_int($key)) {
       $form['checks'][$key]['#description'] = "";
       $row = explode('%%%', $value['#description']);
       $row[0] = drupal_render($form['checks'][$key]);
       $class = array_pop($row);
       $rows[] = array(
         'data' => $row,
         'class' => $class
       );
     }
   }
 if (!$form['no_messages'])
   $output = theme('table', $header, $rows);
 $output .= "<br />".drupal_render($form);
 return $output;
}

function theme_autoresponder_user_list_form($form) {
  $output = '';
  $header = array(
    '',
    array('data' => t('E-mail')),
    array('data' => t('Register date')),
    array('data' => t('Now On Day #')),
    array('data' => t('Functions'), 'colspan' => 3)
  );
  if ($form['checks'])
    foreach ($form['checks'] AS $key => $value) {
      if (is_int($key)) {
        $form['checks'][$key]['#description'] = "";
        $row = explode('%%%', $value['#description']);
        $row[0] = drupal_render($form['checks'][$key]);
        $class = array_pop($row);
        $rows[] = array(
          'data' => $row,
          'class' => $class
        );
      }
    }
  if (!$form['no_users']) {
   if ($form['sname'])
     $output .= t('Users of').' <b>'.$form['sname']['#value'].':</b>';

   $output .= theme('table', $header, $rows);
  }  
  $output .= '<br />'.drupal_render($form);
  return $output;
}

