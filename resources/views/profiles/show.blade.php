@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="jumbotron">
          <h1>{{ $user->name }}</h1>
          <br>
          @if ($user->id != Auth::user()->id)
          <p>
            @if (!Auth::user()->follows->contains($user))
            <a class="btn btn-primary btn-lg" href="{{ route('follow',['id' => $user->id]) }}" role="button">Follow</a>
            @else
            <a class="btn btn-danger btn-lg" href="{{ route('unfollow',['id' => $user->id]) }}" role="button">Stop Following</a>
            @endif
          </p>
          @endif

          <a href="{{ route('profile/follows', ['id' => $user->id]) }}">Following <span class="label label-default">{{ $user->follows->count() }}</span> </a>
          <a href="{{ route('profile/followers', ['id' => $user->id]) }}">Followers <span class="label label-default">{{ $user->followers->count() }}</span> </a>
        </div>
        @if (session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
        @endif
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Feed</h3>
          </div>
          <div class="panel-body">
            @if (isset($comments))
            <ul class="media-list">
              @foreach ($comments as $comment)
              <li class="media">
                <div class="media-body">
                  <h4 class="media-heading">
                    <a href="{{ route('profile', ['id' => $comment->user->id]) }}">
                      {{ $comment->user->name }}
                    </a>
                  </h4>
                  {{ $comment->text }}
                </div>
              </li><hr>
              @endforeach
            </ul>
            <div class="text-center">
              {{ $comments->links() }}
            </div>
            @else
            <p>Login and make your first comment!</p>
            @endif
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
