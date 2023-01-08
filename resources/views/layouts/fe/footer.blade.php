
    <!-- info section -->
    <section class="info_section layout_padding2">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-3 info-col">
                    <div class="info_detail">
                        <h4>Moto Kami</h4>
                        <p>{{ \Setting::getSetting()->desc_footer }}</p>
                        {{-- <div class="info_social">
                            <a href="">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                        </div> --}}
                    </div>
                </div>
                <div class="col-md-4 col-lg-6  info-col">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.690882560065!2d101.38782739999999!3d0.4579429!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5a8602e3b59cd%3A0x7ed215d84623c970!2sJl.%20Suka%20Karya%20No.90%2C%20Tuah%20Karya%2C%20Kec.%20Tampan%2C%20Kota%20Pekanbaru%2C%20Riau%2028293!5e0!3m2!1sen!2sid!4v1671103943266!5m2!1sen!2sid" width="540" height="225" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    {{-- <div class="map_container">
                        <div class="map">
                            <div id="googleMap"></div>
                        </div>
                    </div> --}}
                </div>
                <div class="col-md-4 col-lg-3 info-col">
                <div class="info_contact">
                    <h4>Kontak</h4>
                    <div class="contact_link_box">
                        <p>
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span>{{ \Setting::getSetting()->address }}</span>
                        </p>
                        <a href="https://wa.me/+6281268385500" target="_blank" rel="noopener noreferrer">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <span>Call +6281268385500</span>
                        </a>
                        <a href="">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span>{{ \Setting::getSetting()->mail }}</span>
                        </a>
                        <p>
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <span>{{ \Setting::getSetting()->working_hours }}</span>
                        </p>
                        {{-- <p>
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <span>Sunday: closed</span>
                        </p> --}}
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end info section -->

    <footer class="footer_section">
        <div class="container">
            <p>
                &copy; <span id="displayYear"></span> All Rights Reserved By
                <a href="{{ route('fe.index') }}">{{ \Setting::getSetting()->footer_web }}</a>
            </p>
        </div>
    </footer>
