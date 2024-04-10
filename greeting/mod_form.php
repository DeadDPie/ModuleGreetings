<?php
declare(strict_types=1);
defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot.'/course/moodleform_mod.php');
require_once($CFG->dirroot.'//mod/greeting/lib.php');

class mod_greeting_mod_form extends moodleform_mod {

    function definition() {


        $mform = $this->_form;

        //-------------------------------------------------------
        $this->standard_coursemodule_elements();

        //-------------------------------------------------------
        $this->add_action_buttons();
        //сохранить и врнуться к курсу

    }
}
