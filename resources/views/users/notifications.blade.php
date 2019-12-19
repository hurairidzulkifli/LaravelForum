@extends('layouts.app')

@section('content')


<div class="container">
    
    <div class="card">
        <div class="card-header">Notifications</div>
        <div class="card-body">
           @foreach($notifications as $notification)
				<ul class="list-group">
					<li class="list-group-item">
						@if($notification->type ==  'LaravelForum\Notifications\NewReplyAdded')
							A new reply was added to your discussion
						{{-- 	{{$notification->data['discussion']['slug']}} --}}
							<a href="{{}}" class="btn btn-sm float-right btn-info">View Discussion</a>
						@endif
					</li>
				</ul>
           @endforeach
        </div>
    </div>
</div>
@endsection
