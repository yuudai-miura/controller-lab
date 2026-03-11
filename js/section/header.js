export default function initHeader() {

    const header = document.getElementById("siteHeader");
    if (!header) return;

    const hamburger = header.querySelector(".hamburger_btn");
    const drawer = header.querySelector("#header_drawer");
    if (!hamburger || !drawer) return;

    hamburger.addEventListener("click", () => {
        const isOpen = header.classList.toggle("open");

        hamburger.setAttribute("aria-expanded", String(isOpen));
    });

    drawer.addEventListener("click", (e) => {
        if (e.target === drawer) {
            header.classList.remove("open");
            hamburger.setAttribute("aria-expanded", "false");
        }
    });

}