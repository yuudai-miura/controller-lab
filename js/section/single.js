export default function initQuantity() {
    const qtyBox = document.querySelector(".single_qty");
    if (!qtyBox) return;

    const input = qtyBox.querySelector(".single_qty_input");
    const buttons = qtyBox.querySelectorAll(".single_qty_btn");

    buttons.forEach((btn) => {
        btn.addEventListener("click", () => {
            const action = btn.dataset.action;
            let value = parseInt(input.value, 10);

            if (action === "increase") {
                value++;
            }

            if (action === "decrease" && value > 1) {
                value--;
            }

            input.value = value;
        });
    });
}