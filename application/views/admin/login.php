<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>User Management</title>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<link href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
	<div class="login-box">
		
		
		<div class="login-box-body">
			<p class="login-box-msg">Sign In</p>
            <div class="row">
				<div class="col-md-12">
					<?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
				</div>
			</div>
		    <?php
		    $error = $this->session->flashdata('error');
            $success = $this->session->flashdata('success');
			if($error || $success)
			{
                if(isset($error) && !empty($error))
                {
                    $message = $error;
                    $class_name = "alert alert-danger alert-dismissable";
                    $this->session->unset_userdata('error');
                }
                if(isset($success) && !empty($success))
                {
                    $message = $success;
                    $class_name = "alert alert-success";
                    $this->session->unset_userdata('success');
                }
			?>
		      <div class="<?php echo $class_name; ?>">
                <?php if(!empty($error)) { ?>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php } ?>
				<?php echo $message; ?>                    
			</div>
            <?php }
			
            $attributes = array('class' => 'user_login', 'id' => 'user_login');
                echo form_open('admin/userlogin', $attributes);?>
				<div class="form-group has-feedback">
                <?php 
                    $email_data = array(
                        'type'  => 'email',
                        'name'  => 'email',
                        'id'    => 'email',
                        'value' => '',
                        'class' => 'form-control',
                        'required' => 'required',
                        'placeholder' => 'Enter your Email'
                    );
                    echo form_input($email_data,'','style=background-image:none !important;'); 
                    ?>
				</div>
				
				<div class="form-group has-feedback">
                <?php 
                    $pwd_data = array(
                        'type'  => 'password',
                        'name'  => 'password',
                        'id'    => 'password',
                        'value' => '',
                        'class' => 'form-control',
                        'required' => 'required',
                        'placeholder' => 'Enter your Password'
                    );
                    echo form_input($pwd_data,'','style=background-image:none !important;'); 
                    ?>
				
				</div>
				
				<div class="row">
					<div class="col-xs-8"> </div>
					<div class="col-xs-4">
						<input type="submit" class="btn btn-primary btn-block btn-flat" value="Login" />
					</div>
				</div>
			</form>
		</div>
	</div>

	<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>