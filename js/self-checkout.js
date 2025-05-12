export function selfCheckout() {
	const form = document.querySelector('.self-checkout form');
	const item1PriceElement = document.querySelector('input[name="item1Price"]');
	const item1QuantityElement = document.querySelector('input[name="item1Quantity"]');
	const item2PriceElement = document.querySelector('input[name="item2Price"]');
	const item2QuantityElement = document.querySelector('input[name="item2Quantity"]');
	const item3PriceElement = document.querySelector('input[name="item3Price"]');
	const item3QuantityElement = document.querySelector('input[name="item3Quantity"]');
	const outputElement = document.querySelector('.self-checkout .form-output');

	form.addEventListener('submit', function(event) {
		event.preventDefault();

		let item1Price = Number(item1PriceElement.value);
		let item1Quantity = Number(item1QuantityElement.value);
		let item2Price = Number(item2PriceElement.value);
		let item2Quantity = Number(item2QuantityElement.value);
		let item3Price = Number(item3PriceElement.value);
		let item3Quantity = Number(item3QuantityElement.value);


		if (!item1Price || !item1Quantity || !item2Price || !item2Quantity || !item3Price || !item3Quantity ) {
			outputElement.innerHTML = `<p class="error">Please make sure there are no empty inputs</p>`;
		} else {
			let item1Total = item1Price * item1Quantity;
			let item2Total = item2Price * item2Quantity;
			let item3Total = item3Price * item3Quantity;
			let subtotal = getSubtotal(item1Total, item2Total, item3Total);
			let tax = getTax(subtotal);
			let total = getTotal(subtotal, tax);

			function getSubtotal(item1, item2, item3) {
				return item1 + item2 + item3;
			}

			function getTax(subtotal) {
				return subtotal * 0.055;
			}

			function getTotal(subtotal, tax) {
				return subtotal + tax;
			}

			outputElement.innerHTML = `
				<p>Subtotal: $${subtotal.toFixed(2)}</p>
				<p>Tax: $${tax.toFixed(2)}</p>
				<p>Total: $${total.toFixed(2)}</p>
			`;
		}
	});
};

export function selfCheckout2() {
	const selfCheckoutElement = document.querySelector('.self-checkout-js');
	const itemsElement = selfCheckoutElement.querySelector('.items');
	const cartElement = selfCheckoutElement.querySelector('.cart');
	const cartTotalElement = selfCheckoutElement.querySelector('.cart-total');
	const clearCartButton = selfCheckoutElement.querySelector('.clear-cart');
	const cart = [];
	const items = [
		{
			id: 1,
			name: "Apple",
			price: "1.5"
		},
		{
			id: 2,
			name: "Bread",
			price: "4"
		},
		{
			id: 3,
			name: "Coffee",
			price: "8"
		}
	];

	function renderItems() {
		itemsElement.innerHTML = items.map(item => `
			<li>
				<button data-id="${item.id}">${item.name}</button>
			</li>
		`).join('');
	}

	function addToCart(id) {
		const itemInCart = cart.find(item => item.id === id);

		if (itemInCart) {
			itemInCart.quantity += 1;
		} else {
			const item = items.find(item => item.id === id);
			cart.push({...item, quantity: 1});
		}

		renderCart();
	}

	function renderCart() {
		let subtotal = 0;
		cartElement.innerHTML = cart.map(item => {
			const itemTotal = item.price * item.quantity;
			subtotal += itemTotal;

			return `
				<li>
				<p>${item.quantity} ${item.name} $${itemTotal.toFixed(2)}</p>
				<button class="decrease" data-id="${item.id}">-</button>
				<button class="increase" data-id="${item.id}">+</button>
				</li>
			`
		}).join('');

		const tax = subtotal * 0.055;
		const total = subtotal + tax;

		cartTotalElement.innerHTML = `
			<p>Subtotal: $${subtotal.toFixed(2)}</p>
			<p>Tax: $${tax.toFixed(2)}</p>
			<p>Total: $${total.toFixed(2)}</p>
		`;

		if (cart.length === 0) {
			clearCartButton.style.display = 'none';
		} else {
			clearCartButton.style.display = 'block';
		}
	}

	clearCartButton.addEventListener('click', function() {
		cart.length = 0;
		renderCart();
	});

	itemsElement.addEventListener('click', function(event){
		if (event.target.tagName === 'BUTTON') {
			const id = Number(event.target.dataset.id);
			addToCart(id);
		}
	});

	cartElement.addEventListener('click', function(event) {
		const id = Number(event.target.dataset.id);
		const item = cart.find(item => item.id === id);

		if (event.target.classList.contains('increase')) {
			item.quantity += 1;
		} else if (event.target.classList.contains('decrease')) {
			item.quantity -= 1;

			if (item.quantity <= 0) {
				const index = cart.indexOf(item);
				if (index > -1) cart.splice(index, 1);
			}
		}

		renderCart();
	})

	renderItems();
	renderCart();
};