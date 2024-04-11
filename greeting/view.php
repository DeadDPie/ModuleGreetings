<?php


declare(strict_types=1);

global $page;

require __DIR__ . '../../../config.php';

/**
 * @global stdClass $DB
 * @global stdClass $PAGE
 * @global stdClass $OUTPUT
 */

$id = optional_param('id', 0, PARAM_INT);        // Course module ID

$cm = get_coursemodule_from_id('greeting', $id, 0, false, MUST_EXIST);

$greeting = $DB->get_record('greeting', ['id'=>$cm->instance], '*', MUST_EXIST);
$course = $DB->get_record('course', ['id'=>$cm->course], '*', MUST_EXIST);

require_course_login($course, true, $cm);
$context = context_module::instance($cm->id);
require_capability('mod/greeting:view', $context);

$PAGE->set_url('/mod/greeting/view.php', ['id' => $cm->id]);
$PAGE->set_title($course->shortname.': ' .$greeting->name);
$PAGE->set_heading($course->fullname);

$page = $DB->get_record('page', ['id'=>$id]);

echo $OUTPUT->header();
if (!isset($options['printheading']) || !empty($options['printheading'])) {
    echo $OUTPUT->heading(format_string($greeting->name), 2);
}

echo 'Добро пожаловать в наш курс!';

echo $OUTPUT->footer();