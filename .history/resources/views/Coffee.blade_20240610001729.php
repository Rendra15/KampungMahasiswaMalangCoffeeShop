
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        #headercafe {
            width: 102%;
            height: 450px;
            margin-left: -10px;
            margin-top: -10px;
        }

        .card{
            position: unset;
            border-radius: 15px;
        }

        #Tittle {
            font-family: "Inter", sans-serif;
            color: #FFFFFF;
            font-size: 30px;
            text-align: center;
            font-weight: bold;
            cursor: pointer;
        }

        #Tittle:hover {
            color: #5F5D5E;
        }

        #TittleCafe {
            font-family: "Inter", sans-serif;
            color: #FFFFFF;
            font-size: 30px;
            text-align: center;
            font-weight: bold;
        }

        #TittlePage {
            font-family: "Inter", sans-serif;
            color: #5F5D5E;
            font-size: 30px;
            text-align: left;
            font-weight: bold;
            margin-left: 70px;
        }

        #Description {
            font-family: "Inter", sans-serif;
            font-size: 20px;
            text-align: center;
            color: #5F5D5E;
        }
    </style>
</head>

<body>

    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
            <li class="nav-item dropdown" style="list-style: none;">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>

            @else

                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif

            @endauth
        </div>
    @endif
    <div id="Tittle" style="color: #5F5D5E; margin-top: 50px;">Lorem ipsum dolor</div>
    <div id="Description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
    <div class="wrapper">
        <div id="search-container" style="text-align:center;">
            <input type="search" id="search-input" placeholder="Search item ..." />
            <button id="search">Search</button>
        </div>
        <div id="buttons" style="text-align:center;">
            <button class="button-value" onclick="filterProduct('all')">All</button>
            <button class="button-value" onclick="filterProduct('Cold')">Cold</button>
            <button class="button-value" onclick="filterProduct('Hot')">Hot</button>
        </div>
        <div id="products">
            <div id="popup1" class="overlay">
                <div class="popup">
                    <h2 class="ProductName"></h2>
                    <a class="x" href="">&times;</a>
                    <div class="ClickMenu">
                        <div class="ImageMenu"></div>
                        <div class="content" style="margin-top:25%; font-style: italic;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('assets/js/app.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

        let userId = null;

        @if (Auth::check())
            userId = "{{ Auth::user()->id }}";

        @endif

        console.log('User ID:', userId);
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
        function sendRatingToServer(columnName, rating, coffeeId) {
            console.log(columnName, rating, coffeeId);

            // Ambil CSRF token dari meta tag
            const csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Data yang akan dikirim dalam request body
            const requestData = {
                columnName: columnName,
                rating: rating,
                ID: coffeeId  // Menggunakan 'ID' sesuai dengan nama kolom di database
            };

            // Kirim POST request ke server menggunakan jQuery
            $.ajax({
                url: `/Menu-Coffee/${coffeeId}/rating`,  // Gunakan coffeeId dalam URL
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
                    console.log('XHR:', xhr);
                    console.log('Status:', status);
                    console.log('Response Text:', xhr.responseText);
                    if (xhr.status === 401) { // Status code for unauthorized access
                        alert('You need to login to add a rating.');
                        window.location.href = '/login'; // Redirect to login page
                    } else {
                        alert('Error adding rating: ' + xhr.responseText);
                    }
                }
            });
        }

        function fetchRatingFromServer(columnName, coffeeId) {
            // Ambil CSRF token dari meta tag
            const csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Kirim GET request ke server menggunakan jQuery
            $.ajax({
                url: `/Menu-Coffee/${coffeeId}/rating?columnName=${columnName}`,  // Gunakan coffeeId dan columnName dalam URL
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(data) {
                    console.log('Success:', data);

                    // Di sini Anda dapat memanipulasi data yang diterima dan menampilkan rating sesuai kebutuhan.
                    // Misalnya, Anda dapat mengatur nilai rating ke elemen HTML tertentu.

                    // Contoh: Menetapkan nilai rating ke elemen dengan ID 'ratingValue'
                    $('#ratingValue').text(data.rating); // Anggaplah 'ratingValue' adalah ID dari elemen HTML yang ingin menampilkan rating.
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    console.log('XHR:', xhr);
                    console.log('Status:', status);
                    console.log('Response Text:', xhr.responseText);
                    alert('Error fetching rating: ' + xhr.responseText);
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

                        // let ID;

                        for (let j = 1; j <= 5; j++) {
                            let star = document.createElement("span");
                            star.className = "star";
                            star.innerHTML = "&#9734;";
                            star.dataset.rating = j;
                            star.addEventListener('click', function () {
                                let rating = parseInt(this.dataset.rating);
                                ratings[validId] = rating;
                                if (userId) {
                                    updateStars(ratingDiv, rating);
                                    sendRatingToServer(validId, rating, userId);
                                } else {
                                    alert('You need to login to add a rating.');
                                    window.location.href = '/login';
                                }
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
            // let firstChar = productName.charAt(0).toUpperCase();
            // let validId = firstChar + productName.slice(1).toLowerCase().replace(/\s+/g, '_');

            let firstChar = productName.charAt(0).toUpperCase();
            let validId = firstChar + productName.slice(1);

            validId = validId.replace(/\s+/g, '_');

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
    </script>
</body>

