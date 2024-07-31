let products = {
    dataFood:[
    {
        productName: "Indomie Goreng",
        category: "Noodle",
        price: "7.000",
        image: "Menu-Items/Food/65 indomie goreng.png",
        description: "Indomie Goreng adalah hidangan yang lezat dan memuaskan, terdiri dari mi goreng yang digoreng dengan sempurna. Dengan cita rasa yang khas dan tekstur mie yang kenyal, Indomie Goreng adalah favorit yang tak tertandingi di seluruh Indonesia. Disajikan dengan irisan telur, daun bawang, dan bahan tambahan lainnya sesuai selera, hidangan ini cocok untuk sarapan cepat, camilan siang hari, atau bahkan sebagai makan malam yang memuaskan. Rasakan kelezatan Indonesia dalam setiap gigitan dari Indomie Goreng yang autentik ini."
    },
    {
        productName: "Indomie Goreng Double",
        category: "Noodle",
        price: "12.000",
        image: "Menu-Items/Food/66 indomie goreng double.png",
        description: "Indomie Goreng Double adalah sajian yang menggugah selera, menghadirkan dua porsi lezat dari mi goreng Indonesia yang ikonik, Indomie. Dengan rasa khas mi goreng yang lezat dan rempah-rempah yang kaya, makanan ini disajikan dalam porsi ganda yang memuaskan, cocok untuk memuaskan selera Anda yang lapar. Diwarnai dengan irisan telur, daun bawang, dan bahan tambahan lainnya sesuai keinginan, Indomie Goreng Double adalah pilihan yang sempurna untuk pencinta mi goreng yang menginginkan sesuatu yang lebih banyak untuk dinikmati."
    },
    {
        productName: "Indomie Kuah",
        category: "Noodle",
        price: "7.000",
        image: "Menu-Items/Food/67 indomie kuah.png",
        description: "Indomie Kuah adalah hidangan yang menggugah selera. Indomie Kuah menghadirkan kenikmatan Indonesia yang autentik dalam setiap sendokannya. Disajikan dengan bawang goreng dan beberapa toping  sebagai pelengkap, hidangan ini adalah pilihan yang sempurna untuk menyegarkan perut dan memanjakan lidah. Rasakan kehangatan dan kenyamanan dari Indomie Kuah yang lezat ini, cocok untuk dinikmati di pagi hari, siang hari, atau malam hari."
    },
    {
        productName: "Indomie Kuah",
        category: "Noodle",
        price: "12.000",
        image: "Menu-Items/Food/68 indomie kuah double.png",
        description: "Indomie Kuah Double adalah hidangan yang melipatgandakan kenikmatan, dengan dua porsi indomie kuah. Dengan aroma rempah-rempah yang khas dan rasa yang otentik, setiap suapan Indomie Kuah Double memberikan pengalaman yang memuaskan. Disajikan  dengan bawang goreng dan beberapa toping untuk menambah cita rasa dan tekstur, hidangan ini adalah pilihan yang tepat untuk mengatasi rasa lapar ganda. Rasakan kenikmatan ganda dari Indomie Kuah Double ini, cocok untuk dinikmati kapan saja Anda membutuhkan hidangan yang memanjakan dan menghangatkan."
    },
    {
        productName: "Nasi Telur Mata Sapi",
        category: "Nastel",
        price: "8.000",
        image: "Menu-Items/Food/70 nasi telur mata sapi.png",
        description: "Nasi Telur Mata Sapi adalah hidangan yang menggugah selera, terdiri dari nasi putih yang lembut, telur mata sapi yang gurih, dan bumbu-bumbu khas yang menyatu menjadi kombinasi yang memuaskan. Telur mata sapi yang sempurna digoreng dengan kuningnya yang mengalir, disajikan di atas nasi yang harum dan lembut. Hidangan ini memenuhi rasa lapar dan memanjakan lidah dengan setiap gigitannya. Nasi Telur Mata Sapi adalah pilihan yang tepat untuk sarapan, makan siang, atau makan malam yang memuaskan."
    },
    {
        productName: "Nasi Telur Normal",
        category: "Nastel",
        price: "8.000",
        image: "Menu-Items/Food/71 nasi telur normal.png",
        description: "Nasi Telur Normal adalah hidangan yang sederhana namun lezat, terdiri dari nasi putih yang lembut dan telur dadar. Hidangan ini menyajikan kelezatan yang akrab dan memuaskan. Cocok untuk sarapan, makan siang, atau makan malam yang cepat namun memuaskan ."
    },
    {
        productName: "Nasi Telur Kecap",
        category: "Nastel",
        price: "9.000",
        image: "Menu-Items/Food/72 nasi telur kecap.png",
        description: "Nasi Telur Kecap adalah hidangan yang menggugah selera, terdiri dari nasi yang harum dan lembut yang disajikan dengan telur yang dimasak sesuai selera, lalu disiram dengan kecap manis yang khas. Telur yang gurih dan nasi yang hangat menciptakan kombinasi yang memuaskan, dan kecap manis menambahkan cita rasa yang manis dan sedikit asin. Nasi Telur Kecap adalah pilihan yang sempurna untuk santapan yang sederhana namun memuaskan."
    },
    {
        productName: "Nasi Telur Pedas",
        category: "Nastel",
        price: "10.000",
        image: "Menu-Items/Food/73 nasi telur pedas.png",
        description: "Nasi Telur Pedas adalah hidangan yang menggugah selera, terdiri dari nasi yang harum dan lembut, disajikan dengan telur yang dimasak sesuai selera, lalu diberikan sentuhan bumbu pedas. Telur yang gurih bertemu dengan rasa pedas yang menggigit, menciptakan kombinasi yang mengasyikkan bagi pecinta rasa pedas. Nasi Telur Pedas adalah pilihan yang sempurna bagi mereka yang menyukai sensasi pedas yang membangkitkan selera ."
    },
    {
        productName: "Nasi Telur Bawang",
        category: "Nastel",
        price: "10.000",
        image: "Menu-Items/Food/74 nasi telur bawang.png",
        description: "Nasi Telur Bawang adalah hidangan yang sederhana namun lezat, terdiri dari nasi putih yang harum dan lembut yang disajikan dengan telur yang dimasak sesuai selera, biasanya digoreng, dan disajikan dengan bawang goreng yang garing dan aromatik. Telur yang gurih bertemu dengan rasa manis dari bawang goreng yang telah digoreng kecoklatan, menciptakan kombinasi yang memikat bagi pecinta cita rasa tradisional. Nasi Telur Bawang adalah pilihan yang cocok untuk santapan cepat dan memuaskan ."
    },
    {
        productName: "Nasi Telur Saus",
        category: "Nastel",
        price: "10.000",
        image: "Menu-Items/Food/75 nasi telur saus.png",
        description: "Nasi Telur Saus adalah hidangan yang menggoda dengan rasa yang kaya dan saus yang melimpah. Terdiri dari nasi yang lembut dan harum, disajikan dengan telur yang dimasak sesuai selera, dan dilumuri dengan saus yang lezat dan beragam. Kombinasi rasa yang unik antara nasi, telur, dan saus menciptakan pengalaman makan yang memuaskan dan memikat bagi penggemar cita rasa yang beragam. Nasi Telur Saus adalah pilihan yang sempurna untuk dinikmati dan menghadirkan kenikmatan yang tak terlupakan."
    },
    {
        productName: "Nasi Telur Keju",
        category: "Nastel",
        price: "10.000",
        image: "Menu-Items/Food/76 nasi telur keju.png",
        description: "Nasi Telur Keju adalah hidangan yang memikat dengan kombinasi yang sempurna antara nasi lembut, telur yang gurih, dan keju yang meleleh. Telur biasanya disajikan sesuai selera, bisa digoreng atau dijadikan telur dadar, kemudian diletakkan di atas nasi dan disajikan dengan keju yang meleleh di atasnya. Keju memberikan sentuhan kaya rasa dan krimi yang memperkaya citarasa nasi dan telur, menciptakan paduan yang lezat dan memuaskan. Nasi Telur Keju adalah pilihan yang cocok untuk mereka yang menyukai cita rasa gurih dan krimi dalam hidangan, dan cocok dinikmati."
    },
    {
        productName: "Nasi Indomie",
        category: "Noodle",
        price: "10.000",
        image: "Menu-Items/Food/77 nasi indomie.png",
        description: "Nasi Indomie adalah hidangan yang menggabungkan dua favorit yang lezat menjadi satu hidangan yang memuaskan. Terdiri dari nasi putih yang harum dan lembut, disajikan dengan mie Indomie yang gurih dan bumbu-bumbu rempah yang khas. Kombinasi nasi dan mie memberikan tekstur yang unik dan rasa yang menggoda, menciptakan pengalaman makan yang memuaskan dan mengenyangkan. "
    },
    {
        productName: "Nasi Omelette",
        category: "Nastel",
        price: "10.000",
        image: "Menu-Items/Food/78 nasi omelette.png",
        description: "Nasi Omelet adalah hidangan yang kreatif dan memikat, menggabungkan dua hidangan yang lezat menjadi satu. Terdiri dari nasi putih yang lembut dan diselimuti oleh telur dadar yang fluffy dan gurih, nasi omelet menjadi pilihan yang memuaskan bagi pecinta telur dan nasi. Nasi Omelet adalah pilihan yang tepat untuk sarapan, makan siang, atau makan malam yang memuaskan."
    },
    ],
};
