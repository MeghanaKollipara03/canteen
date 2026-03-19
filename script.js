function addToCart(name,price){

let cart=JSON.parse(localStorage.getItem("cart"))||[];

cart.push({name,price});

localStorage.setItem("cart",JSON.stringify(cart));

alert("Item added to cart");

}

function displayCart(){

let cart=JSON.parse(localStorage.getItem("cart"))||[];

let total=0;

cart.forEach(item=>{

document.getElementById("cartItems").innerHTML+=
`<p>${item.name} - ₹${item.price}</p>`;

total+=item.price;

});

document.getElementById("total").innerHTML="Total: ₹"+total;

}

if(document.getElementById("cartItems")){
displayCart();
}

function checkout(){

let cart=JSON.parse(localStorage.getItem("cart"))||[];

localStorage.setItem("orders",JSON.stringify(cart));

localStorage.removeItem("cart");

alert("Order Placed!");

location.reload();

}