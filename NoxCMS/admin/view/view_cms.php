<?php foreach($posts as $c):?>
    <form method="GET" action="/NoxCMS/admin/inc/posthandler.php">            
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
