
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        #headercafe {
            width: 102%;
            height: 450px;
            margin-left: -10px;
            margin-top: -10px;
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
    <script src="https://cdn.botpress.cloud/webchat/v1/inject.js"></script>
    <script src="https://mediafiles.botpress.cloud/b7d9a70e-1984-46c9-88e3-4905d3fb00ec/webchat/config.js" defer></script>
</body>

