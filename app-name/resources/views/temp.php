<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* CSS styles */
        #headercafe {
            width: 102%;
            height: 450px; /* Specify unit for height */
            margin-left:-10px;
            margin-top:-10px;
        }

        #Tittle{
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

        #TittleCafe{
            font-family: "Inter", sans-serif;
            color: #FFFFFF;
            font-size: 30px;
            text-align: center;
            font-weight: bold;
        }

        #TittlePage{
            font-family: "Inter", sans-serif;
            color: #5F5D5E;
            font-size: 30px;
            text-align: left;
            font-weight: bold;
            margin-left: 70px;
        }

        #Description{
            font-family: "Inter", sans-serif;
            font-size: 20px;
            text-align: center;
            color: #5F5D5E;
        }

        .custom-button {
            font-family: "Inter", sans-serif;
            background-color: #5F5D5E;
            border: none;
            width: 243px;
            height: 40px;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 20px;
            font-weight:Bold;
        }
        .custom-button:hover {
            background-color: #073C21;
        }

        .fa-brands{
            font-size:35px
        }

    </style>
</head>


    <div style="text-align: center; position: relative;">
        <img src="{{ URL('Header.png') }}" alt="" id="headercafe">
        <img src="{{ URL('Logo.png') }}" alt="" style="position: absolute; top: 20%; left: 45%; width: 150px; height: 150px;">
        <div id="TittleCafe" style="position: absolute; top: 60%; left: 51%; transform: translate(-50%, 0%);">KAMPUNG MAHASISWA MALANG</div>

    </div>
    <!-- <div style="text-align: center;">
        <img src="{{ URL('Header.png') }}" alt="" id="headercafe">
            <div class="col-sm-4 text-right custom-col">
                <img src="{{ URL('image 3.png') }}" alt="" style="margin-top:-150px;width:150px;height:150px;">
            </div>
        </img>
        <img src="{{ URL('image 3.png') }}" alt="" style="margin-top:-150px;width:150px;height:150px;">
    </div> -->

    <div style="margin-top:50px"></div>
    <div id="Description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </div>

    <div style="margin-top:100px"></div>

    <div style="text-align: center; position: relative;">
        <img src="{{ URL('Coffee.jpg') }}" alt="" style="width:300px;height:400px;border-radius:15px">
        <img src="{{ URL('Non Coffee.jpg') }}" alt="" style="margin-left:150px;width:300px;height:400px;border-radius:15px">
        <img src="{{ URL('Modern Drink.jpg') }}" alt="" style="margin-left:150px;width:300px;height:400px;border-radius:15px">

        <button class="custom-button" id="Coffee-button" style="position: absolute; top: 94%; left: 12%;">Coffee</button>
        <button class="custom-button" id="NonCoffee-button" style="position: absolute; top: 94%; left: 42%;">Non-Coffee</button>
        <button class="custom-button" id="Modern-button" style="position: absolute; top: 94%; left: 72%;">Modern Drink</button>
    </div>

    <div style="text-align: center; position: relative; margin-top:100px">
        <img src="{{ URL('Traditional Drink.jpg') }}" alt="" style="width:300px;height:400px;border-radius:15px">
        <img src="{{ URL('Food.jpeg') }}" alt="" style="margin-left:150px;width:300px;height:400px;border-radius:15px">
        <img src="{{ URL('Snack.jpg') }}" alt="" style="margin-left:150px;width:300px;height:400px;border-radius:15px">

        <button class="custom-button" id="Traditional-button" style="position: absolute; top: 94%; left: 12%;">Traditional Drink</button>
        <button class="custom-button" id="Food-button" style="position: absolute; top: 94%; left: 42%;">Food</button>
        <button class="custom-button" id="Snack-button" style="position: absolute; top: 94%; left: 72%;">Snack</button>
    </div>

    <div style="margin-top:200px"></div>
    <div style="border-bottom: 5px solid #0B7941; width:100%"></div>
    <div style="margin-top:100px"></div>

    <div id="TittlePage">About Us</div>

    <div style="text-align: center; position: relative;">
        <div style="text-align: left; display: flex; align-items: flex-start;margin-top:50px">
            <img src="{{ URL('Header.png') }}" alt="" style="margin-left:148px; margin-top: 50px;width:563px;height:400px;border-radius:15px">
            <div id="Description" style="margin-left:110px; margin-top:80px;text-align:right; width:563px">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
        </div>

        <!-- <div style="text-align: left">
            <img src="{{ URL('sam huget.png') }}" alt="" style="margin-left:50px; margin-top: 50px;width:650px">
            <div id="Description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
        </div> -->
        <!-- <div id="Description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div> -->
        <div style="text-align: left; display: flex; align-items: flex-start;">
            <div id="Description" style="margin-left:150px; margin-top:150px;margin-right:180px;width:560px;text-align:left;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d830.7511143213173!2d112.58358763164296!3d-7.922146438735385!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78810054622533%3A0x8bde03f6eace315!2sKAMPUNG%20MAHASISWA%20MALANG!5e0!3m2!1sid!2sid!4v1714199697951!5m2!1sid!2sid" width="500" height="410" style="border:0;border-radius:15px;margin-top:70px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <button class="custom-button" id="Maps-button" style="position: absolute; top: 90%; left: 10%;">Visit Us</button>

    </div>

    <div style="margin-top:200px"></div>
    <div style="border-bottom: 5px solid #0B7941; width:100%"></div>
    <div style="margin-top:100px"></div>

    <div id="TittlePage" style="text-align: center">Contact Us</div>
    <div style="margin-top:200px"></div>

    <div style="background-color:#073C21;height:671px">
        <div style="display:flex;align-items: End;">
            <div id="TittleCafe" style="margin-left:5%;text-align:left;padding-top: 10%">KAMPUNG MAHASISWA MALANG</div>
            <div id="TittleCafe" style="margin-left:10%">About</div>
            <div id="TittleCafe" style="margin-left:10%">FAQ</div>
            <div id="TittleCafe" style="margin-left:10%">Contact Us</div>
        </div>

        <div style="display:flex;align-items: start;">
            <div id="TittleCafe" style="margin-left:5%;padding-top: 1%;font-weight:300; font-size:16px;text-align:left;width:50%">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
            <div style="margin-left:16%">
                <div id="TittleCafe" class="menu" style="padding-top: 40%;font-weight:300; font-size:16px;text-align:left;width:100%">Menu</div>
                <div id="TittleCafe" class="about-us" style="padding-top: 40%;font-weight:300; font-size:16px;text-align:left;width:100%">About Us</div>
            </div>
            <div style="margin-left:13%">
                <div id="TittleCafe" style="padding-top: 70%;font-weight:300; font-size:16px;text-align:left;width:100%">FAQ</div>
            </div>
            <div style="margin-left:12%">
                <div id="TittleCafe" style="padding-top: 7%;font-weight:300; font-size:16px;text-align:left;width:100%">Buka: 11.00 - 23.00</div>
                <div id="TittleCafe" style="padding-top: 7%;font-weight:300; font-size:16px;text-align:left;width:100%">082137453297</div>
                <div id="TittleCafe" style="padding-top: 7%;font-weight:300; font-size:16px;text-align:left;width:100%">NiagaHoster</div>
                <div id="TittleCafe" style="padding-top: 7%;font-weight:300; font-size:16px;text-align:left;width:100%">Jl. TPST, Jetak Lor, Mulyoagung, Kec. Dau, Kabupaten Malang, Jawa Timur 65151</div>
            </div>
        </div>
        <!-- <div id="TittleCafe" style="margin-left:5%;text-align:left;padding-top: 10%">KAMPUNG MAHASISWA MALANG</div> -->
        <!-- <div id="TittleCafe" style="margin-left:5%;padding-top: 1%;font-weight:300; font-size:16px;text-align:left;width:35%">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div> -->
        <div style="margin-left:5%;text-align:left;padding-top: 2%">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="33" height="33" style="fill:#FFFFFF" viewBox="0 0 30 30">
                <path d="M15,3C8.373,3,3,8.373,3,15c0,6.016,4.432,10.984,10.206,11.852V18.18h-2.969v-3.154h2.969v-2.099c0-3.475,1.693-5,4.581-5 c1.383,0,2.115,0.103,2.461,0.149v2.753h-1.97c-1.226,0-1.654,1.163-1.654,2.473v1.724h3.593L19.73,18.18h-3.106v8.697 C22.481,26.083,27,21.075,27,15C27,8.373,21.627,3,15,3z"></path>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="33" height="33" style="fill:#FFFFFF;margin-left:20px" viewBox="0 0 50 50">
                <path d="M 5.9199219 6 L 20.582031 27.375 L 6.2304688 44 L 9.4101562 44 L 21.986328 29.421875 L 31.986328 44 L 44 44 L 28.681641 21.669922 L 42.199219 6 L 39.029297 6 L 27.275391 19.617188 L 17.933594 6 L 5.9199219 6 z M 9.7167969 8 L 16.880859 8 L 40.203125 42 L 33.039062 42 L 9.7167969 8 z"></path>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="33" height="33" style="fill:#FFFFFF;margin-left:20px" viewBox="0 0 50 50">
                <path d="M 16 3 C 8.8324839 3 3 8.8324839 3 16 L 3 34 C 3 41.167516 8.8324839 47 16 47 L 34 47 C 41.167516 47 47 41.167516 47 34 L 47 16 C 47 8.8324839 41.167516 3 34 3 L 16 3 z M 16 5 L 34 5 C 40.086484 5 45 9.9135161 45 16 L 45 34 C 45 40.086484 40.086484 45 34 45 L 16 45 C 9.9135161 45 5 40.086484 5 34 L 5 16 C 5 9.9135161 9.9135161 5 16 5 z M 37 11 A 2 2 0 0 0 35 13 A 2 2 0 0 0 37 15 A 2 2 0 0 0 39 13 A 2 2 0 0 0 37 11 z M 25 14 C 18.936712 14 14 18.936712 14 25 C 14 31.063288 18.936712 36 25 36 C 31.063288 36 36 31.063288 36 25 C 36 18.936712 31.063288 14 25 14 z M 25 16 C 29.982407 16 34 20.017593 34 25 C 34 29.982407 29.982407 34 25 34 C 20.017593 34 16 29.982407 16 25 C 16 20.017593 20.017593 16 25 16 z"></path>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="33" height="33" style="fill:#FFFFFF;margin-left:20px" viewBox="0 0 50 50">
                <path d="M25,2C12.318,2,2,12.318,2,25c0,3.96,1.023,7.854,2.963,11.29L2.037,46.73c-0.096,0.343-0.003,0.711,0.245,0.966 C2.473,47.893,2.733,48,3,48c0.08,0,0.161-0.01,0.24-0.029l10.896-2.699C17.463,47.058,21.21,48,25,48c12.682,0,23-10.318,23-23 S37.682,2,25,2z M36.57,33.116c-0.492,1.362-2.852,2.605-3.986,2.772c-1.018,0.149-2.306,0.213-3.72-0.231 c-0.857-0.27-1.957-0.628-3.366-1.229c-5.923-2.526-9.791-8.415-10.087-8.804C15.116,25.235,13,22.463,13,19.594 s1.525-4.28,2.067-4.864c0.542-0.584,1.181-0.73,1.575-0.73s0.787,0.005,1.132,0.021c0.363,0.018,0.85-0.137,1.329,1.001 c0.492,1.168,1.673,4.037,1.819,4.33c0.148,0.292,0.246,0.633,0.05,1.022c-0.196,0.389-0.294,0.632-0.59,0.973 s-0.62,0.76-0.886,1.022c-0.296,0.291-0.603,0.606-0.259,1.19c0.344,0.584,1.529,2.493,3.285,4.039 c2.255,1.986,4.158,2.602,4.748,2.894c0.59,0.292,0.935,0.243,1.279-0.146c0.344-0.39,1.476-1.703,1.869-2.286 s0.787-0.487,1.329-0.292c0.542,0.194,3.445,1.604,4.035,1.896c0.59,0.292,0.984,0.438,1.132,0.681 C37.062,30.587,37.062,31.755,36.57,33.116z"></path>
            </svg>
        </div>
        <button class="custom-button" id="Login-button" style="margin-top:40px;margin-left:5%;background-color:#FFFFFF; color:#5F5D5E">Login</button>

    </div>



    <script src="https://cdn.botpress.cloud/webchat/v1/inject.js"></script>
    <script src="https://mediafiles.botpress.cloud/b7d9a70e-1984-46c9-88e3-4905d3fb00ec/webchat/config.js" defer></script>
    <script>
        document.getElementById("Coffee-button").addEventListener("click", function() {
            window.location.href = "/Menu-Coffee";
        });

        document.getElementById("NonCoffee-button").addEventListener("click", function() {
            window.location.href = "/Menu-NonCoffee";
        });

        document.getElementById("Modern-button").addEventListener("click", function() {
            window.location.href = "/ModernDrink";
        });

        document.getElementById("Traditional-button").addEventListener("click", function() {
            window.location.href = "/TraditionalDrink";
        });

        document.getElementById("Food-button").addEventListener("click", function() {
            window.location.href = "/Food";
        });

        document.getElementById("Snack-button").addEventListener("click", function() {
            window.location.href = "/Snack";
        });

        document.getElementById("Login-button").addEventListener("click", function() {
            window.location.href = "/Login";
        });

        var menuElements = document.getElementsByClassName("menu");
        for (var i = 0; i < menuElements.length; i++) {
            menuElements[i].addEventListener("click", function() {
                window.scrollTo({
                    top: 450,
                    behavior: "smooth"
                });
            });
        }

        var aboutUsElements = document.getElementsByClassName("about-us");
        for (var j = 0; j < aboutUsElements.length; j++) {
            aboutUsElements[j].addEventListener("click", function() {
                window.scrollTo({
                    top: 1800,
                    behavior: "smooth"
                });
            });
        }

        var mapsButton = document.getElementById("Maps-button");

        mapsButton.addEventListener("click", function() {

            window.location.href = "https://www.google.com/maps/place/KAMPUNG+MAHASISWA+MALANG/@-7.9219742,112.5813969,17z/data=!3m1!4b1!4m6!3m5!1s0x2e78810054622533:0x8bde03f6eace315!8m2!3d-7.9219742!4d112.5839718!16s%2Fg%2F11vqpc_p_4?entry=ttu";
        });
    </script>

</html>



