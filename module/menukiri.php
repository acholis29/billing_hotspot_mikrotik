<section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="/images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['id']; ?></div>
                    <div class="email"><?php echo $_SESSION['emailusr']; ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="/account/login.php"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div id="div-menu" class="menu">
                <ul id="ul-menu" class="list">
                    <li class="header">MENU</li>
                    <li id="li-home" class="active">
                        <a href="/">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li id="li-kesiswaan">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">school</i>
                            <span>Kesiswaan</span>
                        </a>
                        <ul class="ml-menu">
                            <li id="li-siswa">
                                <a href="/kesiswaan/siswa/" >
                                    <span>Daftar siswa</span>
                                </a>                                
                            </li>
                            <li id="li-absensiswa">
                                <a href="/kesiswaan/absensi/" >
                                    <span>Absensi siswa</span>
                                </a>
                                
                            </li>
                        </ul>
                    </li>
					<li id="li-pegawai">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">people</i>
                            <span>Kepegawaian</span>
                        </a>
                        <ul class="ml-menu">
                            <li id="li-guru">
                                <a href="/pegawai/guru/" >
                                    <span>Daftar Guru</span>
                                </a>
                                
                            </li>
                            <li id="li-staff">
                                <a href="/pegawai/staff/" >
                                    <span>Daftar Staff</span>
                                </a>
                                
                            </li>
                        </ul>
                    </li>
					<li id="li-kurikulum">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">layers</i>
                            <span>Kurikulum</span>
                        </a>
                        <ul class="ml-menu">
                            <li id="li-mapel">
                                <a href="/pegawai/guru/" >
                                    <span>Daftar MAPEL</span>
                                </a>
                                
                            </li>
                            <li id="li-staff">
                                <a href="/pegawai/staff/" >
									<span>Daftar Kelas</span>
                                </a>
                                
                            </li>
                        </ul>
                    </li>
					<li id="li-option">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">build</i>
                            <span>Pengaturan</span>
                        </a>
                        <ul class="ml-menu">
                            <li id="li-userid">
                                <a href="/option/userid/" >
                                    <span>User pengguna</span>
                                </a>
                                
                            </li>
                        </ul>
                    </li>
                    <li >
                        <a href="#">
                            <i class="material-icons">help</i>
                            <span>Bantuan</span>
                        </a>
                    </li>
					
				</ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2017 <a href="http://tukangcoding.web.id">tukangcoding.web.id</a>
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
		
		
		
		
		
		
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
                <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
					</ul>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="settings">
                    <div class="demo-settings">
                        <p>GENERAL SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Report Panel Usage</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Email Redirect</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>SYSTEM SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Notifications</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Auto Updates</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>ACCOUNT SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Offline</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Location Permission</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>