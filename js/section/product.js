export default function initProduct() {
    const modal = document.querySelector(".product_modal");
    const openBtn = document.querySelector(".product_modal_btn");
    const closeBtn = document.querySelector(".product_modal_back_btn");

    const categoryBtns = document.querySelectorAll(".product_modal_item[data-category]");
    const productItems = document.querySelectorAll(".product_item[data-category]");

    const applyBtn = document.querySelector(".product_modal_apply");
    const resetBtn = document.querySelector(".product_modal_reset");

    if (!modal || !openBtn || !closeBtn) return;

    let selectedCategory = null;

    const openModal = () => modal.classList.add("open");
    const closeModal = () => modal.classList.remove("open");

    const syncActiveButton = () => {
        categoryBtns.forEach((btn) => {
            const cat = btn.dataset.category;
            btn.classList.toggle("is-active", selectedCategory === cat);
        });
    };

    const applyFilterToProducts = () => {
        productItems.forEach((item) => {
            const cat = item.dataset.category;
            const shouldShow = !selectedCategory || cat === selectedCategory;
            item.style.display = shouldShow ? "" : "none";
        });
    };

    const resetAll = () => {
        selectedCategory = null;
        syncActiveButton();
        applyFilterToProducts();
    };

    openBtn.addEventListener("click", () => {
        openModal();
        syncActiveButton();
    });

    closeBtn.addEventListener("click", closeModal);

    modal.addEventListener("click", (e) => {
        if (e.target === modal) closeModal();
    });

    categoryBtns.forEach((btn) => {
        btn.addEventListener("click", () => {
            const cat = btn.dataset.category;
            selectedCategory = (selectedCategory === cat) ? null : cat;
            syncActiveButton();
        });
    });

    if (applyBtn) {
        applyBtn.addEventListener("click", () => {
            applyFilterToProducts();
            closeModal();
        });
    }

    if (resetBtn) {
        resetBtn.addEventListener("click", (e) => {
            e.preventDefault();
            resetAll();
        });
    }

    resetAll();
}