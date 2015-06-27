<div class="container">
<div class="row">


<?php 

echo form_open('crud/create', array('name'=>'form_create'));

if ($this->session->flashdata('cadok')):
	?>
	<div class="col-md-4">
	<div class='alert alert-success alert-dismissible' role='alert'>
  		<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  		<?php echo '<p>'.$this->session->flashdata('cadok').'</p>';  ?>
	</div></div>

	<div class="clearfix"></div>
<?php 
endif;

echo form_label('Name ');
echo form_input('name', set_value('name'), 'autofocus');

echo form_label('Email ');
echo form_input('email', set_value('email'),'');

echo form_label('Login ');
echo form_input('login', set_value('login'), '');

echo form_label('Password ');
echo form_password('password', set_value('password'),'');

echo form_label('Confirm Password ');
echo form_password('password2', set_value('password2'),'');

echo validation_errors('<p>','</p>');

echo form_submit(array('name'=>'btn_create','class'=>'btn btn-success'), 'Create User');

echo form_close();

?>



</div>
</div>

<?php 