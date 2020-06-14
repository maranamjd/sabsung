    <!-- Footer -->
    <footer class="page-footer font-small mdb-color mt-4 bg-light">
    <!-- Footer Links -->
    <div class="container text-center text-md-left">
    <!-- Footer links -->
    <div class="row text-center text-md-left mt-3 pb-3">
      <!-- Grid column -->
      <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-4">
        <h6 class="text-uppercase mb-4 font-weight-bold">About Us</h6>
        <p>Affordable Gadgets, Low Price, and a Quality that you can Trust.</p>
        <p>Sabsung Industries and Corporation</p>
        <p>"Reality in your hands"</p>
      </div>
      <!-- Grid column -->
      <hr class="w-100 clearfix d-md-none">
      <!-- Grid column -->
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
        <h6 class="text-uppercase mb-4 font-weight-bold">Usable Links</h6>
        <p><a href="<?php echo URL ?>home/suggestions">Suggestions</a></p>
        <p><a href="#!">Terms of Use</a></p>
        <p><a href="#!">Privacy Policy</a></p>
      </div>
      <!-- Grid column -->
      <hr class="w-100 clearfix d-md-none">
      <!-- Grid column -->
      <!-- Grid column -->
      <hr class="w-100 clearfix d-md-none">
      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
        <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
        <p><i class="fa fa-envelope mr-3"></i><a href="https://contactus.samsung.com/customer/contactus/formmail/mail/MailQuestionProduct.jsp?SITE_ID=1" target="_blank"> Samsung Email Support</a></p>
        <p><i class="fa fa-phone mr-3"></i> +639 29 272 2371</p>
      </div>
      <!-- Grid column -->
    </div>
    <!-- Footer links -->
    <hr>
    <!-- Grid row -->
    <div class="row d-flex align-items-center">
      <!-- Grid column -->
      <div class="col-md-7 col-lg-8">
        <!--Copyright-->
        <p class="text-center text-md-left">© 2019 Copyright:
          <a href="<?php echo URL ?>">
            <strong> Sabsung.test</strong>
          </a>
        </p>
      </div>
      <!-- Grid column -->
      <!-- Grid column -->
      <div class="col-md-5 col-lg-4 ml-lg-0">
        <!-- Social buttons -->
        <div class="text-center text-md-right">
          <ul class="list-unstyled list-inline">
            <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1" href="https://www.facebook.com/SamsungPH/">
                <i class="fa fa-facebook"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1" href="https://twitter.com/samsungph?lang=en">
                <i class="fa fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1" href="http://www.instagram.com/samsungph">
                <i class="fa fa-instagram"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1" href="http://www.youtube.com/samsungphilippines">
                <i class="fa fa-youtube"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1" href="https://ph.linkedin.com/company/samsung-electronics">
                <i class="fa fa-linkedin"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <!-- Grid column -->
    </div>
    <!-- Grid row -->
    </div>
    <!-- Footer Links -->
    </footer>
    <!-- Footer -->

    <script src="<?php echo URL; ?>public/js/jquery3.3.1.js"></script>
    <script src="<?php echo URL ?>node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="<?php echo URL; ?>public/js/chart.bundle.js"></script>
    <script src="<?php echo URL; ?>public/js/chartutils.js"></script>
    <script src="<?php echo URL; ?>public/js/app.js"></script>
    <script src="<?php echo URL; ?>public/js/bootstrap-rating.min.js"></script>
    <script src="<?php echo URL; ?>public/js/main.js"></script>
    <?php
    if (isset($this->js)) {
    foreach ($this->js as $js) {
      echo "<script src='".URL."views/".$js."'></script>";
    }
    }
    ?>
  </body>
</html>
