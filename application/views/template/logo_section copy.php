<html>
    <head>
        
<!--  Add this custom CSS -->
<style>
  .custom-btn {
    border: 1px solid rgba(0, 153, 204, 0.8) !important;
    color: #0d6efd;
    padding: 6px 14px;
    border-radius: 30px;
    font-size: 14px;
    transition: all 0.3s ease;
    background-color: white;
  }

  .custom-btn:hover {
    background-color: rgba(0, 153, 204, 0.8) !important;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(13, 110, 253, 0.2);
  }

  @media (max-width: 576px) {
    .custom-btn {
      flex: 1 1 45%;
      text-align: center;
    }
  }
</style>
        
    </head>
    
    <body>




 <div class="row align-items-center py-2">
    <!-- Logo Section -->
    <div class="col-12 col-md-6 col-lg-3 logo text-md-start mb-2 mb-md-0">
        <a href="<?= base_url(); ?>">
        <img src="<?= base_url('assets/images/others/jblogo.png'); ?>" class="img-fluid"  alt="logo"  style="max-height: 60px;">
        </a>
    </div>

    <!-- Buttons Section -->
    <div class="col-12 col-md-6 col-lg-9 d-flex flex-wrap justify-content-center justify-content-md-end gap-2">
        <a href="#" type="button" class="btn custom-btn">
        eJanata Apps
        </button>
        <a href="#" type="button" class="btn custom-btn">
        JB Green Pin
</a>
        <a href="#" type="button" class="btn custom-btn">
        Passport NOC
</a>
        <a href="#" type="button" class="btn custom-btn">
        FAQ
</a>
<a href="#" type="button" class="btn custom-btn">
        Tender
</a>
<a href="#" type="button" class="btn custom-btn">
        Notice Board
</a>
    </div>
</div>


    </body>
    
</html>