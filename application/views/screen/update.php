<?php 

$iduser = $this->uri->segment(3);

if($iduser==NULL) redirect('crud/retrieve');

$query = $this->crud_model->get_byid($iduser)->row(); 

?>



	<div class="container">
		<div class="row">

<?php 	


echo form_open("crud/update/$iduser");

if ($this->session->flashdata('updateok')):
	?>
	<div class="col-md-4">
	<div class='alert alert-success alert-dismissible' role='alert'>
  		<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  		<?php echo '<p>'.$this->session->flashdata('updateok').'</p>';  ?>
	</div></div>

	<div class="clearfix"></div>


	
	
<?php 
endif;

echo form_label('Name ');
echo form_input('name', set_value('name', $query->name), 'autofocus');

echo form_label('Email ');
echo form_input('email', set_value('email', $query->email),'disabled="disabled"');

echo form_label('Login ');
echo form_input('login', set_value('login',$query->login), 'disabled');

echo form_label('Password ');
echo form_password('password', set_value('password'));

echo form_label('Confirm Password ');
echo form_password('password2', set_value('password2'));

echo validation_errors('<p>','</p>');

echo form_submit('btn_update', 'Change', 'class="btn btn-success"');

echo form_hidden('useridchosen', $query->id);

echo form_close();

?>
</div>
</div>