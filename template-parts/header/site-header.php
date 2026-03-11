 <header class="header" id="siteHeader">
     <div class="header_inner">
         <nav class="header_nav header_nav_left" aria-label="メインメニュー">
             <ul class="header_list header_list_left">
                 <li class="header_item home_linl_btn"><a href="<?php echo esc_url(home_url('/')); ?>" class="header_link">ホーム</a></li>
                 <li class="header_item product_link_btn"><a href="<?php echo esc_url(get_post_type_archive_link('products')); ?>" class="header_link">商品一覧</a></li>
                 <li class="header_item news_link_btn"><a href="<?php echo esc_url(home_url('#news')); ?>" class="header_link">新着情報</a></li>
                 <li class="header_item contact_link_btn"><a href="<?php echo esc_url(home_url('/contact/')); ?>" class="header_link">お問い合わせ</a></li>
             </ul>
         </nav>
         <h1 class="header_logo"><a href="<?php echo esc_url(home_url('/')); ?>" class="header_logo_link">CONTROLLER LAB</a></h1>
         <nav class="header_nav header_nav_right" aria-label="ユーティリティ">
             <ul class="header_list header_list_right">
                 <li class="header_item">
                     <a href="" class="header_link header_link_icon cart_link_btn">
                         <span class="header_link_text">カート</span>
                         <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/shopping.png" alt="">
                     </a>
                 </li>
                 <li class="header_item">
                     <a href="<?php echo esc_url(home_url('/login/')); ?>" class="header_link header_link_icon login_link_btn">
                         <span class="header_link_text">ログイン</span>
                         <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/login.png" alt="">
                     </a>
                 </li>
             </ul>
         </nav>
         <button class="hamburger_btn" type="button" aria-controls="header_drawer" aria-expanded="false"
             aria-label="メニュー">
             <span class="hamburger_btn_line"></span>
             <span class="hamburger_btn_line"></span>
             <span class="hamburger_btn_line"></span>
         </button>
     </div>
     <div class="header_drawer" id="header_drawer">
         <nav class="header_drawer_nav" aria-label="スマホメニュー">
             <ul class="header_drawer_list header_drawer_list_main">
                 <li class="header_drawer_item"><a href="<?php echo esc_url(home_url('/')); ?>" class="header_drawer_link home_linl_btn">ホーム</a></li>
                 <li class="header_drawer_item"><a href="<?php echo esc_url(get_post_type_archive_link('products')); ?>" class="header_drawer_link product_link_btn">商品一覧</a></li>
                 <li class="header_drawer_item"><a href="" class="header_drawer_link news_link_btn">新着情報</a></li>
                 <li class="header_drawer_item"><a href="<?php echo esc_url(home_url('/contact/')); ?>" class="header_drawer_link contact_link_btn">お問い合わせ</a>
                 </li>
             </ul>
             <ul class="header_drawer_list header_drawer_list_sub">
                 <li class="header_drawer_item"><a href="" class="header_drawer_link cart_link_btn">カート</a></li>
                 <li class="header_drawer_item"><a href="" class="header_drawer_link login_link_btn">ログイン</a></li>
             </ul>
         </nav>
     </div>
 </header>