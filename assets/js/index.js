// When the document is ready
$(function()
{
  // Tooltips
  $('[data-toggle="tooltip"]').tooltip();

  // When a collapse link is clicked
  $('a[data-target="collapse"]').on('click touchstart', function(e) {
    console.log(e);
    // Close all collapses
    $('.collapse').collapse('hide');
  });

  // When a close button is clicked in a collapse
  $('.collapse .close').on('click touchstart', function(e) {
    // Close the current collapse
    $(e.target).closest('.collapse').collapse('hide');
  });
});
