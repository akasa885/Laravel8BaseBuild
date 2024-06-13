@extends('layouts.app')

@section('content')
<x-app.content-container>
    <x-slot name="main">
        <x-app.toolbar-classic page-title="Dashboard" />
        <div class="card">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {{ __('You are logged in!') }}
            </div>
        </div>
    </x-slot>
</x-app.content-container>
@endsection
