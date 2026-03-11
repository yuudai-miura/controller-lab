export default function initNews() {

    const newsButtons = document.querySelectorAll(".news_toggle");

    newsButtons.forEach((button) => {
        button.addEventListener("click", () => {

            const item = button.closest(".news_item");

            const newsOpen = document.querySelectorAll(".news_item.open");

            newsOpen.forEach((opened) => {
                if (opened !== item) opened.classList.remove("open");
            });

            item.classList.toggle("open");

        });
    });
}