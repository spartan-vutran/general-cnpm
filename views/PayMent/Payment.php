
<style>
        .enMoney:after {
            content: ' ₫';
        }
		.swal-wide{
			width:500px !important;
			height:350px !important;
			font-size: 1.7rem !important;
		}
</style>
<form action="/Payment/Payment" method="post" id="payment" onsubmit="return kiemtra()"></form>
<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-5">
					<!-- Billing Details -->
					<div class="billing-details">
						<div class="section-title">
							<h3 class="title">Thông tin giao hàng</h3>
						</div>
						<?php 
						$item = json_decode($data['bill'], true); 
						// var_dump($item);
						// die();
						if($item!=NULL){
							$output = '';
							$output.='
							<div class="form-group">
							<label>Họ và tên</label>
							<input class="input" id="input11" type="text" name="Name" value="'.$item['UserName'].'" onchange="setValue1()" form="payment"/>
							</div>
							<div class="form-group">
								<label>Số nhà/Tên đường - Thôn</label>
								<input class="input" id="input22" type="text" name="Hamlet" value="'.$item['Thon'].'" onchange="setValue2()" form="payment"/>
							</div>
							<div class="form-group">
								<label>Xã - Phường - Thị trấn</label>
								<input class="input" id="input33" type="text" name="Village" value="'.$item['Xa'].'" onchange="setValue3()" form="payment"/>
							</div>
							<div class="form-group">
								<label>Quận - Huyện - Thành phố</label>
								<input class="input" id="input44" type="text" name="District" value="'.$item['Huyen'].'" onchange="setValue4()" form="payment"/>
							</div>
							<div class="form-group">
								<label>Tỉnh - Thành phố</label>
								<input class="input" id="input55" type="text" name="Province" value="'.$item['Tinh'].'" onchange="setValue5()" form="payment"/>
							</div>
							<div class="form-group">
								<label>Số điện thoại</label>
								<input class="input" id="input66" type="tel" name="Telephone" value="'.$item['PhoneNumber'].'" onchange="setValue6()" form="payment"/>
							</div>';
							echo $output;
						}
						else{
							echo '
								<div class="form-group">
									<label>Họ và tên</label>
									<input class="input" id="input11" type="text" name="Name" value="" onchange="setValue1()" form="payment"/>
								</div>
								<div class="form-group">
									<label>Số nhà/Tên đường - Thôn</label>
									<input class="input" id="input22" type="text" name="Hamlet" value="" onchange="setValue2()" form="payment"/>
								</div>
								<div class="form-group">
									<label>Xã - Phường - Thị trấn</label>
									<input class="input" id="input33" type="text" name="Village" value="" onchange="setValue3()" form="payment"/>
								</div>
								<div class="form-group">
									<label>Quận - Huyện - Thành phố</label>
									<input class="input" id="input44" type="text" name="District" value="" onchange="setValue4()" form="payment"/>
								</div>
								<div class="form-group">
									<label>Tỉnh - Thành phố</label>
									<input class="input" id="input55" type="text" name="Province" value="" onchange="setValue5()" form="payment"/>
								</div>
								<div class="form-group">
									<label>Số điện thoại</label>
									<input class="input" id="input66" type="tel" name="Telephone" value="" onchange="setValue6()" form="payment"/>
								</div>';
						}
						?>
					</div>
					</div>
				<!-- /Billing Details -->
				<!-- Order Details -->
				<div class="col-md-7 order-details">
					<div class="section-title text-center">
						<h3 class="title">Giỏ hàng của bạn</h3>
					</div>
					<div class="order-summary">
						<table class="table">
						<thead>
							<tr>
								<th></th>
								<th>Sản phẩm</th>
								<th class="text-right">Giá tiền</th>
								<th class="text-center">Số lượng</th>
								<th class="text-right">Tổng Giá tiền</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php
								$cart = json_decode($data['cart'], true);
								// var_dump($cart);
								// die();
								$output='';
								if ($cart == NULL)
								{echo '
									<tr>
										<td colspan="6" class="text-center">Không có sản phẩm nào để thanh toán</td>
									</tr>';
								}
								else
								{
									foreach ($cart as $item)
									{
										$productId = $item['ProductId'];
										$output.='
										<tr>
											<td>
											<a href="/Product/Product/'.$productId.'"">
													<img src="'.$item['ImgUrl'].'" title="" width="60" height="60">
											</a>
											</td>
											<td>
											<a href="@Url.Action("Product","Product",new { id=Data.ProductId })">
											'.$item['ProductName'];
											if($item['SellOff']!="0")
											{
												$output.='
												<br>
												<i style="color:red">-'.$item['SellOff'].'%</i>';
											}
											$output.='
											</a>
											</td>
											<td class="price1 text-right"style="width: 110px">'.$item['ProductPrice'].'</td>
											<form action="/Payment/Payment" method="post">
												<td class="text-center"style="width: 130px">
													<input class="input1" type="hidden" name="Name" value=""/>
													<input class="input2" type="hidden" name="Hamlet"  value="" />
													<input class="input3" type="hidden" name="Village"  value="" />
													<input class="input4" type="hidden" name="District"  value="" />
													<input class="input5" type="hidden" name="Province"  value="" />
													<input class="input6" type="hidden" name="Telephone"  value="" />
													<input type="hidden" value="'.$item['BillId'].'" name="BillId"/>
													<input type="hidden" value="'.$item['ProductId'].'" name="ProductId"/>
													<input type="hidden" value="'.$item['TotalProductPrice'].'" name="TotalProductPrice"/>
													<span><input style="width:25px;height:35px"  type="submit" value="-" name="Type" /></span>
													<span><input class="text-center" style="height:35px;text-align:center;width:50px" type="number" min="0" value="'.$item['Quantity'].'" name="Quantity" required /></span>
													<span><input style="width:25px;height:35px" type="submit" value="+" name="Type" /></span>
													<button value="q" name="Type" style="width:110px;margin-top:3px">
													<i class="fas fa-edit" style="font-szie:30px"></i> Cập nhật
													</button>
												</td>
												<td class="price1 text-right"style="width: 120px">'.$item['TotalProductPrice'].'</td>
												<td class="text-center">
													<button class="remove_cart" rel="1" value="d" name="Type" onclick="notify()">
														<i class="fa fa-trash" onclick="notify()" ></i>
													</button>
												</td>
											</form>
										</tr>';
									}
								}
								echo $output;
							?>
						</tbody>
					    </table>
						<div class="order-col">
							<div style="font-size:20px"><strong>Tổng giá tiền</strong></div>
									<div><strong class="order-total price">
										<?php $bill = json_decode($data['bill'], true); 
										echo $bill == null?  '0': $bill['TotalPrice'];
										?>
									</strong></div>
						</div>
					</div>
					<?php
						$cart = json_decode($data['cart'], true);
						$bill = json_decode($data['bill'], true); 
						$output='';
						if($cart != NULL and $bill != NULL)
						{
							echo '
							<div class="input-checkbox">
								<input type="checkbox" id="terms" form="payment" checked>
								<label for="terms">
									<span></span>
									Tôi đồng ý với các <a href="#" style="color: blue;">Điều khoản & và điều kiện</a>
								</label>
							</div>
							<div  class="text-right">
							<a class="btn btn-info my-1"href="/Home/index" >Tiếp tục mua hàng</a>
							<button class="btn btn-success my-1" value="p" name="Type" style="margin-left:15px" form="payment">Đặt hàng</button>
							
							</div>';
						}
						else
						{echo '
							<div class="col-md-50 text-center">
							<a class="btn btn-success my-1"href="/Home/index" style="font-size: 25px;"><strong>Tiếp tục mua hàng</strong></a>
							</div>';
						}
					?>
				</div>
				<!-- /Order Details -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
