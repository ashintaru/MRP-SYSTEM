@extends('layouts.header')
@extends('layouts.app')
@section('container')
{{-- @livewire('products',['ids'=>$id]) --}}
<livewire:products :ids="$id" :wire:key="$loop->index">
@endsection
