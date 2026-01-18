<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Header with Search</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

<style>
body{
    font-family:'Poppins',sans-serif;
    margin:0;
}

/* ================= BUTTON STYLE ================= */
.custom-btn{
    position:relative;
    overflow:hidden;
    border:1px solid rgba(0,153,204,.7);
    color:#0099cc;
    background:#fff;
    padding:6px 14px;
    border-radius:30px;
    font-size:13px;
    font-weight:500;
    cursor:pointer;
    transition:.4s;
    box-shadow:0 2px 6px rgba(0,153,204,.15);
    text-decoration:none;
}

.custom-btn::before{
    content:"";
    position:absolute;
    top:0;
    left:-100%;
    width:100%;
    height:100%;
    background:linear-gradient(135deg,#0099cc,#476EAE);
    transition:.5s;
}

.custom-btn:hover::before{
    left:0;
}

.custom-btn span{
    position:relative;
    z-index:1;
}

.custom-btn:hover{
    color:#fff;
    transform:translateY(-2px);
    box-shadow:0 6px 14px rgba(0,153,204,.4);
}

/* ================= SEARCH BAR ================= */
.searchbar{
    position:relative;
    width:42px;
    height:32px;
    overflow:hidden;
    transition:width .3s ease;
}

.searchbar.open{
    width:220px;
}

.searchbar-input{
    width:100%;
    height:32px;
    border:none;
    outline:none;
    padding:0 60px 0 14px;
    background:linear-gradient(135deg, #0099cc, #00D4B1) !important;
    color:#fff;
    font-size:13px;
}

.searchbar-input::placeholder{
    color:#eaf7ff;
}

.searchbar-icon,
.searchbar-submit{
    position:absolute;
    top:0;
    right:0;
    width:42px;
    height:32px;
    border:none;
    cursor:pointer;
    background:#0099cc;
    color:#fff;
    font-size:14px;
}

.searchbar-submit{
    right:42px;
    display:none;
}

.searchbar.open .searchbar-submit{
    display:block;
}

/* ================= LAYOUT ================= */
.header{
    display:flex;
    align-items:center;
    justify-content:space-between;
    /* padding:10px 16px;
    flex-wrap:wrap; */
    flex-wrap:nowrap;   /* 🔥 force single line */
}

.logo img{
    max-height:65px;
}

.menu{
    display:flex;
    gap:8px;
    flex-wrap:wrap;
    align-items:center;
}

/* ================= MOBILE ================= */
@media(max-width:768px){
    .searchbar{
        display:none;
    }
}
</style>
</head>

<body>

<div class="header">

    <!-- LOGO -->
    <div class="logo">
        <a href="<?= base_url(); ?>">
            <img src="<?= base_url('assets/images/others/jblogo.png'); ?>" alt="Logo">
        </a>
    </div>

    <!-- BUTTONS + SEARCH -->
    <div class="menu">
        <a href="#" class="custom-btn"><span>eJanata Apps</span></a>
        <!-- <a href="#" class="custom-btn"><span>JB Green Pin</span></a>
        <a href="#" class="custom-btn"><span>Passport NOC</span></a> -->
        <a href="#" class="custom-btn"><span>FAQ</span></a>
        <a href="#" class="custom-btn"><span>Tender</span></a>
        <a href="#" class="custom-btn"><span>Notice Board</span></a>

        <!-- SEARCH -->
        <form class="searchbar" action="<?= base_url('home/search'); ?>" method="POST">
            <input type="search" name="search" class="searchbar-input" placeholder="Search..." required>
             <button type="submit" class="searchbar-submit">Go</button>
            <button type="button" class="searchbar-icon">🔍</button>
        </form>
    </div>

</div>

<!-- ================= JS ================= -->
<script>
const searchBar = document.querySelector('.searchbar');
const searchIcon = document.querySelector('.searchbar-icon');
const searchInput = document.querySelector('.searchbar-input');

searchIcon.addEventListener('click', () => {
    searchBar.classList.toggle('open');
    searchInput.focus();
});

document.addEventListener('click', (e) => {
    if (!searchBar.contains(e.target)) {
        searchBar.classList.remove('open');
    }
});
</script>

</body>
</html>
