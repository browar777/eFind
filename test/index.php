<?php
require("class.filetotext.php");

$docObj = new Filetotext("test.doc");
//$docObj = new Filetotext("test.pdf");
$return = $docObj->convertToText();

var_dump( $return ) ;