<div class="footer-brand margin-top-15">
   <div class="container">
         <div class="row">
         <div class="col-md-12">
            <div class="border-bg clearfix">
               <div class="col-md-12">
                     <div class="row">
                     <div class="col-lg-2 col-md-3 col-sm-3">
                        <h3>Các thương hiệu lớn</h3>
                     </div>
                     <div class="col-lg-10 col-md-9 col-sm-9">
                        <div class="brand-owl owl-carousel not-dqowl">
                           @foreach ($partners as $item)
                           <div class="item">
                                 <a href="{{$item->link}}" target="_blank">
                                 <picture>
                                    <source 
                                       media="(min-width: 992px)"
                                       srcset="{{$item->image}}">
                                    <source 
                                       media="(min-width: 769px)"
                                       srcset="{{$item->image}}">
                                    <source 
                                       media="(min-width: 480px)"
                                       srcset="{{$item->image}}">
                                    <img 
                                       src="{{$item->image}}" 
                                       alt="{{$item->name}}" class="img-responsive center-block" />
                                 </picture>
                                 </a>
                           </div>
                           @endforeach
                        </div>
                     </div>
                     </div>
               </div>
            </div>
         </div>
         </div>
   </div>
</div>
<footer class="footer">
   <div class="site-footer">
         <div class="container">
         <div class="footer-inner">
            <div class="row">
               <div class="col-xs-12 col-sm-6 col-md-4">
                     <div class="footer-widget">
                     <h3><span>Thông tin công ty</span></h3>
                     <ul class="list-menu">
                        <li>Địa chỉ: {{$setting->address1}}</li>
                        @if ($setting->address2)
                        <li>Địa chỉ 2: {{$setting->address2}}</li>
                        @endif
                        <li>Hotline: <a href="tel:{{$setting->phone1}}"> {{$setting->phone1}}</a></li>
                        @if ($setting->phone2)
                        <li>Số điện thoại: <a href="tel:{{$setting->phone2}}"> {{$setting->phone2}}</a></li>
                        @endif
                        <li>Email: <a href="mailto:{{$setting->email}}"> {{$setting->email}}</a></li>
                     </ul>
                     </div>
               </div>
               <div class="col-xs-12 col-sm-6 col-md-3">
                     <div class="footer-widget">
                     <h3><span>Chính sách</span></h3>
                     <ul class="list-menu">
                        @foreach ($helpCustomer as $item)
                        <li><a href="{{route('helpCus', ['slug'=>$item->slug])}}">{{$item->title}}</a></li>
                        @endforeach
                     </ul>
                     </div>
               </div>
               <div class="col-xs-12 col-sm-6 col-md-2">
                     <div class="footer-widget">
                     <h3><span>Hỗ trợ khách hàng</span></h3>
                     <ul class="list-menu">
                        <li><a href="{{route('home')}}">Trang chủ</a></li>
                        <li><a href="{{route('aboutUs')}}">Giới thiệu</a></li>
                        <li><a href="{{route('allProduct')}}">Sản phẩm</a></li>
                        <li><a href="{{route('allListBlog')}}">Kinh nghiệm hay</a></li>
                        <li><a href="{{route('lienHe')}}">Liên hệ</a></li>
                     </ul>
                     </div>
               </div>
               <div class="col-xs-12 col-sm-6 col-md-3">
                     <div class="footer-widget">
                     <h3><span>Thông tin</span></h3>
                     <ul class="list-menu">
                        <div class="fb-page" data-href="{{$setting->facebook}}" data-height="150px" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                           <blockquote cite="{{$setting->facebook}}" class="fb-xfbml-parse-ignore"><a href="{{$setting->facebook}}">Điện lạnh gia phát</a></blockquote>
                        </div>
                     </ul>
                     </div>
               </div>
            </div>
            <div class="row bottom-footer">
               <div class="col-md-4 col-sm-6 col-xs-12">
                     <div class="footer-widget footer-payment">
                     <h3><span>Phương thức thanh toán</span></h3>
                     <ul class="list-menu clearfix">
                        <li class="item">
                           <img src="{{url('frontend/images/payment_1.png')}}" alt="Phương thức thanh toán" />
                        </li>
                        <li class="item">
                           <img src="{{url('frontend/images/payment_2.png')}}" alt="Phương thức thanh toán" />
                        </li>
                        <li class="item">
                           <img src="{{url('frontend/images/payment_3.png')}}" alt="Phương thức thanh toán" />
                        </li>
                        <li class="item">
                           <img src="{{url('frontend/images/payment_4.png')}}" alt="Phương thức thanh toán" />
                        </li>
                        <li class="item">
                           <img src="{{url('frontend/images/payment_5.png')}}" alt="Phương thức thanh toán" />
                        </li>
                        <li class="item">
                           <img src="{{url('frontend/images/payment_6.png')}}" alt="Phương thức thanh toán" />
                        </li>
                        <li class="item">
                           <img src="{{url('frontend/images/payment_7.png')}}" alt="Phương thức thanh toán" />
                        </li>
                     </ul>
                     </div>
               </div>
               <div class="col-md-4 col-sm-6 col-xs-12">
                     <div class="footer-widget footer-social">
                     <h3><span>Kết nối với chúng tôi</span></h3>
                     <ul class="list-menu list-inline">
                        <li class="twitter">
                           <a href="#" target="_blank">
                           <i class="fa fa-twitter" aria-hidden="true"></i>
                           </a>
                        </li>
                        <li class="facebook">
                           <a href="{{$setting->facebook}}" target="_blank">
                           <i class="fa fa-facebook" aria-hidden="true"></i>
                           </a>
                        </li>
                        <li class="pinterest">
                           <a href="#" target="_blank">
                           <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                           </a>
                        </li>
                        <li class="google">
                           <a href="#" target="_blank">
                           <i class="fa fa-google-plus" aria-hidden="true"></i>
                           </a>
                        </li>
                        <li class="instagram">
                           <a href="#" target="_blank">
                           <i class="fa fa-instagram" aria-hidden="true"></i>
                           </a>
                        </li>
                        <li class="youtube">
                           <a href="" target="_blank">
                           <i class="fa fa-youtube" aria-hidden="true"></i>
                           </a>
                        </li>
                     </ul>
                     </div>
               </div>
               <div class="col-md-4 col-sm-12 col-xs-12">
                     <div class="footer-widget footer-subcrible">
                     <h3><span>Đăng ký nhận tin</span></h3>
                     <p>Nhận thông tin sản phẩm mới nhất, tin khuyến mãi và nhiều hơn nữa.</p>
                     <form action="{{route('postcontact')}}" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank">
                        @csrf
                        <div class="input-group">
                           <input type="email" class="form-control" value="" placeholder="Email của bạn" name="email" id="mail">
                           <span class="input-group-btn">
                           <button class="btn btn-default" id="subscribe" type="submit">Đăng ký</button>
                           </span>
                        </div>
                     </form>
                     </div>
               </div>
            </div>
         </div>
         </div>
   </div>
   <div class="copyright clearfix">
         <div class="container">
         <div class="inner clearfix">
            <div class="row">
               <div class="col-sm-12 text-center">
                     <span>© Bản quyền thuộc về <b>Điện lạnh Gia Phát</b> <span class="s480-f">|</span> Cung cấp bởi <a href="https://sbtsoftware.vn/" title="SBT" target="_blank" rel="nofollow">SBT</a></span>
               </div>
            </div>
         </div>
         <div class="back-to-top"><i class="fa  fa-arrow-circle-up"></i></div>
         </div>
   </div>
</footer>