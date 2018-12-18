<!DOCTYPE html>
<html>
<head>
    <title>Ingwebu Help desk</title>
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/admin-materialize.min.css?630222957639193643" rel="stylesheet">
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css"> -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/materialize.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">



</head>
<body class="has-fixed-sidenav">
<header>
      <div class="navbar-fixed">
      <ul class="dropdown-content" id="dropdown-notifications">
            <li>Mine</li>
            <li>mineta</li>
            <li>lorence</li>
            <li>leesa</li>
        </ul>
        <nav class="navbar white">
          <div class="nav-wrapper">
            <ul id="nav-mobile" class="right">
                <li class="hide-on-med-and-down"><a href="#">Notifications</a></li>
                <li class="">
                   <a href="#" class="dropdown-button" data-activates='dropdown-notifications'><i class="material-icons">notifications</i></a>
                </li>
                <li><a href="#!" data-target="chat-dropdown" class="dropdown-trigger waves-effect"><i class="material-icons">settings</i></a></li>
            </ul><a href="#!" data-target="sidenav-left" class="sidenav-trigger left"><i class="material-icons black-text">menu</i></a>
          </div>
        </nav>
        
    </div>
    <ul id="sidenav-left" class="sidenav sidenav-fixed blue">
        <li><a href="<?php echo base_url()?>admin" class="logo-container">Admin<i class="material-icons left">spa</i></a></li>
        <li class="no-padding">
            <ul class="collapsible collapsible-accordion">
                <li class="bold waves-effect"><a class="collapsible-header">HOME<i class="material-icons chevron">chevron_left</i></a>
                    <div class="collapsible-body">
                        <ul>
                        <li><a href="<?php echo base_url(); ?>" class="waves-effect active">HOME<i class="material-icons">cloud</i></a></li>
                        <li><a href="<?php echo base_url(); ?>about" class="waves-effect active">ABOUT<i class="material-icons">cloud</i></a></li>
                        
                        </ul>
                    </div>
                    </li>
                    <li class="bold waves-effect"><a class="collapsible-header">Tickets<i class="material-icons chevron">chevron_left</i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="<?php echo base_url()?>admin" class="waves-effect">View Ticket<i class="material-icons">web</i></a></li>
                            <li><a href="<?php echo base_url()?>posts/create" class="waves-effect">Add Ticket<i class="material-icons">web</i></a></li>
                        </ul>
                    </div>
                    </li>
                    <li class="bold waves-effect"><a class="collapsible-header">Categories<i class="material-icons chevron">chevron_left</i></a>
                    <div class="collapsible-body">
                        <ul>
                        <li><a href="<?php echo base_url(); ?>admin/categories" class="waves-effect">View Categories<i class="material-icons">show_chart</i></a></li>
                        <li><a href="<?php echo base_url(); ?>admin/categories/create" class="waves-effect">Create Categories<i class="material-icons">equalizer</i></a></li>
                        </ul>
                    </div>
                    </li>
                    <li class="bold waves-effect"><a class="collapsible-header">Contacts<i class="material-icons chevron">chevron_left</i></a>
                    <div class="collapsible-body">
                        <ul>
                        <li><a href="<?php echo base_url(); ?>contacts" class="waves-effect">Extensions List<i class="material-icons">phone</i></a></li>
                    </div>
                    </li>
                    <li class="bold waves-effect"><a class="collapsible-header">Account<i class="material-icons chevron">chevron_left</i></a>
                    <div class="collapsible-body">
                        <ul>
                        <li><a href="<?php echo base_url(); ?>users/logout" class="waves-effect">Log Out<i class="material-icons">person</i></a></li>

                        <li><a href="<?php echo base_url(); ?>users" class="waves-effect">Users<i class="material-icons">face</i></a></li>
                        <!-- <li><a href="<?php echo base_url(); ?>settings" class="waves-effect">Settings<i class="material-icons">settings</i></a></li> -->
                        </ul>
                    </div>
                    </li>
            </ul>
        </li>
      </ul>

      </header>


	<script>
        $(document).ready(function(){
            $('.collapsible').collapsible();
        });
	</script>


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


