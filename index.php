<?php 

//Connect to database
require ('core/init.php');

//Define site identity
$site_name = "Dinah Chen";

//Query the database
$project = new Project; 
//Request 1 : Get All Unique Languages and Its Frequency in the Table
$all_languages = $project->finduniquelangs();
$all_projects = $project->findallprojects();
$number_of_projects = count($all_projects);
$number_of_languages = count($all_languages);
$repeats = [];
foreach ($all_languages as $all_language)
{
    $repeat = $project->countSingleLanguage($all_language->language_name);
    array_push($repeats, $repeat);
}

    
//Assign variables in the template
$template = new Template('templates/home.php');
$template->site_name = $site_name; 
$template->languages = $all_languages;
$template->total_languages = $number_of_languages; 
$template->total_projects = $number_of_projects; 
$template->lang_repeats = $repeats; 


//Return the template
echo $template; 