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
<body class="hold-transition register-page">
	<div class="register-box">
		<div class="register-logo">
			<a href="#"></a>
		</div>
		
		<div class="register-box-body">
			<p class="register-box-msg">User Registration</p>
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
            if(empty($success)) { 
			    $attributes = array('class' => 'user_registration', 'id' => 'user_registration');
                echo form_open('user/adduser', $attributes);
            ?>
                <div class="form-group">
                    <label>Name</label>
                    <?php 
                    $name_data = array(
                        'type'  => 'text',
                        'name'  => 'user_name',
                        'id'    => 'user_name',
                        'value' => '',
                        'class' => 'form-control',
                        'required' => 'required',
                        'placeholder' => 'Enter your name',
                        'value'  => set_value('user_name')
                    );
                    echo form_input($name_data,'','style=background-image:none !important;'); 
                    ?>
				</div>
				<div class="form-group">
                    <label>Email</label>
                    <?php 
                    $email_data = array(
                        'type'  => 'email',
                        'name'  => 'email',
                        'id'    => 'email',
                        'value' => '',
                        'class' => 'form-control',
                        'required' => 'required',
                        'placeholder' => 'Enter your Email',
                        'value'  => set_value('email')
                    );
                    echo form_input($email_data); 
                    ?>
				</div>
				<div class="form-group">
                    <label>Phone No</label>
                    <?php 
                    $phone_data = array(
                        'type'  => 'text',
                        'name'  => 'phone',
                        'id'    => 'phone',
                        'value' => '',
                        'class' => 'form-control',
                        'required' => 'required',
                        'placeholder' => 'Enter your phone no',
                        'minlength' => 10,
                        'maxlength' => 20,
                        'value'  => set_value('phone')
                    );
                    echo form_input($phone_data); 
                    ?>
                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <br/>
                    <?php 
                    $options = array(
                        'male'         => 'Male',
                        'female'       => 'Female'
                    );
                
                    echo form_dropdown('gender', $options, '','style=width:100%;');
                    ?>
                </div>
                <div class="form-group">
                    <label>Latitude</label>
                    <?php 
                    $lat_data = array(
                        'type'  => 'text',
                        'name'  => 'latitude',
                        'id'    => 'latitude',
                        'value' => '',
                        'class' => 'form-control',
                        'required' => 'required',
                        'placeholder' => 'Latitude',
                        'value'  => set_value('latitude')
                    );
                    echo form_input($lat_data); 
                    ?>
                </div>
                <div class="form-group">
                    <label>Longitude</label>
                    <?php 
                    $long_data = array(
                        'type'  => 'text',
                        'name'  => 'longitude',
                        'id'    => 'longitude',
                        'value' => '',
                        'class' => 'form-control',
                        'required' => 'required',
                        'placeholder' => 'Longitude',
                        'value'  => set_value('longitude')
                    );
                    echo form_input($long_data); 
                    ?>
                    
                </div>
                
				<div class="row">
					<div class="col-xs-8"> </div>
					<div class="col-xs-4">
						<input type="submit" class="btn btn-primary btn-block btn-flat" value="Register" />
					</div>
				</div>
                <?php echo form_close();  } ?>
		</div>
    </div>
                

	<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>