<div class="box">

    <div class="box-header">

    



        <ul class="nav nav-tabs nav-tabs-left">

            <?php if(isset($edit_profile)):?>

            <li class="active">

                <a href="#edit" data-toggle="tab"><i class="icon-wrench"></i> 

                    <?php echo get_phrase('Edytuj oceny');?>

                        </a></li>

            <?php endif;?>

            <li class="<?php if(!isset($edit_profile))echo 'active';?>">

                <a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 

                    <?php echo get_phrase('Lista ocen');?>

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

                    <?php echo form_open('teacher/manage_grades/edit/do_update/'.$row['grades_id'] , array('class' => 'form-horizontal validatable'));?>

                        <div class="padded">

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('Nauczyciel');?></label>

                                <div class="controls">

                                    <select class="chzn-select" name="teacher_id">

                                        <?php 

                                        $teachers    =   $this->db->get('teacher')->result_array();

                                        foreach($teachers as $row2):

                                        ?>

                                            <option value="<?php echo $row2['teacher_id'];?>" <?php if($row2['teacher_id'] == $row['teacher_id'])echo 'selected';?>>

                                                <?php echo $row2['name'];?>

                                            </option>

                                        <?php

                                        endforeach;

                                        ?>

                                    </select>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('Uczeń');?></label>

                                <div class="controls">

                                    <select class="chzn-select" name="student_id">

                                        <?php 

                                        $this->db->order_by('account_opening_timestamp' , 'asc');

                                        $students   =   $this->db->get('student')->result_array();

                                        foreach($students as $row2):

                                        ?>

                                            <option value="<?php echo $row2['student_id'];?>" <?php if($row2['student_id'] == $row['student_id'])echo 'selected';?>>

                                                <?php echo $row2['name'];?>

                                            </option>

                                        <?php

                                        endforeach;

                                        ?>

                                    </select>

                                </div>

                            </div>

                           <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('Przedmiot');?></label>

                                <div class="controls">

                                    <select class="chzn-select" name="subjects_id">

                                        <?php 

                                        $subjectss    =   $this->db->get('subjects')->result_array();

                                        foreach($subjectss as $row2):

                                        ?>

                                            <option value="<?php echo $row2['subjects_id'];?>" <?php if($row2['subjects_id'] == $row['subjects_id'])echo 'selected';?>>

                                                <?php echo $row2['name'];?>

                                            </option>

                                        <?php

                                        endforeach;

                                        ?>

                                    </select>

                                </div>

                            </div>

                          <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('Ocena');?></label>

                                <div class="controls">

                                    <select class="chzn-select" name="mark_id">

                                        <?php 

                                        $marks    =   $this->db->get('mark')->result_array();

                                        foreach($marks as $row2):

                                        ?>

                                            <option value="<?php echo $row2['mark_id'];?>" <?php if($row2['mark_id'] == $row['mark_id'])echo 'selected';?>>

                                                <?php echo $row2['name'];?>

                                            </option>

                                        <?php

                                        endforeach;

                                        ?>

                                    </select>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('Opis');?></label>

                                <div class="controls">

                                    <div class="box closable-chat-box">

                                        <div class="box-content padded">

                                                <div class="chat-message-box">

                                                <textarea name="description" id="ttt" rows="5" 

                                                    placeholder="<?php echo get_phrase('add_description');?>"><?php echo $row['description'];?></textarea>

                                                </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('Data');?></label>

                                <div class="controls">

                                    <input type="text" class="datepicker fill-up" name="creation_timestamp" value="<?php echo date('m/d/Y', $row['creation_timestamp']);?>"/>

                                </div>

                            </div>

                        </div>

                        <div class="form-actions">

                            <button type="submit" class="btn btn-blue"><?php echo get_phrase('edytuj');?></button>

                        </div>

                    <?php echo form_close();?>



                    <hr />

                    

                            

                        </table>

                     </div>

                     </div> 



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

                            <th><div><?php echo get_phrase('Nauczyciel');?></div></th>

                            <th><div><?php echo get_phrase('Przedmiot');?></div></th>

                            <th><div><?php echo get_phrase('Ocena');?></div></th>

                            <th><div><?php echo get_phrase('Opcje');?></div></th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php $count = 1;foreach($gradess as $row):?>

                        <tr>

                            <td><?php echo $count++;?></td>

                            <td><?php echo date('d M,Y', $row['creation_timestamp']);?></td>

                            <td><?php echo $this->crud_model->get_type_name_by_id('student',$row['student_id'],'name');?></td>

                            <td><?php echo $this->crud_model->get_type_name_by_id('teacher',$row['teacher_id'],'name');?></td>

                            <td><?php echo $this->crud_model->get_type_name_by_id('subjects',$row['subjects_id'],'name');?></td>

                            <td><?php echo $this->crud_model->get_type_name_by_id('mark',$row['mark_id'],'name');?></td>



                            <td align="center">

                                <a href="<?php echo base_url();?>index.php?teacher/manage_grades/edit/<?php echo $row['grades_id'];?>"

                                    rel="tooltip" data-placement="top" data-original-title="<?php echo get_phrase('edytuj');?>" class="btn btn-blue">

                                        <i class="icon-wrench"></i>

                                </a>

                                <a href="<?php echo base_url();?>index.php?teacher/manage_grades/delete/<?php echo $row['grades_id'];?>" onclick="return confirm('delete?')"

                                    rel="tooltip" data-placement="top" data-original-title="<?php echo get_phrase('usuń');?>" class="btn btn-red">

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

                    <?php echo form_open('teacher/manage_grades/create/' , array('class' => 'form-horizontal validatable'));?>

                        <div class="padded">

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('Nauczyciel');?></label>

                                <div class="controls">

                                    <select class="chzn-select" name="teacher_id">

                                        <?php 

                                        $teachers    =   $this->db->get('teacher')->result_array();

                                        foreach($teachers as $row):

                                        ?>

                                            <option value="<?php echo $row['teacher_id'];?>"><?php echo $row['name'];?></option>

                                        <?php

                                        endforeach;

                                        ?>

                                    </select>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('Uczeń');?></label>

                                <div class="controls">

                                    <select class="chzn-select" name="student_id">

                                        <?php 

                                        $this->db->order_by('account_opening_timestamp' , 'asc');

                                        $students   =   $this->db->get('student')->result_array();

                                        foreach($students as $row):

                                        ?>

                                            <option value="<?php echo $row['student_id'];?>"><?php echo $row['name'];?></option>

                                        <?php

                                        endforeach;

                                        ?>

                                    </select>

                                </div>

                            </div>

                           <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('Przedmiot');?></label>

                                <div class="controls">

                                    <select class="chzn-select" name="subjects_id">

                                        <?php 

                                        $subjectss    =   $this->db->get('subjects')->result_array();

                                        foreach($subjectss as $row):

                                        ?>

                                            <option value="<?php echo $row['subjects_id'];?>"><?php echo $row['name'];?></option>

                                        <?php

                                        endforeach;

                                        ?>

                                    </select>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('Ocena');?></label>

                                <div class="controls">

                                    <select class="chzn-select" name="mark_id">

                                        <?php 

                                        $marks    =   $this->db->get('mark')->result_array();

                                        foreach($marks as $row):

                                        ?>

                                            <option value="<?php echo $row['mark_id'];?>"><?php echo $row['name'];?></option>

                                        <?php

                                        endforeach;

                                        ?>

                                    </select>

                                </div>

                            </div>
                            

                            

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('Opis');?></label>

                                <div class="controls">

                                    <div class="box closable-chat-box">

                                        <div class="box-content padded">

                                                <div class="chat-message-box">

                                                <textarea name="description" id="ttt" rows="5" placeholder="<?php echo get_phrase('add_description');?>"></textarea>

                                                </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('Data');?></label>

                                <div class="controls">

                                    <input type="text" class="datepicker fill-up" name="creation_timestamp" value=""/>

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



