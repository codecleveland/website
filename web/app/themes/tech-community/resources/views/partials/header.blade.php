<?php if ( ! is_front_page() ) : ?>
  <nav class="db dt-l w-100 border-box pa3 ph5-l">
    <a class="db dtc-l v-mid mid-gray link dim w-100 w-25-l tc tl-l mb2 mb0-l" href="/" title="Home">
      <img src="http://tachyons.io/img/logo.jpg" class="dib w2 h2 br-100" alt="Code Cleveland">
    </a>
    <div class="db dtc-l v-mid w-100 w-75-l tc tr-l">
      <a class="link dim dark-gray f6 f5-l dib mr3 mr4-l" href="/meetup-groups" title="Meetup Groups">Meetup Groups</a>
      <a class="link dim dark-gray f6 f5-l dib mr3 mr4-l" href="/sponsors" title="Sponsors">Sponsors</a>
      <a class="link dim dark-gray f6 f5-l dib mr3 mr4-l" href="/events" title="Events">Events</a>
      <a class="link dim dark-gray f6 f5-l dib mr3 mr4-l" href="/contact" title="Contact">Contact</a>
      <?php if ( is_user_logged_in() ) : ?>
        <a class="link dim dark-gray f6 f5-l dib" href="<?php echo wp_logout_url( home_url() ); ?>" title="Sign Out">Sign Out</a>
      <?php else: ?>
        <a class="link dim dark-gray f6 f5-l dib" href="/sign-in" title="Sign In">Sign In</a>
      <?php endif; ?>
    </div>
  </nav>
<?php endif; ?>
