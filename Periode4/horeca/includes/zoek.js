function filterTable() {
    const input = document.getElementById("zoekbalk");
    const filter = input.value.toLowerCase();
    const table = document.getElementById("dinerTable");
    const rows = table.getElementsByTagName("tr");

    for (let i = 1; i < rows.length; i++) { // Start from 1 to skip the header row
        const cells = rows[i].getElementsByTagName("td");
        let match = false;
        
        for (let j = 0; j < cells.length; j++) {
            if (cells[j]) {
                const text = cells[j].textContent || cells[j].innerText;
                if (text.toLowerCase().indexOf(filter) > -1) {
                    match = true;
                    break;
                }
            }
        }

        rows[i].style.display = match ? "" : "none"; // Show row if match found, hide otherwise
    }
}