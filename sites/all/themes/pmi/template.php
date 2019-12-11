<?php

/**
* Sets the body tag class and id attributes.
*
* From the Theme Developer's Guide, http://drupal.org/node/32077
*
* @param $is_front
*   boolean Whether or not the current page is the front page.
* @param $layout
*   string Which sidebars are being displayed.
* @return
*   string The rendered id and class attributes.
*/
function phptemplate_body_attributes($is_front = false, $layout = 'none') {

  if ($is_front) {
    $body_id = $body_class = 'homepage';
  }
  else {
    // Remove base path and any query string.
    global $base_path;
    list(,$path) = explode($base_path, $_SERVER['REQUEST_URI'], 2);
    list($path,) = explode('?', $path, 2);
    $path = rtrim($path, '/');
    // Construct the id name from the path, replacing slashes with dashes.
    $body_id = str_replace('/', '-', $path);
    // Construct the class name from the first part of the path only.
    list($body_class,) = explode('/', $path, 2);
  }
  $body_id = filter_xss('page-'. $body_id);
  $body_class = filter_xss('section-'. $body_class);

  // Use the same sidebar classes as Garland.
  $sidebar_class = ($layout == 'both') ? 'sidebars' : "sidebar-$layout";

  return " id=\"$body_id\" class=\"$body_class $sidebar_class\"";
}


/**
 * Return a themed breadcrumb trail.
 *
 * @param $breadcrumb
 *   An array containing the breadcrumb links.
 * @return a string containing the breadcrumb output.
 */
function phptemplate_breadcrumb($breadcrumb) {
  if (!empty($breadcrumb)) {
    //return '<div class="breadcrumb">'. implode(' › ', $breadcrumb) .'</div>';
  }
}




/**
 * Override or insert PHPTemplate variables into the templates.
 */
function pmi_preprocess_page(&$vars) {

  // redirect /home to front page with 301
  if ($_SERVER["REQUEST_URI"] == '/home') {
    drupal_goto('', NULL, NULL, 301);
  }

  $vars['tabs2'] = menu_secondary_local_tasks();

  // Hook into color.module
  /*if (module_exists('color')) {
    _color_page_alter($vars);
  }*/

/*if (arg(0) == "user") {
  $vars['title'] = 'Learning Portal';
}*/


if ($_GET['q'] == 'node/add/survey') {
  $vars['title'] = 'Find the course that’s right for you.';
}

// Add per content type pages
if (isset($vars['node'])) {
// Add template naming suggestion. It should alway use hyphens.
// If node type is "custom_news", it will pickup "page-custom-news.tpl.php".
$vars['template_files'][] = 'page-'. str_replace('_', '-', $vars['node']->type);
}
//used for feed icon
// Store comments and the comment form in variables

/* $vars['comments'] = $vars['comment_form'] = '';
  if (module_exists('comment') && isset($vars['node'])) {
    $vars['comments'] = comment_render($vars['node']);
    $vars['comment_form'] = drupal_get_form('comment_form',
    array('nid' => $vars['node']->nid));
  }*/



}

/*
 *
 * Add a "Comments" heading above comments except on forum pages.
 */
function pmi_preprocess_comment_wrapper(&$vars) {
  if ($vars['content'] && $vars['node']->type != 'forum') {
    $vars['content'] = '<h2 class="comments">'. t('Comments') .'</h2>'.  $vars['content'];
  }
}

/**
 * Returns the rendered local tasks. The default implementation renders
 * them as tabs. Overridden to split the secondary tasks.
 *
 * @ingroup themeable
 */
function phptemplate_menu_local_tasks() {
  return menu_primary_local_tasks();
}

/**
 * Returns the themed submitted-by string for the comment.
 */
function phptemplate_comment_submitted($comment) {
  return t('!datetime — !username',
    array(
      '!username' => theme('username', $comment),
      '!datetime' => format_date($comment->timestamp)
    ));
}

/**
 * Returns the themed submitted-by string for the node.
 */
function phptemplate_node_submitted($node) {
  return t('!datetime — !username',
    array(
      '!username' => theme('username', $node),
      '!datetime' => format_date($node->created),
    ));
}

/**
 * Generates IE CSS links for LTR and RTL languages.
 */
function phptemplate_get_ie_styles() {
  global $language;

  $iecss = '<link type="text/css" rel="stylesheet" media="all" href="'. base_path() . path_to_theme() .'/fix-ie.css" />';

  return $iecss;
}

