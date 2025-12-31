<section class="py-5" style="background: linear-gradient(135deg, #ffffff 0%, #22C55E 100%); overflow: hidden;">
    <!-- <div class="container"> -->
    <h3 class="text-center mb-4 fw-bold"
        style="background: linear-gradient(90deg, #0C6A2B, #22C55E); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
        Featured Products
    </h3>

    <div class="product-slider d-flex align-items-center">
        <div class="slide-track d-flex">
            <!-- Product 1 -->
            <div class="card text-center border-0 shadow-sm rounded-4 mx-3" style="width: 220px;">
                <img src="assets/images/products/p1.jpg" class="card-img-top rounded-top" alt="Product 1">
                <div class="card-body">
                    <h6 class="fw-bold text-success mb-0">Savings Account</h6>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="card text-center border-0 shadow-sm rounded-4 mx-3" style="width: 220px;">
                <img src="assets/images/products/p2.jpg" class="card-img-top rounded-top" alt="Product 2">
                <div class="card-body">
                    <h6 class="fw-bold text-success mb-0">Credit Card</h6>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="card text-center border-0 shadow-sm rounded-4 mx-3" style="width: 220px;">
                <img src="assets/images/products/p3.jpg" class="card-img-top rounded-top" alt="Product 3">
                <div class="card-body">
                    <h6 class="fw-bold text-success mb-0">Online Banking</h6>
                </div>
            </div>

            <!-- Product 4 -->
            <div class="card text-center border-0 shadow-sm rounded-4 mx-3" style="width: 220px;">
                <img src="assets/images/products/p4.jpg" class="card-img-top rounded-top" alt="Product 4">
                <div class="card-body">
                    <h6 class="fw-bold text-success mb-0">Loan Service</h6>
                </div>
            </div>

            <!-- Duplicate items for smooth looping -->
            <div class="card text-center border-0 shadow-sm rounded-4 mx-3" style="width: 220px;">
                <img src="assets/images/products/p1.jpg" class="card-img-top rounded-top" alt="Product 1">
                <div class="card-body">
                    <h6 class="fw-bold text-success mb-0">Savings Account</h6>
                </div>
            </div>

            <div class="card text-center border-0 shadow-sm rounded-4 mx-3" style="width: 220px;">
                <img src="assets/images/products/p2.jpg" class="card-img-top rounded-top" alt="Product 2">
                <div class="card-body">
                    <h6 class="fw-bold text-success mb-0">Credit Card</h6>
                </div>
            </div>

        </div>
        <!-- </div> -->
    </div>
</section>

<style>
.product-slider {
    width: 100%;
    overflow: hidden;
    position: relative;
}

.slide-track {
    display: flex;
    width: calc(220px * 8);
    animation: scroll 25s linear infinite;
}

@keyframes scroll {
    0% {
        transform: translateX(0);
    }

    100% {
        transform: translateX(calc(-220px * 4));
    }
}

.card img {
    height: 160px;
    object-fit: cover;
}

.card:hover {
    transform: scale(1.05);
    transition: 0.4s ease;
}
</style>