
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mono Line-House hold</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('client/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/css/toast.css') }}" type="text/css">
</head>

<body>
    {{-- <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div> --}}

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__links">

                @if (Cookie::has('userid'))
                    <a href="{{ route('client.my.index') }}">Chào {{ Cookie::get('userid') }}.</a>
                    <a href="{{ route('client.logout.index') }}">Đăng Xuất</a>
                @else
                    <a href="{{ route('client.login.index') }}">Đăng Nhập</a>
                    <a href="{{ route('client.register.index') }}">Đăng Ký</a>
                @endif

            </div>
        </div>
        <div class="offcanvas__nav__option">
            <a href="#" class="search-switch"><img src="{{ asset('client/img/icon/search.png') }}" alt=""></a>
            <a href="#"><img src="{{ asset('client/img/icon/heart.png') }}" alt=""></a>
            <a href="#"><img src="{{ asset('client/img/icon/cart.png') }}" alt=""> <span>0</span></a>
            <div class="price">$0.00</div>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p>Free shipping, 30-day return or refund guarantee.</p>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <div class="header__top__left">
                            <p>Miễn phí vận chuyển, bảo đảm đổi trả hoặc hoàn tiền trong 30 ngày.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="header__top__right">
                            <div class="header__top__links">
                                @if (Cookie::has('userid'))
                                    <a href="{{ route('client.my.index') }}">Chào {{ Cookie::get('fullname') }}.</a>
                                    <a href="{{ route('client.logout.index') }}">Đăng Xuất</a>
                                @else
                                    <a href="{{ route('client.login.index') }}">Đăng Nhập</a>
                                    <a href="{{ route('client.register.index') }}">Đăng Ký</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href="{{ route('client.home.index') }}"><img src="{{ asset('client/img/logo.png') }}" alt=""></a>
                    </div>
                </div>


                <x-MenuComponent/>


                <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">
                        <a href="#" class="search-switch"><img src="{{ asset('client/img/icon/search.png') }}" alt=""></a>
                        <a href="#"><img src="{{ asset('client/img/icon/heart.png') }}" alt=""></a>
                        <a href="{{ route('client.cart.index') }}"><img src="{{ asset('client/img/icon/cart.png') }}" alt=""> <span>0</span></a>
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
    <!-- Header Section End -->

    @yield('content')

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="#"><img src="{{ asset('client/img/footer-logo.png') }}" alt=""></a>
                        </div>
                        <!-- <p>The customer is at the heart of our unique business model, which includes design.</p> -->
                        <a href="#"><img src="{{ asset('client/img/payment.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Cửa hàng</h6>
                        <ul>
                            <li><a href="#">luôn mở cửa</a></li>
                            <li><a href="#">Cập nhật xu hướng</a></li>
                            <li><a href="#">Phụ kiện</a></li>
                            <li><a href="#">Khuyễn mãi</a></li>
                        </ul>           
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer__widget">    
                        <h6>Chúng tôi</h6>
                        <ul>
                            <li><a href="#">liên hệ</a></li>
                            <li><a href="#">Thanh toán</a></li>
                            <li><a href="#">Bảo hành</a></li>
                            <li><a href="#">Chính sách </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                    <div class="footer__widget">    
                        <h6>Giải đáp </h6>
                        <div class="footer__newslatter">
                            <p>Mọi thắc mắc  xin liên hệ với chúng tôi !</p>
                            <form action="#">
                                <input type="text" placeholder="Your email">
                                <button type="submit"><span class="icon_mail_alt"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p>Copyright ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            All rights reserved | made by Minh&Truong
                            <a href="#   " target="_blank"> </a>
                        </p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <div id="toast"></div>

    <!-- Js Plugins -->
    <script src="{{ asset('client/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('client/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('client/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('client/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('client/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('client/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('client/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('client/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('client/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('client/js/main.js') }}"></script>

    <script>

        const url = window.location.origin

        async function callApiAddToCart(productID, quantity) {
            const options = {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    productID: productID,
                    quantity: quantity,
                    _token: '{{ csrf_token() }}',
                })
            }

            const res_raw = await fetch('{{ route('client.cart.addToCart') }}', options)

            if (!res_raw.ok) {
                toast({
                    title: 'Lỗi',
                    message: 'Có lỗi xảy ra, vui lòng thử lại!',
                    type: 'error',
                    duration: 3000
                })

                return
            }

            const data = await res_raw.json()

            toast({
                title: data.title,
                message: data.message,
                type: data.status,
                duration: 3000
            })
        }

        function addToCart() {
            const addToCartBtn = document.querySelector('.btn-add-to-cart')
            if (addToCartBtn) {
                addToCartBtn.addEventListener('click', async function (e) {
                    const quantity = document.getElementById('input-product-quantity').value ?? 0
                    await callApiAddToCart(this.dataset.productid, quantity)
                })
            }
        }
        addToCart()
        // Toast function
        function toast({ title = "", message = "", type = "info", duration = 3000 }) {
          const main = document.getElementById("toast");
          if (main) {
            const toast = document.createElement("div");

            // Auto remove toast
            const autoRemoveId = setTimeout(function () {
              main.removeChild(toast);
            }, duration + 1000);

            // Remove toast when clicked
            toast.onclick = function (e) {
              if (e.target.closest(".toast__close")) {
                main.removeChild(toast);
                clearTimeout(autoRemoveId);
              }
            };

            const icons = {
              success: "fas fa-check-circle",
              info: "fas fa-info-circle",
              warning: "fas fa-exclamation-circle",
              error: "fas fa-exclamation-circle"
            };
            const icon = icons[type];
            const delay = (duration / 1000).toFixed(2);

            toast.classList.add("toast", `toast--${type}`);
            toast.style.animation = `slideInLeftCustom ease .3s, fadeOut linear 1s ${delay}s forwards`;

            toast.innerHTML = `
                            <div class="toast__icon">
                                <i class="${icon}"></i>
                            </div>
                            <div class="toast__body">
                                <h3 class="toast__title">${title}</h3>
                                <p class="toast__msg">${message}</p>
                            </div>
                            <div class="toast__close">
                                <i class="fas fa-times"></i>
                            </div>
                        `;
            main.appendChild(toast);
          }
        }

    </script>

    @if (session()->has('msg'))
        <script>
            toast({
                title: '{{ session()->get('type') }}',
                message: '{{ session()->get('msg') }}',
                type: '{{ session()->get('type') }}',
                duration: 4000,
            })
        </script>
    @endif
</body>

</html>
