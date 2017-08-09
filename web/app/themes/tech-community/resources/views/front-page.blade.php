@extends('layouts.app')

@section('content')
  <header class="sans-serif">
    <div class="cover bg-left bg-center-l" style="background-image: url(@asset('images/cleveland-skyline-header.jpg'))">
      <div class="bg-black-80 pb5 pb6-m pb7-l">
        <nav class="dt w-100 mw8 center">
          <div class="dtc w2 v-mid pa3">
            <a href="{{ home_url('/') }}" class="dib w2 h2 pa1 ba b--white-90 grow-large border-box">
              <svg class="link white-90 hover-white" data-icon="skull" viewBox="0 0 32 32" style="fill:currentcolor"><title>skull icon</title><path d="M16 0 C6 0 2 4 2 14 L2 22 L6 24 L6 30 L26 30 L26 24 L30 22 L30 14 C30 4 26 0 16 0 M9 12 A4.5 4.5 0 0 1 9 21 A4.5 4.5 0 0 1 9 12 M23 12 A4.5 4.5 0 0 1 23 21 A4.5 4.5 0 0 1 23 12"></path></svg>
            </a>
          </div>
          <div class="dtc v-mid tr pa3">
            <a class="menu-item has-submenu f6 fw4 hover-white no-underline white-70 dn dib-ns pv2 ph3" href="/community">Community</a>
            <ul class="submenu list ma0 pa0 tc">
              <li class="pv3 bb b--black-05"><a class="f5 fw6 db black link hover-blue" href="/directory">Directory</a></li>
              <li class="pv3 bb b--black-05"><a class="f5 fw6 db black link hover-blue" href="/meetup-groups">Meetup Groups</a></li>
              <li class="pv3 bb b--black-05"><a class="f5 fw6 db black link hover-blue" href="/workspaces">Workspaces</a></li>
              <li class="pv3 bb b--black-05"><a class="f5 fw6 db black link hover-blue" href="/jobs">Jobs</a></li>
              <li class="pv3 bb b--black-05"><a class="f5 fw6 db black link hover-blue" href="/podcast">Podcast</a></li>
              <li class="pv3"><a class="f5 fw6 db black link hover-blue" href="/slack">Slack</a></li>
            </ul>

            <a class="menu-item has-submenu f6 fw4 hover-white no-underline white-70 dn dib-ns pv2 ph3" href="/events">Events</a>
            <ul class="submenu list ma0 pa0 tc">
              <li class="pv3 bb b--black-05"><a class="f5 fw6 db black link hover-blue" href="/calendar">Calendar</a></li>
              <li class="pv3"><a class="f5 fw6 db black link hover-blue" href="/happy-hour">Happy Hour</a></li>
            </ul>

            <a class="menu-item has-submenu f6 fw4 hover-white no-underline white-70 dn dib-ns pv2 ph3" href="/about">About</a>
            <ul class="submenu list ma0 pa0 tc">
              <li class="pv3 bb b--black-05"><a class="f5 fw6 db black link hover-blue" href="/manifesto">Manifesto</a></li>
              <li class="pv3 bb b--black-05"><a class="f5 fw6 db black link hover-blue" href="/newsletter">Newsletter</a></li>
              <li class="pv3 bb b--black-05"><a class="f5 fw6 db black link hover-blue" href="/blog">Blog</a></li>
              <li class="pv3 bb b--black-05"><a class="f5 fw6 db black link hover-blue" href="/sponsors">Sponsors</a></li>
              <li class="pv3 bb b--black-05"><a class="f5 fw6 db black link hover-blue" href="/volunteer">Volunteer</a></li>
              <li class="pv3"><a class="f5 fw6 db black link hover-blue" href="/contact">Contact</a></li>
            </ul>

            <a class="menu-item has-submenu f6 fw4 hover-white no-underline white-70 dn dib-ns pv2 ph3" href="/learn">Learn to Code</a>
            <ul class="submenu list ma0 pa0 tc">
              <li class="pv3 bb b--black-05"><a class="f5 fw6 db black link hover-blue" href="/resources">Resources</a></li>
              <li class="pv3 bb b--black-05"><a class="f5 fw6 db black link hover-blue" href="/bootcamps">Bootcamps</a></li>
              <li class="pv3"><a class="f5 fw6 db black link hover-blue" href="/workshops">Workshops</a></li>
            </ul>

            <a class="menu-item f6 fw4 hover-white no-underline white-70 dn dib-ns pv2 ph3" href="/shop">Apparel</a>

            <?php if ( is_user_logged_in() ) : ?>
              // profile
              <a class="f6 fw4 hover-white no-underline white-70 dib ml2 pv2 ph3 ba" href="<?php echo wp_logout_url( home_url() ); ?>" title="Sign Out">Sign Out</a>
            <?php else: ?>
              <a class="f6 fw4 hover-white no-underline white-70 dib ml2 pv2 ph3 ba" href="/sign-in" title="Sign In">Sign In</a>
            <?php endif; ?>
          </div>
        </nav>
        <div class="tc-l mt4 mt5-m mt6-l ph3">
          <h1 class="f2 f1-l white-90 mb0 lh-title b">Code Cleveland</h1>
          <h2 class="fw1 f3 white-80 mt3 mb4">{{ get_bloginfo('description') }}</h2>
          <a class="f6 no-underline grow dib v-mid bg-blue white ba b--blue ph3 pv2 mb3" href="/join">Join the Community</a>
          <span class="dib v-mid ph3 white-70 mb3">or</span>
          <a class="f6 no-underline grow dib v-mid white ba b--white ph3 pv2 mb3" href="/manifesto">Learn More</a>
        </div>
      </div>
    </div>
  </header>
@endsection
