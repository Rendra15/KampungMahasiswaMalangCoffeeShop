let products = {
    datakopi: [
        // Produk kopi Anda...
    ],
};

let ratings = {};

// Fungsi untuk memperbarui bintang berdasarkan rating
function updateStars(ratingDiv, rating) {
    let stars = ratingDiv.querySelectorAll('.star');
    stars.forEach((star, index) => {
        if (index < rating) {
            star.innerHTML = "&#9733;";
        } else {
            star.innerHTML = "&#9734;";
        }
    });
}

// Fungsi untuk mengirim rating ke server
function sendRatingToServer(columnName, rating) {
    console.log(columnName, rating);

    // Ambil CSRF token dari meta tag
    const csrfToken = $('meta[name="csrf-token"]').attr('content');

    // Data yang akan dikirim dalam request body
    const requestData = {
        columnName: columnName,
        rating: rating
    };

    // Kirim POST request ke server menggunakan jQuery
    $.ajax({
        url: `/coffee/${columnName}/rating`,
        type: 'POST',
        contentType: 'application/json',
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        data: JSON.stringify(requestData),
        success: function(data) {
            console.log('Success:', data);
            if (data && data.success) {
                alert('Rating successfully added.');
            } else {
                alert('Failed to add rating.');
            }
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
            alert('Error adding rating: ' + xhr.responseText);
        }
    });
}

// Membuat kartu produk
for (let i of products.datakopi) {
    let card = document.createElement("div");
    card.classList.add("card", i.category, "hide");
    card.addEventListener('click', function () {
        let productName = i.productName.toLowerCase();
        let cards = document.querySelectorAll('.card');
        for (let card of cards) {
            let cardProductName = card.querySelector('.product-name').innerText.toLowerCase();
            if (cardProductName === productName) {
                let overlays = document.getElementsByClassName('overlay');
                for (let overlay of overlays) {
                    overlay.style.visibility = "visible";
                    let popup = document.getElementsByClassName('popup');
                    for (let showpopup of popup) {
                        showpopup.style.visibility = "visible";
                        showpopup.style.opacity = 1;
                        showpopup.querySelector('.ProductName').innerText = cardProductName;
                    }
                }

                let imageMenuDiv = document.querySelector('.ImageMenu');
                imageMenuDiv.innerHTML = '';

                let imgContainer = document.createElement("div");
                imgContainer.style.width = "150%";
                imageMenuDiv.style.width = "100%";
                let image = document.createElement("img");
                image.setAttribute("src", i.image);
                imgContainer.appendChild(image);
                imageMenuDiv.appendChild(imgContainer);

                let descriptionDiv = document.querySelector('.Content');
                descriptionDiv.innerHTML = i.description;

                let ratingDiv = document.createElement("div");
                ratingDiv.className = "rating-stars";

                let validId = card.querySelector('.product-name').id;

                for (let j = 1; j <= 5; j++) {
                    let star = document.createElement("span");
                    star.className = "star";
                    star.innerHTML = "&#9734;";
                    star.dataset.rating = j;
                    star.addEventListener('click', function () {
                        let rating = parseInt(this.dataset.rating);
                        ratings[validId] = rating;
                        updateStars(ratingDiv, rating);
                        sendRatingToServer(validId, rating);
                    });
                    ratingDiv.appendChild(star);
                }

                if (ratings[validId]) {
                    updateStars(ratingDiv, ratings[validId]);
                }

                descriptionDiv.append(ratingDiv);
                break;
            }
        }

        let closeButton = document.querySelector('.popup .x');
        closeButton.addEventListener('click', function (event) {
            event.preventDefault();
            let popup = this.closest('.popup');
            popup.style.visibility = "hidden";
            popup.style.opacity = 0;
            let overlays = document.getElementsByClassName('overlay');
            for (let overlay of overlays) {
                overlay.style.visibility = "hidden";
            }
        });
    });

    let imgContainer = document.createElement("div");
    imgContainer.classList.add("image-container");
    let image = document.createElement("img");
    image.setAttribute("src", i.image);
    imgContainer.appendChild(image);
    card.appendChild(imgContainer);

    let container = document.createElement("div");
    container.classList.add("container");

    let name = document.createElement("h5");
    let productName = i.productName;
    name.classList.add("product-name");
    let firstChar = productName.charAt(0).toUpperCase();
    let validId = firstChar + productName.slice(1).toLowerCase().replace(/\s+/g, '_');
    name.id = validId;
    name.style.fontFamily = "Inter, sans-serif";
    name.style.fontSize = "20px";
    name.style.textAlign = "center";
    name.style.color = "#5F5D5E";
    name.innerText = i.productName.toUpperCase();
    container.appendChild(name);

    let price = document.createElement("h6");
    price.id = "Description";
    price.innerText = "Rp. " + i.price;
    container.appendChild(price);

    card.appendChild(container);
    document.getElementById("products").appendChild(card);
}

// Filter produk berdasarkan kategori
function filterProduct(value) {
    let buttons = document.querySelectorAll(".button-value");
    buttons.forEach((button) => {
        if (value.toUpperCase() == button.innerText.toUpperCase()) {
            button.classList.add("active");
        } else {
            button.classList.remove("active");
        }
    });

    let elements = document.querySelectorAll(".card");
    elements.forEach((element) => {
        if (value == "all") {
            element.classList.remove("hide");
        } else {
            if (element.classList.contains(value)) {
                element.classList.remove("hide");
            } else {
                element.classList.add("hide");
            }
        }
    });
}

// Pencarian produk
document.getElementById("search").addEventListener("click", () => {
    let searchInput = document.getElementById("search-input").value;
    let elements = document.querySelectorAll(".product-name");
    let cards = document.querySelectorAll(".card");

    elements.forEach((element, index) => {
        if (element.innerText.includes(searchInput.toUpperCase())) {
            cards[index].classList.remove("hide");
        } else {
            cards[index].classList.add("hide");
        }
    });
});

// Tampilkan semua produk pada awalnya
window.onload = () => {
    filterProduct("all");
};