function pmi_theme(&$existing, $type, $theme, $path) {
    return array(
        'user_login_block' => array(
		'arguments' => array('form' => NULL),
        )
	);
}


function pmi_user_login_block(&$form) {
  global $theme;

  $items = array();

  $form['name']['#title'] = t(''); //wrap any text in a t function
  $form['pass']['#title'] = t('');

  //unset($form['remember_me']);

  unset($form['name']['#size']);

  $form['name']['#attributes'] = '';
  $form['name']['#attributes'] = array('class' => 'login-inpt marg_T4 marg-L6');
  $form['name']['#id'] = '';

  $form['name']['#value'] = 'username';
  $form['name']['#attributes']['onblur'] = "if (this.value == '') {this.value = '".$form['name']['#value']."'}";
  $form['name']['#attributes']['onfocus'] = "if (this.value == '".$form['name']['#value']."') {this.value = ''}";

  unset($form['pass']['#size']);
  $form['pass']['#attributes'] = '';
  $form['pass']['#type'] = 'textfield';
  $form['pass']['#attributes'] = array('class' => 'login-inpt marg_T4 marg-L6');
  $form['pass']['#id'] = '';
  //$form['pass']['#prefix'] = '<span class="logIn_lft">';
  //$form['pass']['#suffix'] = '</span>';

  $form['pass']['#value'] = 'password';
  //$form['pass']['#attributes']['onload'] = "if (this.value == '".$form['pass']['#value']."') {this.type='text';}";
  $form['pass']['#attributes']['onblur'] = "if (this.value == '') {this.value = '".$form['pass']['#value']."';this.type='text';}";
  $form['pass']['#attributes']['onfocus'] = "if (this.value == '".$form['pass']['#value']."') {this.value = '';this.type='password';}";



  unset($form['name']['input']['#printed']);
      $items[] = l(t('Forgot Password? '), 'user/password', array('attributes' => array('title' => t('Click to receive a new password via e-mail.'),'class' => 'right')));


//       strip_tags($form['links'],'<p><a>');
    return drupal_render($form);
}





function pmi_form_element($element, $value) {
  // This is also used in the installer, pre-database setup.
  $t = get_t();

  $output = '<div';
  if (!empty($element['#id'])) {
    $output .= ' id="' . $element['#id'] . '-wrapper"';
  }
  $output .= ">\n";
  $required = !empty($element['#required']) ? '<span class="form-required" title="' . $t('This field is required.') . '">*</span>' : '';

  if (!empty($element['#title'])) {
    $title = $element['#title'];
    if (!empty($element['#id'])) {
      $output .= ' <label for="' . $element['#id'] . '" class="lbl150">' . $t('!title: !required', array('!title' => filter_xss_admin($title), '!required' => $required)) . "</label>\n";
    }
    else {
      $output .= ' <label class="lbl150">' . $t('!title: !required', array('!title' => filter_xss_admin($title), '!required' => $required)) . "</label>\n";
    }
  }

  $output .= " $value\n";

  if (!empty($element['#description'])) {
    $output .= ' <div class="description">' . $element['#description'] . "</div>\n";
  }

  $output .= "</div>\n";

//echo $output; exit;

  return $output;
}

	// pager for the content
	function pmi_item_list($items = array(), $title = NULL, $type = '', $attributes = NULL) {
	 $test2=explode('/',$_SERVER['REQUEST_URI']);
	$test3=explode('?',$test2[1]);
	if($test3[0]=='products'|| $test3[0]=='proaducts'){
	$output = '<div  id ="pager123">';
	}else{
	$output = '<div  id ="pager321">';
	}
	if (isset($title)) {
		$output .= '<h3>' . $title . '</h3>';
	}

	if (!empty($items)) {
		//$output .= "<$type" . drupal_attributes($attributes) . '>';
		foreach ($items as $item) {
		$attributes = array();
		$children = array();
		if (is_array($item)) {
			foreach ($item as $key => $value) {
			if ($key == 'data') {
				$data = $value;
			}
			elseif ($key == 'children') {
				$children = $value;
			}
			else {
				$attributes[$key] = $value;
			}
			}
		}
		else {
			$data = $item;
		}
		if (count($children) > 0) {
			$data .= theme_item_list($children, NULL, $type, $attributes); // Render nested list
		}

		if($test3[0]=='products'|| $test3[0]=='proaducts'){
//exit;
		$newdata=str_replace('active','class',$data);
		$newdata1=str_replace('»','',$data);
		$output .= '<label' . drupal_attributes($newdata1) . ' id="paging" class="">' . $newdata1 . '</a></label>&nbsp;&nbsp;';
		$output1 = str_replace('«','',$output);
		$output2 = str_replace('‹ previous','<',$output1);
		$output4 = str_replace('first','<<' ,$output2);
		$output5 = str_replace('last','>>',$output4);
		$output6 = str_replace('next','>',$output5);
		$output3 = str_replace('›','',$output6);

		}else{
		$newdata=str_replace('active','class',$data);
		$newdata1=str_replace('»','',$data);
		$output .= '<label' . drupal_attributes($newdata1) . ' id="paging" class="">' . $newdata1 . '</a></label>&nbsp;&nbsp;';
		$output1 = str_replace('«','',$output);
		$output2 = str_replace('‹ previous','pre',$output1);
		$output3 = str_replace('›','',$output2);
		}
	//   $output .= '<span' . drupal_attributes($attributes) . '>' . $data . '</span>&nbsp;&nbsp;';
		}
		//$output .= "</$type>";

	//    print_r($output3)."<br>";
	}
	$output3 .= '</div>';
	return $output3;
	}



