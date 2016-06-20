<div class="box">

	<div class="box-header">

    


		<ul class="nav nav-tabs nav-tabs-left">



			<li class="active">

            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 

					<?php echo get_phrase('Profil');?>

                    	</a></li>

		</ul>

 

        

	</div>

	<div class="box-content padded">

		<div class="tab-content">

    

			<div class="tab-pane box active" id="list" style="padding: 5px">

                <div class="box-content padded">

					<?php 

                    foreach($edit_profile as $row):

                        ?>

                        <?php echo form_open('admin/manage_profile/update_profile_info/' , array('class' => 'form-horizontal validatable'));?>

                                <div class="control-group">

                                    <label class="control-label"><?php echo get_phrase('Imię i Nazwisko');?></label>

                                    <div class="controls">

                                        <input type="text" class="" name="name" value="<?php echo $row['name'];?>"/>

                                    </div>

                                </div>

                                <div class="control-group">

                                    <label class="control-label"><?php echo get_phrase('email');?></label>

                                    <div class="controls">

                                        <input type="text" class="" name="email" value="<?php echo $row['email'];?>"/>

                                    </div>

                                </div>

                                <div class="control-group">

                                    <label class="control-label"><?php echo get_phrase('adres');?></label>

                                    <div class="controls">

                                        <input type="text" class="" name="address" value="<?php echo $row['address'];?>"/>

                                    </div>

                                </div>

                                <div class="control-group">

                                    <label class="control-label"><?php echo get_phrase('telefon');?></label>

                                    <div class="controls">

                                        <input type="text" class="" name="phone" value="<?php echo $row['phone'];?>"/>

                                    </div>

                                </div>

                                <div class="form-actions">

                            		<button type="submit" class="btn btn-blue"><?php echo get_phrase('zapisz');?></button>

                        		</div>

                        <?php echo form_close();?>

						<?php

                    endforeach;

                    ?>

                </div>

			</div>
            

		</div>

	</div>

</div>





<!--password-->

<div class="box">

	<div class="box-header">

    



		<ul class="nav nav-tabs nav-tabs-left">



			<li class="active">

            	<a href="#list" data-toggle="tab"><i class="icon-lock"></i> 

					<?php echo get_phrase('zmień hasło');?>

                    	</a></li>

		</ul>



        

	</div>

	<div class="box-content padded">

		<div class="tab-content">



			<div class="tab-pane box active" id="list" style="padding: 5px">

                <div class="box-content padded">

					<?php 

                    foreach($edit_profile as $row):

                        ?>

                        <?php echo form_open('admin/manage_profile/change_password/' , array('class' => 'form-horizontal validatable'));?>

                                <div class="control-group">

                                    <label class="control-label"><?php echo get_phrase('hasło');?></label>

                                    <div class="controls">

                                        <input type="password" class="" name="password" value=""/>

                                    </div>

                                </div>

                                <div class="control-group">

                                    <label class="control-label"><?php echo get_phrase('nowe hasło');?></label>

                                    <div class="controls">

                                        <input type="password" class="" name="new_password" value=""/>

                                    </div>

                                </div>

                                <div class="control-group">

                                    <label class="control-label"><?php echo get_phrase('powtórz hasło');?></label>

                                    <div class="controls">

                                        <input type="password" class="" name="confirm_new_password" value=""/>

                                    </div>

                                </div>

                                <div class="form-actions">

                            		<button type="submit" class="btn btn-blue"><?php echo get_phrase('zapisz');?></button>

                        		</div>

                        <?php echo form_close();?>

						<?php

                    endforeach;

                    ?>

                </div>

			</div>



            

		</div>

	</div>

</div>