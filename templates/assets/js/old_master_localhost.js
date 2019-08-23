/*
** Vanilla JS
*/

//Type out title and subtitle
var i = 0;
var j = 0;
var title = "Hi, I\'m Dinah."; //length: 14
var subtitle = "I\'m a full-stack web developer."; //length: 31
var speed_title = 50;
var speed_subtitle = 100;

function typeTitle() {
  if (i < title.length) {
    document.getElementById("title").innerHTML += title.charAt(i);
    i++;
    setTimeout(typeTitle, speed_title);
  }
}

var type_subtitle = function typeSubtitle() {
  if (j < subtitle.length) {
    document.getElementById("subtitle").innerHTML += subtitle.charAt(j);
    j++;
    setTimeout(typeSubtitle, speed_subtitle);
  }
}

typeTitle();
setTimeout(type_subtitle, 800);

//Custom Cursor 

var cursor = document.getElementById('cursor');
document.addEventListener('mousemove', e => {
  var w = window.innerWidth - 30;
  var h = window.innerHeight - 30; 
  if (e.pageX == 0 || e.pageY == 0 || e.pageX >= w || e.pageY >= h) {
    cursor.setAttribute('style', 'display:none');
  } else {
    cursor.setAttribute('style', 'top: '+ (e.pageY - 15) +'px; left: '+ (e.pageX - 15) +'px; display: block');
  }
});

/*
** jQuery JS
*/

$(document).ready(function(){

    //On initial load
    initiation();
    
    //When trigger icon is clicked
    $('#trigger-icon').click(function(){
        showAllProjects();
    });

    $('.content h1').addClass('no-opacity');
    $('.content p').addClass('no-opacity');

    $('#close-icon').click(function(){
        $('#landing-title').show();
        $('#canvas').show();
        $('#close-container').hide();
        $('#menu-expand').slideUp(500);
        $('#close-container span').slideUp();
        showTriggerContainer();

        $('.content h1').addClass('no-opacity');
        $('.content p').addClass('no-opacity');
    });

    //Expanded menu pagination and stuff
    
    showNextRow();

    //Show projects by language name
    $('.lang').click(function(){
      var id = $(this).attr('id');
      showProjectsByLanguage(id);
    });

    //The Functions
    function initiation() {
      var currentUrl = window.location.pathname; 
      var currentUrlArray = currentUrl.split("/");
      var test = currentUrlArray[2];
      if (test = "") { //First visit the page
        $('#landing-title').show();
        $('#canvas').show();
        $('#close-container').hide();
        $('#menu-expand').hide();
        $('#close-container span').hide();
        showTriggerContainer();
        $('.content h1').addClass('no-opacity');
        $('.content p').addClass('no-opacity');
      } else {
        $('#close-container span').hide();
        $("#menu-expand").hide();
        $('#landing-title').hide();
        $('#canvas').hide();
        showCloseContainer();
        $('#trigger-container').hide();
        setTimeout(showTriggerContainer, 3800);
        $('#vertical-pagination li:first-child').addClass('active');
      }
      
    }

    function showTriggerContainer() {
      $('#trigger-container').show();
      $('#trigger-circle').addClass('draw-stroke');
      $('#line1').addClass('draw-stroke delay0');
      $('#line2').addClass('draw-stroke delay1');
      $('#trigger-container span').hide();
      setTimeout(function(){
        $('#trigger-container span').slideDown();
      }, 1300);
      setTimeout(function(){
          $('#trigger-circle').removeClass('draw-stroke');
          $('#line1').removeClass('draw-stroke delay0');
          $('#line2').removeClass('draw-stroke delay1');
      },3000);
    }

    function showCloseContainer() {
      $('#close-container').show();
      $('#menu-expand').slideDown(500);
      $('#trigger-container span').slideUp();
      $('#close-circle').addClass('draw-stroke delay0');
      $('#cross1').addClass('draw-stroke delay1');
      $('#cross2').addClass('draw-stroke delay2');
      setTimeout(function(){
        $('#close-container span').slideDown();
      }, 1300);
      setTimeout(function(){
          $('#close-circle').removeClass('draw-stroke delay0');
          $('#cross1').removeClass('draw-stroke delay1');
          $('#cross2').removeClass('draw-stroke delay2');
      },3000);

      $('.content h1').addClass('slideUp delay1');
        setTimeout(function(){
            $('.content h1').removeClass('no-opacity slideUp delay1');
        }, 1400);
        $('.content p').addClass('slideUp delay2');
        setTimeout(function(){
            $('.content p').removeClass('no-opacity slideUp delay2');
        }, 1800);
    }

    function showAllProjects() {
      var redirect_url = "index.php";
      window.location = redirect_url;
    }

    function showProjectsByLanguage(id) {
      var language = id; 
      var redirect_url = "index.php?lang="+language; 
      window.location = redirect_url; 
    }

    function projectSlider() {
      if ($('#vertical-pagination .active').is(':last-child')) {
        $('#vertical-pagination .active').removeClass('active').addClass('inactive');
        $('#vertical-pagination li').first().addClass('active');
      } else {
        $('#vertical-pagination .active').removeClass('active').addClass('inactive');
        $('#vertical-pagination .inactive').next().addClass('active');
      }
      $('#vertical-pagination .inactive').removeClass('inactive');

      if ($('.active-row').is(':last-child')) {
        $('.active-row').removeClass('active-row').addClass('previous-row');
        $('.menu-projects-container').first().addClass('active-row');
      } else {
        $('.active-row').removeClass('active-row').addClass('previous-row');
        $('.previous-row').next().addClass('active-row');
      }
      $('.previous-row').removeClass('previous-row');
    }

    function showNextRow() {
      $('#project-slider .menu-projects-container').hide();
      $('#project-slider .menu-projects-container').first().addClass('active-row');
      var menuExpanded = $('#menu-expand').css("display");
      if (menuExpanded == "block") {
        $(window).bind('mousewheel DOMMouseScroll', function(event){ 
          projectSlider();
        });
        $('#vertical-pagination').click(function(){
          projectSlider();
        });
      }
    }

});
