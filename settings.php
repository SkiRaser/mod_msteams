<?php
defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig) {
  $settings->add(new admin_setting_configtext(
    'mod_msteams/defaulturl',
    get_string('defaulturl', 'msteams'),
    get_string('defaulturl_desc', 'msteams'),
    '',
    PARAM_URL
  ));
}