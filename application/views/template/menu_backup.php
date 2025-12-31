<nav class="navbar navbar-expand-lg navbar-dark bg-light" id="meganavbar">
    <!--  <a class="navbar-brand" href="#">Navbar</a>-->
    <div class="navbar-header sticky-top bg-transparent">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <?php foreach ($mainmenu as $mm) : ?>
                <?php if ($mm->mid != $mm->spid) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $mm->url; ?>"><?php echo $mm->mname; ?></a>
                    </li>
                <?php else : ?>
                    <li class="nav-item dropdown menu-area">
                        <a class="nav-link" href="<?php echo $mm->url; ?>" id="mega-one" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $mm->mname; ?> <i class="fa fa-angle-down"></i></a>
                        <div class="dropdown-menu mega-area rounded-0" aria-labelledby="mega-one">
                            <div class="row">
                                <?php foreach ($submenu as $sm) : ?>
                                    <?php if ($mm->mid == $sm->submenu_parent) : ?>
                                        <div class="col-md-3 drop">
                                          <!--<h5> <?php //echo $sm->submenu_name;    ?></h5>-->
                                            <?php if ($sm->submenu_url != NULL) : ?>
                                                <a style="color: #f33b51;" href="<?php echo $sm->submenu_url; ?>"><?php echo $sm->submenu_name; ?></a>
                                            <?php else : ?>
                                                <a style="color: #f33b51;"> <?php echo $sm->submenu_name; ?></a>
                                            <?php endif; ?>
                                            <div class="dropdown-divider"></div>
                                            <?php foreach ($childmenu as $child) : ?>
                                                <?php if ($sm->submenu_id == $child->childmenu_parent) : ?>
                                                    <a class="dropdown-item" href="<?php echo $child->childmenu_url; ?>"><?php echo $child->childmenu_name; ?></a>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
</nav>

<script type="text/javascript">
//    document.addEventListener("DOMContentLoaded", function () {
//        window.addEventListener('scroll', function () {
//            if (window.scrollY > 50) {
//                document.getElementById('meganavbar').classList.add('fixed-top');
//                // add padding top to show content behind navbar
//                navbar_height = document.querySelector('.navbar').offsetHeight;
//                document.body.style.paddingTop = navbar_height + 'px';
//            } else {
//                document.getElementById('meganavbar').classList.remove('fixed-top');
//                // remove padding top from body
//                document.body.style.paddingTop = '0';
//            }
//        });
//    });
// DOMContentLoaded  end

var nav = document.getElementById("meganavbar");
var sticky = nav.offsetTop;
window.onscroll = function(){
    if(window.scrollY > sticky){
        nav.classList.add("fixed-top");
    } else{
        nav.classList.remove("fixed-top");
    }
};

</script>

