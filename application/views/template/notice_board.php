<div class="container py-3">
  <section>
    <div class="row justify-content-center mx-0">
      <div class="notice-box border rounded-4 shadow-sm bg-white p-3">

        <!-- Header -->
        <div class="notice-header text-center mb-3 rounded-top-4">
          🗞 <span class="fw-bold text-white">Notice Board</span>
        </div>

        <!-- Scrolling Notices -->
        <div class="notice-board overflow-hidden position-relative rounded-3">
          <ul class="notice-items list-unstyled mb-0">
            <li class="py-2 border-bottom">🚨 <a href="#">Bank will remain closed on Friday for maintenance.</a></li>
            <li class="py-2 border-bottom">💳 <a href="#">New ATM cards are now available at all branches.</a></li>
            <li class="py-2 border-bottom">🌐 <a href="#">Introducing eJanata App – Your digital banking companion.</a></li>
            <li class="py-2 border-bottom">📢 <a href="#">Loan application deadline extended to December 15, 2025.</a></li>
            <li class="py-2 border-bottom">🏦 <a href="#">Fixed deposit interest rates updated for December.</a></li>
            <li class="py-2 border-bottom">📝 <a href="#">Apply for personal loans online anytime.</a></li>
          </ul>
        </div>

      </div>
    </div>
  </section>
</div>

<!-- CSS -->
<style>
/* ==== Notice Box Container ==== */
.notice-box {
  border: 2px solid #e2e8f0;
  border-radius: 15px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
  overflow: hidden;
  max-width: 600px;
}

/* ==== Header ==== */
.notice-header {
  background: linear-gradient(135deg, #0099cc, #00D4B1);
  color: white;
  font-size: 1.1rem;
  padding: 10px 15px;
  text-align: center;
  border-radius: 10px 10px 0 0;
  box-shadow: inset 0 -1px 0 rgba(255, 255, 255, 0.2);
}

/* ==== Notice List Scroll ==== */
.notice-board {
  height: 250px;
  border-radius: 0 0 10px 10px;
}

/* ==== Scrolling Animation ==== */
.notice-items {
  display: flex;
  flex-direction: column;
  animation: scroll-up 15s linear infinite;
}

/* Pause on hover */
.notice-board:hover .notice-items {
  animation-play-state: paused;
}

/* ==== Each Notice ==== */
.notice-items li {
  background-color: #fff;
  padding: 0.6rem 1rem;
  border-bottom: 1px solid #f1f1f1;
  transition: all 0.3s ease;
  border-left: 3px solid transparent;
}

.notice-items li:hover {
  background-color: #f8fff9;
  border-left: 3px solid #16a34a;
}

/* ==== Notice Links ==== */
.notice-items li a {
  color: #065f46;
  font-weight: 500;
  text-decoration: none;
  transition: color 0.3s ease, text-decoration 0.3s ease;
}

.notice-items li a:hover {
  color: #16a34a;
  text-decoration: underline;
}

/* ==== Scroll Animation ==== */
@keyframes scroll-up {
  0% {
    transform: translateY(0);
  }

  100% {
    transform: translateY(-50%);
  }
}
</style>
