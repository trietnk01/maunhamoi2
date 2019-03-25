<?php
/*
Template name: Template điểm kinh doanh chi tiết
Template Post Type: post, page
*/
get_header();
?>
<div class="box_diem_kinh_doanh_chi_tiet">
	<div class="container">		
		<div class="row">
			<div class="col-lg-9">
				<h1 class="diem_kd_h">Resort Sa Huỳnh</h1>
				<div>
					<p>
						There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from 
					</p>		
					<p style="font-weight: bold;">The standard Lorem Ipsum passage, used since the 1500s</p>			
					<p>
						- Curabitur non urna vel urna eleifend eleifend quis id risus.
- Nullam eget lorem tincidunt, malesuada lectus et.
- Curabitur non urna vel urna eleifend eleifend quis id risus. Curabitur non urna vel
- Eleifend eleifend. Curabitur non urna vel urna eleifend eleifend quis id risus.
- Nullam eget lorem tincidunt, malesuada lectus et. Curabitur non urna vel urna eleifend eleifend quis id risus.
- Curabitur non urna vel urna eleifend eleifend.Curabitur non urna vel urna eleifend.
					</p>
					<p style="text-align: center;">
						<img src="<?php echo P_IMG.'/diemkinhdoanh1.png'; ?>" alt="hinhanh">
					</p>
					<p><strong>Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC</strong></p>
					<p>
						At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.
					</p>
					<p style="font-weight: bold;">
						1914 translation by H. Rackham
					</p>
					<p>
						On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.
					</p>
				</div>
				<div class="binhluan">Bình luận</div>
				<div>
					<div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="5"></div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="business_position_other">
					<div class="business_position_other_left"><img src="<?php echo P_IMG.'/icon-home.png'; ?>"></div>
					<h2 class="business_position_other_right">						
						Điểm kinh doanh khác
					</h2>
					<div class="clr"></div>
				</div>
				<div class="line_circle"><img src="<?php echo P_IMG.'/line-circle.png'; ?>"></div>
				<?php echo "<pre>".print_r("OK",true)."</pre>"; ?>
				<div class="business_position_other_box">
					<?php 
					for ($i=1; $i <= 4; $i++) { 
						?>
						<div class="diemkinhdoanhv2">
							<a href="<?php echo $permalink; ?>">
								<div class="dkdimg"><img src="<?php echo P_IMG.'/diemkinhdoanh'.$i.'.png'; ?>" alt="hinhanh"></div>
								<div class="business_item_title">
									<h3>Trạm Kim Phượng</h3>
								</div>
							</a>
						</div>
						<?php
					}
					?>					
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include get_template_directory() . "/block/block-partner.php";
get_footer(); 
?>