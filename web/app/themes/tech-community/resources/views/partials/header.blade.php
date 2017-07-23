<?php if ( ! is_front_page() ) : ?>
  <nav class="db dt-l w-100 border-box pa3 ph5-l">
    <a class="db dtc-l v-mid mid-gray link dim w-100 w-25-l tc tl-l mb2 mb0-l" href="/" title="Home">
      <img src="http://tachyons.io/img/logo.jpg" class="dib w2 h2 br-100" alt="Code Cleveland">
    </a>
    <div class="db dtc-l v-mid w-100 w-75-l tc tr-l">
      <a class="menu-item has-submenu link dim dark-gray f6 f5-l dib mr3 mr4-l" href="/community">Community</a>
      <ul class="submenu list ma0 pa0 tc">
        <li class="pv3 bb b--black-05"><a class="f5 fw6 db black link hover-blue" href="/directory">Directory</a></li>
        <li class="pv3 bb b--black-05"><a class="f5 fw6 db black link hover-blue" href="/meetup-groups">Meetup Groups</a></li>
        <li class="pv3 bb b--black-05"><a class="f5 fw6 db black link hover-blue" href="/workspaces">Workspaces</a></li>
        <li class="pv3 bb b--black-05"><a class="f5 fw6 db black link hover-blue" href="/jobs">Jobs</a></li>
        <li class="pv3 bb b--black-05"><a class="f5 fw6 db black link hover-blue" href="/podcast">Podcast</a></li>
        <li class="pv3"><a class="f5 fw6 db black link hover-blue" href="/slack">Slack</a></li>
      </ul>

      <a class="menu-item has-submenu link dim dark-gray f6 f5-l dib mr3 mr4-l" href="/events">Events</a>
      <ul class="submenu list ma0 pa0 tc">
        <li class="pv3 bb b--black-05"><a class="f5 fw6 db black link hover-blue" href="/calendar">Calendar</a></li>
        <li class="pv3"><a class="f5 fw6 db black link hover-blue" href="/happy-hour">Happy Hour</a></li>
      </ul>

      <a class="menu-item has-submenu link dim dark-gray f6 f5-l dib mr3 mr4-l" href="/about">About</a>
      <ul class="submenu list ma0 pa0 tc">
        <li class="pv3 bb b--black-05"><a class="f5 fw6 db black link hover-blue" href="/manifesto">Manifesto</a></li>
        <li class="pv3 bb b--black-05"><a class="f5 fw6 db black link hover-blue" href="/newsletter">Newsletter</a></li>
        <li class="pv3 bb b--black-05"><a class="f5 fw6 db black link hover-blue" href="/blog">Blog</a></li>
        <li class="pv3 bb b--black-05"><a class="f5 fw6 db black link hover-blue" href="/sponsors">Sponsors</a></li>
        <li class="pv3 bb b--black-05"><a class="f5 fw6 db black link hover-blue" href="/volunteer">Volunteer</a></li>
        <li class="pv3"><a class="f5 fw6 db black link hover-blue" href="/contact">Contact</a></li>
      </ul>

      <a class="menu-item has-submenu link dim dark-gray f6 f5-l dib mr3 mr4-l" href="/learn">Learn to Code</a>
      <ul class="submenu list ma0 pa0 tc">
        <li class="pv3 bb b--black-05"><a class="f5 fw6 db black link hover-blue" href="/resources">Resources</a></li>
        <li class="pv3 bb b--black-05"><a class="f5 fw6 db black link hover-blue" href="/bootcamps">Bootcamps</a></li>
        <li class="pv3"><a class="f5 fw6 db black link hover-blue" href="/workshops">Workshops</a></li>
      </ul>

      <a class="menu-item link dim dark-gray f6 f5-l dib mr3 mr4-l" href="/shop">Apparel</a>

      <?php if ( is_user_logged_in() ) : ?>
        <a class="link dim dark-gray f6 f5-l dib" href="<?php echo wp_logout_url( home_url() ); ?>" title="Sign Out">Sign Out</a>
      <?php else: ?>
        <a class="link dim dark-gray f6 f5-l dib" href="/sign-in" title="Sign In">Sign In</a>
      <?php endif; ?>
    </div>
  </nav>
<?php endif; ?>
