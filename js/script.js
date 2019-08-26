$(document).ready(function(){
 $("#searchBar").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $('div[data-role="cardbook"]').filter(function() {
       $(this).toggle($(this).find('h5').text().toLowerCase().indexOf(value) > -1)
    });
  });
});