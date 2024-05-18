@extends('profile.layouts.profile')
@section('title')
    {{ $user->name.' '.$user->lastname }}
@endsection
@section('content')
    <div class="container">
        <div class="mt-5 mb-3 bg-body-tertiary rounded-3 col-xl-12 mx-auto">
            @include('profile.include.index.profileHeader')
        </div>
        <div class="rounded-3 col-xl-12 mx-auto">
            <div class="row align-items-start mx-auto">
                @include('profile.include.menu')
                <div class="rounded-3 col-xl-6">
                    @include('profile.include.index.profileInfo')
                    @if(Auth::user()->id == $user->id)
                    @livewire('post.create-post')
                    @endif
                    @livewire('post.post-manager', ['userId' => $user->id])
                </div>
                <div class="bg-body-tertiary rounded-3 col-xl-3 ms-2 pb-3 text-center">
                    @include('profile.include.index.subscriptions')
                    @include('profile.include.index.allUsers')
                </div>
            </div>
        </div>
    </div>
@endsection
