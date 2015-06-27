<?php 

$iduser = $this->uri->segment(3);

if($iduser==NULL) redirect('crud/retrieve');

$query = $this->crud_model->get_byid($iduser)->row(); 

?>



	<div class="container">
		<div class="row">

<?php 	


echo form_open("crud/delete/$iduser");

if ($this->session->flashdata('deleteok')):
	?>
	<div class="col-md-4">
	<div class='alert alert-success alert-dismissible' role='alert'>
  		<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  		<?php echo '<p>'.$this->session->flashdata('deleteok').'</p>';  ?>
	</div></div>

	<div class="clearfix"></div>


	
	
<?php 
endif;

echo form_label('Name ');
echo form_input('name', set_value('name', $query->name), 'disabled');

echo form_label('Email ');
echo form_input('email', set_value('email', $query->email),'disabled="disabled"');

echo form_label('Login ');
echo form_input('login', set_value('login',$query->login), 'disabled');



echo form_submit('btn_delete', 'Delete', 'class="btn btn-warning"');

echo form_hidden('useridchosen', $query->id);

echo form_close();

?>
</div>
</div>