<?php

require __DIR__ . '../../config.php';

$id = required_param('id', PARAM_INT);

/**
 * @global stdClass $DB
 */
$course = $DB->get_record('course', ['id' => $id], '*', MUST_EXIST);

require_course_login($course, true);

