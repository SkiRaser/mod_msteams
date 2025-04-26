<?php
require(__DIR__.'/../../config.php');
require_once('lib.php');

$id = required_param('id', PARAM_INT);
$cm = get_coursemodule_from_id('msteams', $id, 0, false, MUST_EXIST);
$course = $DB->get_record('course', array('id' => $cm->course), '*', MUST_EXIST);
$msteams = $DB->get_record('msteams', array('id' => $cm->instance), '*', MUST_EXIST);

require_course_login($course, true, $cm);

$PAGE->set_url('/mod/msteams/view.php', array('id' => $id));
$PAGE->set_title(format_string($msteams->name));
$PAGE->set_heading(format_string($course->fullname));

echo $OUTPUT->header();

// ✅ Nur diese eine Zeile für Name + Beschreibung:
//oleh echo format_module_intro('msteams', $msteams, $cm->id);

if (filter_var($msteams->meetingurl, FILTER_VALIDATE_URL)) {
  echo html_writer::start_div('msteams-button', array('style' => 'margin: 20px 0;'));
  echo html_writer::link($msteams->meetingurl, get_string('joinmeeting', 'msteams'), array('class' => 'btn btn-primary', 'target' => '_blank', 'rel' => 'noopener noreferrer'));
  echo html_writer::end_div();
} else {
  echo html_writer::div(get_string('meetingurl', 'msteams') . ': ' . s($msteams->meetingurl));
}

echo $OUTPUT->footer();
