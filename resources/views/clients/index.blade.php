@extends('layouts.app')

@section('content')

<div class="row">
      <div class="medium-12 large-12 columns">
        <h4>Clients</h4>
        <div class="medium-2  columns"><a class="button hollow success" href="{{ route('new_clients') }}">ADD NEW CLIENT</a></div>


        @if ( count($clients) == 0 )
          <span>No clients found.</span>
        @else

        <table class="stack">
          <thead>
            <tr>
              <th width="200">Name</th>
              <th width="200">Email</th>
              <th width="200">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($clients as $client)
              <tr>
                <td>{{ ucfirst( $client->title )  }}. {{ $client->name }} {{ $client->last_name }}</td>
                <td>{{ $client->email }}</td>
                <td>
                  <a class="hollow button" href="{{ route('show_clients', ['id' => $client->id]) }}">EDIT</a>
                  <a class="hollow button warning" href="{{ route('reservations', ['user_id' =>$client->id]) }}">BOOK A ROOM</a>
                </td>
              </tr>
              @endforeach

                      </tbody>
        </table>

        @endif

      </div>
    </div>

@endsection