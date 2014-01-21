<link href="<?php echo get_template_directory_uri(); ?>/header.css" rel="stylesheet" type="text/css" />

            <ul id="nav">
                <li class="active" <?php if (is_home()) { echo 'class="current"';} ?>><a title="<?php bloginfo('name'); ?>"  href="<?php echo get_option('home'); ?>/">主页</a></li>
                <li><a href="#s1">关于计协</a>
                    <span id="s1"></span>
                    <ul class="subs">
                        <li><a href="#">计协神器</a>
                            <ul>
                                <li><a href="#">计协微博</a></li>
                                <li><a href="#">计协网盘</a></li>
                                <li><a href="#">计协微信</a></li>
                                <li><a href="#">计协会员保修系统</a></li>
                            </ul>
                        </li>
                        <li><a href="#">计协神器</a>
                            <ul>
                                <li><a href="#">计协聊天器</a></li>
                                <li><a href="#">计协内网下载器</a></li>
                                <li><a href="#">计协安卓客户端</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li ><a href="#s2">计协成员</a>
                    <span id="s2"></span>
                    <ul class="subs">
                        <li><a href="#">部门</a>
                            <ul>
                                <li><a href="#">软件部</a></li>
                                <li><a href="#">组织部</a></li>
                                <li><a href="#">秘书部</a></li>
                            </ul>
                        </li>
                        <li><a href="#">部门</a>
                            <ul>
                                <li><a href="#">ACM俱乐部</a></li>
                                <li><a href="#">外联部</a></li>
                                <li><a href="#">管理层</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
