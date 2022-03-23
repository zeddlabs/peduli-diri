// Datatable
$(document).ready( function () {
    $('#catatanTable').DataTable();
} );

function urutkan(urutan) {
    sortTable(urutan.value);
}

function sortTable(item) {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.getElementById("catatanTable");
    switching = true;
    while (switching) {
      switching = false;
      rows = table.rows;
      for (i = 1; i < (rows.length - 1); i++) {
        shouldSwitch = false;
        x = rows[i].getElementsByTagName("td")[item];
        y = rows[i + 1].getElementsByTagName("td")[item];
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          shouldSwitch = true;
          break;
        }
      }
      if (shouldSwitch) {
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
      }
    }
  }