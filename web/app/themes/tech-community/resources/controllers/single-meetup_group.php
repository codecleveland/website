<?php

namespace App;

use Sober\Controller\Controller;

class Single_Meetup_Group extends Controller
{
  public function meetup() {

    $fields = array(
      'event_sample',
      'member_sample',
    );

    $omit = array(
      'localized_location',
      'localized_country_name',
      'lat',
      'lon',
      'state',
      'country',
      'city',
      'timezone',
      'category',
      'visibility',
      'join_mode',
    );

    $urlname = get_field('meetup.com_group_name');

    $args = array(
      'fields' => implode(',', $fields),
      'omit' => implode(',', $omit),
    );

    $query = http_build_query($args);
    $response = wp_remote_get('https://api.meetup.com/' . $urlname . '?' . $query);

    if ( is_array( $response ) ) {
      $details = json_decode($response['body']);
      return $details;
    }

    return false;
  }
}
