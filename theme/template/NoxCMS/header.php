<div id="main_wrapper"> 
    <div id="artwork1"></div>
    <div id="artwork3"></div>
    <div id="artwork4"></div>
    <div id="artwork5"></div>
    <div id="header"><span><?=$title?></span></div>
    <div id="button_bar">
        <ul>
            <?php foreach ($links as $r): ?>
                <li>
                    <a href="<?=$r['route_path']?>">
                        <?=ucfirst($r['route_name'])?>
                    </a>
                </li>
            <?php endforeach;?>
        </ul>
    </div>