/*search box start*/

function pmi_search_block_form($form) {

// this line deactivate the 'search this site' label - you can change/delete this
    unset($form['search_block_form']['#title']);


    // remove the submit button - you can change/delete this
    $form['submit']['#value'] = t('');
    $form['submit']['#attributes'] = array('class' => 'searchbtn');

    // Change the size of the search box (you can change the value '25 to whatever you want) - you can change/delete this
    //$form['search_block_form']['#size'] = 25;

    // Set a default value in the search box, you can change 'search' to whatever you want - you can change/delete this
    $form['search_block_form']['#value'] = 'Search';
    // Additionnaly, hide the text when editing - you can change/delete this
    // Remember to change the value 'search' here too if you change it in the previous line
    $form['search_block_form']['#attributes'] = array('onblur' => "if (this.value == '') {this.value = 'Search';}", 'onfocus' => "if (this.value == 'Search') {this.value = '';}", 'class' => 'searchbx' );

//    print "<pre>";
// print_r($form);
// print "</pre>";
// exit;


    // Don't change this
    $output .= drupal_render($form);
    return $output;
}


/*search box end*/

function pmi_textfield($element) {
  $size = empty($element['#size']) ? '' : ' size="' . $element['#size'] . '"';
  $maxlength = empty($element['#maxlength']) ? '' : ' maxlength="' . $element['#maxlength'] . '"';
  $class = array('form-text');
  $extra = '';
  $output = '';

  if ($element['#autocomplete_path'] && menu_valid_path(array('link_path' => $element['#autocomplete_path']))) {
    drupal_add_js('misc/autocomplete.js');
    $class[] = 'form-autocomplete';
    $extra =  '<input class="autocomplete" type="hidden" id="' . $element['#id'] . '-autocomplete" value="' . check_url(url($element['#autocomplete_path'], array('absolute' => TRUE))) . '" disabled="disabled" />';
  }
  _form_set_class($element, $class);

  if (isset($element['#field_prefix'])) {
    $output .= '<span class="field-prefix">' . $element['#field_prefix'] . '</span> ';
  }

  $output .= '<span class="logIn_lft"><input type="text"' . $maxlength . ' name="' . $element['#name'] . '" id="' . $element['#id'] . '"' . $size . ' value="' . check_plain($element['#value']) . '"' . drupal_attributes($element['#attributes']) . ' /></span>';

  if (isset($element['#field_suffix'])) {
    $output .= ' <span class="field-suffix">' . $element['#field_suffix'] . '</span>';
  }
//echo $output; exit;

  return theme('form_element', $element, $output) . $extra;
}

