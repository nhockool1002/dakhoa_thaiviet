<?php get_header('home-mb'); ?>
	<main id="content" class="content">
    <div class="container-page-363">
      <!-- direction -->
      <?php require_once('part/direction.php'); ?>
      <!-- slider -->
      <?php require_once('part/slider-home-mb.php'); ?>
      <!-- Các chuyên khoa -->
      <?php require_once('part/cacchuyenkhoa.php'); ?>
      <!-- Đội ngũ bác sĩ -->
      <?php require_once('part/doingubacsi.php'); ?>
      <!-- Ưu điểm --> 
      <?php require_once('part/uudiemphongkham.php'); ?>
      <!-- Các dịch vụ -->
      <?php require_once('part/cacdichvu.php'); ?>
      <!-- Tin tức nổi bật-->
      <?php require_once('part/tintucnoibat.php'); ?>
      <!-- Phương pháp DHA-->
      <?php require_once('part/phuongphapdha.php'); ?>
      <!-- Feedback-->
      <?php require_once('part/feedback.php'); ?>
      <!-- Môi trường phòng khám -->
      <?php require_once('part/moitruongphongkham.php'); ?>
    </div>
	</main> <!-- #content -->
	<?php //get_sidebar(); ?>
<?php get_footer(); ?>