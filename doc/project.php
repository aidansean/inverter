<?php
include_once($_SERVER['FILE_PREFIX']."/project_list/project_object.php") ;
$github_uri   = "https://github.com/aidansean/inverter" ;
$blogpost_uri = "http://aidansean.com/projects/?tag=inverter" ;
$project = new project_object("inverter", "Mathematical inverter", "https://github.com/aidansean/inverter", "http://aidansean.com/projects/?tag=inverter", "inverter/images/project.jpg", "inverter/images/project_bw.jpg", "This project performs the mathetical inversion transformation.  A curve on the plane is inverted such that points within the unit circle are mapped outsid the unit circle and vice versa.", "Maths", "CSS,HTML,JavaScript,PHP") ;
?>