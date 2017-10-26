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
 * Newblock block caps.
 *
 * @package    block_newblock
 * @copyright  Daniel Neis <danielneis@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once 'search_form.php';

class block_newblock extends block_base {

    function init() {
        $this->title = get_string('pluginname', 'block_newblock');
    }
    

    function get_content() {
        global $CFG, $OUTPUT, $PAGE, $USER;
        //$UserId = $USER->id;
		
        $this->content = new stdClass();
        $this->content->text = '';
        
        $mform = new search_form();
        
        //Form processing and displaying is done here
        if ($mform->is_cancelled()) {
        	//Handle form cancel operation, if cancel button is present on form
        } else if ($fromform = $mform->get_data()) {
        	//In this case you process validated data. $mform->get_data() returns data posted in form.
        	$userId   = $fromform->userId;
        	$textName = $fromform->book;
        	redirect(new moodle_url("/local/library/library.php?userId='$userId'&textName='$textName'"));
        } else {
        	// this branch is executed if the form is submitted but the data doesn't validate and the form should be redisplayed
        	// or on the first display of the form.
        	
        	//Set default data (if any)
        	$mform->set_data($toform);
        	
        	//displays the form
        	$this->content->text = $mform->render();
        }
        
        return $this->content;
        
    }
}
