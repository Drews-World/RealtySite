document.addEventListener("DOMContentLoaded", function() {
  const expandButton = document.getElementById("expandButton");
  const propertyForm = document.getElementById("propertyForm");

  expandButton.addEventListener("click", function() {
    propertyForm.classList.toggle("active");
  });
});
