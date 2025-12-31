<style>
/* Animated gradient section title */
.section-title {
    /*font-size: 1.75rem;*/
    font-weight: 600;
    text-transform: uppercase;
    color: #fff;
    /* background: linear-gradient(90deg, #0C6A2B, #22C55E, #0C6A2B);*/
    background: linear-gradient(135deg, #ffffff 0%, orange 100%);
    background-size: 300%;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: gradientFlow 5s ease-in-out infinite;
    position: relative;
    display: inline-block;
}

    h4.mt-4 {
            text-align: center;
            color: #0077b6;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
           hr.ruler {
            width: 70%;
            margin: 10px auto 25px auto;
            border-top: 1px solid #e9ecedff;
            border-radius: 5px;
        }

@keyframes gradientFlow {
    0% {
        background-position: 0% 50%;
    }

    50% {
        background-position: 100% 50%;
    }

    100% {
        background-position: 0% 50%;
    }
}

/* Service box styling */
.service-box {
    background: #ffffff;
    border: 1px solid #e6f5ea;
    border-radius: 1rem;
    transition: all 0.4s ease;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
}

.service-box:hover {
    transform: translateY(-8px);
    box-shadow: 0 8px 25px rgba(12, 106, 43, 0.15);
    border-color: #22C55E;
}

/* Icon circle */
.icon-circle {
    width: 85px;
    height: 85px;
    margin: 0 auto;
    border-radius: 50%;
    background-color: #66ddff;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 10px rgba(12, 106, 43, 0.3);
    transition: transform 0.4s ease;
}

.service-box:hover .icon-circle {
    transform: scale(1.1);
}

.icon-circle img {
    width: 55px;
    height: 55px;
}

.fw-bold{
    color:black;
}

/* Link styling */
a.text-success {
    transition: color 0.3s ease;
}

a.text-success:hover {
    color: #22C55E !important;
}
</style>

<section class="py-1 bg-light ">
    <div class="container">
        <!-- Section Header -->
        <div class="row justify-content-center text-center mb-2">
            <div class="col-lg-8">
                <!-- <h4 class="section-title mb-2">
                    Providing reliable financial solutions for all your needs.
                </h4> -->

                <h4 class="mt-4 section-title">Janata Bank Services</h4>
                <hr class="ruler" />
                
                <!-- <p class="text-muted">
          Explore our range of banking services designed to help you grow, save, and secure your financial future.
        </p> -->
            </div>
        </div>

        <!-- Service Cards -->
        <div class="row g-4">
            <!-- Card 1 -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="service-box h-100 text-center p-4">
                    <div class="icon-circle mb-3">
                        <img src="assets/images/services/ejanata.png" alt="eJanata Apps" class="img-fluid">
                    </div>
                    <h5 class="fw-bold">eJanata Apps</h5>
                    <p class="text-muted small mb-3">Empower Your Financial Journey with Our Mobile Banking App...</p>
                    <a href="https://ejanata.com.bd/" class="stretched-link text-success fw-semibold" target="_blank">Learn More →</a>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="service-box h-100 text-center p-4">
                    <div class="icon-circle mb-3">
                        <img src="assets/images/services/atm.png" alt="ATM Services" class="img-fluid">
                    </div>
                    <h5 class="fw-bold">ATM Services</h5>
                    <p class="text-muted small mb-3">To offer modern Banking service, Janata Bank PLC. is providing... 
                    </p>
                    <a href="https://www.jb.com.bd/services/atm" class="stretched-link text-success fw-semibold" target="_blank">Learn More →</a>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="service-box h-100 text-center p-4">
                    <div class="icon-circle mb-3">
                        <img src="assets/images/services/locker.png" alt="Locker Service" class="img-fluid">
                    </div>
                    <h5 class="fw-bold">Locker Service</h5>
                    <p class="text-muted small mb-3">Keep your valuables safe and secure with our trusted locker
                        services.</p>
                    <a href="https://www.jb.com.bd/services/lockerService" class="stretched-link text-success fw-semibold" target="_blank">Learn More →</a>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="service-box h-100 text-center p-4">
                    <div class="icon-circle mb-3">
                        <img src="assets/images/services/welfare.png" alt="24/7 Support" class="img-fluid">
                    </div>
                    <h5 class="fw-bold">Welfare Services</h5>
                    <p class="text-muted small mb-3">Our customer care is always ready to help with your banking needs.
                    </p>
                    <a href="https://www.jb.com.bd/home/welfare_service" class="stretched-link text-success fw-semibold" target="_blank">Learn More →</a>
                </div>
            </div>

            <!-- Card 1 -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="service-box h-100 text-center p-4">
                    <div class="icon-circle mb-3">
                        <img src="assets/images/services/JBPinCash.png" alt="eJanata Apps" class="img-fluid">
                    </div>
                    <h5 class="fw-bold">JB PIN Cash</h5>
                    <p class="text-muted small mb-3">To send money easily to people who have bank accounts and those who don't..</p>
                    <a href="#!" class="stretched-link text-success fw-semibold">Learn More →</a>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="service-box h-100 text-center p-4">
                    <div class="icon-circle mb-3">
                        <img src="assets/images/services/govtService.png" alt="ATM Services" class="img-fluid">
                    </div>
                    <h5 class="fw-bold">Government Services</h5>
                    <p class="text-muted small mb-3">Withdraw cash and access services easily through our ATM network.
                    </p>
                    <a href="#!" class="stretched-link text-success fw-semibold">Learn More →</a>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="service-box h-100 text-center p-4">
                    <div class="icon-circle mb-3">
                        <img src="assets/images/services/money.png" alt="Locker Service" class="img-fluid">
                    </div>
                    <h5 class="fw-bold">Cash Payment Service</h5>
                    <p class="text-muted small mb-3">Keep your valuables safe and secure with our trusted locker
                        services.</p>
                    <a href="#!" class="stretched-link text-success fw-semibold">Learn More →</a>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="service-box h-100 text-center p-4">
                    <div class="icon-circle mb-3">
                        <img src="assets/images/services/utility.png" alt="24/7 Support" class="img-fluid">
                    </div>
                    <h5 class="fw-bold">24/7 Support</h5>
                    <p class="text-muted small mb-3">Our customer care is always ready to help with your banking needs.
                    </p>
                    <a href="#!" class="stretched-link text-success fw-semibold">Learn More →</a>
                </div>
            </div>


        </div>
    </div>
</section>