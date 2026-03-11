export default function initInview() {
    const targets = document.querySelectorAll(".js-reveal");
    if (!targets.length) return;

    targets.forEach((el) => {
        el.classList.add("reveal");
    });

    const io = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("is-inview");
                    io.unobserve(entry.target);
                }
            });
        },
        { root: null, rootMargin: "0px 0px -10% 0px", threshold: 0.15 }
    );

    targets.forEach((el) => io.observe(el));
}