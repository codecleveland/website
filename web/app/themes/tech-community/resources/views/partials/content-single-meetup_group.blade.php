<article class="mw5 mw7-ns center pa3 pa5-ns tc">
  <div class="f3 lh-copy">
    @if($meetup)

      <header class="tc pv4 pv5-ns">
        @if( ! empty( $meetup->group_photo ) )
          <img src="{{$meetup->group_photo->photo_link}}" class="br-100 pa1 ba b--black-10 h3 w3" alt="avatar">
        @endif
        <h1 class="f5 f4-ns fw6 mid-gray"><a href="{{$meetup->link}}" title="{{$meetup->name}}">{{$meetup->name}}</a></h1>
        <h2 class="f6 gray fw2 ttu tracked">A group of {{$meetup->members}} {{$meetup->who}} <br />{!! $meetup->description !!}</h2>
      </header>

      @if ( ! empty( $meetup->next_event ) )
        <h2>Check out our next event!</h2>

        <section class="ph3 ph5-ns pb5">
          <article class="mw8 center br2 ba b--light-blue bg-lightest-blue">
            <div class="dt-ns dt--fixed-ns w-100">
              <div class="pa3 pa4-ns dtc-ns v-mid">
                <div>
                  <h2 class="f4 fw4 blue mt0 mb3">{{$meetup->next_event->name}} </h2>
                  <p class="f6 black-70 measure lh-copy mv0">
                    {{ date('F j, Y @ g:i A', ($meetup->next_event->time + $meetup->next_event->utc_offset) / 1000) }} <br /> There are currently {{$meetup->next_event->yes_rsvp_count}} people planning on going.
                  </p>
                </div>
              </div>
              <div class="pa3 pa4-ns dtc-ns v-mid">
                <a href="https://meetup.com/{{$meetup->urlname}}/events/{{$meetup->next_event->id}}" title="RSVP for {{$meetup->next_event->name}} on Meetup.com" class="no-underline f6 tc db w-100 pv3 bg-animate bg-blue hover-bg-dark-blue white br2">RSVP for free</a>
              </div>
            </div>
          </article>
        </section>
      @endif

      @if ( ! empty( $meetup->event_sample ) )
        <div class="pv2">
          <h2>Here are some of our recent meetups.</h2>

          @foreach($meetup->event_sample as $event)
            <a href="https://meetup.com/{{$meetup->urlname}}/events/{{$event->id}}" title="View {{$event->name}} on Meetup.com">
              {{$event->name}}
            </a>

            @if($event->photo_album->photo_count > 0)
              @foreach($event->photo_album->photo_sample as $photo)
                <div class="aspect-ratio aspect-ratio--16x9 mb4">
                  <div class="aspect-ratio--object cover" style="background:url({{$photo->photo_link}}) center;"></div>
                </div>
              @endforeach
            @endif
          @endforeach
        </div>
      @endif

      @if ( ! empty( $meetup->member_sample ) )
        <div class="pv2">
          <h2>A few of the people you'll meet.</h2>
          <div style="font-size: 0;">
            @foreach($meetup->member_sample as $member)
              @if( ! isset($member->photo) )
                @continue
              @endif

              <a href="https://meetup.com/{{$meetup->urlname}}/members/{{$member->id}}" title="View {{$member->name}} on Meetup.com" class="tc pa3 dib link w-20 v-top">
                <img src="{{$member->photo->thumb_link}}" class="br-100 pa1 ba b--black-10 h3 w3" alt="avatar">
                <p class="f6 ma0">{{$member->name}}</p>
              </a>
            @endforeach
          </div>
        </div>
      @endif

      <h2>This group is organized by:</h2>
      <div class="mw5 center bg-white br3 pa3 pa4-ns mv3 ba b--black-10">
        <div class="tc">
          <img src="{{$meetup->organizer->photo->thumb_link}}" class="br-100 h4 w4 dib ba b--black-05 pa2" title="{{$meetup->organizer->name}}">
          <h1 class="f3 mb2">{{$meetup->organizer->name}}</h1>
          <h2 class="f5 fw4 gray mt0">Meetup Organizer</h2>
        </div>
      </div>
    @endif
  </div>
</article>
