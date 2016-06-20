<div class="box">

	<div class="box-header">



		<ul class="nav nav-tabs nav-tabs-left">

			<li class="active">

            	<a href="#backup" data-toggle="tab"><i class="icon-align-justify"></i> 

					<?php echo get_phrase('backup');?>

                    	</a></li>

			<li class="">

            	<a href="#restore" data-toggle="tab"><i class="icon-align-justify"></i> 

					<?php echo get_phrase('restore');?>

                    	</a></li>

		</ul>

        

	</div>

	<div class="box-content padded">

		<div class="tab-content">            



            <div class="tab-pane box active span7" id="backup">

				<center>

                <table cellpadding="0" cellspacing="0" border="0" class="table table-normal" >

                    <tbody>

                    	<?php 

						for($i = 1; $i<= 4; $i++):

						

							if($i	==	1)	$type	=	'teacher';

							else if($i	==	2)$type	=	'student';

							
							else if($i	==	3)$type=	'noticeboard';



							else if($i	==	4)$type=	'all';

							?>

							<tr>

								<td><?php echo get_phrase($type);?></td>

								<td align="center">

									<a href="<?php echo base_url();?>index.php?admin/backup_restore/create/<?php echo $type;?>" 

										class="btn btn-default" rel="tooltip" data-original-title="download backup"><i class="icon-download-alt" ></i>

											</a>

									<a href="<?php echo base_url();?>index.php?admin/backup_restore/delete/<?php echo $type;?>" 

										class="btn btn-default" rel="tooltip" data-original-title="delete data" onclick="return confirm('delete confirm?');"><i class="icon-trash"></i>

											</a>

								</td>

							</tr>

							<?php 

						endfor;

						?>

                    </tbody>

                </table>

                </center>

			</div>



            

            <div class="tab-pane box  span6" id="restore">



                <?php echo form_open('admin/backup_restore/restore' , array('enctype' => 'multipart/form-data'));?>

                    <input name="userfile" type="file" />

                    <br /><br />

                    <center><input type="submit" class="btn btn-blue" value="<?php echo get_phrase('Wgraj backup');?>" /></center>

                    <br />

                <?php echo form_close();?>

			</div>



		</div>

	</div>

</div>