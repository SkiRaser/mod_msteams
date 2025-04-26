<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Plugin capabilities are defined here.
 *
 * @package     mod_msteams
 * @category    access
 * @copyright   2025 Dr. Oleh Felyshtyn felyshtyn@thaep.de>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

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