<?php

declare(strict_types=1);

defined('MOODLE_INTERNAL') || die();

/**
 * @global stdClass $CFG
 */
require $CFG->dirroot . '/course/moodleform_mod.php';

class mod_greeting_mod_form extends moodleform_mod
{
    public function definition()
    {
        $mform = $this->_form;
        $mform->addElement('header', 'general', get_string('general', 'form'));
        $mform->addElement('text', 'name', get_string('name'), ['size'=>'48']);
        $mform->setType('name', PARAM_TEXT);
        $mform->addRule('name', null, 'required', null, 'client');

        //-------------------------------------------------------
        $this->standard_coursemodule_elements();

        //-------------------------------------------------------
        $this->add_action_buttons();
        //сохранить и врнуться к курсу
    }
}
