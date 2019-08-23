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

<div class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
          <p class="text-dark px-5">↓ Below are some programming languages/frameworks/platforms I use the most often. Pick one to see its relevant projects :)</p>
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
            <div class="lang mt-5 pb-5 mb-5">
              <h3><?php echo $languages[$i]->language_name ?><span style="font-size: 1rem">Used in <?php echo $percent_output ?> of projects</span></h3>
              <div class="bar mt-2 shadow-sm" style="width: <?php echo $percent_output ?>">
                <div style="background-color: <?php echo $languages[$i]->icon_color; ?>;"></div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>