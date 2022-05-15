            </div>
            </div>

            </div>

            <script src="<?php echo base_url(); ?>/vendor/jquery/jquery.min.js"></script>
            <script src="<?php echo base_url(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>/assets/js/browser.min.js"></script>
            <script src="<?php echo base_url(); ?>/assets/js/breakpoints.min.js"></script>
            <script src="<?php echo base_url(); ?>/assets/js/transition.js"></script>
            <script src="<?php echo base_url(); ?>/assets/js/owl-carousel.js"></script>
            <script src="<?php echo base_url(); ?>/assets/js/custom.js"></script>
            <script src="<?php echo base_url(); ?>/assets/js/select2.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('.multiselect').select2();
                });
                $(document).ready(function() {
                    $('input').keyup(function() {
                        $(this).val($(this).val().toUpperCase());
                    });
                });
            </script>

            </body>

            </html>