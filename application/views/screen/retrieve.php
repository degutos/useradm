<?php 



echo "<div class='col-md-1'>";
echo '</div>' ;
echo "<div class='col-md-10'>";	



if ($this->session->flashdata('deleteok')):
	?>
	<div class="col-md-4">
	<div class='alert alert-danger alert-dismissible' role='alert'>
  		<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  		<?php echo '<p>'.$this->session->flashdata('deleteok').'</p>';  ?>
	</div></div>

	<div class="clearfix"></div>
	

<?php 
endif;
$template = array(
	'table_open' => '<table class="table table-striped">',
);
$this->table->set_template($template);

echo '<h2>List of Users </h2> <br>';

$this->table->set_heading('Id','Name','Email','Login','Action');
foreach ($users as $row):
	$this->table->add_row($row->id,$row->name,$row->email,$row->login, anchor("crud/update/".$row->id, 'Edit'). ' - ' . anchor("crud/delete/".$row->id, 'Delete'));
endforeach;

echo $this->table->generate();


echo '</div>' ;

?>
<br><br>


<div class="container">
    <div class="row hidden">
        <div class="col-md-12">
        <hr>
        <h2>List of Users </h2> <br>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User's Name</th>
                        <th>Email</th>
                        <th>Login</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($users); ++$i) { ?>
                    <tr>
                        <!--<td><?php echo ($page+$i+1); ?></td>-->
                        <td><?php echo $users[$i]->id; ?></td>
                        <td><?php echo $users[$i]->name; ?></td>
                        <td><?php echo $users[$i]->email; ?></td>
                        <td><?php echo $users[$i]->login; ?></td>
                        <td><?php echo anchor("crud/update/".$users[$i]->id, 'Edit') . ' - ' . anchor("crud/delete/".$users[$i]->id, 'Delete'); ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!--<div class="row">
        <div class="col-md-12 text-center">
            <?php //echo $pagination; ?>
        </div> -->

</div>