function pmi_password($element) {
  $size = empty($element['#size']) ? '' : ' size="' . $element['#size'] . '"';
  $maxlength = empty($element['#maxlength']) ? '' : ' maxlength="' . $element['#maxlength'] . '"';
  $class = array('form-text');
  $extra = '';
  $output = '';

  if ($element['#autocomplete_path'] && menu_valid_path(array('link_path' => $element['#autocomplete_path']))) {
    drupal_add_js('misc/autocomplete.js');
    $class[] = 'form-autocomplete';
    $extra =  '<input class="autocomplete" type="hidden" id="' . $element['#id'] . '-autocomplete" value="' . check_url(url($element['#autocomplete_path'], array('absolute' => TRUE))) . '" disabled="disabled" />';
  }
  _form_set_class($element, $class);

  if (isset($element['#field_prefix'])) {
    $output .= '<span class="field-prefix">' . $element['#field_prefix'] . '</span> ';
  }

  $output .= '<span class="logIn_lft"><input type="password"' . $maxlength . ' name="' . $element['#name'] . '" id="' . $element['#id'] . '"' . $size . ' value="' . check_plain($element['#value']) . '"' . drupal_attributes($element['#attributes']) . ' /></span>';

  if (isset($element['#field_suffix'])) {
    $output .= ' <span class="field-suffix">' . $element['#field_suffix'] . '</span>';
  }
//echo $output; exit;

  return theme('form_element', $element, $output) . $extra;
}

/**
 * Implementation of theme_menu_tree().
 */
function pmi_menu_tree($tree) {
$menu_name='';
$backtrace = debug_backtrace();
  foreach (array_reverse($backtrace) as $call) {
    if (!empty($call['function']) && $call['function'] == 'menu_tree') {
      if (is_array($call['args'])) {
        $menu_name = reset($call['args']);
        break;
      }
    }
  }

//$menu_name = variable_get('menu_primary_links_source', 'primary-links');
//  print 'menu name=';
//  print $menu_name;
// print_r($tree);
// print "</pre>";
if($menu_name == 'primary-links')
{
return '<ul id="navbar">' . $tree . '</ul>';
}
else
{
return '<ul>' . $tree . '</ul>';
}


/*
if (strpos($tree, 'primary-links') != FALSE) {
   return '<ul id="topnav">' . $tree . '</ul>';
  }*/

//   $menu_name = '';
//   // This is such a huge hack:
//   $backtrace = debug_backtrace();
//   foreach (array_reverse($backtrace) as $call) {
//     if (!empty($call['function']) && $call['function'] == 'menu_tree') {
//       if (is_array($call['args'])) {
//         $menu_name = reset($call['args']);
//         break;
//       }
//     }
//   }
//
//   if ($menu_name == 'menu-mainmenu') {
//     // Do something different with the footer links here:
//    	return '<ul id="menu">'. $tree .'</ul>';
//   }  else {
//     return '<ul class="menu">'. $tree .'</ul>';
//   }
}

/**
 * Implementation of theme_menu_item().
 */
function pmi_menu_item($link, $has_children, $menu = '', $in_active_trail = FALSE, $extra_class = NULL) {
//  $class = ($menu ? 'expanded' : ($has_children ? 'collapsed' : 'leaf'));
//   if (!empty($extra_class)) {
//     $class .= 'abcd ' . $extra_class;
//   }
//   if ($in_active_trail) {
//     $class .= ' active-trail';
//   }
  return '<li style="background: none repeat scroll 0% 0% transparent;">' . $link . $menu . "</li>\n";
}







function pmi_menu_item_link($link)
{
$output = "";
    if (empty($link['localized_options']))
    {
        $link['localized_options'] = array();
    }


    if($link['menu_name'] == 'menu-mainmenu' && $link['depth'] == 1)
    {
        if($link['href'] == '<front>')
        {
            $link['href'] = '';
        }

	$path = drupal_get_path_alias($link['href'], $path_language = '');

	//echo $link['href'];exit;

	if($link['href'] == $_GET['q']) {
		$class= ' active';
	}

        $output  = '<a href="'.base_path().$path.'" title="'.$link['title'].'" class="'.$class.'">';
        $output .=         '<span>'.$link['title'].'</span>';
        //$output .=        '<span class="right">&nbsp;</span>';
        $output .= '</a>';

        return $output;
    }
    else
    {
          return l($link['title'], $link['href'], $link['localized_options']);
      }

}

/*textarea start*/

function  pmi_textarea($element) {
  $class = array('form-textarea');

  $cols = $element['#cols'] ? ' cols="'. $element['#cols'] .'"' : '';
  _form_set_class($element, $class);
  return theme('form_element', $element, '<span class="txtarea288"><textarea'. $cols .' rows="'. $element['#rows'] .'" name="'. $element['#name'] .'" id="'. $element['#id'] .'" '. drupal_attributes($element['#attributes']) .'>'. check_plain($element['#value']) .'</textarea></span>');
}

