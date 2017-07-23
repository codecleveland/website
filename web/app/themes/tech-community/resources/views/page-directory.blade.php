@extends('layouts.app')

@section('content')
@if($users)
  <main class="mw6 center">
    @foreach($users as $user)
      <article class="dt w-100 bb b--black-05 pb2 mt2" href="#0">
        <div class="dtc w2 w3-ns v-mid">
          <img src="{{ get_avatar_url($user->ID) }}" class="ba b--black-10 db br2 w2 w3-ns h2 h3-ns"/>
        </div>
        <div class="dtc v-mid pl3">
          <h1 class="f6 f5-ns fw6 lh-title black mv0">{{$user->data->display_name}} </h1>
          <h2 class="f6 fw4 mt0 mb0 black-60">Member</h2>
        </div>
        <div class="dtc v-mid">
          <form class="w-100 tr">
            <button class="f6 button-reset bg-white ba b--black-10 dim pointer pv1 black-60" type="submit">+ Follow</button>
          </form>
        </div>
      </article>
    @endforeach
  </main>
@endif
@endsection
