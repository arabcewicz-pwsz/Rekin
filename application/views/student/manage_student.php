<div class="box">

  <div class="box-header">

    



		<ul class="nav nav-tabs nav-tabs-left">

        	<?php if(isset($edit_profile)):?>

			<li class="active">

            	<a href="#edit" data-toggle="tab"><i class="icon-wrench"></i> 

					<?php echo get_phrase('edit_student');?>

                    	</a></li>

            <?php endif;?>

			<li class="<?php if(!isset($edit_profile))echo 'active';?>">

            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 

					<?php echo get_phrase('student_list');?>

                    	</a></li>

			<li>

            	<a href="#add" data-toggle="tab"><i class="icon-plus"></i>

					<?php echo get_phrase('add_student');?>

                    	</a></li>

		</ul>



        

	</div>

	<div class="box-content padded">

		<div class="tab-content">

  

        	<?php if(isset($edit_profile)):?>

			<div class="tab-pane box active" id="edit" style="padding: 5px">

                <div class="box-content">

                	<?php foreach($edit_profile as $row):?>

                    <?php echo form_open('student/manage_student/edit/do_update/'.$row['student_id'] , array('class' => 'form-horizontal validatable'));?>

                        <div class="padded">

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('name');?></label>

                                <div class="controls">

                                    <input type="text" class="validate[required]" name="name" value="<?php echo $row['name'];?>"/>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('email');?></label>

                                <div class="controls">

                                    <input type="text" class="validate[required]" name="email" value="<?php echo $row['email'];?>"/>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('password');?></label>

                                <div class="controls">

                                    <input type="password" class="validate[required]" name="password" value="<?php echo $row['password'];?>"/>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('address');?></label>

                                <div class="controls">

                                    <input type="text" class="" name="address" value="<?php echo $row['address'];?>"/>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('phone');?></label>

                                <div class="controls">

                                    <input type="text" class="" name="phone" value="<?php echo $row['phone'];?>"/>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('sex');?></label>

                                <div class="controls">

                                    <select name="sex" class="uniform" style="width:100%;">

                                    	<option value="male" <?php if($row['sex']=='male')echo 'selected';?>><?php echo get_phrase('male');?></option>

                                    	<option value="female" <?php if($row['sex']=='female')echo 'selected';?>><?php echo get_phrase('female');?></option>

                                    </select>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('birth_date');?></label>

                                <div class="controls">

                                    <input type="date" class="" name="birth_date" value="<?php echo $row['birth_date'];?>"/>

                                </div>

                            </div>

                            

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('classes');?></label>

                                <div class="controls">

                                    <select name="classes" class="uniform" style="width:100%;">

                                    	<option value="IA" <?php if($row['classes']=='IA')echo 'selected';?>>A+</option>

                                        <option value="IB" <?php if($row['classes']=='IB')echo 'selected';?>>A-</option>

                                        <option value="IC" <?php if($row['classes']=='IC')echo 'selected';?>>B+</option>

                                        <option value="ID" <?php if($row['classes']=='ID')echo 'selected';?>>B-</option>

                                        <option value="IIA" <?php if($row['classes']=='IIA')echo 'selected';?>>AB+</option>

                                        <option value="IIB" <?php if($row['classes']=='IIB')echo 'selected';?>>AB-</option>

                                        <option value="IIC" <?php if($row['classes']=='IIC')echo 'selected';?>>O+</option>

                                        <option value="IID" <?php if($row['classes']=='IID')echo 'selected';?>>O-</option>

                                        <option value="IIIA" <?php if($row['classes']=='IIIA')echo 'selected';?>>AB+</option>

                                        <option value="IIIB" <?php if($row['classes']=='IIIB')echo 'selected';?>>AB-</option>

                                        <option value="IIIC" <?php if($row['classes']=='IIIC')echo 'selected';?>>O+</option>

                                        <option value="IIID" <?php if($row['classes']=='IIID')echo 'selected';?>>O-</option>

                                    </select>

                                </div>

                            </div>

                        </div>

                        <div class="form-actions">

                            <button type="submit" class="btn btn-blue"><?php echo get_phrase('edit_student');?></button>

                        </div>

                    <?php echo form_close();?>

                    <?php endforeach;?>

                </div>

			</div>

            <?php endif;?>



            <div class="tab-pane box <?php if(!isset($edit_profile))echo 'active';?>" id="list">

				

                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">

                	<thead>

                		<tr>

                    		<th><div>#</div></th>

                    		<th><div><?php echo get_phrase('student_name');?></div></th>

                    	

                    		<th><div><?php echo get_phrase('sex');?></div></th>

                    		<th><div><?php echo get_phrase('classes');?></div></th>

                    		<th><div><?php echo get_phrase('birth_date');?></div></th>

                    		<th><div><?php echo get_phrase('options');?></div></th>

						</tr>

					</thead>

                    <tbody>

                    	<?php $count = 1;foreach($students as $row):?>

                        <tr>

                            <td><?php echo $count++;?></td>

							<td><?php echo $row['name'];?></td>

						

							<td><?php echo $row['sex'];?></td>

							<td><?php echo $row['classes'];?></td>

							<td><?php echo $row['birth_date'];?></td>

							<td align="center">

                            	<a href="<?php echo base_url();?>index.php?student/manage_student/edit/<?php echo $row['student_id'];?>"

                                	rel="tooltip" data-placement="top" data-original-title="<?php echo get_phrase('edit');?>" class="btn btn-blue">

                                		<i class="icon-wrench"></i>

                                </a>

                            	<a href="<?php echo base_url();?>index.php?student/manage_student/delete/<?php echo $row['student_id'];?>" onclick="return confirm('delete?')"

                                	rel="tooltip" data-placement="top" data-original-title="<?php echo get_phrase('delete');?>" class="btn btn-red">

                                		<i class="icon-trash"></i>

                                </a>

        					</td>

                        </tr>

                        <?php endforeach;?>

                    </tbody>

                </table>

			</div>



			<div class="tab-pane box" id="add" style="padding: 5px">

                <div class="box-content">

                    <?php echo form_open('student/manage_student/create/' , array('class' => 'form-horizontal validatable'));?>

                        <div class="padded">

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('name');?></label>

                                <div class="controls">

                                    <input type="text" class="validate[required]" name="name"/>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('email');?></label>

                                <div class="controls">

                                    <input type="text" class="validate[required]" name="email"/>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('password');?></label>

                                <div class="controls">

                                    <input type="password" class="validate[required]" name="password"/>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('address');?></label>

                                <div class="controls">

                                    <input type="text" class="" name="address"/>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('phone');?></label>

                                <div class="controls">

                                    <input type="text" class="" name="phone"/>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('sex');?></label>

                                <div class="controls">

                                    <select name="sex" class="uniform" style="width:100%;">

                                    	<option value="male"><?php echo get_phrase('male');?></option>

                                    	<option value="female"><?php echo get_phrase('female');?></option>

                                    </select>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('birth_date');?></label>

                                <div class="controls">

                                    <input type="date" class="" name="birth_date"/>

                                </div>

                            </div>

                            

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('classes');?></label>

                                <div class="controls">

                                    <select name="classes" class="uniform" style="width:100%;">

                                    	<option value="IA">IA</option>

                                        <option value="IB">IB</option>

                                        <option value="IC">IC</option>

                                        <option value="ID">ID</option>

                                        <option value="IIA">IIA</option>

                                        <option value="IIB">IIB</option>

                                        <option value="IIC">IIC</option>

                                        <option value="IID">IID</option>

                                        <option value="IIA">IIIA</option>

                                        <option value="IIB">IIIB</option>

                                        <option value="IIC">IIIC</option>

                                        <option value="IID">IIID</option>

                                    </select>

                                </div>

                            </div>

                        </div>

                        <div class="form-actions">

                            <button type="submit" class="btn btn-blue"><?php echo get_phrase('add_student');?></button>

                        </div>

                    <?php echo form_close();?>                

                </div>                

			</div>



            

		</div>

	</div>

</div>