function pmi_node_form($form) {
  $output = "\n<div class=\"\">\n<div class=\"boxTop_lft\">\n<div class=\"boxTop_rht\">\n</div>\n</div>\n";
  $output .= "<div class=\"boxbg_lft\">\n<div class=\"boxbg_rht\">";

  //if ($title): $output .= "<h1 class=\"srchTitl2\"><span>". $title ."</span></h1>"; endif;
  if ($title){ $output .= "<h1 class=\"srchTitl2\"><span>". $title ."</span></h1>"; }else{$output .= "<h1 class=\"srchTitl2\"><span>&nbsp;</span></h1>";}
  $output .= "<div class=\"boxPadd\">";
  // Admin form fields and submit buttons must be rendered first, because
  // they need to go to the bottom of the form, and so should not be part of
  // the catch-all call to drupal_render().
  $admin = '';
  if (isset($form['author'])) {
    $admin .= "    <div class=\"authored\">\n";
    $admin .= drupal_render($form['author']);
    $admin .= "    </div>\n";
  }
  if (isset($form['options'])) {
    $admin .= "    <div class=\"options\">\n";
    $admin .= drupal_render($form['options']);
    $admin .= "    </div>\n";
  }
  $buttons = drupal_render($form['buttons']);

  // Everything else gets rendered here, and is displayed before the admin form
  // field and the submit buttons.
  $output .= "  <div class=\"standard\">\n";
  $output .= drupal_render($form);
  $output .= "  </div>\n";

  if (!empty($admin)) {
    $output .= "  <div class=\"admin\">\n";
    $output .= $admin;
    $output .= "  </div>\n";
  }
  $output .= $buttons;
  $output .= "</div>\n</div>\n</div><div class=\"boxBot_lft\"><div class=\"boxBot_rht\"></div></div></div>\n";

  return $output;
}

/*For overriding node*/
function pmi_preprocess_node(&$vars, $hook) {
  $node = $vars['node'];
  $vars['template_file'] = 'node-'. $node->nid;
}


/*For overriding page*/

// function pmi_preprocess_page(&$vars, $hook) {
//   if (isset($vars['node'])) {
// //    If the node type is "blog" the template suggestion will be "page-blog.tpl.php".
//    $vars['template_files'][] = 'page-'. str_replace('_', '-', $vars['node']->type);
//   }
// }

/**
* Implementation of hook_form_alter().
*/

/*function pmi_form_node_form_alter(&$form, &$form_state) {
  // Modification for the form with the given form ID goes here. For example, if
  // FORM_ID is "user_register" this code would run only on the user
  // registration form.

  // Change Text on Save Button
  // $form['my_new_form_node_form'] = array(
  //  '#title' => t("Save and add new"),
  // );

$form['buttons']['Save']['#value'] = t('Save and add new');
$form['buttons']['preview']['#value'] = t('LogOut');
}*/



// Override theme_button
function phptemplate_button($element) {
  // Make sure not to overwrite classes.
  if (isset($element['#attributes']['class'])) {
    $element['#attributes']['class'] = 'form-'. $element['#button_type'] .' '. $element['#attributes']['class'];
  }
  else {
    $element['#attributes']['class'] = 'form-'. $element['#button_type'];
  }

  // We here wrap the output with a couple span tags
  return '<span class="yellobtn-rit"><span>
<input class="yellobtn-lft" type="submit" '. (empty($element['#name']) ? '' : 'name="'. $element['#name'] .'" ')  .'id="'. $element['#id'].'" value="'. check_plain($element['#value']) .'" '. drupal_attributes($element['#attributes']) ." /></span></span>\n";
}





/* Drop all CSS from mimemail output */
/*function pmi_preprocess_mimemail_message(&$variables) {
  $variables['css'] = '';
}*/



/**
 *
 */
