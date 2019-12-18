@extends('layouts.app')

@section('content')


<div class="container">
    <div class="card">
        	@include('partials.discussion-header')
        <div class="card-body">
        <div class="text-center">
        	<strong>
        		   {!!$discussion->title!!}
        	</strong>
        </div>
        </div>
        <hr>
       <div class="card-body">
            {!!$discussion->content!!}
            @if($discussion->bestReply)
                <div class="card bg-success my-3" style="color:white;">
                    <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <div>
                            <img width="50px" height="px" style="border-radius:50%" class="mr-2" src="{{Gravatar::src($discussion->bestReply->owner->email)}}" alt="">
                            <strong>
                                {{$discussion->bestReply->owner->name}}
                            </strong>
                        </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {!!$discussion->bestReply->content!!}
                    </div>
                </div>       
            @endif
       </div>
    </div>

    @foreach($discussion->replies()->paginate(2) as $reply)
        <div class="card my-5">
            <div class="card-header">
                 <div class="d-flex justify-content-between">
                <div>
                    <img width="40px" height="40px" style="border-radius: 50%" src="{{Gravatar::src($reply->owner->email)}}" alt="">
                    <span>{{$reply->owner->name}}</span>
                </div>
                <div>
                @if(auth()->user()->id == $discussion->user_id)
                <form action="{{route('discussions.best-reply',['discussion'=>$discussion->slug,'reply'=>$reply->id])}}" method="post">
                    @csrf
                  <button type="submit" class="btn btn-sm btn-primary">Upvote</button>
                </form>
                @endif
            </div>
            </div>
            </div> 
            <div class="card-body">
                {!!$reply->content!!}
            </div>
        </div>
    @endforeach

     {{$discussion->replies()->paginate(2)->links()}}

    <div class="card my-5">
        <div class="card-header">Add Reply</div>
    @auth
        
        <div class="card-body">
            <form action="{{ route('replies.store',$discussion->slug)}}" method="post">
                @csrf
                <input type="hidden" name="content" id="content">
                <trix-editor input="content"></trix-editor>
               <div class="text-center">
                    <button class="btn-success btn-sm my-2" type="submit">Add Reply</button>
               </div>
            </form>
        </div>
    </div>
    @else
        <a href="{{route('login')}}" class="btn btn-info my-2">Sign In to Reply</a>
    @endauth
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
@endsection
