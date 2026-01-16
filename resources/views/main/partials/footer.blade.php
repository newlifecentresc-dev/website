<!-- Footer top section -->
<section class="footer-top-section spad">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 footer-top-content">
                <div class="section-title title-left">
                    <h2>Contact Us</h2>
                </div>
                <h3>{{ $settings->site_title }}</h3>
                <p>{!! $settings->site_address !!}</p>
                <p><span>Email:</span> {{ $settings->site_email }}</p>
                <p><span>Phone:</span> {{ $settings->site_phone_number }}</p>
            </div>
            <div class="col-sm-6">
                {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2423.954886167045!2d-1.8257213841899531!3d52.588508879827174!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4870a5c5eb576b49%3A0x5f3c9893fdaa065c!2sSt%20James%20Rd%2C%20Sutton%20Coldfield%2C%20UK!5e0!3m2!1sen!2sng!4v1653342826819!5m2!1sen!2sng" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                <iframe width="600" height="500" src="https://maps.google.com/maps?q=B75%205BW&t=&z=15&ie=UTF8&iwloc=&output=embed" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
    <!-- googel map -->

    {{-- Newlife Family
Four Oaks Boys Club
Upper Room Wilmcote Drive
Sutton Coldfield
B75 5EH

Email: newlifecentresc@gmail.com

Phone: +447940028966 --}}

</section>

<!-- Footer top section end-->
<!-- Footer section -->
<footer class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 copyright">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                <script>
                    document.write(new Date().getFullYear());
                </script> All rights reserved | {{ $settings->site_title }} Church
                <span style="display: none">
                    <script async type="text/javascript"
                        src="https://seal.godaddy.com/getSeal?sealID=c8C6par5Aj3VP1llLs5R8ORG3SaSSLjSnHV0MI11PLexNr54z4Ch0VbTqIPy">
                    </script>
                </span>

                </span>
            </div>
            <div class="col-sm-6">
                <div class="social">
                    @include('main.components.custom.socials')
                </div>
            </div>

        </div>
    </div>
</footer>
<!-- Footer section end -->
