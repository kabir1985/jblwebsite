<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?? 'Board of Directors'; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <style>


        /* ===== Download Link ===== */
        .download-link{
            display:inline-block;
            margin:15px 0;
            font-weight:600;
            color:#0056b3;
        }

        .download-link:hover{
            color:#003f88;
            text-decoration:underline;
        }

        /* ===== BOD CARD ===== */
        .bod-card{
            margin-bottom:40px;
        }

        /* ===== CIRCULAR IMAGE WRAP ===== */
        .bod-image-wrap{
            width:160px;
            height:160px;
            margin:0 auto;
            border-radius:50%;
            padding:4px;
            background:linear-gradient(135deg,#0099cc,#007bb5);
            box-shadow:0 6px 18px rgba(0,0,0,0.12);
            transition:all .35s ease;
        }

        .bod-image-wrap:hover{
            transform:translateY(-6px);
            box-shadow:0 12px 28px rgba(0,153,204,0.35);
        }

        /* ===== CIRCULAR IMAGE ===== */
        .bod-img{
            width:100%;
            height:100%;
            border-radius:50%;
            object-fit:cover;
            border:4px solid #ffffff; /* white inner ring */
            transition: transform .4s ease;
        }

        .bod-image-wrap:hover .bod-img{
            transform: scale(1.05);
        }

        /* ===== INFO BOX ===== */
        .bod-box{
    background: linear-gradient(135deg,#0099cc,#007bb5);
    color: #f9fbfd;
    padding: 12px 10px;
    text-align: center;
    border-radius: 0 0 14px 14px;
    margin-top: -20px; /* overlap slightly with circle */
    display: flex;
    flex-direction: column;
    justify-content: center; /* vertical center text */
    align-items: center;     /* horizontal center text */
    width: 100%;             /* full width of card */
    height: 160px;           /* fixed height for all boxes */
    box-sizing: border-box;  /* include padding in height */
}

        .bod-name{
            font-size:15px;
            font-weight:600;
            color:#ffffff;
            margin-bottom:4px;
        }

        .bod-designation{
            font-size:12px;
            font-weight:600;
            color:#e6f4ff;
            margin-bottom:2px;
        }

        .bod-qualification{
            font-size:13px;
            font-style:italic;
            color:#d9f1ff;
        }

        @media(max-width:768px){
            .bod-image-wrap{
                width:140px;
                height:140px;
            }
            .bod-box{
                margin-top:-18px;
            }
        }
    </style>
</head>

<body>

<div class="container mt-3">

    <?php
/* ===== LATEST PDF FILE ===== */
$files = glob('/var/www/html/assets/images/bod/*.*');
$files = array_combine($files, array_map('filectime', $files));
arsort($files);
$latestFile = str_replace('/var/www/html/assets/images/bod/', '', key($files));
?>

    <!-- Download Link -->
    <a class="download-link" href="<?php echo base_url(); ?>assets/images/bod/<?php echo $latestFile; ?>" target="_blank">
        Download Director Related Information
    </a>

    <!-- Page Content -->
    <?php foreach ($page_details as $row) {?>
        <div class="mb-4">
            <?php echo $row->content; ?>
        </div>
    <?php }?>

    <!-- BOD SECTION -->
    <div class="row text-center justify-content-center">

        <?php foreach ($bod as $row) {?>

            <div class="col-md-4 col-sm-6 col-12 bod-card">

                <div class="bod-image-wrap">
                    <?php
// Conditional PDF links
    if ($row['bod_designation'] == "Chairman") {
        $pdf_link = base_url() . 'assets/images/bod/chairman_sir_profile.pdf';
    } elseif ($row['bod_designation'] == "Managing Director") {
        $pdf_link = base_url() . 'assets/images/bod/MD_sir_profile.pdf';
    } else {
        $pdf_link = '#';
    }
    ?>
                    <a target="_blank" href="<?php echo $pdf_link; ?>">
                        <img class="img-fluid bod-img" src="<?php echo base_url(); ?>assets/images/bod/<?php echo $row['bod_image']; ?>" alt="<?php echo $row['bod_name']; ?>">
                    </a>
                </div>

                <div class="bod-box">
                    <div class="bod-name"><?php echo $row['bod_name']; ?></div>
                    <div class="bod-designation"><?php echo $row['bod_designation']; ?></div>
                    <div class="bod-qualification"><?php echo $row['bod_extra_quali']; ?></div>
                </div>

            </div>

        <?php }?>

    </div>

</div>

</body>
</html>
