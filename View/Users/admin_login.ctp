<div class="well" style="width:350px; height:250px; margin-left:auto; margin-right:auto;">
<?php
    echo $this->Session->flash('auth');
    echo $this->Form->create('User');
    echo $this->Form->input('username');
    echo $this->Form->input('password');
    echo $this->Form->end('Login');
?>
</div>
