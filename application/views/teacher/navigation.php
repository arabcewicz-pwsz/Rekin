<div class="sidebar-background">

	<div class="primary-sidebar-background">

	</div>

</div>

<div class="primary-sidebar">



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

				<a href="<?php echo base_url();?>index.php?teacher/dashboard" >

					<i class="icon-desktop icon-2x"></i>

					<span><?php echo get_phrase('Główna');?></span>

				</a>

		</li>

        



		<li class="<?php if($page_name == 'manage_student')echo 'dark-nav active';?>">

			<span class="glow"></span>

				<a href="<?php echo base_url();?>index.php?teacher/manage_student" >

					<i class="icon-user icon-2x"></i>

					<span><?php echo get_phrase('Uczeń');?></span>

				</a>

		</li>




		<li class="<?php if($page_name == 'manage_grades')echo 'dark-nav active';?>">

			<span class="glow"></span>

				<a href="<?php echo base_url();?>index.php?teacher/manage_grades" >

					<i class="icon-book icon-2x"></i>

					<span><?php echo get_phrase('Oceny');?></span>

				</a>

		</li>
        
		<li class="<?php if($page_name == 'manage_noticeboard')echo 'dark-nav active';?>">

			<span class="glow"></span>

				<a href="<?php echo base_url();?>index.php?teacher/manage_noticeboard" >

					<i class="icon-columns icon-2x"></i>

					<span><?php echo get_phrase('Terminarz');?></span>

				</a>

		</li>
        







		<li class="<?php if($page_name == 'manage_profile')echo 'dark-nav active';?>">

			<span class="glow"></span>

				<a href="<?php echo base_url();?>index.php?teacher/manage_profile" >

					<i class="icon-lock icon-2x"></i>

					<span><?php echo get_phrase('profil');?></span>

				</a>

		</li>

		

	</ul>

	

</div>