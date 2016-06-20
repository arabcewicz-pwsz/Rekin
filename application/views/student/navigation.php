<div class="sidebar-background">

	<div class="primary-sidebar-background">

	</div>

</div>

<div class="primary-sidebar">

	<!-- Main nav -->

    <br />

    <div style="text-align:center;">

    	<a href="<?php echo base_url();?>">

        	<img src="<?php echo base_url();?>uploads/logo.png"  style="max-height:100px; max-width:100px;"/>

        </a>

    </div>

   	<br />

	<ul class="nav nav-collapse collapse nav-collapse-primary">

    

        



		<li class="<?php if($page_name == 'dashboard')echo 'dark-nav active';?>">

			<span class="glow"></span>

				<a href="<?php echo base_url();?>index.php?student/dashboard" >

					<i class="icon-desktop icon-2x"></i>

					<span><?php echo get_phrase('Główna');?></span>

				</a>

		</li>

        



        

   

		<li class="<?php if($page_name == 'view_grades')echo 'dark-nav active';?>">

			<span class="glow"></span>

				<a href="<?php echo base_url();?>index.php?student/view_grades" >

					<i class="icon-book icon-2x"></i>

					<span><?php echo get_phrase('Oceny');?></span>

				</a>

		</li>


		<li class="<?php if($page_name == 'manage_profile')echo 'dark-nav active';?>">

			<span class="glow"></span>

				<a href="<?php echo base_url();?>index.php?student/manage_profile" >

					<i class="icon-lock icon-2x"></i>

					<span><?php echo get_phrase('Profil');?></span>

				</a>

		</li>

		

	</ul>

	

</div>