<div id="_wrap">
    <div class="top_tab">
        <ul>
            <li>
                <div id="logo"></div>
            </li>
                <li>
                    <a href="#">Admin</a>
                </li>
                <li>
                    <a href="#">Server</a>
                </li>
                <li>
                    <a href="#">User-Manager</a>
                </li>
                <li>
                    <a href="#">Pages</a>
                </li>
        </ul>
    </div>
    <div class="acp_body">
        <?php foreach($posts as $c):?>
            <form method="POST" action="/NoxCMS/admin/inc/posthandler.php">            
                <div class="postbox">
                    <h3>Title: <input type="text" name="update_post_title" value="<?=$c['post_title'];?>"/></h3>
                    <div>
                        <p>
                            <textarea rows="10" cols="30" name="update_content">
                                <?=$c['content'];?>
                            </textarea>  
                        </p>
                    </div>
                </div>
                <span class="post_options">
                    <input type="hidden" name="post_id" value="<?=$c['post_id'];?>">
                    <input type="submit" name="delete_post" value="Delete Post"/>
                    <input type="submit" name="update_post" value="Update Post"/>
                </span>
            </form>
        <?php endforeach;?>
    </div>
</div>
