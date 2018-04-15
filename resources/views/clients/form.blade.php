@extends('layouts.app')

@section('content')

    <div class="row">
      <div class="medium-12 large-12 columns">
        <h4>{{ $modify == 1 ? 'Modify Client' : 'New Client' }}</h4>
        <form action="{{ $modify == 1 ? route('modify_clients', $id) : route('create_clients')  }}" method="post">
        {{ csrf_field() }}
          <div class="medium-4  columns">
            <label>Title</label>
            <select name="title">            
              <option value="mr">Mr.</option>
            </select>
          </div>
          <div class="medium-4  columns">
            <label>Name</label>
            <input name="name" value="{{ $name }}" type="text" />
          </div>
          <div class="medium-4  columns">
            <label>Last Name</label>
            <input name="last_name" value="{{ $last_name }}" type="text" />
          </div>
          <div class="medium-8  columns">
            <label>Address</label>
            <input name="address" value="{{ $address }}" type="text" />
          </div>
          <div class="medium-4  columns">
            <label>zip_code</label>
            <input name="zip_code" value="{{ $zip_code }}" type="text" />
          </div>
          <div class="medium-4  columns">
            <label>City</label>
            <input name="city" value="{{ $city }}" type="text" />
          </div>
          <div class="medium-4  columns">
            <label>State</label>
            <input name="state" value="{{ $state }}" type="text" />
          </div>
          <div class="medium-12  columns">
            <label>Email</label>
            <input name="email" value="{{ $email }}" type="text" />
          </div>
          <div class="medium-12  columns">
            <input type="submit" value="SAVE" class="button success hollow" />
          </div>
        </form>
      </div>
    </div>

@endsection
