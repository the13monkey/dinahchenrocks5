/* Vanilla JS */

//Custom Cursor 
var cursor = document.getElementById('cursor');
document.addEventListener('mousemove', e => {
  var w = window.innerWidth - 30;
  var h = window.innerHeight - 30; 
  if (e.pageX == 0 || e.pageY == 0 || e.pageX >= w) {
    cursor.setAttribute('style', 'display:none');
  } else {
    cursor.setAttribute('style', 'top: '+ (e.pageY - 15) +'px; left: '+ (e.pageX - 15) +'px; display: block');
  }
});

//Typewritter Effect
var i = 0;
var j = 0;
var title = "Hi, I\'m Dinah."; //length: 14
var subtitle = "I\'m a full-stack web developer."; //length: 31  
var speed_title = 50;
var speed_subtitle = 100;

function typeTitle()
{
  if (i < title.length) {
    document.getElementById("title").innerHTML += title.charAt(i);
    i++;
    setTimeout(typeTitle, speed_title);
  }
}

var type_subtitle = function typeSubtitle()
{
  if (j < subtitle.length) {
    document.getElementById("subtitle").innerHTML += subtitle.charAt(j);
    j++;
    setTimeout(typeSubtitle, speed_subtitle);
  }
}

typeTitle();
setTimeout(type_subtitle, 800);

/* jQuery Liberary */
init();

dynamicProjects();

function init()
{
    showTriggerContainer();
}

function showTriggerContainer()
{
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

function dynamicProjects()
{
  $('.jumbotron').hide();
  $('#all').show();
}