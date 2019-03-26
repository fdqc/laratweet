@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="jumbotron">
          <h1>{{ $user->name }}</h1>
          <p>{{ $title }}</p>
        </div>

        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">{{ $title }}</h3>
          </div>
          <div class="panel-body">
            @if (isset($follows))
            <ul>
              @foreach ($follows as $follow)
              <li>
                {{ $follow->name }}
              </li>
              @endforeach
            </ul>
            @endif
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
