<div class="inner-wrapper">
  <div class="hotline-menu-mb">
    <img src="/wp-content/uploads/2021/01/top_icon_mobile.png" /> Hotline: <span class="hotline-mb">028 XXX XXXX</span> Miễn phí tư vấn và gọi cước
  </div>
  <div class="loiich-menu-mb">
    <img src="/wp-content/uploads/2021/01/8_loi_ich.png" />
  </div>
  <div class="close-menu" onclick="closeMenu()">
    <img src="/wp-content/uploads/2021/01/top_menu_close.png" />
  </div>
  <div class="tab">
    <button class="tablinks" onclick="openCity(event, 'gioithieu')" id="defaultOpen" class="menuGioithieu">
      <img src="/wp-content/uploads/2021/01/gioithieu.png" class="imageMenu" /><br />
      Giới thiệu
    </button>
    <button class="tablinks" onclick="openCity(event, 'namkhoa')" class="menuNamkhoa">
      <img src="/wp-content/uploads/2021/01/namkhoa.png" class="imageMenu" /><br />
      Nam Khoa
    </button>
    <button class="tablinks" onclick="openCity(event, 'phukhoa')" class="menuPhukhoa">
      <img src="/wp-content/uploads/2021/01/phukhoa.png" class="imageMenu" /><br />
      Phụ Khoa
    </button>
    <button class="tablinks" onclick="openCity(event, 'benhxahoi')" class="menuBenhxahoi">
      <img src="/wp-content/uploads/2021/01/benhxahoi.png" class="imageMenu" /><br />
      Bệnh xã hội
    </button>
    <button class="tablinks" onclick="openCity(event, 'dinhchithai')" class="menuDinhchithai">
      <img src="/wp-content/uploads/2021/01/dinhchithai.png" class="imageMenu" /><br />
      Đình chỉ thai
    </button>
  </div>

  <div id="gioithieu" class="tabcontent">
    <div class='content-menu'>
      <?php 
        $array = [
          'menu' => 'gioithieu_menu',
          'menu_class' => 'menu_wrapper',
          'container' => 'ul_wrapper_menu'
        ];
        wp_nav_menu($array)
      ?>
    </div>
  </div>

  <div id="namkhoa" class="tabcontent">
    <div class='content-menu'>
      <?php 
        $array = [
          'menu' => 'namkhoa_menu',
          'menu_class' => 'menu_wrapper',
          'container' => 'ul_wrapper_menu'
        ];
        wp_nav_menu($array)
      ?>
    </div>
  </div>

  <div id="phukhoa" class="tabcontent">
    <div class='content-menu'>
      <?php 
        $array = [
          'menu' => 'phukhoa_menu',
          'menu_class' => 'menu_wrapper',
          'container' => 'ul_wrapper_menu'
        ];
        wp_nav_menu($array)
      ?>
    </div>
  </div>

  <div id="benhxahoi" class="tabcontent">
    <div class='content-menu'>
      <?php 
        $array = [
          'menu' => 'benhxahoi_menu',
          'menu_class' => 'menu_wrapper',
          'container' => 'ul_wrapper_menu'
        ];
        wp_nav_menu($array)
      ?>
    </div>
  </div>

  <div id="dinhchithai" class="tabcontent">
    <div class='content-menu'>
      <?php 
        $array = [
          'menu' => 'dinhchithai_menu',
          'menu_class' => 'menu_wrapper',
          'container' => 'ul_wrapper_menu'
        ];
        wp_nav_menu($array)
      ?>
    </div>
  </div>
</div>