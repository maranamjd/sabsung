      </main>
    </div>
    <footer class="app-footer">
      <div>
        <a href="https://sabsung.test">Sabsung</a>
        <span>&copy; 2019</span>
      </div>
      <div class="ml-auto">
        <span>Powered by</span>
        <a href="https://coreui.io">CoreUI</a>
      </div>
    </footer>
    <script src="<?php echo URL; ?>public/js/jquery3.3.1.js"></script>
    <script src="<?php echo URL ?>node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="<?php echo URL; ?>public/js/chart.bundle.js"></script>
    <script src="<?php echo URL; ?>public/js/chartutils.js"></script>
    <script src="<?php echo URL; ?>public/js/app.js"></script>
    <script src="<?php echo URL; ?>public/js/bootstrap-rating.min.js"></script>
    <script src="<?php echo URL; ?>public/js/coreui.min.js"></script>
    <script src="<?php echo URL; ?>public/js/admin.js"></script>
    <?php
    if (isset($this->js)) {
      foreach ($this->js as $js) {
        echo "<script src='".URL."views/".$js."'></script>";
      }
    }
    ?>
  </body>
</html>
