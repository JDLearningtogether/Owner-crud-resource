@extends('layouts.app')

@section('content')

<div class="container">

    <h3 class="mb-4">
        เพิ่มเจ้าของกิจการ
    </h3>

    <form action="{{ route('owners.store') }}" method="POST">

        @include('owners._form')

    </form>

</div>

@endsection