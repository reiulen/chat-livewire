@extends('layouts.app')

@section('content')
@section('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@livewire('home')
@section('script')
<script src="https://e-filling.smkn1ciamis.id/assets/plugins/jquery/jquery.min.js"></script>
<script src="https://e-filling.smkn1ciamis.id/assets/plugins/select2/js/select2.min.js"></script>
    <script>
        $('#nama').select2();
    </script>
@endsection
@endsection
