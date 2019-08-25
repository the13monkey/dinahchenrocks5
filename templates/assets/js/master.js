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
var speed_subtitle = 50;

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
setTimeout(type_subtitle, 500);

/* jQuery Liberary */
init();

$('#trigger-container').click(function()
{
  showCloseContainer();
  showAllProjects();
});

$('#close-container').click(function()
{
  init();
  
});

$('.lang').click(function()
{
  $('body,html').animate({
    scrollTop: 0
  }, 300);
  let idValue = $(this).attr('id');
  dynamicProjects(idValue);
});

function init()
{ 
    styleReady();
    showTriggerContainer();
    backTop();
}

function styleReady()
{
  $('.jumbotron').hide();
  $('#home').show();

  $('.py-5').hide();
  $('#home-wrapper').show();

  $('#close-container').hide();
  $('#close-container span').hide();

}

function backTop()
{
  $('#back-to-top').click(function () {
    $('body,html').animate({
        scrollTop: 0
    }, 800);
    return false;
  });
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

function showCloseContainer()
{
    $('#close-container').show();
    $('#trigger-container').fadeOut();
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
}

function showAllProjects()
{
  $('.jumbotron').hide();
  $('#all').show(); //Add slideIn effect

  $('.py-5').hide();
  $('#all-wrapper').show(); //Add slideIn effect
}

function dynamicProjects(language)
{
  let sectionId = '#'+language; 
  let pyId = '#'+language+'-wrapper';

  $('.jumbotron').hide();
  $(sectionId).fadeIn(500);


  $('.py-5').hide();
  $(pyId).find('.card').delay(800).addClass('slideUp');
  $(pyId).show();

  showCloseContainer();
  
}
