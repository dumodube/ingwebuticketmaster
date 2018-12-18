<!DOCTYPE html>
<html>
<head>
	<title>Ingwebu Help desk</title>
	<link rel="stylesheet" href="https://bootswatch.com/4/journal/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/materialize.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="<?php echo base_url(); ?>assets/js/materialize.js"></script>
	<style>
		
	</style>
</head>
<body >

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
		<div class="container">
			<a class="navbar-brand display-4" href="<?php echo base_url(); ?>home" ><span class='lg-heading'>Ingwebu ticket</span>master</a>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>home">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>about">About</a>
					</li>
					<?php if($this->session->userdata('logged_in')) :?>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url(); ?>posts">View Tickets</a>
						</li>
					<?php endif;?>	
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>contacts">Extensions List</a>
					</li>
				</ul>
				<ul class="navbar-nav ml-auto">
				<?php if(!$this->session->userdata('logged_in')): ?>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>users/login">Login</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>users/register">Register</a>
					</li>
				<?php endif; ?>	
				<?php if($this->session->userdata('logged_in')) :?>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>posts/create">Add Ticket</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>users/logout">Logout</a>
					</li>
					<!-- <li class="nav-item">
						<a class="nav-link"><strong> by <?php echo $post['user_name'];?></strong></a>
					</li> -->
					
				<?php endif;?>	
				</ul>
			</div>
		</div>
	</nav>

<div class="container">
 <!--Flash Messages-->

<?php if($this->session->flashdata('user_registered')): ?>
	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered') . 
	'</p>' ;?>
<?php endif; ?>	

<?php if($this->session->flashdata('ticket_created')): ?>
	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('ticket_created') . 
	'</p>' ;?>
<?php endif; ?>	

<?php if($this->session->flashdata('updated')): ?>
	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('updated') . 
	'</p>' ;?>
<?php endif; ?>	

<?php if($this->session->flashdata('category_created')): ?>
	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_created') . 
	'</p>' ;?>
<?php endif; ?>	

<?php if($this->session->flashdata('ticket_deleted')): ?>
	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('ticket_deleted') . 
	'</p>' ;?>
<?php endif; ?>	

<?php if($this->session->flashdata('login_failed')): ?>
	<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed') . 
	'</p>' ;?>
<?php endif; ?>	


<?php if($this->session->flashdata('user_loggedin')): ?>
	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin') . 
	'</p>' ;?>
<?php endif; ?>	

<?php if($this->session->flashdata('user_logout')): ?>
	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_logout') . 
	'</p>' ;?>
<?php endif; ?>	