<script type="text/javascript">
	$('.price1').each(function () {
    var item = $(this).text();
    var num = Number(item).toLocaleString('en');    

    $(this).addClass('enMoney');
    
    $(this).text(num);
	});
			var list = document.querySelectorAll('.input1');
			var n;
			for (n = 0; n < list.length; ++n) {
				list[n].value=document.getElementById("input11").value;
			}
			list = document.querySelectorAll('.input2');
			for (n = 0; n < list.length; ++n) {
				list[n].value=document.getElementById("input22").value;
			}
			list = document.querySelectorAll('.input3');
			for (n = 0; n < list.length; ++n) {
				list[n].value=document.getElementById("input33").value;
			}
			list = document.querySelectorAll('.input4');
			for (n = 0; n < list.length; ++n) {
				list[n].value=document.getElementById("input44").value;
			}
			list = document.querySelectorAll('.input5');
			for (n = 0; n < list.length; ++n) {
				list[n].value=document.getElementById("input55").value;
			}
			list = document.querySelectorAll('.input6');
			for (n = 0; n < list.length; ++n) {
				list[n].value=document.getElementById("input66").value;
			}
		  function setValue1()
		  {
			var list = document.querySelectorAll('.input1');
			var n;
			for (n = 0; n < list.length; ++n) {
				list[n].value=document.getElementById("input11").value;
			}
		  }
		  function setValue2()
		  {
			var list = document.querySelectorAll('.input2');
			var n;
			for (n = 0; n < list.length; ++n) {
				list[n].value=document.getElementById("input22").value;
			}
		  }
		  function setValue3()
		  {
			var list = document.querySelectorAll('.input3');
			var n;
			for (n = 0; n < list.length; ++n) {
				list[n].value=document.getElementById("input33").value;
			}
		  }
		  function setValue4()
		  {
			var list = document.querySelectorAll('.input4');
			var n;
			for (n = 0; n < list.length; ++n) {
				list[n].value=document.getElementById("input44").value;
			}
		  }
		  function setValue5()
		  {
			var list = document.querySelectorAll('.input5');
			var n;
			for (n = 0; n < list.length; ++n) {
				list[n].value=document.getElementById("input55").value;
			}
		  }
		  function setValue6()
		  {
			var list = document.querySelectorAll('.input6');
			var n;
			for (n = 0; n < list.length; ++n) {
				list[n].value=document.getElementById("input66").value;
			}
		  }
