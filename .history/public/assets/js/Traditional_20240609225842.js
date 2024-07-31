let products = {
    dataTraditional:[
    {
        productName: "Jahe",
        category: "Hot",
        price: "10.000",
        image: "Menu-Items/Traditional-Drink/38 wedang jahe.png",
        description: "Minuman Jahe adalah minuman yang menyegarkan dan hangat yang terbuat dari ekstrak jahe yang direbus dengan air dan sering dicampur dengan tambahan seperti madu atau gula. Minuman ini memiliki cita rasa yang hangat, pedas, dan menyegarkan dari jahe, sering kali disajikan panas tetapi juga bisa dinikmati dingin. "
    },
    {
        productName: "Jahe Susu",
        category: "Hot",
        price: "10.000",
        image: "Menu-Items/Traditional-Drink/39 wedang jahe susu.png",
        description: "Minuman Jahe Susu adalah minuman yang hangat dan menggugah selera yang terdiri dari ekstrak jahe yang direbus dengan air dan dicampur dengan susu, sering kali dengan tambahan seperti madu atau gula untuk memberikan rasa manis yang seimbang. Minuman ini memiliki cita rasa yang hangat, pedas, dan kreami dari jahe dan susu, menciptakan kombinasi yang lezat dan menyegarkan.  "
    },
    {
        productName: "Jahe Gula Aren",
        category: "Hot",
        price: "10.000",
        image: "Menu-Items/Traditional-Drink/40 wedang jahe gula aren.png",
        description: "Minuman Jahe Gula Aren adalah minuman yang hangat dan memanjakan yang terbuat dari ekstrak jahe yang direbus dengan air dan dicampur dengan gula aren untuk memberikan sentuhan manis yang alami. Minuman ini memiliki cita rasa yang hangat, pedas, dan manis dari jahe dan gula aren, menciptakan kombinasi yang lezat dan memuaskan."
    },
    {
        productName: "STMJ",
        category: "Hot",
        price: "10.000",
        image: "Menu-Items/Traditional-Drink/41 STMJ.png",
        description: "STMJ adalah minuman tradisional Indonesia yang mengandung susu, telur, madu, dan jahe. Singkatan STMJ sendiri merujuk pada susu, telur, madu, dan jahe, bahan utama yang digunakan dalam minuman ini. Minuman ini biasanya disajikan panas, terkadang dengan tambahan rempah-rempah seperti kayu manis atau cengkeh untuk memberikan aroma yang khas. STMJ memiliki rasa yang kreami dan hangat dari susu dan telur, dengan sentuhan manis dari madu dan kehangatan pedas dari jahe."
    },
    {
        productName: "Bramasta",
        category: "Hot",
        price: "10.000",
        image: "Menu-Items/Traditional-Drink/42 bramasta.png",
        description: "Bramasta adalah minuman tradisional yang terdiri dari campuran rempah-rempah seperti jahe, serai, yang direbus dengan air dan ditambahkan gula ataupun madu. Kemudian diberikan tambahan perasan lemon yang membuat rasanya unik dan sedikit asam. "
    },
    {
        productName: "Wedang Uwuh",
        category: "Hot",
        price: "10.000",
        image: "Menu-Items/Traditional-Drink/43 wedang uwuh.png",
        description: "Wedang Uwuh adalah minuman tradisional Jawa yang terdiri dari campuran rempah-rempah seperti jahe, cengkeh, kayu manis, daun pandan, dan serai yang direbus bersama dengan gula merah atau gula aren. Minuman ini memiliki cita rasa yang hangat, harum, dan sedikit manis dengan sentuhan pedas dari jahe"
    },
    {
        productName: "Jeruk Anget",
        category: "Hot",
        price: "10.000",
        image: "Menu-Items/Traditional-Drink/44 jeruk anget.png",
        description: "Jeruk Anget adalah minuman yang segar dan menyehatkan yang terbuat dari perasan jeruk segar yang kemudian dicampur dengan air panas dan ditambahkan dengan sedikit gula. Minuman ini memiliki cita rasa yang segar, asam, dan hangat dari jeruk segar dengan sentuhan manis dari gula"
    },
    {
        productName: "Kombucha",
        category: "Hot",
        price: "10.000",
        image: "Menu-Items/Traditional-Drink/45 kombuca.png",
        description: "Minuman Kombucha adalah minuman fermentasi yang dibuat dari teh manis yang difermentasi menggunakan budaya bakteri dan ragi yang dikenal sebagai SCOBY (Symbiotic Culture Of Bacteria and Yeast). Ia memiliki rasa yang asam dan sedikit manis. Minuman ini terkenal karena potensi manfaat kesehatannya yang dapat meningkatkan pencernaan dan sistem kekebalan tubuh."
    },
    ],
};


