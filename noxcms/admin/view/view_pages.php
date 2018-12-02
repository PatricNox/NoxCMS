<h1>Pages</h1>
    <form method="POST" action="/NoxCMS/admin/inc/pagehandler.php">            
        <div class="postbox" id="table">
            <table class="table1">
            <tr>
                <th>Page Name</th>
                <th>Public</th> 
                <th>Active</th>
                <th></th>
                <th></th>
            </tr>
            <?php foreach ($pages as $p): ?>
                <tr>
                    <input type="hidden" name="page_id" value="<?=$p['route_id'];?>">
                    <td><input type="text" name="pageName" value="<?=ucfirst($p['route_name'])?>" /></td>
                    <td><input type="checkbox" name="public" <?=($p['public'] == 1) ? 'checked':''?> /></td> 
                    <td><input type="checkbox" name="active" <?=($p['active'] == 1) ? 'checked':''?> /></td>
                    <td><input type="submit" name="update_p" value="Update" /></td>
                    <td><input type="submit" name="delete_p" value="Delete" /></td>
                </tr>
             <?php endforeach;?>
            </table>
        </div>
    </form>

<h1>Add Page</h1>
<form method="POST" action="/NoxCMS/admin/inc/pagehandler.php">            
    <div class="postbox" id="table">
        <table class="table1">
        <tr>
            <th>Page Name</th>
            <th>Public</th> 
            <th>Active</th>
            <th></th>
        </tr>
        <tr>
            <td><input type="text" name="pageName"/></td>
            <td><input type="checkbox" name="public"></td> 
            <td><input type="checkbox" name="active"></td>
            <td><input type="submit" name="create_p" value="Create Page"></td>
        </tr>
        </table>
    </div>
</form>
