@extends('layouts.app')

@section('content')
<div class="container">
    {{--<div class="row justify-content-center">--}}
        {{--<div class="col-md-8">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">Dashboard</div>--}}

                {{--<div class="card-body">--}}
                    {{--@if (session('status'))--}}
                        {{--<div class="alert alert-success" role="alert">--}}
                            {{--{{ session('status') }}--}}
                        {{--</div>--}}
                    {{--@endif--}}

                    {{--{{ $user->username }}, You are logged in!--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="row">
        <div class="col-md-4">
            <div class="rounded-circle"><img src="{{ $user->profile->profileImage()}}" alt="profile pic" class="p-5 rounded-circle w-100"></div>
        </div>
        <div class="col-md-8 pt-5">
            <div class="pb-3">
               <div class="d-flex justify-content-between align-items-baseline">
                   <div class="d-flex align-items-center">
                       <div class="h4 pr-3">{{ $user->username }}</div>
                       <button class="btn btn-primary">Follow</button>
                   </div>

                   @can('update',$user->profile)
                       <a href="/p/create">Add New Post</a>
                   @endcan
               </div>
                <div>
                    @can('update',$user->profile)
                        <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
                    @endcan
                </div>
                <div class="d-flex">
                    <div class="pr-3"><strong>215k</strong> Followers</div>
                    <div class="pr-3"><strong>25k</strong> Following</div>
                    <div class="pr-3"><strong>{{$user->posts->count()}}</strong> Posts</div>
                </div>
            </div>
            <div class="pb-2 ">
                <p>
                    {{ $user->profile->title }}
                </p>
            </div>
            <div class="pb-2 ">
                <p>
                    {{ $user->profile->description }}
                </p>
            </div>
            <div class="pb-2 ">
                <p>
                    {{ $user->profile->url }}
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($user->posts as $post)
        <div class="col-4 pb-4">
            <a href="/p/{{$post->id}}">
                <img src="/{{$post->image}}" class="w-100">
            </a>

        </div>
        @endforeach
    </div>
</div>
@endsection
