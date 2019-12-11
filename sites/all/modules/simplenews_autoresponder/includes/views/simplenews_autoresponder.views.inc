<?php

/**
 * @file
 * User Relationships Views support. Declares all the main tables to Views
 * @author Alex Karshakevich http://drupal.org/user/183217
 */

/**
 * hook_views_data()
 */
function simplenews_autoresponder_views_data() {
  $tables['simplenews_autoresponder_subscriptions'] = array(
      'table' => array(
          'group' => t('Simplenews Autoresponder'),
          'join' => array(
              'simplenews_subscriptions' => array(
                  'table' => 'simplenews_autoresponder_subscriptions',
                  'left_field' => 'snid',
                  'field' => 'snid',
              ),
              'simplenews_autoresponders' => array(
                  'table' => 'simplenews_autoresponder_subscriptions',
                  'left_field' => 'id',
                  'field' => 'autoresponder_id',
              ),
              'node' => array(
                  'table' => 'simplenews_autoresponder_subscriptions',
                  'left_field' => 'nid',
                  'field' => 'last_message_nid',
              ),
          ),
          'base' => array(
              'field' => 'id',
              'title' => t('Simplenews autoresponder subscriptions'),
              'help' => t('Connects simplenews subscriptions to autoresponders'),
          ),
      ),
      'id' => array(
          'title' => t('ID'),
          'help' => t('ID of the autoresponder subscription'),
          'argument' => array(
              'handler' => 'views_handler_argument_numeric'
          ),
          'sort' => array(
              'handler' => 'views_handler_sort',
          ),
      ),
      'snid' => array(
          'title' => t('Subscription ID'),
          'help' => t('ID of the Simplenews subscription'),
          'field' => array(
              'handler' => 'views_handler_field_numeric',
              'click sortable' => TRUE
          ),
          'argument' => array(
              'handler' => 'views_handler_argument_numeric'
          ),
          'relationship' => array(
              'base' => 'simplenews_subscriptions',
              'field' => 'snid',
              'help' => t('Bring in information about the Simplenews subscription'),
          ),
      ),
      'autoresponder_id' => array(
          'title' => t('Autoresponder ID'),
          'field' => array(
              'handler' => 'views_handler_field_numeric',
              'click sortable' => TRUE
          ),
          'argument' => array(
              'handler' => 'views_handler_argument_numeric',
          ),
          'relationship' => array(
              'base' => 'simplenews_autoresponders',
              'left_field' => 'id',
              'field' => 'autoresponder_id',
              'label' => 'autoresponder',
              'help' => t('Bring in data about the Simplenews autoresponder'),
          ),
      ),
      'last_message_nid' => array(
          'title' => t('Last message sent NID'),
          'help' => t('Node ID of last message sent to the subscriber'),
          'field' => array(
              'handler' => 'views_handler_field_node',
          ),
          'argument' => array(
              'handler' => 'views_handler_argument_node_nid',
          ),
          'relationship' => array(
              'base' => 'node',
              'left_field' => 'nid',
              'field' => 'last_message_nid',
              'label' => 'last_message_nid',
              'help' => t('Bring in node data from the last message sent'),
          ),
      ),
      'last_message_sent' => array(
          'title' => t('Last message sent timestamp'),
          'help' => t('Date and time of last message sent'),
          'field' => array(
              'handler' => 'views_handler_field_date',
              'click sortable' => TRUE
          ),
          'argument' => array(
              'handler' => 'views_handler_argument_date',
              'name field' => 'name', // the field to display in the summary.
              'numeric' => TRUE,
              'validate type' => 'uid',
          ),
      ),
  );


  $tables['simplenews_autoresponders'] = array(
      'table' => array(
          'group' => t('Simplenews Autoresponder'),
          'join' => array(
              'term_data' => array(
                  'left_field' => 'tid',
                  'field' => 'tid'
              ),
          ),
          'base' => array(
              'field' => 'id',
              'title' => t('Simplenews autoresponders'),
          ),
      ),
      'id' => array(
          'title' => t('ID'),
          'help' => t('ID of the autoresponder'),
          'argument' => array(
              'handler' => 'views_handler_argument_numeric'
          ),
          'field' => array(
              'handler' => 'views_handler_field_numeric',
              'click sortable' => TRUE
          ),
          'filter' => array(
              'handler' => 'views_handler_filter_numeric',
          ),
          'sort' => array(
              'handler' => 'views_handler_sort',
          ),
      ),
      'name' => array(
          'title' => t('Name'),
          'help' => t('Name of the autoresponder'),
          'argument' => array(
              'handler' => 'views_handler_argument_string'
          ),
          'field' => array(
              'handler' => 'views_handler_field',
              'click sortable' => TRUE
          ),
          'sort' => array(
              'handler' => 'views_handler_sort',
          ),
      ),
      'tid' => array(
          'title' => t('Newsletter Term ID'),
          'help' => t('Taxonomy term ID of Simplenews newsletter'),
          'argument' => array(
              'handler' => 'views_handler_argument_taxonomy'
          ),
          'field' => array(
              'handler' => 'views_handler_field_taxonomy',
              'click sortable' => TRUE
          ),
          'sort' => array(
              'handler' => 'views_handler_sort',
          ),
          'relationship' => array(
              'base' => 'term_data',
              'left_field' => 'tid',
              'field' => 'tid',
              'label' => 'tid',
              'help' => t('Bring in taxonomy term data for the newsletter'),
          ),
      ),
      'status' => array(
          'title' => t('Status'),
          'help' => t('Indicates whether the autoresponder is active'),
          'field' => array(
              'handler' => 'views_handler_field_boolean',
              'click sortable' => TRUE
          ),
          'sort' => array(
              'handler' => 'views_handler_sort',
          ),
      ),
  );


  $tables['simplenews_autoresponder_messages'] = array(
      'table' => array(
          'group' => t('Simplenews Autoresponder Messages'),
          'join' => array(
              'node' => array(
                  'left_field' => 'nid',
                  'field' => 'nid'
              ),
              'simplenews_autoresponders' => array(
                  'table' => 'simplenews_autoresponder_messages',
                  'left_field' => 'id',
                  'field' => 'autoresponder_id',
              ),
          ),
          'base' => array(
              'field' => 'id',
              'title' => t('Simplenews autoresponder messages'),
          ),
      ),
      'id' => array(
          'title' => t('ID'),
          'help' => t('ID of the autoresponder'),
          'argument' => array(
              'handler' => 'views_handler_argument_numeric'
          ),
          'field' => array(
              'handler' => 'views_handler_field_numeric',
              'click sortable' => TRUE
          ),
          'filter' => array(
              'handler' => 'views_handler_filter_numeric',
          ),
          'sort' => array(
              'handler' => 'views_handler_sort',
          ),
      ),
      'nid' => array(
          'title' => t('Message NID'),
          'help' => t('Node ID of the message'),
          'field' => array(
              'handler' => 'views_handler_field_node',
          ),
          'argument' => array(
              'handler' => 'views_handler_argument_node_nid',
          ),
          'relationship' => array(
              'base' => 'node',
              'left_field' => 'nid',
              'field' => 'last_message_nid',
              'label' => 'last_message_nid',
              'help' => t('Bring in node data from the message'),
          ),
      ),
      'autoresponder_id' => array(
          'title' => t('Autoresponder ID'),
          'field' => array(
              'handler' => 'views_handler_field_numeric',
              'click sortable' => TRUE
          ),
          'argument' => array(
              'handler' => 'views_handler_argument_numeric',
          ),
          'relationship' => array(
              'base' => 'simplenews_autoresponders',
              'left_field' => 'id',
              'field' => 'autoresponder_id',
              'label' => 'autoresponder',
              'help' => t('Bring in data about the Simplenews autoresponder'),
          ),
      ),
      'offset' => array(
          'title' => t('Message offset (days)'),
          'help' => t('Number of days after subscribing until the subscriber will receive this message'),
          'field' => array(
              'handler' => 'views_handler_field_numeric',
              'click sortable' => TRUE
          ),
          'argument' => array(
              'handler' => 'views_handler_argument_numeric'
          ),
      ),
  );


  return $tables;
}
