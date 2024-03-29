<?php
/*
    "Contact Form to Database" Copyright (C) 2011-2014 Michael Simpson  (email : michael.d.simpson@gmail.com)

    This file is part of Contact Form to Database.

    Contact Form to Database is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    Contact Form to Database is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Contact Form to Database.
    If not, see <http://www.gnu.org/licenses/>.
*/


/**
 * Since PHP has a built-in concatenation operator, there is no function to do concatenation.
 * But for filters and transforms, we want to express a function for concatenation.
 */
function concat() { // concat(...) // splat operator in PHP 5.3
    $string = '';
    foreach (func_get_args() as $arg) {
        $string .= $arg;
    }
    return $string;
}
