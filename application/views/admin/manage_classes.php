<div class="box">

    <div class="box-header">

    

        <ul class="nav nav-tabs nav-tabs-left">

            <?php if(isset($edit_profile)):?>

            <li class="active">

                <a href="#edit" data-toggle="tab"><i class="icon-wrench"></i> 

                    <?php echo get_phrase('edit_classes');?>

                        </a></li>

            <?php endif;?>

            <li class="<?php if(!isset($edit_profile))echo 'active';?>">

                <a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 

                    <?php echo get_phrase('Lista Klas');?>

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

                    <?php echo form_open('admin/manage_classes/edit/do_update/'.$row['class_id'] , array('class' => 'form-horizontal validatable'));?>

                        <div class="padded">

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('Name');?></label>

                                <div class="controls">

                                    <input type="text" class="validate[required]" name="name" value="<?php echo $row['name'];?>"/>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('Profil');?></label>

                                <div class="controls">

                                    <input type="text" class="validate[required]" name="profile" value="<?php echo $row['profile'];?>"/>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('Wychowawca');?></label>

                                <div class="controls">

                                    <input type="text" class="validate[required]" name="teacher_name" value="<?php echo $row['teacher_name'];?>"/>

                                </div>

                            </div>

                            


    

                            

                        <div class="form-actions">

                            <button type="submit" class="btn btn-blue"><?php echo get_phrase('Zapisz');?></button>

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

                            <th><div><?php echo get_phrase('Nazwa');?></div></th>

                            <th><div><?php echo get_phrase('Profil');?></div></th>

                            <th><div><?php echo get_phrase('Wychowawca');?></div></th>

                            <th><div><?php echo get_phrase('Opcje');?></div></th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php $count = 1;foreach($classess as $row):?>

                        <tr>

                            <td><?php echo $count++;?></td>

                            <td><?php echo $row['name'];?></td>

                            <td><?php echo $row['profile'];?></td>

                            <td><?php echo $row['teacher_name'];?></td>




                            <td align="center">

                                <a href="<?php echo base_url();?>index.php?admin/manage_classes/edit/<?php echo $row['class_id'];?>"

                                    rel="tooltip" data-placement="top" data-original-title="<?php echo get_phrase('edytuj');?>" class="btn btn-blue">

                                        <i class="icon-wrench"></i>

                                </a>

                                <a href="<?php echo base_url();?>index.php?admin/manage_classes/delete/<?php echo $row['class_id'];?>" onclick="return confirm('delete?')"

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

                    <?php echo form_open('admin/manage_classes/create/' , array('class' => 'form-horizontal validatable'));?>

                        <div class="padded">

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('Nazwa');?></label>

                                <div class="controls">

                                    <input type="text" class="validate[required]" name="name"/>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('Profil');?></label>

                                <div class="controls">

                                    <input type="text" class="validate[required]" name="profile"/>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('Wychowawca');?></label>

                                <div class="controls">

                                    <input type="text" class="validate[required]" name="teacher_name"/>

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