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
              <li class="pv3 ph3 bb b--black-05"><a class="f5 fw6 db black link hover-blue" href="/directory">Directory</a></li>
              <li class="pv3 ph3 bb b--black-05"><a class="f5 fw6 db black link hover-blue" href="/meetup-groups">Meetup Groups</a></li>
              <li class="pv3 ph3 bb b--black-05"><a class="f5 fw6 db black link hover-blue" href="/workspaces">Workspaces</a></li>
              <li class="pv3 ph3 bb b--black-05"><a class="f5 fw6 db black link hover-blue" href="/jobs">Jobs</a></li>
              <li class="pv3 ph3 bb b--black-05"><a class="f5 fw6 db black link hover-blue" href="/podcast">Podcast</a></li>
              <li class="pv3 ph3"><a class="f5 fw6 db black link hover-blue" href="/slack">Slack</a></li>
            </ul>

            <a class="menu-item has-submenu f6 fw4 hover-white no-underline white-70 dn dib-ns pv2 ph3" href="/events">Events</a>
            <ul class="submenu list ma0 pa0 tc">
              <li class="pv3 ph3 bb b--black-05"><a class="f5 fw6 db black link hover-blue" href="/calendar">Calendar</a></li>
              <li class="pv3 ph3"><a class="f5 fw6 db black link hover-blue" href="/happy-hour">Happy Hour</a></li>
            </ul>

            <a class="menu-item has-submenu f6 fw4 hover-white no-underline white-70 dn dib-ns pv2 ph3" href="/about">About</a>
            <ul class="submenu list ma0 pa0 tc">
              <li class="pv3 ph3 bb b--black-05"><a class="f5 fw6 db black link hover-blue" href="/manifesto">Manifesto</a></li>
              <li class="pv3 ph3 bb b--black-05"><a class="f5 fw6 db black link hover-blue" href="/newsletter">Newsletter</a></li>
              <li class="pv3 ph3 bb b--black-05"><a class="f5 fw6 db black link hover-blue" href="/blog">Blog</a></li>
              <li class="pv3 ph3 bb b--black-05"><a class="f5 fw6 db black link hover-blue" href="/sponsors">Sponsors</a></li>
              <li class="pv3 ph3 bb b--black-05"><a class="f5 fw6 db black link hover-blue" href="/volunteer">Volunteer</a></li>
              <li class="pv3 ph3"><a class="f5 fw6 db black link hover-blue" href="/contact">Contact</a></li>
            </ul>

            <a class="menu-item has-submenu f6 fw4 hover-white no-underline white-70 dn dib-ns pv2 ph3" href="/learn">Learn to Code</a>
            <ul class="submenu list ma0 pa0 tc">
              <li class="pv3 ph3 bb b--black-05"><a class="f5 fw6 db black link hover-blue" href="/resources">Resources</a></li>
              <li class="pv3 ph3 bb b--black-05"><a class="f5 fw6 db black link hover-blue" href="/bootcamps">Bootcamps</a></li>
              <li class="pv3 ph3"><a class="f5 fw6 db black link hover-blue" href="/workshops">Workshops</a></li>
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
  <div class="dt mw9 center pt0 pb5 pv5-m pv5-ns">
    <div class="db dtc-ns v-mid ph2 pr2-ns pl3-ns measure fl w-100 w-50-ns pa2">
      <h3 class="f3 fw7 ttu tracked lh-title mt0 mb3 avenir">For the dev community, <br />by the dev community</h3>
      <p class="f4 lh-copy">
        At our core, Code Cleveland is about building the community. We strive to bring people together from different backgrounds, disciplines, and skill levels to share their ideas, learn about new topics, and create lasting relationships.
      </p>
      <p class="f4 lh-copy">
        We started this initiative to connect bright minds and provide an outlet for those who leverage technology to make Cleveland a better place.
      </p>
    </div>
    <div class="db dtc-ns v-mid-ns fl w-100 w-50-ns pa2">
      <img src="@asset('images/community.jpg')" alt="Community" class="w-100 mw6" />
    </div>
  </div>

  <div class="dt mw9 center pt0 pb5 pv5-m pv5-ns">
    <div class="db dtc-ns v-mid-ns fl w-100 w-50-ns pa2">
      <img src="@asset('images/two-men-working.jpg')" alt="Get things done" class="w-100 mw6" />
    </div>
    <div class="db dtc-ns v-top ph2 pr2-ns pl3-ns measure fl w-100 w-50-ns pa2">
      <h3 class="f3 fw7 ttu tracked lh-title mt0 mb3 avenir">Get Things Done</h3>
      <p class="f4 lh-copy">
        Looking for work? Our <a href="/jobs" title="Cleveland Tech Job Board" class="link dim blue">local job board</a> lists some of the open positions available in the Cleveland tech community.
      </p>
      <p class="f4 lh-copy">
        Whether you need an office for a day or a month, <a href="/workspaces" title="Cleveland Tech Coworking Spaces" class="link dim blue">our partner workspaces around town</a> provide a friendly environment to focus on your productivity.
      </p>
    </div>
  </div>

  <div class="dt mw9 center pt0 pb5 pv5-m pv5-ns">
    <div class="db dtc-ns v-mid ph2 pr2-ns pl3-ns measure fl w-100 w-50-ns pa2">
      <h3 class="f3 fw7 ttu tracked lh-title mt0 mb3 avenir">Learn to Code</h3>
      <p class="f4 lh-copy">
        We were all beginners once. Take advantage of our <a href="/resources" title="Cleveland Code Resources" class="link dim blue">resources</a>, sign up for a <a href="/workshops" title="Cleveland Code Workshops" class="link dim blue">workshop</a>, or <a href="/bootcamps" title="Cleveland Code Bootcamps" class="link dim blue">enroll in a partner bootcamp.</a>
      </p>
    </div>
    <div class="db dtc-ns v-mid-ns fl w-100 w-50-ns pa2">
      <img src="@asset('images/coding.jpg')" alt="Learn to Code" class="w-100 mw6" />
    </div>
  </div>

  <div class="vh-25 vh-50-m vh-75-ns bg-light-pink dt w-100">
    <div 
      style="background:url(@asset('images/rock-and-roll-hall-of-fame.jpg')) no-repeat center right;background-size: cover;" 
      class="dtc v-top cover pt4 pb3 ph4-m ph5-l">
      <h1 class="f2 f-subheadline-l measure lh-title fw7 avenir ttu tracked">(Re)discover Cleveland</h1>
      <h2 class="f3 fw6 pv4 ph5 black measure-wide lh-copy bg-white-40">A lot has changed around here over the past few years. Check out our <a href="/happy-hour" title="Cleveland Code Happy Hour" class="link dim blue">monthly Happy Hour</a>, <a href="/events" title="Cleveland Code Events" class="link dim blue">free events</a> and <a href="/meetup-groups" title="Cleveland Code Meetups" class="link dim blue">meetup groups</a> and come say hi and see what's new.</h2>
    </div>
  </div>

  <div class="dt mw9 center pt0 pb5 pv5-m pv5-ns">
    <div class="db dtc-ns v-mid ph2 pr2-ns pl3-ns measure fl w-100 w-50-ns pa2">
      <h3 class="f3 fw7 ttu tracked lh-title mt0 mb3 avenir">Want to Get Involved?</h3>
      <p class="f4 lh-copy">
        We're looking for help with volunteers and sponsors to make Cleveland a better place to work in tech. <a href="/contact" title="Contact Cleveland Code" class="link dim blue">Contact us</a> if you'd like to get involved.
      </p>
    </div>
    <div class="db dtc-ns v-mid-ns fl w-100 w-50-ns pa2">
      <img src="@asset('images/desk-2.jpg')" alt="Want to Get Involved?" class="w-100 mw6" />
    </div>
  </div>

  <div class="pa4-l">
    <form class="bg-light-red mw7 center pa4 br2-ns ba b--black-10" action="//codecleveland.us16.list-manage.com/subscribe/post?u=d7868e3e3fb9d333bb67f08b6&amp;id=a85a7d6397">
      <fieldset class="cf bn ma0 pa0">
        <legend class="pa0 f5 f4-ns mb3 black-80">Sign up for our newsletter</legend>
        <div class="cf">
          <label class="clip" for="email-address">Email Address</label>
          <input class="f6 f5-l input-reset bn fl black-80 bg-white pa3 lh-solid w-100 w-75-m w-80-l br2-ns br--left-ns" placeholder="Your Email Address" type="text" name="email-address" value="" id="email-address">
          <input class="f6 f5-l button-reset fl pv3 tc bn bg-animate bg-black-70 hover-bg-black white pointer w-100 w-25-m w-20-l br2-ns br--right-ns" type="submit" value="Subscribe">
        </div>
      </fieldset>
    </form>
  </div>
@endsection
