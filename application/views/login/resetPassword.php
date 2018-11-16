        <!-- Login Content -->
        <div class="content overflow-hidden">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
                    <!-- Login Block -->
                    <div class="block block-themed animated fadeIn">
                        <div class="block-header bg-danger">
                            <ul class="block-options">
                                <li>
                                </li>                            
                            </ul>
                            <h3 class="block-title">Reset Password</h3>
                        </div>
                        <div class="block-content block-content-full block-content-narrow">
                            <!-- Login Title -->
                            <br>
                            <h1 class="fa fa-ravelry fa-2x text-danger"></h1> <span class="h2 font-w600 push-30-t push-5">Hms</span>
                            <p>Please enter your User Name.</p>
                            <?php if ($this->session->userdata('error')) { ?>       
                                <div class="alert alert-danger alert-dismissable"><?php echo $this->session->userdata('error'); ?> </div>
                                <?php $this->session->unset_userdata('error');
                            }?>
                            <?php if ($this->session->userdata('success')) { ?>       
                                <div class="alert alert-success alert-dismissal"><?php echo $this->session->userdata('success'); ?> </div>
                                <?php $this->session->unset_userdata('success');
                            }?>                                
                            <!-- END Login Title -->
                            <!-- Login Form -->
                            <!-- jQuery Validation (.js-validation-login class is initialized in js/pages/base_pages_login.js) -->
                            <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                            <form class="js-validation-login form-horizontal push-30-t push-50" action="<?=base_url();?>index.php/login/resetPasswordFunction" method="post">
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material form-material-danger floating">
                                            <input class="form-control" type="text" id="login-username" name="login-username">
                                            <label for="login-username">Username</label>
                                        </div>
                                    </div>
                                </div>                                                               
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <button class="btn btn-block btn-danger" type="submit"></i> Reset Password</button>
                                    </div>
                                </div>
                            </form>
                            <!-- END Login Form -->
                        </div>
                    </div>
                    <!-- END Login Block -->
                </div>
            </div>
        </div>
        <!-- END Login Content -->