@extends('layouts.app')

@section('content')
<article>
  <h2 class="f3 fw4 pa3 mv0">Meetup Groups</h2>
  <div class="cf pa2">
    @while(have_posts()) @php(the_post())
      <div class="fl w-50 w-25-m w-20-l pa2">
        <a href="{{ get_permalink() }}" class="db link dim tc">
          <img src="{{ get_the_post_thumbnail_url() }}" alt="{{ get_the_title() }}" class="w-100 db outline black-10"/>
          <dl class="mt2 f6 lh-copy">
            <dt class="clip">Name</dt>
            <dd class="ml0 black truncate w-100">{{ get_the_title() }}</dd>
            <dt class="clip">Description</dt>
            <dd class="ml0 gray truncate w-100">@php(the_excerpt())</dd>
          </dl>
        </a>
      </div>
    @endwhile
  </div>
</article>
@endsection
