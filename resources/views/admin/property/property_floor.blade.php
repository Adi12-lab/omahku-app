@extends('layouts.admin')
@section('content')
<livewire:admin.property-floor.index :data="$property_floors" :property="$property"/>
    
@endsection
