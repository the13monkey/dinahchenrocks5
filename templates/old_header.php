<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="templates/assets/css/style.css">
    <link rel="shortcut icon" href="templates/assets/img/favicon.png" type="image/png">
    <title><?php echo $site_name; ?></title>
</head>
<body>
    <div id="cursor"></div>

    <div id="wrapper">

        <div id="trigger-container">
            <div id="trigger-icon">
                <svg height="40" width="40">
                    <circle id="trigger-circle" cx="20" cy="20" r="18" style="stroke: #212f3e; stroke-width: 2px; fill: transparent" />
                    <g id="trigger-rect" stroke="#212f3e" stroke-width="2" fill="none">
                        <path id="line1" stroke-linecap="round" d="M10 20 30 20" />
                        <path id="line2" stroke-linecap="round" d="M20 10 20 30" />
                    </g>
                </svg>
            </div>
            <span>All Projects</span>
        </div>

        <div id="menu-expand">

            <div id="close-container">
                <div id="close-icon">
                    <svg height="40" width="40">
                        <circle id="close-circle" cx="20" cy="20" r="18" style="stroke: #cbd6e5; stroke-width: 2px; fill: transparent" />
                        <g id="close-rect" stroke="#cbd6e5" stroke-width="2" fill="none">
                           <path id="cross1" stroke-linecap="round" d="M12 12 28 28" />
                           <path id="cross2" stroke-linecap="round" d="M12 28 28 12" />
                        </g>
                    </svg>
                </div>
                <span style="color: #cbd6e5">Close</span>
                <h3><?php echo $get_the_language; ?> Projects</h3>
            </div>

            <div id="project-slider">
            <?php
                $number_of_rows = count($all_projects);
                for ($i = 0; $i < $number_of_rows; $i ++) {
                  $page_number = $i + 1;
                  $single_row_projects = $all_projects[$i];
            ?>
                <div class="menu-projects-container" id="row<?php echo $page_number; ?>">
                  <?php foreach ($single_row_projects as $single_row_project): ?>
                  <div class="menu-project-col">
                    <div class="menu-project">
                        <div class="content">
                            <h1><?php echo $single_row_project->project_name; ?></h1>
                            <p><?php echo $single_row_project->project_category; ?></p>
                            <div class="language-bar">
                                <?php
                                  $languages = $single_row_project->project_languages;
                                  foreach ($languages as $language):
                                ?>
                                <div style="background-image:url('templates/assets/img/<?php echo $language->icon; ?>')"></div>
                                <?php endforeach; ?>
                            </div>
                            <a target="_blank" href="<?php echo $single_row_project->project_demo; ?>">Live Demo</a>
                            <a target="_blank" href="<?php echo $single_row_project->project_git; ?>">Git Repo</a>
                        </div>
                    </div>
                  </div>
                  <?php endforeach; ?>
                </div>
            <?php
                }
            ?>
            </div>
            <p id="scroll">scroll to view more projects</p>

            <ul id="vertical-pagination">
              <?php foreach ($page_numbers as $page_number): ?>
                <li><?php echo $page_number; ?></li>
              <?php endforeach; ?>
            </ul>

        </div><!-- Menu Expand -->
