<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Rating</title>
    <style>
        .star {
            font-size: 24px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    @foreach ($products as $product)
        <div class="card {{ $product['category'] }}">
            <div class="image-container">
                <img src="{{ $product['image'] }}" alt="{{ $product['productName'] }}">
            </div>
            <div class="container">
                <h5 class="product-name" id="{{ str_replace(' ', '_', strtolower($product['productName'])) }}">{{ $product['productName'] }}</h5>
                <h6>Rp. {{ $product['price'] }}</h6>
            </div>
            <div class="rating-stars" data-id="{{ str_replace(' ', '_', strtolower($product['productName'])) }}">
                @for ($i = 1; $i <= 5; $i++)
                    <span class="star" data-rating="{{ $i }}">&#9734;</span>
                @endfor
            </div>
        </div>
    @endforeach

    <form id="rating-form" method="POST" action="/coffee/rating" style="display:none;">
        @csrf
        <input type="hidden" name="columnName" id="columnName">
        <input type="hidden" name="rating" id="rating">
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.star').forEach(function(star) {
                star.addEventListener('click', function() {
                    let rating = this.dataset.rating;
                    let columnName = this.closest('.rating-stars').dataset.id;

                    document.getElementById('columnName').value = columnName;
                    document.getElementById('rating').value = rating;

                    document.getElementById('rating-form').submit();
                });
            });
        });
    </script>
</body>
</html>
