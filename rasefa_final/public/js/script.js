document.addEventListener("DOMContentLoaded", function() {
    // Mengambil semua elemen tab dan konten tab
    const tabs = document.querySelectorAll(".tab");
    const tabContents = document.querySelectorAll(".tab-content");

    // Menambahkan event listener untuk setiap tab
    tabs.forEach(tab => {
        tab.addEventListener("click", function() {
            // Menghapus kelas 'active' dari semua tab dan konten tab
            tabs.forEach(tab => tab.classList.remove("active"));
            tabContents.forEach(content => content.classList.remove("active"));

            // Menambahkan kelas 'active' ke tab yang diklik
            tab.classList.add("active");

            // Menemukan konten tab yang sesuai dengan tab yang diklik
            const selectedTab = tab.getAttribute("data-tab");
            const selectedContent = document.querySelector(`[data-tab="${selectedTab}-content"]`);

            // Menambahkan kelas 'active' ke konten tab yang sesuai
            selectedContent.classList.add("active");
        });
    });
});
