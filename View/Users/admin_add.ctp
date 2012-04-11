<?php App::uses('User', 'Authentication.Model'); ?>
<div class="users form">
<?php
    echo $this->Session->flash('auth');
    echo $this->Form->create('User');
    echo $this->Form->input('username', array(
        'label' => 'Username/Email'
    ));
    echo $this->Form->input('password');
    echo $this->Form->input('password2', array(
        'label' => 'Repeat Password',
        'type' => 'password'
    ));?>
    <div class="clearfix">
<?php 
    echo $this->Form->label('User.role', 'Select a role');
    echo $this->Form->select('role', User::$roles);
?>
    </div>
<?php 
    echo $this->Form->end(__('Create')); 
?>
</div>
<div class="actions">
    <h3><?php echo __('Actions')?></h3>
    <ul>
		<li><?php echo $this->Html->link(__('List Users'), '/admin/users');?></li>
    </ul>
</div>
