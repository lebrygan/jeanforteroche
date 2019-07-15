//Set a link on the welcome page
$("#welcomeOverlay").click(function() {
  window.location = $(this).find("a").attr("href"); 
  return false;
});