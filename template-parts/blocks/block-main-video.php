<?php
/**
 * Block Name: Main Video
 *
 * This is the template that displays the Main Video block.
 */

$video_file = get_field('video_file');
$video_poster = get_field('video_poster') ?: get_template_directory_uri() . '/assets/img/video_bg.jpg';

if (!empty($video_file)) { ?>

   <?php
   $video_url = is_array($video_file) ? $video_file['url'] : $video_file;
   $poster_url = is_array($video_poster) ? $video_poster['url'] : $video_poster;

   ?>
   <div class="video_sec_tb">
      <video poster="<?php echo $poster_url; ?>" class="video_main_1" controls>
         <source src="<?= $video_url; ?>" type="video/mp4">
      </video>
      <div class="clear"></div>
   </div>

   <?php
}
?>