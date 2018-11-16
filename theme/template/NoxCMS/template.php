<div id="main_wrapper"> 
    <div id="artwork1"></div>
    <div id="artwork3"></div>
    <div id="artwork4"></div>
    <div id="artwork5"></div>
    <div id="header"><span><?=$title?></span></div>
    <div id="button_bar">
        <ul>
            <li><a href="#" id="on">Home</a></li>
            <li><a href="#">Register</a></li>
            <li><a href="#">Login</a></li>
            <li><a href="#">Forum</a></li>
            <li><a href="#">Info</a></li>
            <li><a href="#">Videos</a></li>
            <li><a href="#">Games</a></li>
            <li><a href="#">Features</a></li>
            <li><a href="#">News</a></li>
        </ul>
    </div>
    <div id="main_content">
        <div id="navbar2">
            <ul>
                <li><a href="#">PC</a></li>
                <li><a href="#">PS2</a></li>
                <li><a href="#">PS3</a></li>
                <li><a href="#">XBOX 360</a></li>
                <li><a href="#">PSP</a></li>
                <li><a href="#">GBA</a></li>
                <li><a href="#">DS</a></li>
                <li><a href="#">MOBILE</a></li>
                <li><a href="#">WII</a></li>
                <li><a href="#">MMPOG</a></li>
            </ul>   
        </div>
        <div id="navbar3">
            <ul>
                <li><a href="#">Cheats</a></li>
                <li><a href="#">Videos</a></li>
                <li><a href="#">Community</a></li>
                <li><a href="#">Forums</a></li>
                <li><a href="#">Downloads</a></li>
            </ul>   
        </div>
        <div class="box-wrapper">
            <?php foreach($content as $c):?>            
                <div class="box">
                    <h3 data-toggleable="true"><?=$c['post_title'];?></h3>
                    <div>
                        <p>
                            <?=nl2br($c['content']);?>
                        </p>
                     </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
    <div id="sidebar">
        <form id="search_form" action="" method="POST" autocomplete="off">
            <input type="text" name="search" placeholder='Search on the site..' id="search"><br />
        </form>
    </div>
    
    <div id="infobar">
        <h2><img src="theme/template/NoxCMS/img/23.png" alt="icon" /> Recent News</h3>
        <ul class="custom-list">
            <li>    
                <a href="#">IDW Announces Robert Bloch Collection</a>
            </li>
             <li>
                <a href="#">Geoff Johns Partners with Earth-2 Comics </a>
            </li>
    <li>
    <a href="#">

        Doctor Who, Torchwood Kick Off BBC America HD

    </a>
    </li>
    <li>
    <a href="#">

        Blue Water to Publish Logan's Run Comics

    </a>
    </li>
    <li class="bg-none">
    <a href="#">

        Online Registration for Impact University Now Open

    </a>
    </li>

    </ul>
        </div>
        <div id="Serverbar">
            <h2><img src="theme/template/NoxCMS/img/23.png" alt="icon" /> Serverlist</h2>
                    
            <div id="servers">
                <ul class="list-custom-1">

    <li>
    <a href="#">
        <span class="col-1">01.</span>
        <span class="col-2">
            <span class="text-title">Superb DropGaming Edition</span>
                                To make it all work, you need to fill it up, cuz iam a pro lelelelelel

            <span class="link-text">_</span>
        </span>
    </a>
    </li>
    <li>
        <li>
    <a href="#">
        <span class="col-1">02.</span>
        <span class="col-2">
            <span class="text-title">Superb DropGaming Edition</span>
                                To make it all work, you need to fill it up, cuz iam a pro lelelelelel

            <span class="link-text">_</span>
        </span>
    </a>
    </li> <li>
    <a href="#">
        <span class="col-1">03.</span>
        <span class="col-2">
            <span class="text-title">Superb DropGaming Edition</span>
                                To make it all work, you need to fill it up, cuz iam a pro lelelelelel

            <span class="link-text">_</span>
        </span>
    </a>
    </li> <li>
    <a href="#">
        <span class="col-1">04.</span>
        <span class="col-2">
            <span class="text-title">Superb Edition</span>
                                To make it all work, you need to fill it up

            <span class="link-text">_</span>
        </span>
    </a>
    </li>
    </ul>
            </div>
        </div>
        
        <div id="Videobar">
            <h2><img src="theme/template/NoxCMS/img/23.png" alt="icon" /> Video Picks    <font size="2px" style=padding-left:50px;><a href="#"> See More </a></font></h2>
            <div id="videos">
                <div class="boxIndent-bg"></div>
            </div>
        </div>
    <div class="moduletable">

    <a href="#">
    <img class="indent-top-banner" alt="" src="theme/template/NoxCMS/img/banner.jpg"></img>
    </a>

    </div>	
    </div>
