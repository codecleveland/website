@extends('layouts.app')

@section('content')
  <section class="mw7 center avenir">
    <h2 class="baskerville fw1 ph3 ph0-l">Meetup Groups</h2>

    @while(have_posts()) @php(the_post())
      <article class="bt bb b--black-10">
        <a class="db pv4 ph3 ph0-l no-underline black dim" href="{{ get_permalink() }}">
          <div class="flex flex-column flex-row-ns">
            <div class="pr3-ns mb4 mb0-ns w-100 w-40-ns">
              <img src="{{ get_the_post_thumbnail_url() }}" class="db" alt="{{ get_the_title() }}">
            </div>
            <div class="w-100 w-60-ns pl3-ns">
              <h1 class="f3 fw1 baskerville mt0 lh-title">{{ get_the_title() }}</h1>
              <p class="f6 f5-l lh-copy">@php(the_excerpt())</p>
            </div>
          </div>
        </a>
      </article>
    @endwhile
  </section>

@endsection
