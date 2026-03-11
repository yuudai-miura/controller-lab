export default function initContactRedirect() {

    const contactPage = document.querySelector(".contact");
    if (!contactPage) return;

    document.addEventListener("wpcf7mailsent", function () {
        window.location.href = "/contact-thanks/";
    });

}