document.addEventListener("DOMContentLoaded", function () {
  const titleInput = document.getElementById("title");
  const startDateInput = document.getElementById("start_date");
  const genreInput = document.getElementById("genre");
  const typeButtons = document.getElementsByName("type");
  const summaryInput = document.getElementById("summary");
  const form = document.getElementById("animeForm");
  const titleError = document.getElementById("titleError");

  function validateTitle() {
    const value = titleInput.value.trim();
    if (value === "") {
      titleError.textContent = "Title is required.";
      return false;
    }
    if (value > 50) {
      titleError.textContent = "No more than 50 characters allowed.";
      return false;
    }
    titleError.textContent = "";
    return true;
  }

  function validateStartDate() {
    // Check whether it exists as an actual date
    if (!startDateInput.validity.valid) {
      startDateError.textContent = "invalid date.";
      return false;      
    }
    const value = startDateInput.value.trim();
    if (value === "") {
      startDateError.textContent = "Start Date is required.";
      return false;
    }
    startDateError.textContent = "";
    return true;
  }

  function validateGenre() {
    if (genreInput.value === "") {
      genreError.textContent = "Genre is required.";
      return false;
    } else {
      genreError.textContent = "";
      return true;
    }
  }

  function validateType() {
    let checkedType = document.querySelector("input[name='type']:checked");
    if (checkedType === null) {
      typeError.textContent = "Type is required.";
      return false;
    } else {
      typeError.textContent = "";
      return true;
    }
  }

  function validateSummary() {
    if (summaryInput.value.trim() === "") {
      summaryError.textContent = "Summary is required.";
      return false;
    } else {
      summaryError.textContent = "";
      return true;
    }
  }

  // សុពលភាពនៅពេលការផ្តោតអារម្មណ៍ត្រូវបានបាត់បង់
  titleInput.addEventListener("blur", validateTitle);
  startDateInput.addEventListener("blur", validateStartDate);
  genreInput.addEventListener("blur", validateGenre);
  typeButtons.forEach(radioButton => {
    radioButton.addEventListener('blur', validateType);
  });
  summaryInput.addEventListener("blur", validateSummary);

  // សុពលភាពនៅពេលចុចប៊ូតុងចុះឈ្មោះ
  form.addEventListener("submit", function (event) {
    let isValid = validateTitle();
    isValid = validateStartDate() && isValid;
    isValid = validateGenre() && isValid;
    isValid = validateType() && isValid;
    isValid = validateSummary() && isValid;
    if (!isValid) {
      event.preventDefault(); // stop submit
    }
  });
});