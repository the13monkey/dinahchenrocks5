<?php include('header.php'); ?>

<section class="jumbotron text-center" id="home">
    <div class="container" id="landing-title">
      <h1 class="jumbotron-heading display-3" id="title"></h1>
      <p class="lead text-dark display-5" id="subtitle"></p>
      <p>
        <a href="#" class="btn btn-dark my-2">Contact Me →</a>
      </p>
    </div>
</section>

<section class="jumbotron text-center" id="all">
    <div class="container">
      <h1 class="jumbotron-heading display-3">All Projects</h1>
      <p class="lead text-dark display-5">I began to teach myself web development since 2014. Ups and downs are inevitable in the learning process, but I keep moving forward.</p>
      <p>
        <a href="#" class="btn btn-dark my-2">Contact Me →</a>
      </p>
    </div>
</section>

<?php foreach ($languages as $language): ?>
  <section class="jumbotron text-center" id="<?php echo $language->language_name; ?>">
    <div class="container">
      <h1 class="jumbotron-heading display-3 text-break"><?php echo $language->language_name; ?> Projects</h1>
      <p class="lead text-dark display-5"><?php echo $language->icon_lead; ?></p>
      <p>
        <a href="#" class="btn btn-dark my-2">Contact Me →</a>
      </p>
    </div>
  </section>
<?php endforeach; ?>

<div class="container-fluid">
  <div class="py-5 bg-light row" id="home-wrapper">
    <div class="container">
        <div class="row justify-content-center">
          <p class="text-dark text-center">↓ Below are some programming languages/frameworks/platforms I use the most often. Pick one to see its relevant projects :)</p>
        </div>
        <div class="row">
          <div class="container pb-5 mb-5">
            <?php 
               for ($i=0; $i<$total_languages; $i++) 
               {
                 $percent = $lang_repeats[$i] / $total_projects;
                 $percent_format = $percent * 100;
                 $percent_output = round($percent_format)."%";
            ?>
            <div class="lang mt-5 pb-5 mb-5" id="<?php echo $languages[$i]->language_name ?>">
              <div class="container d-flex justify-content-between align-items-center">
                <h3><?php echo $languages[$i]->language_name ?></h3>
                <span style="font-size: 1rem; line-height: 1" class="text-right">Used in <?php echo $percent_output ?> of projects</span>
              </div>
              <div class="bar mt-2 shadow-sm" style="width: calc(<?php echo $percent_output ?> - 30px)">
                <div style="background-color: <?php echo $languages[$i]->icon_color; ?>;"></div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
    </div>
  </div>

  <?php foreach ($specific_projects as $specific_project): ?>
    <div class="py-5 bg-light row" id="<?php echo $specific_project->name; ?>-wrapper">
      <div class="container">
         <div class="row">
           <?php foreach ($specific_project->projects as $project): ?>
           <div class="col-md-4 mb-3 mt-5">
              <div class="card mb-4 shadow-sm">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $project->project_name; ?></h5>
                  <p class="display-5"><?php echo $project->category; ?></p>
                  <p class="card-text"><?php echo $project->project_des; ?></p>
                  <ul class="list-group list-group-horizontal mb-4">
                    <?php foreach ($project->import_langs as $lang): ?>
                    <li class="list-group-item border-0">
                      <img src="templates/assets/img/<?php echo $lang->icon_location; ?>" />
                    </li>
                    <?php endforeach; ?>
                  </ul>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a class="btn btn-sm btn-outline-secondary" href="<?php echo $project->demo; ?>"><i class="fas fa-laptop-code text-secondary mr-2"></i>Demo</a>
                      <a class="btn btn-sm btn-outline-secondary" href="<?php echo $project->git ?>"><i class="fab fa-github text-secondary mr-2"></i>Git Repo</a>
                    </div>
                  </div>
                </div>
              </div>
           </div>
           <?php endforeach; ?>
         </div>
      </div>
    </div>                  
  <?php endforeach; ?>

  <div class="py-5 bg-light row" id="all-wrapper">
    <div class="container">
    <?php 
      $counter = count($all_projects);
      for ($i=0; $i<$counter; $i++) {
        $single_row_projects = $all_projects[$i];
    ?>
        <div class="row">
          <?php foreach ($single_row_projects as $project) :?>
          <div class="col-md-4 mb-3 mt-5">
            <div class="card mb-4 shadow-sm">
              <div class="card-body">
                <h5 class="card-title"><?php echo $project->project_name; ?></h5>
                <p class="display-5"><?php echo $project->project_category; ?></p>
                <p class="card-text"><?php echo $project->project_des; ?></p>
                <ul class="list-group list-group-horizontal mb-4">
                  <?php 
                    $languages = $project->project_languages; 
                    foreach ($languages as $language):
                  ?>
                  <li class="list-group-item border-0">
                    <img src="templates/assets/img/<?php echo $language->icon_location; ?>" />
                  </li>
                  <?php endforeach; ?>
                </ul>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a class="btn btn-sm btn-outline-secondary" href="<?php echo $project->demo; ?>"><i class="fas fa-laptop-code text-secondary mr-2"></i>Demo</a>
                    <a class="btn btn-sm btn-outline-secondary" href="<?php echo $project->git ?>"><i class="fab fa-github text-secondary mr-2"></i>Git Repo</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div> 
    <?php }; ?>    
    </div>
  </div>

  

</div>  

<?php include('footer.php'); ?>