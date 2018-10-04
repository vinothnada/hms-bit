                <!-- Footer -->
            <footer id="page-footer" class="content-mini content-mini-full font-s12 bg-gray-lighter clearfix">
                <div class="pull-right">
                    Crafted with <i class="fa fa-heart text-city"></i> by <a class="font-w600" href="http://goo.gl/vNS3I" target="_blank">pixelcave</a>
                </div>
                <div class="pull-left">
                    <a class="font-w600" href="http://goo.gl/6LF10W" target="_blank">OneUI 3.1</a> &copy; <span class="js-year-copy"></span>
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->

        <!-- Apps Modal -->
        <!-- Opens from the button in the header -->
        <div class="modal fade" id="apps-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-sm modal-dialog modal-dialog-top">
                <div class="modal-content">
                    <!-- Apps Block -->
                    <div class="block block-themed block-transparent">
                        <div class="block-header bg-primary-dark">
                            <ul class="block-options">
                                <li>
                                    <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                </li>
                            </ul>
                            <h3 class="block-title">Apps</h3>
                        </div>
                        <div class="block-content">
                            <div class="row text-center">
                                <div class="col-xs-6">
                                    <a class="block block-rounded" href="base_pages_dashboard.html">
                                        <div class="block-content text-white bg-default">
                                            <i class="si si-speedometer fa-2x"></i>
                                            <div class="font-w600 push-15-t push-15">Backend</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xs-6">
                                    <a class="block block-rounded" href="frontend_home.html">
                                        <div class="block-content text-white bg-modern">
                                            <i class="si si-rocket fa-2x"></i>
                                            <div class="font-w600 push-15-t push-15">Frontend</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Apps Block -->
                </div>
            </div>
        </div>
        <!-- END Apps Modal -->

        <!-- OneUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock, Appear, CountTo, Placeholder, Cookie and App.js -->
        <script src="<?= base_url(); ?>assets/js/core/jquery.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/core/bootstrap.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/core/jquery.slimscroll.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/core/jquery.scrollLock.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/core/jquery.appear.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/core/jquery.countTo.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/core/jquery.placeholder.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/core/js.cookie.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/app.js"></script>

        <script>
            jQuery(function () {
                // Init page helpers (Appear + CountTo plugins)
                App.initHelpers(['appear', 'appear-countTo']);
            });
        </script>
                <!-- Page JS Plugins -->
        <script src="<?= base_url(); ?>assets/js/plugins/datatables/jquery.dataTables.min.js"></script>

        <!-- Page JS Code -->
        <script src="<?= base_url(); ?>assets/js/pages/base_tables_datatables.js"></script>

        <!-- Page Plugins -->
        <script src="<?= base_url(); ?>assets/js/plugins/chartjs/Chart.min.js"></script>

        <!-- Page JS Code -->
        <script src="<?= base_url(); ?>assets/js/pages/base_pages_dashboard_v2.js"></script>
        <!-- Page JS Code -->
                <!-- Page JS Code -->
        <script src="<?= base_url(); ?>assets/js/custom/base_pages_allusers.js"></script>
    </body>
</html>