Copyright 2006

Description
-----------
The autoresponder.module allow a site visitor to sign up for a series
of emails sent each day via a cron job.

Features:
---------
* E-mails are sent with both HTML and text encodings.
* A site visitor wants to sign up for a N-day
series of emails. In a Drupal block, he enters his email address, select
a preferable set of emails and clicks submit. Any emails in the system
set to 'Day 0' are immediately sent. Each day thereafter, a cron job
triggers the sending of emails appropriate for that day. If at any point
the user wishes to unsubscribe, he can click a simple link at the bottom
of the email to do so.
* Users with the 'configure autoresponder'
permission are able to access an administrative interface, which allows
them to configure the individual emails in the system, create a mail
sets, administrate registerered users. The administrator is able to
add/edit/delete each of these emails/sets.


Prerequisites
-------------
The autoresponder.module do not requires other modules to be installed.
To see a WYSIWYG area in message editing form, install TimyMCE module (http://drupal.org/project/tinymce) and configure it to show WYSIWYG area in autoresponder module.

Installation
------------
To install, copy the autoresponder directory and all its contents to your modules
directory.

Configuration
-------------
To enable this module, visit administer -> modules, and enable autoresponder.

Bugs/Features/Patches:
----------------------
If you want to report bugs, feature requests, or submit a patch, please do so
at the project page on the Drupal web site.
http://drupal.org/project/autoresponder

Author
------
Alexey Tkachenko (Drupal: http://drupal.org/user/22093 Protopage: http://protopage.com/cyberpunk)

If you use this module, find it useful, and want to send the author
a thank you note, then use the Feedback/Contact page at the URL above.

The author can also be contacted for paid customizations of this
and other modules.
