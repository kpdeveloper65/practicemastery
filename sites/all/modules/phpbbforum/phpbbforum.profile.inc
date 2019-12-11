<?php
// $Id$
/**
 * @file
 * Drupal 6 profile module compatible functions
 * @copyright  Copyright (C) 2007-2011 Vadim G.B. (http://vgb.org.ru)
 */


function _phpbbforum_set_user_profile_data($op, $sync, &$account, $data = array(),
  $has_profile = true, $has_content_profile = false, $content_profile = null) {
  global $phpbb_config, $phpbb_user;

  if ($phpbb_config['allow_birthdays']) {
    $var = variable_get('phpbbforum_map_user_birthday', 'profile_birthday');
    $has_val = false;
    if ($has_profile && isset($account->{$var})) {
      $val = $account->{$var};
      $has_val = true;
    }
    elseif ($has_content_profile && isset($content_profile->{$var})) {
      $val = $content_profile->{$var}[0]['value'];
      if (isset($val)) {
        $has_val = true;
      }
    }
    if ($has_val) {
      $val2 = $phpbb_user->data['user_birthday'];
      // extract date. Expected format DD-MM-YYYY
      $yymmdd = explode('-', $val2);
      $year2 = (int) $yymmdd[2];
      $month2 = (int) $yymmdd[1];
      $day2 =  (int) $yymmdd[0];
      $val2 = sprintf('%02d-%02d-%04d', $day2, $month2, $year2);
      if (empty($year2) || $year2 == 1) {
        $date2zero = true;
      }
      else {
        $date2zero = false;
      }
      $date1zero = false;
      if (is_array($val)) {
        $dateform = true;
        // extract drupal date
        extract($val);
        $compare = ($day != $day2 || $month != $month2 || $year != $year2);
      }
      else {
        $dateform = false;
        if ($has_content_profile) {
          // extract date. Expected format YYYY-MM-DDT00:00:00
          $date_time = explode('T', $val);
          $yymmdd = explode('-', $date_time[0]);
          $year = (int) $yymmdd[0];
          $month = (int) $yymmdd[1];
          $day =  (int) $yymmdd[2];
          if (empty($year) || $year == 1) {
            $date1zero = true;
          }
          else {
            $date1zero = false;
          }
          $val = sprintf('%02d-%02d-%04d', $day, $month, $year);
        }
        $compare = ($val != $val2);
      }
      /*
       if (PHPBB_MODULE_DEBUG) {
       $message = $day.$month.$year.' == '.$day2.$month2.$year2;
       _phpbbforum_set_message($message);
       }
       */
      if ($compare) {
        if ($sync == PHPBB_SYNC_TO_PHPBB) {
          if (!$date1zero) {
            if ($dateform) {
              $val = sprintf('%02d-%02d-%04d', $day, $month, $year);
            }
            $data += array('user_birthday' => $val);
          }
        }
        elseif (!empty($val2) && !$date2zero) {
          if ($dateform) {
            $date2 = array(
              'day' => $day2,
              'month' => $month2,
              'year' => $year2,
            );
            /*
             if (PHPBB_MODULE_DEBUG) {
             $message = $day.$month.$year.' == '.$day2.$month2.$year2 .' data='. print_r($date2,true);
             _phpbbforum_set_message($message);
             }
             */
            $data += array($var => $date2);
          }
          else {
            if ($has_profile) {
              $data += array($var => $val2);
            }
            else {
              $val2 = sprintf('%04d-%02d-%02d', $year2, $month2, $day2) . 'T' . $date_time[1];
              $content_profile->{$var}[0]['value'] = $val2;
              $data['content_profile'] = true;
            }
          }
        }
      }
    }
  }

  $var = variable_get('phpbbforum_map_user_occ', 'profile_user_occ');
  $has_val = false;
  if ($has_profile && isset($account->{$var})) {
    $val = $account->{$var};
    $has_val = true;
  }
  elseif ($has_content_profile && isset($content_profile->{$var})) {
    $val = $content_profile->{$var}[0]['value'];
    if (isset($val)) {
      $has_val = true;
    }
  }
  if ($has_val) {
    $val2 = $phpbb_user->data['user_occ'];
    if ($val != $val2) {
      if ($sync == PHPBB_SYNC_TO_PHPBB) {
        $data += array('user_occ' => $val);
      }
      elseif (!empty($val2)) {
        if ($has_profile) {
          $data += array($var => $val2);
        }
        else {
          $content_profile->{$var}[0]['value'] = $val2;
          $data['content_profile'] = true;
        }
      }
    }
  }
  $var = variable_get('phpbbforum_map_user_interests', 'profile_user_interests');
  $has_val = false;
  if ($has_profile && isset($account->{$var})) {
    $val = $account->{$var};
    $has_val = true;
  }
  elseif ($has_content_profile && isset($content_profile->{$var})) {
    $val = $content_profile->{$var}[0]['value'];
    if (isset($val)) {
      $has_val = true;
    }
  }
  if ($has_val) {
    $val2 = $phpbb_user->data['user_interests'];
    if ($val != $val2) {
      if ($sync == PHPBB_SYNC_TO_PHPBB) {
        $data += array('user_interests' => $val);
      }
      elseif (!empty($val2)) {
        if ($has_profile) {
          $data += array($var => $val2);
        }
        else {
          $content_profile->{$var}[0]['value'] = $val2;
          $data['content_profile'] = true;
        }
      }
    }
  }

  $var = variable_get('phpbbforum_map_user_from', 'profile_user_from');
  $has_val = false;
  if ($has_profile && isset($account->{$var})) {
    $val = $account->{$var};
    $has_val = true;
  }
  elseif ($has_content_profile && isset($content_profile->{$var})) {
    $val = $content_profile->{$var}[0]['value'];
    if (isset($val)) {
      $has_val = true;
    }
  }
  if ($has_val) {
    $val2 = $phpbb_user->data['user_from'];
    if ($val != $val2) {
      if ($sync == PHPBB_SYNC_TO_PHPBB) {
        $data += array('user_from' => $val);
      }
      elseif (!empty($val2)) {
        if ($has_profile) {
          $data += array($var => $val2);
        }
        else {
          $content_profile->{$var}[0]['value'] = $val2;
          $data['content_profile'] = true;
        }
      }
    }
  }
  $var = variable_get('phpbbforum_map_user_icq', 'profile_user_icq');
  $has_val = false;
  if ($has_profile && isset($account->{$var})) {
    $val = $account->{$var};
    $has_val = true;
  }
  elseif ($has_content_profile && isset($content_profile->{$var})) {
    $val = $content_profile->{$var}[0]['value'];
    if (isset($val)) {
      $has_val = true;
    }
  }
  if ($has_val) {
    $val2 = $phpbb_user->data['user_icq'];
    if ($val != $val2) {
      if ($sync == PHPBB_SYNC_TO_PHPBB) {
        $data += array('user_icq' => $val);
      }
      elseif (!empty($val2)) {
        if ($has_profile) {
          $data += array($var => $val2);
        }
        else {
          $content_profile->{$var}[0]['value'] = $val2;
          $data['content_profile'] = true;
        }
      }
    }
  }
  $var = variable_get('phpbbforum_map_user_aim', 'profile_user_aim');
  $has_val = false;
  if ($has_profile && isset($account->{$var})) {
    $val = $account->{$var};
    $has_val = true;
  }
  elseif ($has_content_profile && isset($content_profile->{$var})) {
    $val = $content_profile->{$var}[0]['value'];
    if (isset($val)) {
      $has_val = true;
    }
  }
  if ($has_val) {
    $val2 = $phpbb_user->data['user_aim'];
    if ($val != $val2) {
      if ($sync == PHPBB_SYNC_TO_PHPBB) {
        $data += array('user_aim' => $val);
      }
      elseif (!empty($val2)) {
        if ($has_profile) {
          $data += array($var => $val2);
        }
        else {
          $content_profile->{$var}[0]['value'] = $val2;
          $data['content_profile'] = true;
        }
      }
    }
  }
  $var = variable_get('phpbbforum_map_user_yim', 'profile_user_yim');
  $has_val = false;
  if ($has_profile && isset($account->{$var})) {
    $val = $account->{$var};
    $has_val = true;
  }
  elseif ($has_content_profile && isset($content_profile->{$var})) {
    $val = $content_profile->{$var}[0]['value'];
    if (isset($val)) {
      $has_val = true;
    }
  }
  if ($has_val) {
    $val2 = $phpbb_user->data['user_yim'];
    if ($val != $val2) {
      if ($sync == PHPBB_SYNC_TO_PHPBB) {
        $data += array('user_yim' => $val);
      }
      elseif (!empty($val2)) {
        if ($has_profile) {
          $data += array($var => $val2);
        }
        else {
          $content_profile->{$var}[0]['value'] = $val2;
          $data['content_profile'] = true;
        }
      }
    }
  }
  $var = variable_get('phpbbforum_map_user_msnm', 'profile_user_msnm');
  $has_val = false;
  if ($has_profile && isset($account->{$var})) {
    $val = $account->{$var};
    $has_val = true;
  }
  elseif ($has_content_profile && isset($content_profile->{$var})) {
    $val = $content_profile->{$var}[0]['value'];
    if (isset($val)) {
      $has_val = true;
    }
  }
  if ($has_val) {
    $val2 = $phpbb_user->data['user_msnm'];
    if ($val != $val2) {
      if ($sync == PHPBB_SYNC_TO_PHPBB) {
        $data += array('user_msnm' => $val);
      }
      elseif (!empty($val2)) {
        if ($has_profile) {
          $data += array($var => $val2);
        }
        else {
          $content_profile->{$var}[0]['value'] = $val2;
          $data['content_profile'] = true;
        }
      }
    }
  }
  $var = variable_get('phpbbforum_map_user_jabber', 'profile_user_jabber');
  if (isset($account->{$var})) {
    $val = $account->{$var};
    $val2 = $phpbb_user->data['user_jabber'];
    if ($val != $val2) {
      if ($sync == PHPBB_SYNC_TO_PHPBB) {
        $data += array('user_jabber' => $val);
      }
      elseif (!empty($val2)) {
        if ($has_profile) {
          $data += array($var => $val2);
        }
        else {
          $content_profile->{$var}[0]['value'] = $val2;
          $data['content_profile'] = true;
        }
      }
    }
  }
  $var = variable_get('phpbbforum_map_user_website', 'profile_user_website');
  $has_val = false;
  if ($has_profile && isset($account->{$var})) {
    $val = $account->{$var};
    $has_val = true;
  }
  elseif ($has_content_profile && isset($content_profile->{$var})) {
    if (module_exists('link')) {
      $val = $content_profile->{$var}[0]['url'];
    }
    else {
      $val = $content_profile->{$var}[0]['value'];
    }
    if (isset($val)) {
      $has_val = true;
    }
  }
  if ($has_val) {
    $val2 = $phpbb_user->data['user_website'];
    if ($val != $val2) {
      if ($sync == PHPBB_SYNC_TO_PHPBB) {
        $data += array('user_website' => $val);
      }
      elseif (!empty($val2)) {
        if ($has_profile) {
          $data += array($var => $val2);
        }
        else {
          if (module_exists('link')) {
            $content_profile->{$var}[0]['url'] = $val2;
          }
          else {
            $content_profile->{$var}[0]['value'] = $val2;
          }
          $data['content_profile'] = true;
        }
      }
    }
  }

  $var = variable_get('phpbbforum_map_user_gender', 'profile_gender');
  $has_val = false;
  if ($has_profile && isset($account->{$var})) {
    $val = $account->{$var};
    $has_val = true;
  }
  elseif ($has_content_profile && isset($content_profile->{$var})) {
    $val = $content_profile->{$var}[0]['value'];
    if (isset($val)) {
      $has_val = true;
    }
  }
  if ($has_val) {
    if (isset($phpbb_user->data['user_gender'])) {
      if ($val == t('Male')) {
        $val = '1';
      }
      elseif ($val == t('Female')) {
        $val = '2';
      }
      else {
        $val = '';
      }
      $val2 = $phpbb_user->data['user_gender'];
      if ($val != $val2) {
        if ($sync == PHPBB_SYNC_TO_PHPBB) {
          if ($val == '1' || $val == '2' || $val == '') {
            $data += array('user_gender' => $val);
          }
        }
        elseif (!empty($val2)) {
          if ($val2 == '1') {
            $val2 = t('Male');
          }
          elseif ($val2 == '2') {
            $val2 = t('Female');
          }
          else {
            $val2 = '';
          }

          if ($has_profile) {
            $data += array($var => $val2);
          }
          else {
            $content_profile->{$var}[0]['value'] = $val2;
            $data['content_profile'] = true;
          }

        }
      }
    }
    else {
      $phpbb_user->get_profile_fields($phpbb_user->data['user_id']);
      if (isset($phpbb_user->profile_fields['pf_gender'])) {
        if ($val == t('Male')) {
          $val = '2';
        }
        elseif ($val == t('Female')) {
          $val = '3';
        }
        else {
          $val = '1';
        }
        $val2 = $phpbb_user->profile_fields['pf_gender'];
        if ($val != $val2) {
          if ($sync == PHPBB_SYNC_TO_PHPBB) {
            if ($val == '1' || $val == '2' || $val == '3') {
              $data += array('pf_gender' => $val);
              $phpbb_user->profile_fields['pf_gender'] = $val;
            }
          }
          else { //if (!empty($val2)) {
            if ($val2 == '2') {
              $val2 = t('Male');
            }
            elseif ($val2 == '3') {
              $val2 = t('Female');
            }
            else {
              $val2 = '';
            }
            if ($has_profile) {
              $data += array($var => $val2);
            }
            else {
              $content_profile->{$var}[0]['value'] = $val2;
              $data['content_profile'] = true;
            }
          }
        }
      }
    }
  }

  // custom profile fields
  $phpbb_user->get_profile_fields($phpbb_user->data['user_id']);
  foreach ($phpbb_user->profile_fields as $pf_name => $val2) {
    if ($pf_name != 'user_id' && $pf_name != 'pf_gender') {
      $name = substr($pf_name, 3);
      $var = variable_get('phpbbforum_map_' . $name, 'profile_' . $name);
      $has_val = false;
      if ($has_profile && isset($account->{$var})) { // #1039300 reverted
        $val = $account->{$var};
        $has_val = true;
      }
      elseif ($has_content_profile && isset($content_profile->{$var})) {
        $val = $content_profile->{$var}[0]['value'];
        if (isset($val)) {
          $has_val = true;
        }
      }
      if ($has_val) {
        //$val2 = $phpbb_user->profile_fields[$pf_name];
        if ($val != $val2) {
          if ($sync == PHPBB_SYNC_TO_PHPBB) {
            $data += array($pf_name => $val);
            $phpbb_user->profile_fields[$pf_name] = $val;
          }
          elseif (!empty($val2)) {
            if ($has_profile) {
              $data += array($var => $val2);
            }
            else {
              $content_profile->{$var}[0]['value'] = $val2;
              $data['content_profile'] = true;
            }
          }
        }
      }
    }
  }

  return $data;
}

