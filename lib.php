<?php
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
