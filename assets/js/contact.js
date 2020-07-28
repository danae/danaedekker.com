// When the document is ready
$(function() {
  // Get the form
  var form = $('#contactForm');

  // Get the messages div
  var formMessages = $('#contactMessages');

  // Set up an event listener for the form
  $(form).submit(function(e) {
    // Stop the browser from submitting the form
    e.preventDefault();

    // Serialize the form data
    var formData = $(form).serialize();

    // Submit the form using AJAX
    $.ajax({
      type: 'POST',
      url: $(form).attr('action'),
      data: formData
    }).done(function(response) {
      // Create an alert with the success message
      var alert = document.createElement('div');
      $(alert).addClass('notification is-success mb-4');
      $(alert).text(response.message);

      // Add the alert
      $(formMessages).html('').append(alert);

      // Clear the form
      $('#name').val('');
      $('#email').val('');
      $('#message').val('');
    }).fail(function(data) {
      // Create an alert with the error message
      var alert = document.createElement('div');
      $(alert).addClass('notification is-danger mb-4');
      $(alert).text(data.responseJSON.error);

      // Add the alert
      $(formMessages).html('').append(alert);
    });
  });
});
