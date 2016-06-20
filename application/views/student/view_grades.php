<div class="box">

	<div class="box-header">

    


		<ul class="nav nav-tabs nav-tabs-left">

        	<?php if(isset($edit_profile)):?>

			<li class="active">

            	<a href="#edit" data-toggle="tab"><i class="icon-wrench"></i> 

					<?php echo get_phrase('edit_grades');?>

                    	</a></li>

            <?php endif;?>

			<li class="<?php if(!isset($edit_profile))echo 'active';?>">

            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 

					<?php echo get_phrase('Lista ocen');?>

                    	</a></li>

		</ul>


        

	</div>

	<div class="box-content padded">

		<div class="tab-content">



        	<?php if(isset($edit_profile)):?>

			<div class="tab-pane box active" id="edit" style="padding: 5px">

                <div class="box-content">

                	<?php foreach($edit_profile as $row):?>

                    <form method="post" action="<?php echo base_url();?>index.php?student/manage_grades/edit/do_update/<?php echo $row['grades_id'];?>" class="form-horizontal validatable">

                        <div class="padded">

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('Uczeń');?></label>

                                <div class="controls" style="padding-top:5px;">

                                    <?php echo $this->crud_model->get_type_name_by_id('student',$row['student_id'],'name');?>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('Przedmiot');?></label>

                                <div class="controls" style="padding-top:5px;">

                                    <?php echo $this->crud_model->get_type_name_by_id('subjects',$row['subjects_id'],'name');?>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('Ocena');?></label>

                                <div class="controls" style="padding-top:5px;">

                                    <?php echo $this->crud_model->get_type_name_by_id('mark',$row['mark_id'],'name');?>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('Nauczyciel');?></label>

                                <div class="controls" style="padding-top:5px;">

                                    <?php echo $this->crud_model->get_type_name_by_id('teacher',$row['teacher_id'],'name');?>

                                </div>

                            </div>

                             <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('Opis');?></label>

                                <div class="controls" style="padding-top:5px;">

                                    <?php echo $row['description'];?>

                                </div>

                            </div>

                            

                            

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('Data');?></label>

                                <div class="controls" style="padding-top:5px;">

                                    <?php echo date('m/d/Y', $row['creation_timestamp']);?>

                                </div>

                            </div>

                        </div>

                    <?php echo form_close();?>


                    <hr />

                    


                    <?php endforeach;?>

                </div>

			</div>

            <?php endif;?>



            <div class="tab-pane box <?php if(!isset($edit_profile))echo 'active';?>" id="list">

				

                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">

                	<thead>

                		<tr>

                    		<th><div>#</div></th>

                    		<th><div><?php echo get_phrase('Data');?></div></th>

                    		<th><div><?php echo get_phrase('Uczeń');?></div></th>

                    		<th><div><?php echo get_phrase('Przedmiot');?></div></th>

                            <th><div><?php echo get_phrase('Ocena');?></div></th>

                            <th><div><?php echo get_phrase('Nauczyciel');?></div></th>

                            

                    		<th><div><?php echo get_phrase('Opcje');?></div></th>

						</tr>

					</thead>

                    <tbody>

                    	<?php $count = 1;foreach($gradess as $row):?>

                        <tr>

                            <td><?php echo $count++;?></td>

                            <td><?php echo date('d M,Y', $row['creation_timestamp']);?></td>

							<td><?php echo $this->crud_model->get_type_name_by_id('student',$row['student_id'],'name');?></td>

							<td><?php echo $this->crud_model->get_type_name_by_id('subjects',$row['subjects_id'],'name');?></td>

                            <td><?php echo $this->crud_model->get_type_name_by_id('mark',$row['mark_id'],'name');?></td>

                            <td><?php echo $this->crud_model->get_type_name_by_id('teacher',$row['teacher_id'],'name');?></td>

							<td align="center">

                            	<a href="<?php echo base_url();?>index.php?student/view_grades/edit/<?php echo $row['grades_id'];?>" class="btn btn-blue">

                                	<?php echo get_phrase('Wyświetl');?>

                                </a>

        					</td>

                        </tr>

                        <?php endforeach;?>

                    </tbody>

                </table>

			</div>


            

            

		</div>

	</div>

</div>



