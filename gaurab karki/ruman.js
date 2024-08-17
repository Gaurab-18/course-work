let popup = document.getElementById("popup");

function openPopup() {
  console.log("Popup opened");
  popup.classList.add("open-popup");
}

function closePopup() {
  popup.classList.remove("open-popup");
}

function populateSizes() {
  const helmetSizes = {
    "Soman helmet": ["small", "medium", "large"],
    KYT: ["extra large", "small", "large"],
    "DRIFT HELMET": ["medium", "large", "extra large"],
    "Spyder Helmets": ["large", "small", "medium"],
    "LS2 helmet": ["small", "medium", "large", "extra large"],
  };

  const helmetSelect = document.getElementById("inputHelmet");
  const sizeSelect = document.getElementById("inputSize");
  const selectedHelmet = helmetSelect.value;
  const sizes = helmetSizes[selectedHelmet];

  // Clear existing options
  sizeSelect.innerHTML = "";

  // Populate new options
  sizes.forEach((size) => {
    const option = document.createElement("option");
    option.value = size;
    option.textContent = size;
    sizeSelect.appendChild(option);
  });
}
