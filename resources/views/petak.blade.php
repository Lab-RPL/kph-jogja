@extends('layouts.main')
@section('content')

  <div class="garis">
    <div class="border-list">
      <h2>DATA PETAK</h2>
      <p>Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>

      <div class="wrapper">
        <div class="bdh">
            <h3>BDH.4688</h3>
          </div>
          <div class="rph">
            <h3>RPH.7888</h3>
          </div>
      </div>

      <form>
        <table id="tabelData">
          <thead>
            <tr>
              <th>Nama Petak</th>
              <th>Luas RPH</th>
              <th>Potensi</th>
              <th>Keterangan lain</th>
            </tr>
          </thead>
          <tbody>
            <!-- Isi data dinamis di sini -->
          </tbody>
        </table>
        <div id="pagination" class="pagination">
          <!-- Pagination dinamis di sini -->
        </div>
        <div class="button-container">
          <button type="submit">Tambah Data</button>
        </div>
        <div class="button-kembali">
          <button type="submit">Kembali</button>
        </div>
      </form>
    </div>
  </div>

  <script>
      const tabelData = document.getElementById("tabelData");
  const tbody = tabelData.querySelector("tbody");
  const pagination = document.getElementById("pagination");

  const data = [
    { petak: "4688", rph: "Budi", potensi: "120 m", keterangan: "xxxxxxxxx" },
    { petak: "4688", rph: "Ani",  potensi:  "20 m", keterangan: "xxxxxxxxx" },
    { petak: "4688", rph: "Siti", potensi: "120 m", keterangan: "xxxxxxxxx" },
    { petak: "4688", rph: "Rina", potensi: "120 m", keterangan: "xxxxxxxxx" },
    { petak: "4688", rph: "Asep", potensi: "120 m", keterangan: "xxxxxxxxx" },
    { petak: "4688", rph: "Ali",  potensi:  "20 m", keterangan: "xxxxxxxxx" },
    { petak: "4688", rph: "Joko", potensi: "120 m", keterangan: "xxxxxxxxx" },
    { petak: "4688", rph: "Tono", potensi: "120 m", keterangan: "xxxxxxxxx" },
    { petak: "4688", rph: "Rini", potensi: "120 m", keterangan: "xxxxxxxxx" },
    { petak: "4688", rph: "Dani", potensi: "120 m", keterangan: "xxxxxxxxx" },
    { petak: "4688", rph: "Eko",  potensi:  "20 m", keterangan: "xxxxxxxxx" },
    { petak: "4688", rph: "Entis",potensi: "120 m", keterangan: "xxxxxxxxx" }
  ];

  const itemsPerPage = 5;

  function displayData(items, currentPage = 1) {
    const start = (currentPage - 1) * itemsPerPage;
    const end = start + itemsPerPage;
    const dataToDisplay = items.slice(start, end);

    tbody.innerHTML = "";
    for (const item of dataToDisplay) {
      const row = document.createElement("tr");
      row.innerHTML = `<td>${item.petak}</td><td>${item.rph}</td><td>${item.potensi}</td><td>${item.keterangan}</td>`;
      tbody.appendChild(row);
    }
  }

    //menambahkan pagination
    function createPagination(items) {
  const totalPages = Math.ceil(items.length / itemsPerPage);

  pagination.innerHTML = "";

  // Add previous button
  const prevButton = document.createElement("a");
  prevButton.href = "#";
  prevButton.innerText = "Sebelumnya";
  prevButton.id = "prev";
  prevButton.setAttribute("data-prev", 0);

  prevButton.addEventListener("click", (e) => {
    e.preventDefault();
    const currentPage = Number(e.target.dataset.prev);
    if (currentPage > 0) {
      displayData(items, currentPage);
      createPagination(items, currentPage);
    }
  });

  pagination.appendChild(prevButton);

  for (let i = 1; i <= totalPages; i++) {
    const pageButton = document.createElement("a");
    pageButton.href = "#";
    pageButton.innerText = i;

    pageButton.addEventListener("click", (e) => {
      e.preventDefault();
      displayData(items, i);
      createPagination(items, i);
    });

    pagination.appendChild(pageButton);
  }

  // Add next button
  const nextButton = document.createElement("a");
  nextButton.href = "#";
  nextButton.innerText = "Selanjutnya";
  nextButton.id = "next";
  nextButton.setAttribute("data-next", 0);

  nextButton.addEventListener("click", (e) => {
    e.preventDefault();
    const currentPage = Number(e.target.dataset.next) + 2;
    if (currentPage <= totalPages) {
      displayData(items, currentPage);
      createPagination(items, currentPage);
    }
  });

  pagination.appendChild(nextButton);
}

function createPagination(items, activePage = 1) {
  const totalPages = Math.ceil(items.length / itemsPerPage);

  pagination.innerHTML = "";

  // Add previous button
  const prevButton = document.createElement("a");
  prevButton.href = "#";
  prevButton.innerText = "Sebelumnya";
  prevButton.id = "prev";
  prevButton.setAttribute("data-prev", activePage - 1);

  prevButton.addEventListener("click", (e) => {
    e.preventDefault();
    const currentPage = Number(e.target.dataset.prev);
    if (currentPage > 0) {
      displayData(items, currentPage);
      createPagination(items, currentPage);
    }
  });

  pagination.appendChild(prevButton);

  // Add page buttons
  for (let i = 1; i <= totalPages; i++) {
    const pageButton = document.createElement("a");
    pageButton.href = "#";
    pageButton.innerText = i;

    pageButton.addEventListener("click", (e) => {
      e.preventDefault();
      displayData(items, i);
      createPagination(items, i);
    });

    pagination.appendChild(pageButton);
  }

  // Add next button
  const nextButton = document.createElement("a");
  nextButton.href = "#";
  nextButton.innerText = "Selanjutnya";
  nextButton.id = "next";
  nextButton.setAttribute("data-next", activePage + 1);

  nextButton.addEventListener("click", (e) => {
    e.preventDefault();
    const currentPage = Number(e.target.dataset.next);
    if (currentPage <= totalPages) {
      displayData(items, currentPage);
      createPagination(items, currentPage);
    }
  });

  pagination.appendChild(nextButton);

  // Add active class to the active page link
  const pageLinks = pagination.querySelectorAll("a");
  for (let i = 0; i < pageLinks.length; i++) {
    const pageLink = pageLinks[i];
    if (Number(pageLink.innerText) === activePage) {
      pageLink.classList.add("active");
    } else {
      pageLink.classList.remove("active");
    }
  }

  // Update data-prev and data-next attributes to the new current page
  document.getElementById("prev").dataset.prev = activePage - 1;
  document.getElementById("next").dataset.next = activePage + 1;
}

displayData(data);
createPagination(data);
  </script>
@endsection