<div class="box">

	<div class="box-header">

    

		<ul class="nav nav-tabs nav-tabs-left">

        	<?php if(isset($edit_profile)):?>

			<li class="active">

            	<a href="#edit" data-toggle="tab"><i class="icon-wrench"></i> 

					<?php echo get_phrase('edit_noticeboard');?>

                    	</a></li>

            <?php endif;?>

			<li class="<?php if(!isset($edit_profile))echo 'active';?>">

            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 

					<?php echo get_phrase('Wydarzenia');?>

                    	</a></li>

			<li>

            	<a href="#add" data-toggle="tab"><i class="icon-plus"></i>

					<?php echo get_phrase('Dodaj');?>

                    	</a></li>

		</ul>



        

	</div>

	<div class="box-content padded">

		<div class="tab-content">



        	<?php if(isset($edit_profile)):?>

			<div class="tab-pane box active" id="edit" style="padding: 5px">

                <div class="box-content">

                	<?php foreach($edit_profile as $row):?>

                    <?php echo form_open('admin/manage_noticeboard/edit/do_update/'.$row['notice_id'] , array('class' => 'form-horizontal validatable'));?>

                        <div class="padded">

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('Tytuł');?></label>

                                <div class="controls">

                                    <input type="text" class="validate[required]" name="notice_title" value="<?php echo $row['notice_title'];?>"/>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('Opis');?></label>

                                <div class="controls">

                                    <input type="text" class="" name="notice" value="<?php echo $row['notice'];?>"/>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('Data');?></label>

                                <div class="controls">

                                    <input type="text" class="datepicker fill-up" name="create_timestamp" value="<?php echo date('m/d/Y',$row['create_timestamp']);?>"/>

                                </div>

                            </div>



                        </div>

                        <div class="form-actions">

                            <button type="submit" class="btn btn-blue"><?php echo get_phrase('zapisz');?></button>

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

                    		<th><div><?php echo get_phrase('tytuł');?></div></th>

                    		<th><div><?php echo get_phrase('opis');?></div></th>

                    		<th><div><?php echo get_phrase('data');?></div></th>

                    		<th><div><?php echo get_phrase('opcje');?></div></th>

						</tr>

					</thead>

                    <tbody>

                    	<?php $count = 1;foreach($notices as $row):?>

                        <tr>

                            <td><?php echo $count++;?></td>

							<td><?php echo $row['notice_title'];?></td>

							<td><?php echo $row['notice'];?></td>

							<td><?php echo date('d M,Y', $row['create_timestamp']);?></td>

							<td align="center">

                            	<a href="<?php echo base_url();?>index.php?admin/manage_noticeboard/edit/<?php echo $row['notice_id'];?>"

                                	rel="tooltip" data-placement="top" data-original-title="<?php echo get_phrase('edytuj');?>" class="btn btn-blue">

                                		<i class="icon-wrench"></i>

                                </a>

                            	<a href="<?php echo base_url();?>index.php?admin/manage_noticeboard/delete/<?php echo $row['notice_id'];?>" onclick="return confirm('delete?')"

                                	rel="tooltip" data-placement="top" data-original-title="<?php echo get_phrase('skasuj');?>" class="btn btn-red">

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

                    <?php echo form_open('admin/manage_noticeboard/create/' , array('class' => 'form-horizontal validatable'));?>

                        <div class="padded">

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('tytuł');?></label>

                                <div class="controls">

                                    <input type="text" class="validate[required]" name="notice_title"/>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('opis');?></label>

                                <div class="controls">

                                    <input type="text" class="" name="notice"/>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('data');?></label>

                                <div class="controls">

                                    <input type="text" class="datepicker fill-up" name="create_timestamp"/>

                                </div>

                            </div>



                        </div>

                        <div class="form-actions">

                            <button type="submit" class="btn btn-blue"><?php echo get_phrase('Dodaj');?></button>

                        </div>

                    <?php echo form_close();?>                

                </div>                

			</div>



            

		</div>

	</div>

</div>