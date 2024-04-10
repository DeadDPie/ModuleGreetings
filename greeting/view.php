<?php

require('../../config.php');

$id       = optional_param('id', 0, PARAM_INT);        // Course module ID

[$course, $cm] = get_course_and_cm_from_cmid($id, 'greeting');

$instance = $DB->get_record('greeting', ['id'=> $cm->instance], '*', MUST_EXIST);

require_course_login($course, true, $cm);
$context = context_module::instance($cm->id);
require_capability('mod/greeting:view', $context);

$PAGE->set_url('/mod/greeting/view.php', array('id' => $cm->id));
$PAGE->set_title("Приветствие");
$PAGE->set_heading($course->fullname);

echo $OUTPUT->header();

echo 'Добро пожаловать в наш курс!';

echo $OUTPUT->footer();