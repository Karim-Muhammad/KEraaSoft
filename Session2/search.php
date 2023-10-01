<?php

// explode() - split a string by a string
// split() - split a string by a regular expression

// implode() - join array elements with a string
// join() - alias of implode()

// str_split() - convert a string to an array
// htmlspecialchars() - convert some predefined characters to HTML entities (to prevent XSS attacks)

// strip_tags() - strip HTML and PHP tags from a string

// Difference betwen htmlstrip_tags vs. htmlspecialchars
// htmlspecialchars() - convert some predefined characters to HTML entities (to prevent XSS attacks)
// strip_tags() - strip HTML and PHP tags from a string


echo strip_tags("<h1>hello</h1>"); // hello
echo "<br/>";

echo htmlspecialchars("<h1>hello</h1>"); // &lt;h1&gt;hello&lt;/h1&gt;
echo "<br/>";

// str_pad — Pad a string to a certain length with another string
// stripos - strpos

// addslashes — Quote string with slashes
// stripslashes — Un-quotes a quoted string

// substr_count() - count the number of times a substring occurs in a string
// substr_replace() - replace text within a portion of a string


