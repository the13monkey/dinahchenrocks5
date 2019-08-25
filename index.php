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
//Request 2 : Get projects into 3 column rows
if (isset($_GET['lang'])) {
   // $language_name = $_GET['lang'];
} else {
    $language_name = "all";
    $allprojects = $all_projects; 
}
$theprojects = [];
foreach ($allprojects as $singleproject)
{
    $theproject = new stdClass;
    $project_id = $singleproject->id; 
    $theproject->project_id = $project_id; 
    $theproject->project_name = $singleproject->project_name;
    $theproject->project_des = $singleproject->project_des;
    $theproject->project_category = $singleproject->category;
    $theproject->project_demo = $singleproject->demo;
    $theproject->project_git = $singleproject->git;
    $theproject->project_languages = $project->getProjectLanguages($project_id);
    array_push($theprojects, $theproject);
}
$projects_per_row = 3; 
$total_rows = ceil($number_of_projects / $projects_per_row);
$remainder = $number_of_projects % $projects_per_row;
if ($remainder == 0) {
    $projects_array = [];
    for ($i=0; $i<$total_rows; $i++) {
        $m = $projects_per_row * $i;
        $projects_group = [];
        for ($j=0; $j<$projects_per_row; $j++) {
            $project_object = $theprojects[$m + $j];
            array_push($projects_group, $project_object);
        }
        array_push($projects_array, $projects_group);
    }
} else {
    $projects_array = [];
    $last_row = $total_rows - 1; 
    for ($i=0; $i<$total_rows; $i++) //0,1
    {
        if ($i==$last_row) {
            $m = $projects_per_row * $i;
            $projects_group = [];
            $remainder = $number_of_projects % $projects_per_row;
            for ($j=0; $j<$remainder; $j++) {
                $project_object = $theprojects[$m + $j];
                array_push($projects_group, $project_object);
            }
        } else {
            $m = $projects_per_row * $i;
            $projects_group = []; 
            for ($j=0; $j<$projects_per_row; $j++) {
                $project_object = $theprojects[$m + $j];
                array_push($projects_group, $project_object);
            }
        }
        array_push($projects_array, $projects_group);
    }
}

//Request 3 : Get projects of a specific language
$specific_projects = [];
foreach ($all_languages as $all_language)
{
    $lang_name = $all_language->language_name;
    $the_projects = $project->getSpecificProjects($lang_name);
    $lang_object = new stdClass; 
    $lang_object->name = $lang_name; 
    $lang_object->projects = $the_projects;  
    $projects_languages = [];
    foreach ($the_projects as $the_project)
    {
        $project_id = $the_project->id; 
        $project_languages = $project->getProjectLanguages($project_id);
        $the_project->import_langs = $project_languages; 
    }
    array_push($specific_projects, $lang_object);
}

//Assign variables in the template
$template = new Template('templates/home.php');
$template->site_name = $site_name; 
$template->languages = $all_languages;
$template->total_languages = $number_of_languages; 
$template->total_projects = $number_of_projects; 
$template->lang_repeats = $repeats; 
$template->all_projects = $projects_array;
$template->specific_projects = $specific_projects; 

//Return the template
echo $template; 
