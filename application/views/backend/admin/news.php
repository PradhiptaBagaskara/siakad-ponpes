<div class="content-w">
      <div class="os-tabs-w menu-shad">
        <div class="os-tabs-controls">
          <ul class="nav nav-tabs upper">
            <li class="nav-item">
              <a class="nav-link active" href="<?php echo base_url();?>admin/news/"><i class="os-icon picons-thin-icon-thin-0010_newspaper_reading_news"></i><span><?php echo get_phrase('noticeboard');?></span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url();?>admin/send_news/"><i class="os-icon picons-thin-icon-thin-0068_text_image_article_view"></i><span><?php echo get_phrase('add_news');?></span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url();?>admin/calendar/"><i class="os-icon picons-thin-icon-thin-0021_calendar_month_day_planner"></i><span><?php echo get_phrase('events');?></span></a>
            </li>
          </ul>
        </div>
      </div>

    <div class="content-i">
      <div class="content-box">
  		  <div class="pipelines-w">
          <div class="row">
            <?php 
            $this->db->order_by('news_id', 'desc');
            $news = $this->db->get('news')->result_array();
            foreach($news as $new):?>
            <div class="col-xl-4">
              <div class="pipeline white lined-<?php if($new['type'] == 'event') echo 'primary'; else echo 'success';?>">
                <div class="pipeline-header">
                  <a href="<?php echo base_url();?>admin/read/<?php echo $new['news_code'];?>"><h5 class="pipeline-name"><?php echo $new['title'];?></h5></a>
                    <div class="pipeline-header-numbers">
                      <div class="pipeline-count"><?php echo $new['date'];?></div>
						            <div class="col-3 text-right">
                            <?php if($new['type'] == "news"):?>
                              <a class="btn nc btn-round btn-sm btn-success text-left" style="text-transform:uppercase;color:white;"><?php echo get_phrase('news');?></a>
                          <?php endif;?>
                          <?php if($new['type'] == "event"):?>
                            <a class="btn nc btn-round btn-sm btn-primary text-left" style="text-transform:uppercase;color:white;"><?php echo get_phrase('events');?></a>
                          <?php endif;?>
                        </div>
                    </div>
                    <div class="pipeline-settings os-dropdown-trigger">
                      <i class="os-icon os-icon-hamburger-menu-1"></i>
                        <div class="os-dropdown">
                          <div class="icon-w"><i class="os-icon os-icon-ui-46"></i></div>
                            <ul>
                              <li>
                              <?php if($new['type'] == 'news'):?>
                                <a href="<?php echo base_url();?>admin/update_news/<?php echo $new['news_code'];?>"><i class="os-icon os-icon-ui-44"></i><span><?php echo get_phrase('edit');?></span></a>
                              <?php endif;?>
                              <?php if($new['type'] == 'event'):?>
                                <a href="<?php echo base_url();?>admin/update_events/<?php echo $new['news_code'];?>"><i class="os-icon os-icon-ui-44"></i><span><?php echo get_phrase('edit');?></span></a>
                              <?php endif;?>
                              </li>
                              <li><a onClick="return confirm('<?php echo get_phrase('confirm_delete');?>')"  href="<?php echo base_url();?>admin/news/delete/<?php echo $new['news_code'];?>/<?php echo $new['type'];?>"><i class="os-icon os-icon-ui-15"></i><span><?php echo get_phrase('delete');?></span></a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <a href="<?php echo base_url();?>admin/read/<?php echo $new['news_code'];?>"><div class="element-box"  style="padding:0px">
                      <?php $file = base_url('uploads/news_images/'.$new['news_code'].'.jpg');?>
                      <?php if (@getimagesize($file)):?>
                        <div><img alt="" src="<?php echo base_url();?>uploads/news_images/<?php echo $new['news_code'];?>.jpg" width="100%"></div>
                      <?php endif;?>
						            <div style="padding:20px;">
                          <p><?php echo substr($new['description'], 0, 170) . '...';?></p>
						            </div>
                        </div></a>
						        </div>
						    </div>
              <?php endforeach;?>
        </div>
      </div>
    </div>
  </div>
</div>