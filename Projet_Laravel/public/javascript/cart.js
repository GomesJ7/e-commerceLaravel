let cart = {
    counter: 0,
    products: []
};

function display_cart() {
    const div = document.querySelector("#cart_logo").innerHTML = "Cart (" + cart.counter + ")";
}

function buy(id, name, price) {
    let is_in_cart = false;

    cart.products.forEach((product) => {
        if (product.id === id) {
            product.quantity++;
            is_in_cart = true;
        }
    });

    if (!is_in_cart)
    cart.products.push({ id: id, name: name, price: price, quantity: 1});
    cart.counter++;

    display_cart();
    save_cart();
}

function display_cart_table () {
    const cart_content = document.querySelector('#cart_content');
    const total_price = document.querySelector('#total_price');
    cart.products.forEach((product) => {
        console.log(product);
        cart_content.innerHTML += "<tr><td>"
            + product.id + "</td><td>"
            + product.name + "</td><td>"
            + product.quantity + "</td><td>" 
            + product.price + " €" + "</td></tr>";

        
        })
}

function remove_cart () {
    document.querySelector('#cart_content').remove();
    localStorage.removeItem('cart');
    display_cart();
}

function save_cart() {
    localStorage.setItem('cart', JSON.stringify(cart));
}

function load_cart() {
    const saved_cart = JSON.parse(localStorage.getItem('cart'));

    if (saved_cart !== undefined && saved_cart !== null) {
        cart = saved_cart;
        display_cart();
    }
}

load_cart();