function pmi_user_profile($account) {

  //$output = print_r($account ,1);
  // Welcome
  $output = '<h2>Welcome to the Practice Mastery Website.</h2>
<p>This is your home page and the llinks on the left hand side allows you to navigate the website and access your ciourse material. <a href="/node/1096">Click here</a> to view an orientation video. We look forward in serving you in transforming your practice.</p>
<p><b>Practice Mastery Team</b></p>';
// Status
  $output .= '<h3>Status</h3>';
  unset($account->roles[2]);
  $output .=  implode( ', ' , $account->roles);
  $output .= '<p>&nbsp;</p>'; // Remove later

// History
  $output .= '<h3>History</h3>';
  $output .= 'Registered for: ' . $account->content['summary']['member_for']['#value'];
  $output .= '<p>&nbsp;</p>'; // Remove later

  return $output;
}
/*
$account=
stdClass Object
(
    [uid] => 1
    [name] => superadmin
    [pass] => 36d673622bf7be7fff5f2dd1109f2797
    [mail] => behindthepage@gmail.com
    [mode] => 0
    [sort] => 0
    [threshold] => 0
    [theme] =>
    [signature] =>
    [signature_format] => 0
    [created] => 1317857530
    [access] => 1341993891
    [login] => 1341905651
    [status] => 1
    [timezone] => 19800
    [language] =>
    [picture] =>
    [init] => yogeshg1@smartdatainc.net
    [data] => a:10:{s:5:"fbuid";s:10:"1804637249";s:13:"form_build_id";s:37:"form-8523caef8cfdbe478629c10c53f29c79";s:8:"new_role";i:0;s:12:"new_role_add";s:1:"4";s:16:"new_role_add_qty";s:2:"30";s:24:"new_role_add_granularity";s:3:"day";s:17:"mimemail_textonly";i:0;s:17:"messaging_default";s:9:"phpmailer";s:27:"notifications_send_interval";s:1:"0";s:18:"notifications_auto";i:0;}
    [timezone_name] => Asia/Calcutta
    [fbuid] => 1804637249
    [form_build_id] => form-8523caef8cfdbe478629c10c53f29c79
    [new_role] => 0
    [new_role_add] => 4
    [new_role_add_qty] => 30
    [new_role_add_granularity] => day
    [mimemail_textonly] => 0
    [messaging_default] => phpmailer
    [notifications_send_interval] => 0
    [notifications_auto] => 0
    [roles] => Array
        (
            [2] => authenticated user
            [6] => administrator
        )

    [userreference] => Array
        (
        )

    [og_groups] => Array
        (
            [761] => Array
                (
                    [title] => Practice Mastery e-newsletter - Issue 2
                    [type] => simplenews
                    [status] => 1
                    [nid] => 761
                    [og_role] => 0
                    [is_active] => 1
                    [is_admin] => 0
                    [uid] => 1
                    [created] => 1336955664
                    [changed] => 1336955664
                )

        )

    [content] => Array
        (
            [content_profile] => Array
                (
                    [content_profile_registration] => Array
                        (
                            [#theme] => content_profile_display_link
                            [#edit_link] => 1
                            [#uid] => 1
                            [#style] => link
                            [#content_type] => registration
                            [#weight] => 1
                            [#suffix] => <br />
                        )

                    [#prefix] => <p id="content-profile-view">
                    [#suffix] => </p>
                )

            [user_picture] => Array
                (
                    [#value] => <div class="picture">
  </div>

                    [#weight] => -10
                )

            [summary] => Array
                (
                    [#type] => user_profile_category
                    [#attributes] => Array
                        (
                            [class] => user-member
                        )

                    [#weight] => 5
                    [#title] => History
                    [member_for] => Array
                        (
                            [#type] => user_profile_item
                            [#title] => Member for
                            [#value] => 39 weeks 6 days
                        )

                    [notifications] => Array
                        (
                            [#type] => user_profile_item
                            [#title] => Subscriptions
                            [#value] => <ul class="item-list"><li class="notifications_0 first last"><a href="/notifications/subscribe/1/author/author/1?destination=user%2F1">Subscribe to: All posts by superadmin</a></li>
</ul>
                        )

                    [groups] => Array
                        (
                            [#type] => item
                            [#title] => Groups
                            [#value] => <div  id ="pager321"><label id="paging" class=""><a href="/content/practice-mastery-e-newsletter-issue-2-0">Practice Mastery e-newsletter - Issue 2</a></a></label>&nbsp;&nbsp;</div>
                            [#attributes] => Array
                                (
                                    [class] => og_groups
                                )

                            [#access] => 1
                        )

                )

            [simplenews] => Array
                (
                    [#type] => user_profile_category
                    [#title] =>
                    [subscriptions] => Array
                        (
                            [#type] => user_profile_item
                            [#title] => Current subscriptions
                            [#value] => None
                        )

                    [my_newsletters] => Array
                        (
                            [#type] => user_profile_item
                            [#value] => Manage <a href="/user/1/edit/newsletter">my subscriptions</a>
                            [#weight] => -1
                        )

                )

            [orders] => Array
                (
                    [#type] => user_profile_category
                    [#weight] => -5
                    [#title] => Orders
                    [link] => Array
                        (
                            [#type] => user_profile_item
                            [#value] => <a href="/user/1/orders">Click here to view your order history.</a>
                        )

                )

        )

)
*/