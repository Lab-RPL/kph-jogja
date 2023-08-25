// add hovered class to selected list item
let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};

//pagination
const tabelData = document.getElementById("tabelData");
const tbody = tabelData.querySelector("tbody");
const pagination = document.getElementById("pagination");

const data = [
  { no: 1, nama: "Budi", email: "budi@example.com" },
  { no: 2, nama: "Ani", email: "ani@example.com" },
  { no: 3, nama: "Siti", email: "siti@example.com" },
  { no: 4, nama: "Rina", email: "rina@example.com" },
  { no: 5, nama: "Asep", email: "asep@example.com" },
  { no: 6, nama: "Ali", email: "ali@example.com" },
  { no: 7, nama: "Joko", email: "joko@example.com" },
  { no: 8, nama: "Tono", email: "tono@example.com" },
  { no: 9, nama: "Rini", email: "rini@example.com" },
  { no: 10, nama: "Dani", email: "dani@example.com" },
  { no: 11, nama: "Eko", email: "eko@example.com" },
  { no: 12, nama: "Entis", email: "entis@example.com" }
];

const itemsPerPage = 5;

function displayData(items, currentPage = 1) {
  const start = (currentPage - 1) * itemsPerPage;
  const end = start + itemsPerPage;
  const dataToDisplay = items.slice(start, end);

  tbody.innerHTML = "";
  for (const item of dataToDisplay) {
    const row = document.createElement("tr");
    row.innerHTML = `<td>${item.no}</td><td>${item.nama}</td><td>${item.email}</td>`;
    tbody.appendChild(row);
  }
}

function createPagination(items) {
  const totalPages = Math.ceil(items.length / itemsPerPage);

  pagination.innerHTML = "";

  for (let i = 1; i <= totalPages; i++) {
    const pageButton = document.createElement("a");
    pageButton.href = "#";
    pageButton.innerText = i;

    pageButton.addEventListener("click", (e) => {
      e.preventDefault();
      displayData(items, i);
    });

    pagination.appendChild(pageButton);
  }
}

displayData(data);
createPagination(data);
