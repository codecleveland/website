<article @php(post_class())>
  <header>
    <h1 class="f1 lh-title tc">{{ get_the_title() }}</h1>
    <time class="f2 lh-copy tc">
      <?php
        $date = get_field('event-date', false, false);
        $date = new DateTime($date);
        echo $date->format('l, F jS, Y');
      ?>
    </time>
  </header>
  <div class="f3 lh-copy">
    @php(the_content())
  </div>
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
  @php(comments_template('/partials/comments.blade.php'))
</article>
