@extends('layouts.app')

@section('content')
  <header class="sans-serif">
    <div class="cover bg-left bg-center-l" style="background-image: url(https://api.mapbox.com/styles/v1/davekiss/cj4zw77tu13jn2sqo7xuhsl35/static/-81.695124,41.415285,9.00,0.00,0.00/1000x500@2x?access_token=pk.eyJ1IjoiZGF2ZWtpc3MiLCJhIjoiY2owNjAxZW5iMGt4MDMzcDMxZTRhYWdreiJ9.Ta-pzKAzPcFZ0aP0tjrP5Q)">
      <div class="bg-black-80 pb5 pb6-m pb7-l">
        <nav class="dt w-100 mw8 center">
          <div class="dtc w2 v-mid pa3">
            <a href="{{ home_url('/') }}" class="dib w2 h2 pa1 ba b--white-90 grow-large border-box">
              <svg class="link white-90 hover-white" data-icon="skull" viewBox="0 0 32 32" style="fill:currentcolor"><title>skull icon</title><path d="M16 0 C6 0 2 4 2 14 L2 22 L6 24 L6 30 L26 30 L26 24 L30 22 L30 14 C30 4 26 0 16 0 M9 12 A4.5 4.5 0 0 1 9 21 A4.5 4.5 0 0 1 9 12 M23 12 A4.5 4.5 0 0 1 23 21 A4.5 4.5 0 0 1 23 12"></path></svg>
            </a>
          </div>
          <div class="dtc v-mid tr pa3">
            <a class="f6 fw4 hover-white no-underline white-70 dn dib-ns pv2 ph3" href="/meetup-groups">Meetup Groups</a>
            <a class="f6 fw4 hover-white no-underline white-70 dn dib-ns pv2 ph3" href="/sponsors">Sponsors</a>
            <a class="f6 fw4 hover-white no-underline white-70 dn dib-ns pv2 ph3" href="/events">Events</a>
            <a class="f6 fw4 hover-white no-underline white-70 dn dib-ns pv2 ph3" href="/contact">Contact</a>
            <a class="f6 fw4 hover-white no-underline white-70 dib ml2 pv2 ph3 ba" href="/sign-in">Sign In</a>
          </div>
        </nav>
        <div class="tc-l mt4 mt5-m mt6-l ph3">
          <h1 class="f2 f1-l white-90 mb0 lh-title b">Code Cleveland</h1>
          <h2 class="fw1 f3 white-80 mt3 mb4">Supporting the Cleveland tech community.</h2>
          <a class="f6 no-underline grow dib v-mid bg-blue white ba b--blue ph3 pv2 mb3" href="/join">Create a Profile</a>
          <span class="dib v-mid ph3 white-70 mb3">or</span>
          <a class="f6 no-underline grow dib v-mid white ba b--white ph3 pv2 mb3" href="">Learn More</a>
        </div>
      </div>
    </div>
  </header>
@endsection
