<?php
//moodleform is defined in formslib.php
require_once("$CFG->libdir/formslib.php");

class search_form extends moodleform {
	//Add elements to form
	public function definition() {
		global $CFG, $USER, $COURSE;
		
		$mform = $this->_form; // Don't forget the underscore!
		
		$mform->addElement('text', 'book', get_string('searchBook', 'block_newblock')); // Add elements to your form
		$mform->setType('book', PARAM_NOTAGS);//Set type of element
		$mform->addElement('hidden', 'userId', "$USER->id");
		$mform->addElement('hidden', 'id', "$COURSE->id");
		$this->add_action_buttons(False, 'submit');
	}
	//Custom validation should be added here
	function validation($data, $files) {
		return array();
	}
}