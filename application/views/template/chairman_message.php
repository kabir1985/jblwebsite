
<style>

    /* Main Card */
    .fullwidth-card {
      max-width: 100%;
      border: none;
      border-radius: 12px;
      overflow: hidden;
      transition: transform 0.4s ease, box-shadow 0.4s ease;
      box-shadow: 0 6px 20px rgba(0,0,0,0.1);
      background-color: #f5f5f5;
    }

    .fullwidth-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 25px rgba(0,0,0,0.2);
    }

    /* Framed Photo */
    .photo-frame {
      position: relative;
      display: inline-block;
      border: 6px solid #ffffff;
      box-shadow: 0 0 15px rgba(0,0,0,0.15);
      border-radius: 10px;
      overflow: hidden;
      transition: transform 0.4s ease;
    }

    .photo-frame img {
      width: 100%;
      height: 320px;
      object-fit: cover;
      display: block;
      border-radius: 8px;
    }

    .photo-frame:hover {
      transform: scale(1.03);
    }

    /* Card Body */
    .fullwidth-card .card-body {
     /* padding: 2rem; */
      text-align: center;
    }

    .fullwidth-card .card-title {
      font-size: 1.6rem;
      font-weight: 700;
      color: #0077b6;
    }

    .fullwidth-card .card-text {
      color: #6c757d;
      font-size: 1rem;
      margin-bottom: 1.5rem;
    }

    .btn-primary {
      background: linear-gradient(135deg, #0C6A2B, #22C55E);
      border: none;
      border-radius: 25px;
      padding: 10px 30px;
      transition: background 0.3s ease;
    }

    .btn-primary:hover {
      background: linear-gradient(135deg, #0A5E26, #1FAF55);
    }

  </style>

<div class="container py-1">
  <a href="#" target="_blank" class="text-decoration-none text-dark">
    <div class="card fullwidth-card mx-auto p-3" style="max-width: 600px; max-height:550px;">
      
      <div class="photo-frame mx-auto mb-3">
        <img src="assets/images/others/chairman.png" class="rounded mx-auto d-block" alt="Feature Image" >
      </div>

      <div class="card-body">
        <h2 class="card-title mb-3">Mr. M. Fazlur Rahman</h2>
        <p class="card-text text-muted">
          Honorable Chairman of Janata Bank PLC.
        </p>
        <button class="btn btn-info px-5 py-2">Read More</button>
      </div>
    </div>
  </a>
</div>
