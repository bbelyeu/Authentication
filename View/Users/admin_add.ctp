<div class="users form">
<?php
    echo $this->Session->flash('auth');
    echo $this->Form->create('User');
    echo $this->Form->input('username');
    echo $this->Form->input('password');
    $options = array(
        'admin' => 'Admin',
        'agent' => 'Agent',
        'editor' => 'Editor',
        'manager' => 'Manager'
    );
    echo $this->Form->select('role', $options);
    echo $this->Form->end('Create');
?>
</div>
<div class="actions">
    <h3>Actions</h3>
    <ul>
        <li><a href="/admin/ulusers">List Users</a></li>
    </ul>
</div>
