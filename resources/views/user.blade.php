@extends('layouts.main')
@section('content')

  <div class="garis">
    <div class="border-list">
      <h2>DATA ADMIN</h2>
      <p>Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>
      <form>
        <table id="tabelData">
          <thead>
            <tr>
              <th>Username</th>
              <th>Email</th>
              <th>Password</th>
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
      </form>
    </div>
  </div>

 {{-- pagination js --}}
 <script>
    const tabelData = document.getElementById("tabelData");
    const tbody = tabelData.querySelector("tbody");
    const pagination = document.getElementById("pagination");
  
    const data = [
      { username: "admin1", email: "admin1@example.com", password: "pw123" },
      { username: "admin2", email: "admin2@example.com", password: "pw123" },
      { username: "admin3", email: "admin3@example.com", password: "pw123" },
      { username: "admin4", email: "admin4@example.com", password: "pw123" },
      { username: "admin5", email: "admin5@example.com", password: "pw123" },
      { username: "admin6", email: "admin6@example.com", password: "pw123" },
      { username: "admin7", email: "admin7@example.com", password: "pw123" },
      { username: "admin8", email: "admin8@example.com", password: "pw123" },
      { username: "admin9", email: "admin9@example.com", password: "pw123" },
      { username: "admin10", email: "admin10@example.com", password: "pw123" },
    ];
  
    const itemsPerPage = 5;
  
    function displayData(items, currentPage = 1) {
      const start = (currentPage - 1) * itemsPerPage;
      const end = start + itemsPerPage;
      const dataToDisplay = items.slice(start, end);
  
      tbody.innerHTML = "";
      for (const item of dataToDisplay) {
        const row = document.createElement("tr");
        row.innerHTML = `<td>${item.username}</td><td>${item.email}</td><td>${item.password}</td>`;
        tbody.appendChild(row);
      }
    }
  
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
