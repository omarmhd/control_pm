@extends('base_layout.master_layout')

@section('title','edit client')
@section('content')

<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-equalizer font-blue-hoki"></i>
            <span class="caption-subject font-blue-hoki bold uppercase">Update Client</span>
            {{-- <span class="caption-helper">Add Provider</span> --}}
        </div>

    </div>
    <div class="portlet-body form" style="display: block;">
        @php
           $route = route('admin.client.update',['id'=>$user->id])
        @endphp
        @include('admin.client.fileds',['action'=>"$route",'updateForm'=>'updateForm'])
    </div>
</div>
@endsection