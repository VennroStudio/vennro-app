@extends('profile.layouts.profile')
@section('title')
    Диалог
@endsection
@section('content')
    <div class="container mt-3">
        <div class="rounded-3 col-xl-12 mx-auto">
            <div class="row align-items-start mx-auto">
                @include('profile.include.menu')
                <div class="rounded-3 col-xl-6">
                    @livewire('messages.dialog-manager', ['dialogId' => $dialogId])
                </div>
                <div class="bg-body-tertiary rounded-3 col-xl-3 ms-2 pb-3 text-center">
                    вариации
                </div>
            </div>
        </div>
    </div>
@endsection
