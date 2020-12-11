const URL_BASE = 'http://localhost/4%C2%B0%20Semestre/Desenvolvimento%20para%20Servidores%20I/loja-virtual/backend/';
const buttonCloseCommentsArea = document.querySelector('.comments-wrapper .comment-wrapper-header i');

const tshirtButton = document.querySelector('.tshirt');
const ballButton = document.querySelector('.ball');

const productWrapper = document.querySelector('.product-card-wrapper');
const sliderWrapper = document.querySelector('.wrapper .inner');

getProducts();
localStorage.removeItem('filter');

tshirtButton.addEventListener('click', () => {
  tshirtButton.classList.toggle('item-selected');

  if (tshirtButton.classList.contains('item-selected')) {
    ballButton.classList.remove('item-selected');
  }

  setProductFilter('camiseta');
  getProducts();
});

ballButton.addEventListener('click', () => {
  ballButton.classList.toggle('item-selected');

  if (ballButton.classList.contains('item-selected')) {
    tshirtButton.classList.remove('item-selected');
  }

  setProductFilter('bola');
  getProducts();
});

buttonCloseCommentsArea.addEventListener('click', closeCommentsArea);

// Slider
// https://colorlib.com/preview/theme/seogo/

const buttonsWrapper = document.querySelector('.map');
const slides = document.querySelector('.inner');

buttonsWrapper.addEventListener('click', (e) => {
  if (e.target.nodeName === 'BUTTON') {
    Array.from(buttonsWrapper.children).forEach((item) => item.classList.remove('active'));
    if (e.target.classList.contains('first')) {
      slides.style.transform = 'translateX(-0%)';
      e.target.classList.add('active');
    } else if (e.target.classList.contains('second')) {
      slides.style.transform = 'translateX(-33.33333333333333%)';
      e.target.classList.add('active');
    } else if (e.target.classList.contains('third')) {
      slides.style.transform = 'translatex(-66.6666666667%)';
      e.target.classList.add('active');
    }
  }
});

function getProducts() {
  $.ajax({
    type: 'GET',
    url: `${URL_BASE}products`,
    success: (data) => {
      let products = data.data;
      let productsHtml = '';

      if (data) {
        let featuredHtml = renderFeatured(products);

        if (localStorage.getItem('filter')) {
          let filter = localStorage.getItem('filter');
          productsHtml = filterProducts(products, filter);
        } else {
          productsHtml = renderProducts(products);
        }

        productWrapper.innerHTML = productsHtml;
        sliderWrapper.innerHTML = featuredHtml;
      } else {
        console.log('not');
      }
    },
  });
}

function closeCommentsArea() {
  const commentsArea = document.querySelector('.comments-wrapper');
  commentsArea.classList.remove('opened');
}

function renderProducts(products) {
  let render = products
    .map((product) => {
      return `
    <div class="product-card">
      <figure class="card-header">
        <img src="${URL_BASE}storage/${product.image}" />
      </figure>

      <div class="product-content">
        <div class="product-name">
          <p>${product.name}</p>
        </div>

        <div class="product-category">
          <p>${product.category}</p>
        </div>

        <div class="product-price">
          <p>R$ ${product.price}</p>
        </div>

        <div class="purchase-container hide-element">
          <button> Comprar </button>
        </div>
      </div>
    </div>
    `;
    })
    .join('');
  return render;
}

function filterProducts(products, filter) {
  let productsFeatured = products
    .filter((product) => product.category == filter.toLowerCase())
    .map((product) => {
      return `
      <div class="product-card">
      <figure class="card-header">
        <img src="${URL_BASE}storage/${product.image}" />
      </figure>

      <div class="product-content">
        <div class="product-name">
          <p>${product.name}</p>
        </div>

        <div class="product-category">
          <p>${product.category}</p>
        </div>

        <div class="product-price">
          <p>R$ ${product.price}</p>
        </div>

        <div class="purchase-container hide-element">
          <button> Comprar </button>
        </div>
      </div>
    </div>
    `;
    })
    .join('');
  return productsFeatured;
}

function renderFeatured(products) {
  let productsFeatured = products
    .filter((product) => product.featured == 1)
    .map((product) => {
      return `
      <div class="card">
        <img src="${URL_BASE}storage/${product.image}">
        <div class="content">
          <h1>${product.name}</h1>
          <h3>R$ ${product.price}</h3>
        </div>
      </div>
      `;
    })
    .join('');
  return productsFeatured;
}

function setProductFilter(url) {
  let filter = localStorage.getItem('filter');

  localStorage.setItem('filter', url);

  if (filter == url) {
    localStorage.removeItem('filter');
  }
}

function getCookie(cname) {
  var name = cname + '=';
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return '';
}

function showPurchaseBtn() {
  let buttons = document.querySelectorAll('.product-card .product-content .purchase-container');
  buttons.forEach((button) => {
    button.classList.remove('hide-element');
  });
}

window.addEventListener('load', () => {
  let logoutBtn = document.querySelector('.logout');
  let cookie = getCookie('user_email');

  if (cookie != '') {
    showPurchaseBtn();
    loginBtn.classList.add('hide-element');
    registerBtn.classList.add('hide-element');
    logoutBtn.classList.remove('hide-element');
  }
});
