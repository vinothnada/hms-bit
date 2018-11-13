        <!-- Login Content -->
        <div class="content overflow-hidden">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
                    <!-- Login Block -->
                    <div class="block block-themed animated fadeIn">
                        <div class="block-header bg-primary">
                            <ul class="block-options">
                            </ul>
                            <h3 class="block-title">Change Password</h3>
                        </div>
                        <div class="block-content block-content-full block-content-narrow">
                            <!-- Login Title -->
                            <br>
                            <h1 class="fa fa-ravelry fa-2x text-primary"></h1> <span class="h2 font-w600 push-30-t push-5">Hms</span>
                            <p>Please change your password below.</p>
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
                            <form class="js-validation-login form-horizontal push-30-t push-50" action="<?=base_url();?>index.php/login/changePasswordFunction/" method="post">
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material form-material-primary floating">
                                            <input class="form-control" type="text" id="login-username" name="login-username">
                                            <label for="login-username">Username</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material form-material-primary floating">
                                            <input class="form-control" type="password" id="oldPassword" name="oldPassword">
                                            <label for="oldPassword">Old Password</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material form-material-primary floating">
                                            <input class="form-control" type="password" id="newPassword" name="newPassword">
                                            <label for="newPassword">New Password</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material form-material-primary floating">
                                            <input class="form-control" type="password" id="confirmPassword" name="confirmPassword">
                                            <label for="confirmPassword">Confirm New Password</label>
                                        </div>
                                    </div>
                                </div>                                                                
                                <div class="form-group">
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <button class="btn btn-block btn-primary" type="submit"><i class="si si-login pull-right"></i> Log in</button>
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