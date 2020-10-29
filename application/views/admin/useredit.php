

<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="fa fa-users"></i>Edit User</h1>
	</section>
    <section class="content">
		<div class="row">
        <div class="col-md-6">
			<p class="register-box-msg"></p>
			<div class="row">
				<div class="col-md-12">
					<?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
				</div>
			</div>
			
			<?php
            $error = $this->session->flashdata('error');
            if($error)
			{
                $message = $error;
                $class_name = "alert alert-danger alert-dismissable";
                $this->session->unset_userdata('error');
              
			?>
            <div class="<?php echo $class_name; ?>">
                <?php if(!empty($error)) { ?>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php } ?>
				<?php echo $message; ?>                    
			</div>
            <?php }
               $attributes = array('class' => 'user_registration', 'id' => 'user_registration');
                echo form_open('admin/updateuser', $attributes);
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
                        'value'  => $users['user_full_name']
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
                        'value'  => $users['user_email']
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
                        'value'  => $users['user_phone_no']
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
                    $selected_value = $users['user_gender'];
                    echo form_dropdown('gender', $options, $selected_value,'style=width:100%;');
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
                        'value'  => $users['user_latitude']
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
                        'value'  => $users['user_longitude']
                    );
                    echo form_input($long_data); 
                    ?>
                     <?php 
                     echo form_hidden('user_id', $users['user_id']);
                    ?>
                </div>
                
				<div class="row">
					<div class="col-xs-8"> </div>
					<div class="col-xs-4">
						<input type="submit" class="btn btn-primary btn-block btn-flat" value="Save" />
					</div>
                </div>
                
                <?php echo form_close();  ?>
        </div>
        <div class="col-md-6" id="location_map" style="height:350px;">
                    
                </div>
    </div>

                </section>
    </div>
<script>
    var lat = '<?php echo $users['user_latitude']; ?>';
    var long = '<?php echo $users['user_longitude']; ?>';
    function initialize() {
 
      var myLatlng = new google.maps.LatLng(lat,long);
      var myOptions = {
        zoom: 3,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      }
      var marker = new google.maps.Marker({position:myLatlng});
      /*document.getElementById("location_map").src = "https://www.google.com/maps/embed/v1/view?key=&maptype=satellite&'+'center='+lt+','+ ln+'&zoom='+zm;
      */var map = new google.maps.Map(document.getElementById("location_map"), myOptions);
        marker.setMap(map);
      
    }
/*
    function loadScript() {
      var script = document.createElement("script");
      script.type = "text/javascript";
      script.src = "http://maps.google.com/maps/api/js?sensor=false&callback=initialize";
      document.body.appendChild(script);
    }

    window.onload = loadScript;
*/
window.onload =  initialize;
</script>