function kiemtra(){
    var d1 = document.getElementById("input11").value;
    var d2= document.getElementById("input22").value;
	var d3 = document.getElementById("input33").value;
	var d4 = document.getElementById("input44").value;
	var d5 = document.getElementById("input55").value;
	var d6 = document.getElementById("input66").value;
	if(document.getElementById("terms").checked == false)
	{
		 Swal.fire({
		  icon: 'error',
	      title: 'Oops...',
		  text: 'Vui lòng chọn Tôi đồng ý với các điều khoản & và điều kiện!',
		  customClass: 'swal-wide',
		  timer: 2000
		})
        return false;
	}
    if (d1=="") {
		  Swal.fire({
		  icon: 'error',
	      title: 'Oops...',
		  text: 'Vui lòng nhập Họ và Tên!',
		  customClass: 'swal-wide',
		  timer: 2000
		})
        return false;
    }
    if (d2=="") {
        Swal.fire({
		  icon: 'error',
	      title: 'Oops...',
		  text: 'Vui lòng nhập Số nhà/Tên đường - Thôn!',
		  customClass: 'swal-wide',
		  timer: 2000
		})
        return false;
    } 
	if (d3=="") {
		Swal.fire({
		  icon: 'error',
	      title: 'Oops...',
		  text: 'Vui lòng nhập Xã - Phường - Thị trấn!',
		  customClass: 'swal-wide',
		  timer: 2000
		})
        return false;
    }
	if (d4=="") {
		Swal.fire({
		  icon: 'error',
	      title: 'Oops...',
		  text: 'Vui lòng nhập Quận - Huyện - Thành phố!',
		  customClass: 'swal-wide',
		  timer: 2000
		})
        return false;
    }
	if (d5=="") {
		Swal.fire({
		  icon: 'error',
	      title: 'Oops...',
		  text: 'Vui lòng nhập Tỉnh - Thành phố!',
		  customClass: 'swal-wide',
		  timer: 2000
		})
        return false;
    }
	if (d6=="") {
		Swal.fire({
		  icon: 'error',
	      title: 'Oops...',
		  text: 'Vui lòng nhập Số điện thoại!',
		  customClass: 'swal-wide',
		  timer: 2000
		})
        return false;
    }
    return true;
}
function notify(){
	return confirm("Bạn chắc chắn muốn xoá khỏi giỏ hàng?");
}
</script>

