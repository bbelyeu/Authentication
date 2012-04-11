<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php echo __('Admin Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('username', array(
            'label' => 'Username/Email'
        ));
		echo $this->Form->input('password', array(
            'value' => ''
        ));
		echo $this->Form->input('password2', array(
            'label' => 'Repeat Password',
            'type' => 'password'
        ));
    ?>
        <div class="clearfix">
    <?php 
        echo $this->Form->label('User.role', 'Select a role');
        echo $this->Form->select('role', User::$roles);
	?>
        </div>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), '/admin/users/delete/'.$this->Form->value('User.id'), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), '/admin/users');?></li>
	</ul>
</div>
