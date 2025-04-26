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

defined('MOODLE_INTERNAL') || die();

/**
 * Supported features
 */
function msteams_supports($feature) {
  switch($feature) {
    case FEATURE_MOD_ARCHETYPE:
      return MOD_ARCHETYPE_RESOURCE; // Zeigt an, dass es sich um ein Ressourcenmodul handelt (wie "URL" oder "Datei")
    case FEATURE_COMPLETION_TRACKS_VIEWS:
      return true;
    case FEATURE_GRADE_HAS_GRADE:
      return false;
    case FEATURE_BACKUP_MOODLE2:
      return true;
    default:
      return null;
  }
}

/**
 * Add instance
 */
function msteams_add_instance($msteams) {
  global $DB;
  $msteams->timemodified = time();
  return $DB->insert_record('msteams', $msteams);
}

/**
 * Update instance
 */
function msteams_update_instance($msteams) {
  global $DB;
  $msteams->timemodified = time();
  $msteams->id = $msteams->instance;
  return $DB->update_record('msteams', $msteams);
}

/**
 * Delete instance
 */
function msteams_delete_instance($id) {
  global $DB;
  if (!$msteams = $DB->get_record('msteams', array('id' => $id))) {
    return false;
  }
  return $DB->delete_records('msteams', array('id' => $id));
}
