a<?php
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
        global $CFG, $OUTPUT, $PAGE, $USER, $COURSE;
        $this->content = new stdClass();
        if(has_capability("local/library:Librarian",get_context_instance(CONTEXT_BLOCK, $this->instance->id))){
        	$this->content->text = html_writer::link(new moodle_url("/local/library/librarian.php"),get_string('librarian', 'block_newblock'));
        }
        $url = new moodle_url('/local/library/library.php');
        $this->content->footer = html_writer::link(new moodle_url("/local/library/library.php?"),get_string('go', 'block_newblock'));
        
        
        return $this->content;
        
    }
}