function _phpbbforum_profile_save_profile(&$edit, $data0, &$user, $category, $register = FALSE) {
  $result = _profile_get_fields($category, $register);
  while ($field = db_fetch_object($result)) {
    if (isset($data0[$field->name])) {
      //if (PHPBB_MODULE_DEBUG)
      //drupal_set_message('PHPBB profile field0='. $edit[$field->name]);
      if (_profile_field_serialize($field->type)) {
        $edit[$field->name] = serialize($edit[$field->name]);
      }
      else {
        $edit[$field->name] = '';
        $user->{$field->name} = '';
      }
      db_query("DELETE FROM {profile_values} WHERE fid = %d AND uid = %d", $field->fid, $user->uid);
      db_query("INSERT INTO {profile_values} (fid, uid, value) VALUES (%d, %d, '%s')", $field->fid, $user->uid, $edit[$field->name]);
      // Mark field as handled (prevents saving to user->data).
      $edit[$field->name] = NULL;
    }
  }
}

function _phpbbforum_profile_save_profile_data0($profile_data, &$account) {
  $data0 = array();
  foreach ($profile_data as $key => $value) {
    if (empty($value)) {
      $data0[$key] = 0;
      //unset($profile_data[$key]);
    }
  }
  if (count($data0) != 0) {
    foreach (profile_categories() as $pc) {
      _phpbbforum_profile_save_profile($profile_data, $data0, $account, $pc['name']);
    }
  }
  return $profile_data;
}
