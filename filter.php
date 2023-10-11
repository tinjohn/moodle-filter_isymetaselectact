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

defined('MOODLE_INTERNAL') || die;

/**
 * This is the filter itself.
 *
 * @package    filter_isymetaselectact
 * @copyright  2023 Tina John <tina.john@th-luebeck.de>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class filter_isymetaselectact extends moodle_text_filter {
    /**
     * Function filter replaces any h5p-sources.
     */
    public function filter($text, array $options = array()) {
        global $CFG, $DB, $COURSE, $OUTPUT;

        if (empty($COURSE->id) || $COURSE->id == 0) {
            return $text;
        }
        if (strpos($text, '{isymetaselectact:') === false) {
            return $text;
        }

        $modinfo = get_fast_modinfo($COURSE);
        $cms = $modinfo->get_cms();

        foreach ($cms as $cm) {
            if ($cm->modname != 'isymetaselectact') {
                continue;
            }
            $params = (object) array(
                'id' => $cm->id,
                'name' => $cm->modname,
                'url' => $cm->url,
                'wwwroot' => $CFG->wwwroot,
            );
            switch ($cm->modname) {
                case 'isymetaselectact':
                    $embed = $OUTPUT->render_from_template('filter_isymetaselectact/embed-isymetaselectact', $params);
                break;
            }

            //$link = $OUTPUT->render_from_template('filter_isymetaselectact/link', $params);


            $text = str_replace('{isymetaselectact:' . $cm->name . '}', $embed, $text);
        }

        return $text;
    }
}
