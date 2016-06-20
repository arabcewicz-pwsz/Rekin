<div class="container-fluid padded">

	<div class="row-fluid">

        <div class="span30">



            <div class="action-nav-normal">

                <div class="row-fluid">

                    

                    <div class="span2 action-nav-button">

                        <a href="<?php echo base_url();?>index.php?admin/manage_student">

                        <i class="icon-user"></i>

                        <span><?php echo get_phrase('Uczeń');?></span>

                        </a>

                    </div>

                    <div class="span2 action-nav-button">

                        <a href="<?php echo base_url();?>index.php?admin/manage_teacher">

                        <i class="icon-plus-sign-alt"></i>

                        <span><?php echo get_phrase('Nauczyciel');?></span>

                        </a>

                    </div>

                    

                   

                    

                </div>



                <div class="row-fluid">


       

                    <div class="span2 action-nav-button">

                        <a href="<?php echo base_url();?>index.php?admin/manage_noticeboard">

                        <i class="icon-columns"></i>

                        <span><?php echo get_phrase('Terminarz');?></span>

                        </a>

                    </div>

                    <div class="span2 action-nav-button">

                        <a href="<?php echo base_url();?>index.php?admin/system_settings">

                        <i class="icon-h-sign"></i>

                        <span><?php echo get_phrase('Ustawienia');?></span>

                        </a>

                    </div>

                  

                    <div class="span2 action-nav-button">

                        <a href="<?php echo base_url();?>index.php?admin/backup_restore">

                        <i class="icon-download-alt"></i>

                        <span><?php echo get_phrase('backup');?></span>

                        </a>

                    </div>

                </div>

            </div>

        </div>



    </div>

    <hr />

    <div class="row-fluid">

    



        <div class="span6">

            <div class="box">

                <div class="box-header">

                    <div class="title">

                        <i class="icon-calendar"></i> <?php echo get_phrase('Kalendarz');?>

                    </div>

                </div>

                <div class="box-content">

                    <div id="schedule_calendar">

                    </div>

                </div>

            </div>

        </div>



        <div class="span6">

            <div class="box">

                <div class="box-header">

                    <span class="title">

                        <i class="icon-reorder"></i> <?php echo get_phrase('Terminarz');?>

                    </span>

                </div>

                <div class="box-content scrollable" style="max-height: 500px; overflow-y: auto">

                

                    <?php 

					$this->db->order_by('create_timestamp' , 'desc');

                    $notices	=	$this->db->get('noticeboard')->result_array();

                    foreach($notices as $row):

                    ?>

                    <div class="box-section news with-icons">

                        <div class="avatar blue">

                            <i class="icon-tag icon-2x"></i>

                        </div>

                        <div class="news-time">

                            <span><?php echo date('d',$row['create_timestamp']);?></span> <?php echo date('M',$row['create_timestamp']);?>

                        </div>

                        <div class="news-content">

                            <div class="news-title">

                                <?php echo $row['notice_title'];?>

                            </div>

                            <div class="news-text">

                                 <?php echo $row['notice'];?>

                            </div>

                        </div>

                    </div>

                    <?php endforeach;?>

                </div>

            </div>

        </div>



    </div>

</div>



  

  

  <script>

  $(document).ready(function() {



    // page is now ready, initialize the calendar...



    $("#schedule_calendar").fullCalendar({

            header: {

                left: "prev,next",

                center: "title",

                right: "month,agendaWeek,agendaDay"

            },

            editable: 0,

            droppable: 0,

            events: [

					<?php 

					

                    $notices	=	$this->db->get('noticeboard')->result_array();

                    foreach($notices as $row):

                    ?>

					{

						title: "<?php echo $row['notice_title'];?>",

						start: new Date(<?php echo date('Y',$row['create_timestamp']);?>, <?php echo date('m',$row['create_timestamp'])-1;?>, <?php echo date('d',$row['create_timestamp']);?>),

						end:	new Date(<?php echo date('Y',$row['create_timestamp']);?>, <?php echo date('m',$row['create_timestamp'])-1;?>, <?php echo date('d',$row['create_timestamp']);?>)  

            		},

					<?php

					endforeach;

					?>

					]

        })



});

  </script>