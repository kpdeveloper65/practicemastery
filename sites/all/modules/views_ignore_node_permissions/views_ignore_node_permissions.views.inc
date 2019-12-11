<?php
function views_ignore_node_permissions_views_handlers() 
{
  return array(
    'info' => array(
      'path' => drupal_get_path('module', 'views_ignore_node_permissions'),
    ),
    'handlers' => array(
      // The name of my handler
      'views_ignore_node_permissions_handler_filter_ignore_node_permissions' => array(
        // The name of the handler we are extending.
        'parent' => 'views_handler_filter_term_node_tid',
      ),
    ),
  );
}