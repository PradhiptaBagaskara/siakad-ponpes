<?php $news = $this->db->get_where('news', array('news_code' => $code))->result_array();
  foreach($news as $row):
?>
<div class="content-w">
  <div class="os-tabs-w menu-shad">        <div class="os-tabs-controls">          <ul class="nav nav-tabs upper">            <li class="nav-item">              <a class="nav-link " href="<?php echo base_url();?>admin/news/"><i class="os-icon picons-thin-icon-thin-0010_newspaper_reading_news"></i><span><?php echo get_phrase('noticeboard');?></span></a>            </li>            <li class="nav-item">              <a class="nav-link active"><i class="os-icon picons-thin-icon-thin-0068_text_image_article_view"></i><span><?php echo get_phrase('update_news');?></span></a>            </li>           </ul>        </div>      </div>
  <div class="content-i">
    <div class="content-box">
      <div class="element-box lined-primary shadow">
        <?php echo form_open(base_url() . 'admin/update/news/'.$row['news_code'], array('enctype' => 'multipart/form-data')); ?>
          <h5 class="form-header"><?php echo get_phrase('update_news');?></h5>
          <div class="form-group">
            <label for=""> <?php echo get_phrase('title');?></label><input class="form-control" value="<?php echo $row['title'];?>" type="text" name="title" required="">
          </div>
		      <div class="form-group">
              <label> <?php echo get_phrase('news');?></label><textarea class="form-control" rows="10" name="description" required=""><?php echo $row['description'];?></textarea>
          </div>		   
		  <div class="form-group">			<label for=""> <?php echo get_phrase('featured_image');?></label>			  <div class="newsfe" style="max-width:500px;">				<button type="button" class="change-cover">					<i class="font-icon picons-thin-icon-thin-0617_picture_image_photo"></i>					<?php echo get_phrase('upload');?>					<input accept="image/x-png,image/gif,image/jpeg" id="imgpre" type="file"/ name="userfile">				</button>				<img width="100%" id="ava" src="<?php echo base_url();?>uploads/img_pre.jpg">			</div>			 </div>
          <div class="form-buttons-w">
            <button class="btn btn-success btn-rounded" type="submit"> <?php echo get_phrase('update');?></button>
          </div>
        <?php echo form_close();?>
    </div>
	</div></div>
</div>
<?php endforeach;?>