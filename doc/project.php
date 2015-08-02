<?php
include_once($_SERVER['FILE_PREFIX']."/project_list/project_object.php") ;
$github_uri   = "https://github.com/aidansean/recolourer" ;
$blogpost_uri = "http://aidansean.com/projects/?tag=recolourer" ;
$project = new project_object("recolourer", "Recolourer", "https://github.com/aidansean/recolourer", "http://aidansean.com/projects/?tag=recolourer", "recolourer/images/project.jpg", "recolourer/images/project_bw.jpg", "This project has been on my to-do list for a very long time.  The idea is to take an image which is difficult for a colour blind person to view, and then remap the colours to make it easier for them to view.", "Tools", "canvas,CSS,HTML,JavaScript") ;
?>