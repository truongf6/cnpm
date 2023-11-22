@extends('layout.client._Layout')

@section('content')
    <!-- Map Begin -->
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d111551.9926412813!2d-90.27317134641879!3d38.606612219170856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2sbd!4v1597926938024!5m2!1sen!2sbd" height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
    <!-- Map End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__text">
                        <div class="section-title">
                            <span>Thông tin</span>
                            <h2>Liên hệ</h2>
                            <p>Ngoài việc chỉ tập trung vào vẻ đẹp và thiết kế, nội thất thông minh đang trở thành xu hướng mới với sự tích hợp công nghệ. Từ các hệ thống điều khiển bằng giọng nói, đèn chiếu sáng tự động đến các thiết bị điện tử thông minh được tích hợp sẵn, tất cả nhằm mang lại sự tiện lợi và hiệu quả cho cuộc sống hàng ngày.</p>
                        </div>
                        <ul>
                            <li>
                                <h4>Nghệ An</h4>
                                <p>Thành phố Vinh <br />+012345678</p>
                            </li>
                            <li>
                                <h4>Việt Nam</h4>
                                <p>NGHỆ AN<br />+12 345-423-9893</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact__form">
                        <form action="{{ route('client.contact.store') }}">
                            <p class="pb-2">{{ session('msg') }}</p>
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" name="name" placeholder="Name">
                                    @error('name')
                                        <small id="emailHelp" class="form-text text-muted" style="color: red !important;">{{ $errors->first('name') }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <input type="email" name="email" placeholder="Email">
                                    @error('email')
                                        <small id="emailHelp" class="form-text text-muted" style="color: red !important;">{{ $errors->first('email') }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-12">
                                    <textarea name="message" placeholder="Message"></textarea>
                                    @error('message')
                                        <small id="emailHelp" class="form-text text-muted" style="color: red !important;">{{ $errors->first('message') }}</small>
                                    @enderror
                                    <button type="submit" class="site-btn">Gửi Tin Nhắn</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
@endsection
