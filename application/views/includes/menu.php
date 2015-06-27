<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><?php echo anchor('crud/create', 'Create', array('id'=>'create','class'=>'')); ?></li>
		<li><?php echo anchor('crud/retrieve', 'Retrieve'); ?></li>		
		<!--<li><?php echo anchor('crud/update', 'Update'); ?></li>
		<li><?php echo anchor('crud/delete', 'Delete'); ?></li> -->
        <!--<li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li> -->
        
      <form class="navbar-form navbar-left " role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default" style="margin-top: -15px;">Submit</button>
      </form>
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>



<!--<ul>
	<li><?php //echo anchor('crud/create', 'Create', array('id'=>'create','class'=>'test')); ?></li>
	<li><?php //echo anchor('crud/retrieve', 'Retrieve'); ?></li>		
	<li><?php //echo anchor('crud/update', 'Update'); ?></li>
	<li><?php //echo anchor('crud/delete', 'Delete'); ?></li>
</ul> -->