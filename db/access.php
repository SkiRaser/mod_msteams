<?php
$capabilities = array(
  'mod/msteams:addinstance' => array(
    'captype' => 'write',
    'contextlevel' => CONTEXT_COURSE,
    'archetypes' => array(
      'editingteacher' => CAP_ALLOW,
      'manager' => CAP_ALLOW
    )
  )
);