<div class="box">

    <div class="box-header">

    

        <ul class="nav nav-tabs nav-tabs-left">

            <?php if(isset($edit_profile)):?>

            <li class="active">

                <a href="#edit" data-toggle="tab"><i class="icon-wrench"></i> 

                    <?php echo get_phrase('edit_teacher');?>

                        </a></li>

            <?php endif;?>

            <li class="<?php if(!isset($edit_profile))echo 'active';?>">

                <a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 

                    <?php echo get_phrase('Lista Nauczycieli');?>

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

                    <?php echo form_open('admin/manage_teacher/edit/do_update/'.$row['teacher_id'] , array('class' => 'form-horizontal validatable'));?>

                        <div class="padded">

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('Imię i Nazwisko');?></label>

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

                                <label class="control-label"><?php echo get_phrase('hasło');?></label>

                                <div class="controls">

                                    <input type="password" class="validate[required]" name="password" value="<?php echo $row['password'];?>"/>

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

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('Przedmiot');?></label>

                                <div class="controls">

                                    <input type="text" class="" name="subject" value="<?php echo $row['subject'];?>"/>

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

                            <th><div><?php echo get_phrase('Imię i Nazwisko');?></div></th>

                            <th><div><?php echo get_phrase('email');?></div></th>

                            <th><div><?php echo get_phrase('hasło');?></div></th>

                            <th><div><?php echo get_phrase('adres');?></div></th>

                            <th><div><?php echo get_phrase('telefon');?></div></th>
                            <th><div><?php echo get_phrase('Przedmiot');?></div></th>

                            <th><div><?php echo get_phrase('Opcje');?></div></th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php $count = 1;foreach($teachers as $row):?>

                        <tr>

                            <td><?php echo $count++;?></td>

                            <td><?php echo $row['name'];?></td>

                            <td><?php echo $row['email'];?></td>

                            <td><?php echo $row['password'];?></td>

                            <td><?php echo $row['address'];?></td>

                            <td><?php echo $row['phone'];?></td>

                            <td><?php echo $row['subject'];?></td>


                            <td align="center">

                                <a href="<?php echo base_url();?>index.php?admin/manage_teacher/edit/<?php echo $row['teacher_id'];?>"

                                    rel="tooltip" data-placement="top" data-original-title="<?php echo get_phrase('edytuj');?>" class="btn btn-blue">

                                        <i class="icon-wrench"></i>

                                </a>

                                <a href="<?php echo base_url();?>index.php?admin/manage_teacher/delete/<?php echo $row['teacher_id'];?>" onclick="return confirm('delete?')"

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

                    <?php echo form_open('admin/manage_teacher/create/' , array('class' => 'form-horizontal validatable'));?>

                        <div class="padded">

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('Imię i Nazwisko');?></label>

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

                                <label class="control-label"><?php echo get_phrase('hasło');?></label>

                                <div class="controls">

                                    <input type="password" class="validate[required]" name="password"/>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('adres');?></label>

                                <div class="controls">

                                    <input type="text" class="" name="address"/>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('telefon');?></label>

                                <div class="controls">

                                    <input type="text" class="" name="phone"/>

                                </div>

                            </div>
                            
                             <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('Przedmiot');?></label>

                                <div class="controls">

                                    <input type="text" class="" name="subject"/>

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