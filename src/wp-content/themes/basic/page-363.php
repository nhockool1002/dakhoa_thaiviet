<?php 
  if (wp_is_mobile() == 0) {
    wp_redirect('/');
  }
?>
<?php get_header('home-mb'); ?>
	<main id="content" class="content home-mb-container">
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
      <div class="attention-note <?php if (is_single()) echo 'single-page'; ?> <?php if(is_page('363')) echo 'notShow'; ?>">
        (*) Lưu ý : Hiệu quả hổ trợ điều trị phụ thuộc vào cơ địa của mỗi người
      </div>
      <!-- Footer Direction -->
      <?php require_once('part/footer-direction.php'); ?>
    </div>
	</main> <!-- #content -->
	<?php //get_sidebar(); ?>
<?php get_footer('home-mb'); ?>