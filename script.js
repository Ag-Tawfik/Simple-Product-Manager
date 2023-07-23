const productType = document.getElementById("productType");
const dvd = document.getElementById("DVD");
const furniture = document.getElementById("Furniture");
const book = document.getElementById("Book");
dvd.classList.add("d-none");
furniture.classList.add("d-none");
book.classList.add("d-none");

productType.addEventListener("change", () => {
    const selectedOption = productType.options[productType.selectedIndex].text;

    [dvd, furniture, book].forEach((element) => element.classList.add("d-none"));

    if (selectedOption === "DVD") {
        dvd.classList.remove("d-none");
        dvd.classList.add("d-block");
    } else if (selectedOption === "Furniture") {
        furniture.classList.remove("d-none");
        furniture.classList.add("d-block");
    } else if (selectedOption === "Book") {
        book.classList.remove("d-none");
        book.classList.add("d-block");
    }
});

// switcher validation

function toggleFields(productType) {
    const dvdSection = document.getElementById("DVD");
    const furnitureSection = document.getElementById("Furniture");
    const bookSection = document.getElementById("Book");
    const size = document.getElementById("size");
    const height = document.getElementById("height");
    const width = document.getElementById("width");
    const length = document.getElementById("length");
    const weight = document.getElementById("weight");

    switch (productType) {
        case "DVD":
            dvdSection.style.display = "block";
            //size.required = true;
            break;
        case "Furniture":
            furnitureSection.style.display = "block";
            //height.required = true;
            //width.required = true;
            //length.required = true;
            break;
        case "Book":
            bookSection.style.display = "block";
            //weight.required = true;
            break;
        default:
            break;
    }
}
