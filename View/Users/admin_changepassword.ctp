<form action="/admin/users/changepassword" id="UserAdminChangepasswordForm" method="post" accept-charset="utf-8">
    <div style="display:none;">
        <input type="hidden" name="_method" value="POST"/>
        <input type="hidden" name="data[User][id]" value="<?php echo $user_id ?>"/>
    </div>
    <div class="input password">
        <label for="UserPassword">New Password</label>
        <input name="data[password]" type="password" id="UserPassword"/>
    </div>
    <div class="input password">
        <label for="UserPassword">Repeat New Password</label>
        <input name="data[password2]" type="password" id="UserPassword2"/>
    </div>
    <div class="submit">
        <input  type="submit" value="Update"/>
    </div>
</form>
