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

<div 
    style="    float: right;
    width: 400px;
    height: auto;
    position: absolute;
    top: 12vh;
    right: 4vh;">
 <form method="POST" action="/test.php">            
            <div class="postbox" id="table">
        <table class="table1">
        <tr>
            <th>Theme Name</th>
            <th>Public</th>
            <th>Default</th
        </tr>
        <tr>
            <td>NoxCMS Gaming</td>
            <td><input type="checkbox" checked></td> 
            <td><input type="submit" name="d" value="Set Default Theme"></td>
        </tr>
        <tr>
            <td>NoxCMS Blog</td>
            <td><input type="checkbox" name="public"></td> 
            <td><input type="submit" name="create_p" value="Set Default Theme"></td>
        </tr>
        </table>
    </div>
    </form>