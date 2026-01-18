<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>CEO/MD Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
body {
    font-family: Nikosh, SolaimanLipi, Arial, sans-serif;
    background: #f5f8fa;
    color: #333;
}

/* Container for all cards */
.cards-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
    margin-top: 20px;
}

/* Individual card */
.view_image {
    background: #D9ECF3;
    border: 1px solid #0099cc;
    border-radius: 12px;
    width: 220px;
    height: 340px; /* fixed height for all cards */
    text-align: center;
    padding: 10px;
    box-sizing: border-box;
    transition: transform 0.3s, box-shadow 0.3s;
    display: flex;
    flex-direction: column;
    align-items: center;
}

/* Hover effect */
.view_image:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

/* Image styling */
.view_image img {
    width: 160px;
    height: 160px;
    object-fit: cover;
    border-radius: 50%; /* circular images */
    border: 3px solid #0099cc;
    margin-bottom: 10px;
}

/* Name */
.name {
    font-size: 18px;
    color: #0099cc;
    font-weight: bold;
    margin-bottom: 5px;
}

/* Designation */
.designation {
    font-size: 16px;
    color: #C70039;
    font-weight: bold;
    margin-bottom: 5px;
}

/* Duration */
.duration {
    font-size: 15px;
    color: red;
    margin-bottom: 5px;
}

/* Responsive */
@media(max-width:768px) {
    .view_image {
        width: 45%;
        height: auto;
    }
}
@media(max-width:480px) {
    .view_image {
        width: 90%;
        height: auto;
    }
}
</style>
</head>

<body>

<!-- Page content -->
<div class="container mt-3">
    <?php foreach ($page_details as $row) { ?>                         
        <div class="mb-3">
            <?php echo $row->content; ?>
        </div>
    <?php } ?>

    <!-- CEO/MD Cards -->
    <div class="cards-container">
        <?php foreach ($md as $row) { ?>
            <div class="view_image">
                <img src="<?php echo base_url('assets/images/ceomd/'.$row['image']); ?>" alt="<?php echo $row['name']; ?>">
                <div class="name"><?php echo $row['name']; ?></div>
                <div class="designation"><?php echo $row['designation']; ?></div>
                <div class="duration"><?php echo $row['duration']; ?></div>
            </div>
        <?php } ?>
    </div>
</div>

</body>
</html>
