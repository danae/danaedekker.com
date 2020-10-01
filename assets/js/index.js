// When the document is ready
$(function() {
  // Check for click events on the navbar burger icon
  $(".navbar-burger").click(function() {
      // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
      $(".navbar-burger").toggleClass("is-active");
      $(".navbar-menu").toggleClass("is-active");
  });


  // Get the tag tabs
  let tabs = $("[data-tag-tabs]");
  if (tabs.length > 0) {
    // Get the tab collapses
    let collapses = $("[data-tag-collapse]");

    // Check for click events on tag tab anchors
    tabs.find("a").click(function() {
      // Get the tag from this anchor
      let tab = $(this);
      let tag = tab.attr("data-tag");

      // Iterate over the collapses
      for (let elm of collapses) {
        // Get the tags from this collapse
        let collapse = $(elm);
        let tags = collapse.attr("data-tags").split(/\s*,\s*/);

        // Check if the collapse should be visible
        if (tag === "*" || tags.includes(tag))
        {
          collapse.removeClass('is-hidden');
          collapse.fadeIn(250);
        }
        else
        {
          collapse.fadeOut(250, function() {
            collapse.addClass('is-hidden');
          });
        }
      }

      // Set the parent of this anchor as active
      tabs.find("li").removeClass("is-active");
      tab.parent("li").addClass("is-active");
    });
  }
});
