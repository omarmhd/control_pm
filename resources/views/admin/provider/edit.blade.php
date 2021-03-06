@extends('base_layout.master_layout')

@section('title','Edit provider')
@section('content')

<div class="portlet light bordered">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-equalizer font-blue-hoki"></i>
            <span class="caption-subject font-blue-hoki bold uppercase">Update Provider</span>
            {{-- <span class="caption-helper">Add Provider</span> --}}
        </div>

    </div>
    <div class="portlet-body form" style="display: block;">
        @php
           $route = route('admin.provider.update',['id'=>$user->id])
        @endphp
        @include('admin.provider.fileds',['action'=>"$route",'updateForm'=>'updateForm'])
    </div>
</div>
@endsection
