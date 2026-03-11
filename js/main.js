import initInview from "./inview/inview.js";

import initHeader from "./section/header.js";
import initNews from "./section/news.js";
import initProduct from "./section/product.js";
import initQuantity from "./section/single.js";

import initCart from "./modal/cart.js";


import initContactRedirect from "./contact/contact.js";

document.addEventListener("DOMContentLoaded", () => {
    initInview();

    initHeader();
    initNews();
    initProduct();
    initQuantity();

    initCart();

    initContactRedirect();
});




