export default function initCart() {
    const modal = document.getElementById("cartModal");
    if (!modal) return;

    const addToCartBtn = document.querySelector(".single_cart_btn");
    const closeBtn = document.querySelector(".cart_back_btn");
    const cartBtns = document.querySelectorAll(".cart_link_btn");
    const cartList = modal.querySelector(".cart_list");
    const totalPriceEl = modal.querySelector(".cart_total_price");
    const header = document.getElementById("siteHeader");

    if (!cartList || !totalPriceEl || !closeBtn) return;

    const STORAGE_KEY = "controller_lab_cart";

    const getCart = () => {
        try {
            return JSON.parse(localStorage.getItem(STORAGE_KEY)) || [];
        } catch (error) {
            return [];
        }
    };

    const saveCart = (cart) => {
        localStorage.setItem(STORAGE_KEY, JSON.stringify(cart));
    };

    const formatPrice = (price) => {
        return `¥${Number(price).toLocaleString()} JPY`;
    };

    const open = () => {
        renderCart();
        modal.classList.add("open");
        modal.setAttribute("aria-hidden", "false");
        document.body.style.overflow = "hidden";
    };

    const close = () => {
        modal.classList.remove("open");
        modal.setAttribute("aria-hidden", "true");
        document.body.style.overflow = "";
    };

    const addItemToCart = (item) => {
        const cart = getCart();
        const existing = cart.find((cartItem) => String(cartItem.id) === String(item.id));

        if (existing) {
            existing.qty += item.qty;
        } else {
            cart.push(item);
        }

        saveCart(cart);
    };

    const updateItemQty = (id, type) => {
        const cart = getCart();
        const target = cart.find((item) => String(item.id) === String(id));
        if (!target) return;

        if (type === "increase") {
            target.qty += 1;
        }

        if (type === "decrease") {
            target.qty -= 1;
        }

        const newCart = cart.filter((item) => item.qty > 0);
        saveCart(newCart);
        renderCart();
    };

    const calcTotal = (cart) => {
        return cart.reduce((sum, item) => sum + item.price * item.qty, 0);
    };

    const renderCart = () => {
        const cart = getCart();

        if (!cart.length) {
            cartList.innerHTML = `<p class="cart_empty">カートに商品が入っていません。</p>`;
            totalPriceEl.textContent = formatPrice(0);
            return;
        }

        cartList.innerHTML = cart
            .map(
                (item) => `
          <div class="cart_item" data-id="${item.id}">
            <img src="${item.image}" alt="${item.name}" class="cart_item_img">
            <div class="cart_item_info">
              <p class="cart_item_name">${item.name}</p>
              <p class="cart_item_price">¥${Number(item.price).toLocaleString()}</p>
              <div class="cart_qty">
                <button type="button" class="cart_qty_btn" data-action="decrease">−</button>
                <input class="cart_qty_input" type="number" value="${item.qty}" min="1" readonly>
                <button type="button" class="cart_qty_btn" data-action="increase">＋</button>
              </div>
            </div>
          </div>
        `
            )
            .join("");

        totalPriceEl.textContent = formatPrice(calcTotal(cart));
    };

    cartBtns.forEach((btn) => {
        btn.addEventListener("click", (e) => {
            e.preventDefault();

            if (header) header.classList.remove("open");

            const hamburger = header?.querySelector(".hamburger_btn");
            if (hamburger) {
                hamburger.setAttribute("aria-expanded", "false");
            }

            open();
        });
    });


    if (addToCartBtn) {
        addToCartBtn.addEventListener("click", (e) => {
            e.preventDefault();

            const qtyInput = document.querySelector(".single_qty_input");
            const qty = qtyInput ? Math.max(1, parseInt(qtyInput.value, 10) || 1) : 1;

            const item = {
                id: addToCartBtn.dataset.productId,
                name: addToCartBtn.dataset.productName || "",
                price: Number(addToCartBtn.dataset.productPrice || 0),
                image: addToCartBtn.dataset.productImage || "",
                qty,
            };

            addItemToCart(item);
            open();
        });
    }

    cartList.addEventListener("click", (e) => {
        const btn = e.target.closest(".cart_qty_btn");
        if (!btn) return;

        const cartItem = btn.closest(".cart_item");
        if (!cartItem) return;

        const id = cartItem.dataset.id;
        const action = btn.dataset.action;

        updateItemQty(id, action);
    });

    closeBtn.addEventListener("click", close);

    modal.addEventListener("click", (e) => {
        if (e.target === modal) close();
    });

    window.addEventListener("keydown", (e) => {
        if (e.key === "Escape") close();
    });

    renderCart();
    modal.setAttribute("aria-hidden", "true");
}