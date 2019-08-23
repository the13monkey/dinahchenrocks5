<?php

  require('core/init.php');

  $project = new Project;

//Site Identity
  $site_name = "Dinah Chen";

//Create a single project object array
  if (isset($_GET['lang'])) {
    $language_name = $_GET['lang'];
    $allprojects = $project->getSpecificProjects($language_name); 
  } else {
    $language_name = "all";
    $allprojects = $project->getAllProjects();
  }

  $theprojects = [];
  foreach ($allprojects as $singleproject)
  {
    $theproject = new stdClass;
    $project_id = $singleproject->id;
    $theproject->poject_id = $singleproject->id;
    $theproject->project_name = $singleproject->project_name;
    $theproject->project_category = $singleproject->category;
    $theproject->project_demo = $singleproject->demo;
    $theproject->project_git = $singleproject->git;
    $theproject->project_languages = $project->getProjectLanguages($project_id);
    array_push($theprojects, $theproject);
  }

//Create pagination to display the single projects, 3 project on 1 page
  $results_per_page = 3;
  $number_of_results = count($theprojects);
  $number_of_pages = ceil($number_of_results / $results_per_page);
  $offset_remainder = $number_of_results % $results_per_page;

//Determine offset
  if ($offset_remainder === 0) { //3, 6, 9 ...
    $objects_array = [];
    for ($i = 0; $i < $number_of_pages; $i++) {
      $m = $results_per_page * $i;
      $objects_group = [];
      for ($j = 0; $j < $results_per_page; $j++) {
        $object = $theprojects[$j + $m];
        array_push($objects_group, $object);
      }
      array_push($objects_array, $objects_group);
    }
  } else {
    $objects_array = [];
    for ($i = 0; $i < $number_of_pages; $i++) {
      $m = $results_per_page * $i;
      $objects_group = [];
      if ($i == $number_of_pages - 1) { //When it's the last page
        for ($j = 0; $j < $offset_remainder; $j++) {
          $object = $theprojects[$j + $m];
          array_push($objects_group, $object);
        }
      } else {
        for ($j = 0; $j < $results_per_page; $j++) {
          $object = $theprojects[$j + $m];
          array_push($objects_group, $object);
        }
      }
      array_push($objects_array, $objects_group);
    }
  }

//Display the page numbers navigation
  $page_numbers = [];
  for ($i=0; $i < $number_of_pages; $i++) {
    $number = $i + 1;
    $page_number = "0".$number;
    array_push($page_numbers, $page_number);
  }

  $single_languages = $project->findalluniquelanguages();
  $number = count($single_languages);
  $repeats = [];
  foreach ($single_languages as $single_language) {
    $single_repeat = $project->countSingleLanguage($single_language->language_name);
    array_push($repeats, $single_repeat);
  }

//Pass variables to the view template
  $template = new Template('templates/home.php');
  $template->site_name = $site_name;
  $template->page_numbers = $page_numbers;
  $template->all_projects = $objects_array;
  $template->get_the_language = $language_name; 
  $template->uniqueLanguages = $project->findalluniquelanguages();
  $template->number_of_languages = count($project->findalluniquelanguages());
  $template->number_of_projects = count($project->getAllProjects());
  $template->language_repeats = $repeats;
  
  echo $template;
