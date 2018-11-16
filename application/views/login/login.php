        <!-- Login Content -->
        <div class="content overflow-hidden">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
                    <!-- Login Block -->
                    <div class="block block-themed animated fadeIn">
                        <div class="block-header bg-primary">
                            <ul class="block-options">
                                <li>
                                    <a href="<?=base_url();?>index.php/login/changePassword/">Change Password</a>
                                </li>
                            </ul>
                            <h3 class="block-title">Login</h3>
                        </div>
                        <div class="block-content block-content-full block-content-narrow">
                            <!-- Login Title -->
                            <br>
                            <h1 class="fa fa-ravelry fa-2x text-primary"></h1> <span class="h2 font-w600 push-30-t push-5">Hms</span>
                            <p>Welcome, please login.</p>
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
                            <form class="js-validation-login form-horizontal push-30-t push-50" action="<?=base_url();?>index.php/login/signup/" method="post">
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
                                            <input class="form-control" type="password" id="login-password" name="login-password">
                                            <label for="login-password">Password</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label class="css-input switch switch-sm switch-primary">
                                            <input type="checkbox" id="login-remember-me" name="login-remember-me"><span></span> Remember Me?
                                        </label>
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