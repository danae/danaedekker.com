// When an iten on the project grid is clicked
var gridClick = function(elm)
{
  const grid = Array.from(document.querySelector("#projects").children);
  const baseOffset = grid[0].offsetTop;
  const breakIndex = grid.findIndex(item => item.offsetTop > baseOffset);
  const numPerRow = (breakIndex === -1 ? grid.length : breakIndex);
}


// When the document is ready
$(function()
{
  // Check for click events on the navbar burger icon
  $(".navbar-burger").click(function()
  {
    // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
    $(".navbar-burger").toggleClass("is-active");
    $(".navbar-menu").toggleClass("is-active");
  });

  // Resolve the email links
  $("a[data-mailto]").on('mouseover touchstart', function() {
    const mailto = atob($(this).attr('data-mailto'));
    $(this).attr('href', `mailto:${mailto}`);
  });

  // Get the tag links
  let tagLinks = $("a[data-tag]");
  if (tagLinks.length > 0)
  {
    // Get the tab collapses
    let tagCollapses = $("[data-tag-collapse]");

    // Check for click events on tag links
    tagLinks.click(function()
    {
      // Get the tag from this link
      let tagLink = $(this);
      let tag = tagLink.attr("data-tag");

      // Set all links inactive
      tagLinks.parents("li").removeClass("is-active");

      // Hide all project collapses
      $("a[data-project]").parents(".grid-item").removeClass("is-active");
      $("[data-project-collapse]").addClass("is-hidden");

      // Iterate over the collapses
      for (let elm of tagCollapses)
      {
        // Get the tags from this collapse
        let tagCollapse = $(elm);
        let tagCollapseTags = tagCollapse.attr("data-tag-collapse").split(/\s*,\s*/);

        // Check if the collapse should be visible
        if (tag === "*" || tagCollapseTags.includes(tag))
        {
          // Show this collapse
          tagCollapse.removeClass("is-hidden").fadeIn(250);
        }
        else
        {
          // Hide this collapse
          tagCollapse.fadeOut(250, () => tagCollapse.addClass("is-hidden"));
        }
      }

      // Set the parent of this link as active
      tagLink.parents("li").addClass("is-active");
    });
  }

  // Get the project links
  let projectLinks = $("a[data-project]");
  if (projectLinks.length > 0)
  {
    // Get the project collapses
    let projectCollapses = $("[data-project-collapse]");

    // Check for click events on project links
    projectLinks.click(function()
    {
      // Get the project from this link
      let projectLink = $(this);
      let project = projectLink.attr("data-project");

      // Set all links to inactive
      projectLinks.parents(".grid-item").removeClass("is-active");

      // Iterate over the collapses
      for (let elm of projectCollapses)
      {
        // Get the tags from this collapse
        let projectCollapse = $(elm);
        let projectCollapseProject = projectCollapse.attr("data-project-collapse");

        // Check if this is the corresponding project collapse
        if (projectCollapseProject.localeCompare(project) === 0 && projectCollapse.hasClass('is-hidden'))
        {
          // Reposition this collapse in the grid
          let gridItem = projectLink.parents(".grid-item");
          let gridItemElm = gridItem.get(0);
          let gridItems = gridItem.parent(".grid").children(".grid-item").get();
          let breakpoint = gridItems.find(elm => elm.offsetTop > gridItemElm.offsetTop);

          if (typeof breakpoint !== "undefined")
            projectCollapse.insertBefore(breakpoint);
          projectCollapse.hide();

          // Show this collapse
          projectCollapse.removeClass("is-hidden").slideDown(250);

          // Set the parent of this link as active
          projectLink.parents(".grid-item").addClass("is-active");
        }
        else
        {
          // Hide this collapse
          projectCollapse.slideUp(250, () => projectCollapse.addClass("is-hidden"));
        }
      }
    });
  }
});
