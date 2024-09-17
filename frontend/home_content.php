<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./css/style.css">
	<title>Trang Chủ</title>
</head>
<body>
<div class="custom-wrapper">
	<div class="row row2">
		<div class="col-md-8 col-xs-6 column-spacing">
			<div class="slideshow-container">
				<div class="mySlides1">
					<img src="./img/banner/banner1.png" class="img-fluid">
				</div>

				<div class="mySlides1">
					<img src="./img/banner/banner2.png" class="img-fluid">
				</div>

				<div class="mySlides1">
					<a href="./index.php?act=category&id=3"><img src="./img/banner/banner3.png" class="img-fluid"></a>
				</div>

				<div class="mySlides1">
					<a href="./index.php?act=category&id=3"><img src="./img/banner/banner4.png" class="img-fluid"></a>
				</div>

				<a class="prev" onclick="plusSlides(-1)">❮</a>
				<a class="next" onclick="plusSlides(1)">❯</a>

				<div class="dot-title">
					<span class="dot1"></span>
					<span class="dot1"></span>
					<span class="dot1"></span>
					<span class="dot1"></span>
				</div>
			</div>
		</div>

		<div class="col-md-4 col-xs-6 column-spacing-right">
				<img src="./img/banner/bannerX.png" class="img-fluid" style="width:100%;">
		</div>
	</div>
	<script src="./js/amination.js"></script>
</div>
<!-- SECTION -->
<!-- <div class="section"> -->
			<!-- container -->
			<div class="container" style="width: 85%">
				<!-- row -->
				<div class="row">
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/banner/banner-right.png" alt="">
							</div>
							<div class="shop-body">
								<a href="news.php"> <h3>Tin tức<br>Thực phẩm</h3> </a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/banner/banner-between.png" alt="">
							</div>
						<div class="shop-body">
							<a href="thuonghieu.php"> <h3>Trái cây<br>dinh dưỡng</h3> </a>
						</div>
					</div>
				</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/banner/banner-left.png" alt="">
							</div>
							<div class="shop-body">
								<a href="Lienhe.php"><h3>Mỗi ngày<br>một món ăn</h3></a>
							</div>
						</div>
					</div>
					<!-- /shop -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->

			 <!-- Banner -->
    <!-- /Banner -->
		</div>
		<!-- /SECTION -->
        <!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title text-md-left text-center">
							<h3 class="title">Sản Phẩm</h3>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
                                        <!-- product -->
                                        <?php
                                        $sql='select * from sanpham where 1 limit 4, 5';
                                        $list=executeResult($sql);
                                        foreach($list as $item){	
											$gia_goc = $item['gia_goc'];
											$don_gia = $item['don_gia'];								
											
										// Calculate the discount percentage
											if($gia_goc > $don_gia) {
												$phan_tram_giam = round((($gia_goc - $don_gia) / $gia_goc) * 100);
											} else { 
												$phan_tram_giam = 0;
											}										
											if($item['so_luong']==0 && $item['trangthai']==0){ // Hết hàng 
												echo '
												<div class="product">
												<div class="product-img" style="height:250px">
													<img src="./img/'.$item['hinh_anh'].'" alt="" style="height:100%">
													<div class="product-label">
														<span class="new">HẾT HÀNG</span>
													</div>
												</div>
												<div class="product-body">
													<p class="product-category">SẢN PHẨM</p>
													<h3 class="product-name"><a href="?act=product&id='.$item['id'].'">'.$item['ten_sp'].'</a></h3>
													<h4 class="product-price" id="price-sold">'.currency_format($item['don_gia']).' </h4>
													
													<div class="product-rating">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
													</div>
													
												</div>
												<div class="add-to-cart">
													<button class="add-to-cart-btn" >SẢN PHẨM ĐÃ HẾT</button>
												</div>
											</div>';
											}else if($item['trangthai']==0)// Còn hàng
                                            echo '<div class="product" >
											<div class="product-img" style="height:250px" onclick="location=\'index.php?act=product&id='.$item['id'].'\'">
												<img src="./img/'.$item['hinh_anh'].'" alt="" style="height:100%">

											<div class="product-label">
												'.($phan_tram_giam > 0 ? '<span class="new">-'.$phan_tram_giam.'%</span>' : '').'
											</div>

											</div>
											<div class="product-body">
												<p class="product-category"><small>'.$item['sl_da_ban'].' đã bán</small></p>
												<h3 class="product-name"><a href="?act=product&id='.$item['id'].'">'.$item['ten_sp'].'</a></h3>
												<div class="price-two">
													<h4 class="product-price">'.currency_format($item['don_gia']).'</h4>
													<h4 class="product-pricece" id="price-sold">'.currency_format($item['gia_goc']).' </h4>
												</div>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn" onclick="addCart('.$item['id'].',1);themThanhCong('.$item['id'].');"><i class="fa fa-shopping-cart"></i> <span id="messAddCart'.$item['id'].'">thêm vào giỏ</span></button>
											</div>
										</div>';
                                        }
                                        ?>
										<!-- /product -->
										
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div><br><br>
				<!-- /row -->

				<div class="row">

				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title text-md-left text-center">
						<h3 class="title">Gợi ý hôm nay</h3>
					</div>
				</div>
				<!-- /section title -->

				<!-- Products tab & slick -->
				<div class="col-md-12">
				</div>
				<!-- Products tab & slick -->
				</div>
			</div>
			<!-- /container -->
		</div><br><br>
		<!-- /SECTION -->
</body>
</html>


