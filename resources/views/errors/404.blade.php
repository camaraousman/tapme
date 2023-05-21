@extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')

<div style="margin-left: 40%;">
    <a href="{{url()->previous()}}" class="text-center" style="text-decoration: underline; color: blue;"><-- {{__('Go back')}}</a>
</div>
@section('message', __('Not Found'))
