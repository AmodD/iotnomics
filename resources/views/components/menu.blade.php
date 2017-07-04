

<aside class="column is-2 aside hero is-fullheight is-hidden-mobile">
      <div>
        <div class="main has-text-left">
          <div class="title">Menu</div>
          <a href="/dashboard" class="item {{{ ((Route::currentRouteName() == 'dashboard') ? 'active' : '')  }}}" ><span class="icon"><i class="fa fa-home"></i></span><span class="name">Dashboard</span></a>
          <a href="#" class="item"><span class="icon"><i class="fa fa-bank"></i></span><span class="name">Account</span></a>
          <a href="#" class="item"><span class="icon"><i class="fa fa-vcard"></i></span><span class="name">Wallet</span></a>
          <a href="#" class="item"><span class="icon"><i class="fa fa-hand-pointer-o"></i></span><span class="name">Buy</span></a>
          <a href="#" class="item"><span class="icon"><i class="fa fa-handshake-o"></i></span><span class="name">Sell</span></a>
          <a href="#" class="item"><span class="icon"><i class="fa fa-tasks"></i></span><span class="name">Order Book</span></a>
          <a href="#" class="item"><span class="icon"><i class="fa fa-navicon"></i></span><span class="name">Trade Book</span></a>
          <a href="#" class="item"><span class="icon"><i class="fa fa-question"></i></span><span class="name">Support</span></a>
          <div class="title"></div>
          <div class="title">Admin</div>
          <a href="/users" class="item {{{ ((Route::currentRouteName() == 'users') ? 'active' : '')  }}}"><span class="icon"><i class="fa fa-user-times"></i></span><span class="name">Users</span></a>
          <a href="/charts" class="item {{{ ((Route::currentRouteName() == 'charts') ? 'active' : '')  }}}"><span class="icon"><i class="fa fa-line-chart"></i></span><span class="name">Charts</span></a>
        </div>
      </div>
</aside>