// for (let i of products.dataTraditional) {
//     //Create Card
//     let card = document.createElement("div");
//     //Card should have category and should stay hidden initially
//     card.classList.add("card", i.category, "hide");
//     card.addEventListener('click', function(){
//         // debugger
//         let productName = i.productName.toLowerCase();
//         let cards = document.querySelectorAll('.card');
//         for(let card of cards){
//             let cardProductName = card.querySelector('.product-name').innerText.toLowerCase();
//             if (cardProductName === productName) {
//                 let overlays = document.getElementsByClassName('overlay');
//                 for (let overlay of overlays) {
//                     overlay.style.visibility = "visible";
//                     let popup = document.getElementsByClassName('popup');
//                     for (let showpopup of popup){
//                         showpopup.style.visibility = "visible";
//                         showpopup.style.opacity = 1;
//                         showpopup.querySelector('.ProductName').innerText = cardProductName;
//                     }
//                 }
//                 let imageMenuDiv = document.querySelector('.ImageMenu');
//                 imageMenuDiv.innerHTML = '';

//                 // Append new image to ImageMenu
//                 let imgContainer = document.createElement("div");
//                 let image = document.createElement("img");
//                 image.setAttribute("src", i.image);
//                 imgContainer.appendChild(image);
//                 imageMenuDiv.appendChild(imgContainer);

//                 let descriptionDiv = document.querySelector('.Content');
//                 descriptionDiv.innerHTML = i.description;
//                 break;
//             }

//         }

//         let closeButton = document.querySelector('.popup .x');

//         // Add a click event listener to the close button
//         closeButton.addEventListener('click', function(event) {
//             // Prevent the default behavior of the anchor tag (page refresh)
//             event.preventDefault();

//             // Find the closest popup element and hide it
//             let popup = this.closest('.popup');
//             popup.style.visibility = "hidden";
//             popup.style.opacity = 0;

//             let overlays = document.getElementsByClassName('overlay');
//             for (let overlay of overlays) {
//                 overlay.style.visibility = "hidden";
//             }
//         });
//     });

//     //image div
//     let imgContainer = document.createElement("div");
//     imgContainer.classList.add("image-container");
//     //img tag
//     let image = document.createElement("img");
//     image.setAttribute("src", i.image);
//     imgContainer.appendChild(image);
//     card.appendChild(imgContainer);
//     //container
//     let container = document.createElement("div");
//     container.classList.add("container");
//     //product name
//     let name = document.createElement("h5");
//     let productName = i.productName;
//     name.classList.add("product-name");
//     let firstChar = productName.charAt(0).toUpperCase();
//     let validId = firstChar + productName.slice(1).toLowerCase().replace(/\s+/g, '_');
//     name.id = validId;
//     name.style.fontFamily = "Inter, sans-serif";
//     name.style.fontSize = "20px";
//     name.style.textAlign = "center";
//     name.style.color = "#5F5D5E";
//     // name.style.textAlign = "left";
//     name.innerText = i.productName.toUpperCase();
//     container.appendChild(name);
//     //price
//     let price = document.createElement("h6");
//     price.id = "Description";
//     // price.style.textAlign = "left"
//     price.innerText = "Rp. " + i.price;
//     container.appendChild(price);

//     card.appendChild(container);
//     document.getElementById("products").appendChild(card);
// }


// //parameter passed from button (Parameter same as category)
// function filterProduct(value) {
//     // console.log(value);
//     // console.log(products);
//     //Button class code
//     let buttons = document.querySelectorAll(".button-value");
//     buttons.forEach((button) => {
//     //check if value equals innerText
//     if (value.toUpperCase() == button.innerText.toUpperCase()) {
//         button.classList.add("active");
//     } else {
//         button.classList.remove("active");
//     }
//     });

//     //select all cards
//     let elements = document.querySelectorAll(".card");
//     //loop through all cards
//     elements.forEach((element) => {
//     //display all cards on 'all' button click
//     if (value == "all") {
//         element.classList.remove("hide");
//     } else {
//             //Check if element contains category class
//         if (element.classList.contains(value)) {
//             //display element based on category
//             element.classList.remove("hide");
//         } else {
//             //hide other elements
//             element.classList.add("hide");
//         }
//     }
//     });
// }

// //Search button click
// document.getElementById("search").addEventListener("click", () => {
//     //initializations
//     let searchInput = document.getElementById("search-input").value;
//     let elements = document.querySelectorAll(".product-name");
//     let cards = document.querySelectorAll(".card");

//     //loop through all elements
//     elements.forEach((element, index) => {
//     //check if text includes the search value
//     if (element.innerText.includes(searchInput.toUpperCase())) {
//         //display matching card
//         cards[index].classList.remove("hide");
//     } else {
//         //hide others
//         cards[index].classList.add("hide");
//     }
//     });
// });

// //Initially display all products
// window.onload = () => {
//     filterProduct("all");
// };
