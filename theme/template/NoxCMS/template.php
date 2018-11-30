<!doctype html>
<html>
<head>
    <meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="theme/template/noxcms/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="theme/template/noxcms/style.css">
    <link rel="stylesheet" href="theme/template/noxcmscss/animate.css"/>
    <script src="theme/template/noxcms/js/jquery-2.1.0.js"></script>
    <script src="theme/template/noxcms/js/bootstrap.js"></script>
    <script src="theme/template/noxcms/js/typer.js"></script>
    <script src="theme/template/noxcms/js/blocs.js"></script>
    <link rel='stylesheet' href='theme/template/noxcms/css/et-line.min.css'/>
    <link rel='stylesheet' href='theme/template/noxcms/css/font-awesome.min.css'/>
    <link href='http://fonts.googleapis.com/css?family=Montserrat&subset=latin,latin-ext' rel='stylesheet'
          type='text/css'>

    <title><?=$title?></title>
	<style type="text/css">
	.auto-style1 {
		font-family: Montserrat;
		color: #337AB7;
	}
	</style>
</head>
<body>
<div class="page-container">

    <div class="bloc bgc-carmine-pink d-bloc" id="nav-bloc">
        <div class="container">
            <nav class="navbar row">
                <div class="navbar-header">
                    <button id="nav-toggle" type="button" class="ui-navbar-toggle navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-1">
                        <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span
                            class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse navbar-1">
                    <ul class="site-navigation nav navbar-nav">
                         <?php foreach ($links as $r): ?>
                            <li>
                                <a href="<?=$r['route_path']?>">
                                    <?=ucfirst($r['route_name'])?>
                                </a>
                            </li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navigation Bloc END -->

    <!-- header -->
    <div class="bloc bgc-outer-space bg-city-overlay d-bloc" id="header">
        <div class="container bloc-xl">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="text-center mg-lg tc-white">Welcome to <?=$title?></h3>
                    
                    <p class="text-center  mg-lg animated fadeInUp animDelay02">
                        <p>&nbsp;</p>
					<p class="text-center  mg-lg animated fadeInUp animDelay02">
                        
                        
                    </p>
					<p class="text-center  mg-lg animated fadeInUp animDelay02">
                        <img height="320" src="https://PatricNox.info/assets/NoxCMS.png" width="320"></p>

                    <div class="text-center">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

	
    <div class="bloc l-bloc bgc-white" id="services" style="left: -1px; top: -150px">
        <div class="container bloc-lg">
            <div class="row">
                <div class="col-sm-4">
                    <div class="text-center">
        </div>
    </div>
                <?php foreach($content as $c):?>            
                    <div class="bloc bgc-carmine-pink d-bloc" id="5jaar">
                        <div class="container bloc-sm">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h2 class="text-center mg-md ">
                                        <?=$c['post_title'];?>
                                    </h2>

                                    <p class="sub-heading text-center">
                                        <?=nl2br($c['content']);?></p>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
    

                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
    <!-- NOG INVULLEN -->
    <!-- NOG INVULLEN -->

                </div>
            </div>
        </div>
    </div>

    <!-- Terug knopje -->
    <a class="bloc-button btn btn-d scrollToTop" onclick="scrollToTarget('1')"><span
            class="fa fa-chevron-up"></span></a>

   
   <!-- Credits -->
    </div>

</div>
</body>

</html>
