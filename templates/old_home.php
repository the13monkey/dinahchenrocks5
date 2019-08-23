<?php
  include('header.php');
?>



        <div id="landing-title">
            <h1 id="title"></h1>
            <p id="subtitle"></p>
            <span>Choose a language to view its correspondent projects</span>
        </div>

        <div id="canvas">
          <?php 
          for ($i=0; $i < $number_of_languages; $i++) { 
            $result = $language_repeats[$i] / $number_of_projects;
            $percent = $result * 100;
            $percent_output = round($percent) ."%";
          ?>
            <div id="<?php echo $uniqueLanguages[$i]->language_name; ?>" class="lang">
              <span>
                <?php echo $uniqueLanguages[$i]->language_name; ?>
                <span class="percent">Used in 
                  <?php echo $percent_output; ?> of projects</span>
              </span>
              <div class="bar" style="width: <?php echo $percent_output; ?>;">
                <span class="bar-color" style="background-color:<?php echo $uniqueLanguages[$i]->color ?>"></span>
              </div>
            </div>
          <?php } ?>
        </div>

<?php
  include('footer.php');
?>
