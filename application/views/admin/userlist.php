<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="fa fa-users"></i>Users List</h1>
	</section>
    
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">	
        <?php
            $success = $this->session->flashdata('success');
            if($success)
            {
                      $message = $success;
                      $class_name = "alert alert-success alert-dismissable";
                      $this->session->unset_userdata('success');
                    
			?>
            <div class="<?php echo $class_name; ?>">
                <?php if(!empty($success)) { ?>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php } ?>
				<?php echo $message; ?>                    
			</div>
            <?php } ?>
                <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Gender</th>
                  <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $user_row) {?>
                <tr>
                  <td><?php echo $user_row['user_full_name']; ?></td>
                  <td><?php echo $user_row['user_email']; ?>
                  </td>
                  <td><?php echo $user_row['user_phone_no']; ?></td>
                  <td><?php echo ucfirst($user_row['user_gender']); ?></td>
                  <td><a href="<?php echo base_url().'index.php/admin/useredit/'.$user_row['user_id']; ?>" class="btn bg-purple btn-sm">Edit</a></td>
                </tr>
                    <?php } ?>
</tbody>
</table>
				</div>
			</div>
			
			
		</div>    
	</section>
</div>