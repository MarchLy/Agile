<div class="wrap-sidebar-account">
                            <ul class="my-account-nav">
                                <li>
                                    <a href="<?php echo BASE_URL ?>?act=my-account"
                                  class="my-account-nav-item 
                                  <?= $_GET['act']== 'my-account'? 'active' : ''?>"
                                  >Dashboard
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="<?php echo BASE_URL ?>?act=account-detail" 
                                    class="my-account-nav-item  <?= $_GET['act']== 'account-detail'? 'active' : ''?>">
                                        Account Details</a>
                                </li>

                                <li><a href="<?php echo BASE_URL ?>?act=logout" class="my-account-nav-item">Logout</a></li>
                            </ul>
                        </div>