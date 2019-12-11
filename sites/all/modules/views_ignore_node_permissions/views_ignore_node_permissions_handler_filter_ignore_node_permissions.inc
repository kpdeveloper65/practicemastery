<?php

//Easiest way to make a handler is to simply extend the views_handler class.  It contains a bare bones structure that we can modify.
class views_ignore_node_permissions_handler_filter_ignore_node_permissions extends views_handler
{
  /* 
   //This is a list of all functions needed by a handler.  I use this for reference when making new handlers. -Ryan
   function construct(){  }
   function has_extra_options() {  }
   function set_definition() { }
   function init() { }
   function extra_options_form() {  }
   function options_form() { }
   function needs_style_plugin() { }
   function validate() { }
   function options_validate() { }
   function options_submit() { }
   function access() { }
   */
   function ui_name() { return 'Node Permissions'; }
   function admin_summary() { return 'Node permissions are currently being ignored for this view.'; }

}