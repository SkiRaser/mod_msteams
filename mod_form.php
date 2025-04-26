<?php
require_once($CFG->dirroot.'/course/moodleform_mod.php');

class mod_msteams_mod_form extends moodleform_mod {

  public function definition() {
    $mform = $this->_form;

    $mform->addElement('text', 'name', get_string('name'), array('size' => '64'));
    $mform->setType('name', PARAM_TEXT);
    $mform->addRule('name', null, 'required', null, 'client');

    $mform->addElement('text', 'meetingurl', get_string('meetingurl', 'msteams'), array('size' => '128'));
    $mform->setDefault('meetingurl', get_config('mod_msteams', 'defaulturl'));
    $mform->setType('meetingurl', PARAM_URL);
    $mform->addRule('meetingurl', null, 'required', null, 'client');

    $this->standard_intro_elements();
    $this->standard_coursemodule_elements();
    $this->add_action_buttons();
  }
}