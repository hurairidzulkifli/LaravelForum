@extends('layouts.app')

@section('content')


<div class="container">
    
    @foreach($discussions as $discussion)
		<div class="card">
            @include('partials.discussion-header')
        <div class="card-body">
         <div class="text-center">
              <strong>
                {!!$discussion->title!!}
              </strong>
         </div>
        </div>
    </div>
    @endforeach

    {{ $discussions->links()}}
</div>
@endsection
