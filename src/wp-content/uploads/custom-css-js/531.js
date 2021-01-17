<!-- start Simple Custom CSS and JS -->
<script type="text/javascript">
$(function () {
			$(".shock").each(function () {
				$(this).wrap("<span class='shock_wrap'></span>");
			});
			$(".shock_wrap").append(
				'<span class="shock_block"><span>Hình ảnh có nội dung gây shock !! Cân nhắc trước khi xem <div style="clear:both;height:7%"></div><div style="text-align:center;display:block"><a class="shock_click" href="#">Click vào xem</a></div></span></span>'
			);
			$(".shock_click").click(function () {
				$(this).parent().parent().parent().animate({ opacity: 0 }, 500);
				return false;
			});
		});</script>
<!-- end Simple Custom CSS and JS -->
