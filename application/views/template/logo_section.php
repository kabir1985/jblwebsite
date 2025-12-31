<html>
  <head>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
      body {
        font-family: 'Poppins', sans-serif;
      /*  background-color: #f9fdfc;*/
        margin: 0;
      }

      /* === Compact Premium Button === */
      .custom-btn {
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(0, 153, 204, 0.7);
        color: #0099cc;
        background-color: #fff;
        padding: 6px 14px;              /* 🔹 smaller padding */
        border-radius: 30px;            /* smoother rounded shape */
        font-size: 13px;                /* 🔹 smaller text */
        font-weight: 500;
        letter-spacing: 0.4px;
        text-transform: capitalize;
        cursor: pointer;
        transition: all 0.4s ease;
        box-shadow: 0 2px 6px rgba(0, 153, 204, 0.15);
        text-decoration: none;
        margin: 2px;
      }

      /* Gradient overlay */
      .custom-btn::before {
        content: "";
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, #0099cc, #476EAE);
        transition: all 0.5s ease;
        z-index: 0;
      }

      .custom-btn:hover::before {
        left: 0;
      }

      /* Hover effect */
      .custom-btn:hover {
        color: #fff;
        border-color: transparent;
        transform: translateY(-3px) scale(1.02);
        box-shadow: 0 6px 14px rgba(0, 153, 204, 0.4);
      }

      .custom-btn span {
        position: relative;
        z-index: 1;
      }

      /* Click effect */
      .custom-btn:active {
        transform: scale(0.97);
        box-shadow: 0 3px 8px rgba(0, 153, 204, 0.3);
      }

      /* Glow animation */
      .custom-btn:hover::after {
        content: "";
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.35) 0%, transparent 70%);
        animation: glow 1.2s linear infinite;
        z-index: 0;
      }

      @keyframes glow {
        0% { transform: translate(0, 0); opacity: 1; }
        100% { transform: translate(50%, 50%); opacity: 0; }
      }

      /* Responsive */
      @media (max-width: 576px) {
        .custom-btn {
          flex: 1 1 45%;
          font-size: 12px;
          margin-bottom: 8px;
          text-align: center;
        }
      }



    </style>
  </head>

  <body>
    <div class="row align-items-center py-2" style="border-radius:12px;">
      <!-- Logo -->
      <div class="col-12 col-md-6 col-lg-3 text-center text-md-start mb-2 mb-md-0">
        <a href="<?= base_url(); ?>">
          <img
            src="<?= base_url('assets/images/others/jblogo.png'); ?>"
            alt="logo"
            style="max-height: 65px;"
          />
        </a>
      </div>

      <!-- Buttons -->
      <div class="col-12 col-md-6 col-lg-9 d-flex flex-wrap justify-content-center justify-content-md-end gap-2">
        <a href="#" class="custom-btn"><span>eJanata Apps</span></a>
        <a href="#" class="custom-btn"><span>JB Green Pin</span></a>
        <a href="#" class="custom-btn"><span>Passport NOC</span></a>
        <a href="#" class="custom-btn"><span>FAQ</span></a>
        <a href="#" class="custom-btn"><span>Tender</span></a>
        <a href="#" class="custom-btn"><span>Notice Board</span></a>
      </div>
    </div>
  </body>
</html>
