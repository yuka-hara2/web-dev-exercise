document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("validPracticeForm");

  // សុពលភាពនៅពេលចុចប៊ូតុងចុះឈ្មោះ
  form.addEventListener("submit", function (event) {
    if (!form.reportValidity()) {
      event.preventDefault();
    }
  });
});