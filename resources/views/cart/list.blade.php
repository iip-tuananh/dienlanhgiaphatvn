@extends('layouts.main.master')
@section('title')
Giỏ hàng của bạn
@endsection
@section('description')
@endsection
@section('image')
{{url(''.$banners[0]->image)}}
@endsection
@section('css')
<style>
   .cart-product-name img {
      width: 100px;
   }

   @media only screen and (min-width: 768px) {
      .cart-product-quantity .qty{
         width: 30%;
         margin: 0 10px;
      }
   }  
   @media only screen and (max-width: 768px) {
      .cart-product-quantity .qty{
         width: 100%;
         margin: 0 10px;
      }
   }  
   .cart-product-quantity .minus, .cart-product-quantity .plus{
      margin: 0 !important;
   }
   .remove, .btn-cart-check{
      font-size: 12px;
      padding: 5px 10px;
      border: 1px solid black;
   }
   .btn-cart-check:hover, .remove:hover{
      background-color: #2e2e2e;
      border: 1px solid #2e2e2e;
      color: #fff;
      cursor: pointer;
   }
</style>
@endsection
@section('js')
<script>
function formatNumber(num) {
   return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
}
$('.cart-product-quantity .qty').on('click',function() {
   var quantity = $(this).val();
   var id = $(this).data('id');
   var url = $('.list-cart').data('url-update');
   $.ajax({
      type: 'GET',
      url: url,
      data: {id: id, quantity:quantity},
      success: function(data) {
         let cart = data;
			let totalPrice = 0;
			$.each(cart , function (index, value){
				totalPrice += (value.price - value.price * (value.discount / 100)) * value.quantity;
			})
         var total = formatNumber(totalPrice);
         $('.table-cart .total-price').html(total+'₫');
      },
      error: function(data) {
         console.log('lỗi');
      }
   })
})
function removeItem(e) {
   var id= e;
   var url = $('.list-cart').data('url-remove');
   $.ajax({
      type: 'GET',
      url: url,
      data: {id:id},
      success: function(data) {
         $.notify("Xóa thành công!", "success");
         let cart = data;
         let countCart = Object.keys(data).length;
         let totalPrice = 0;
         let html = '';
         $.each(cart , function (index, value){
            html += '<tr>';
            html += '<td class="cart-product-name">';
            html += '<img src="'+value.image+'" alt="" loading="lazy">';  
            html += '<h5>'+JSON.parse(value.name)[0].content+'</h5>';
            html += '</td>' ;
            html += '<td>'+value.color+'</td>';
            html += '<td>'+value.size+'</td>';
            html += '<td class="cart-product-quantity">';
            html += '<input type="number" class="input-text qty text" step="1" min="0" max="" value="'+value.quantity+'" title="Qty" size="4" placeholder="" inputmode="numeric" data-id="'+value.id+'"/>';
            html += '</td>';
            html += '<td>'+value.price - value.price * (value.discount / 100)+'₫</td>';
            html += '<td><a href="javascript:void(0);" class="remove" aria-label="Remove this item" onclick="removeItem('+value.id+')">Xóa</a></td>';
            html += '</tr>'; 
            totalPrice += (value.price - value.price * (value.discount / 100)) * value.quantity;
         })
         let total = formatNumber(totalPrice);
         $('.table-cart .list-cart').html(html);
         $('.table-cart .total-price').html(total+'₫');
         $('.count-cart').html(countCart);
      },
      error: function(data) {
         console.log('lỗi');
      }
   })
}
</script>
@endsection
@section('content')
<section class="bread-crumb">
   <div class="container row">
      <ul class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
         <li class="home" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a itemprop="item" href="{{route('home')}}" title="Trang chủ" style="margin-right: 6px;">
               <span itemprop="name">Trang chủ</span>
               <meta itemprop="position" content="1" />
            </a>
            <i class="fa-solid fa-caret-right"></i>
         </li>
         <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" style="margin-left: 6px;">
            <strong>
               <span itemprop="name">Giỏ hàng của bạn</span>
               <meta itemprop="position" content="2" />
            </strong>
         </li>
      </ul>
   </div>
</section>
@if (count($cartcontent) > 0)
<div class="container cart-content mb-3">
   <div class="row">
      <table class="table-cart" data-url="{{route('removeCart')}}">
         <thead>
            <tr>
               <th>Tên sản phẩm</th>
               <th>Màu sắc</th>
               <th>Size</th>
               <th>Số lượng</th>
               <th>Giá</th>
               <th>Hành động</th>
            </tr>
         </thead>
         <tbody class="list-cart" data-url-remove="{{route('removeCart')}}" data-url-update="{{route('updateCart')}}">
            @php
               $totalPrice = 0;
            @endphp
            @foreach ($cart as $item)
            @php
               $discountPrice = $item['price'] - $item['price']*($item['discount']/100);
               $totalPrice += $discountPrice * $item['quantity'];
            @endphp
               <tr>
                  <td class="cart-product-name">
                     <img src="{{$item['image']}}" alt="" loading="lazy">
                     <h5>{{languageName($item['name'])}}</h5>
                  </td>
                  <td>{{$item['color']}}</td>
                  <td>{{$item['size']}}</td>
                  <td class="cart-product-quantity">
                     <input
                        type="number"
                        id="qtyItem{{$item['id']}}"
                        class="input-text qty text"
                        step="1"
                        min="0"
                        max=""
                        name="cart[aa677d660eefd1fe0d323c1dc9bfa869][qty]"
                        value="{{$item['quantity']}}"
                        title="Qty"
                        size="4"
                        placeholder=""
                        inputmode="numeric" data-id="{{$item['id']}}"/>
                  </td>
                  <td>{{number_format($discountPrice)}}₫</td>
                  <td><a href="javascript:void(0);" class="remove" aria-label="Remove this item" onclick="removeItem({{$item['id']}})">Xóa</a></td>
               </tr>
            @endforeach
            <thead>
               <tr>
                  <th>Tổng tiền</th>
                  <th class="total-price">{{number_format($totalPrice)}}₫</th>
               </tr>
            </thead>
         </tbody>
      </table>
   </div>
   <div class="row">
      <a href="{{route('home')}}" class="btn-cart-check mr-5">Tiếp tục mua hàng</a>
      <a href="{{route('checkout')}}" class="btn-cart-check">Tiến hàng thanh toán</a>
   </div>
</div>
@else
<div class="container cart-content mb-3">
   <div class="row">
      <h4>Chưa có sản phẩm nào trong giỏ hàng!</h4>
   </div>
</div>
@endif
@endsection