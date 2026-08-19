@extends('layouts.app')

@section('content')

<div class="container">

    <h3 class="mb-4">
        แก้ไขเจ้าของกิจการ
    </h3>

    <form action="{{ route('owners.update', $owner) }}" method="POST">

        @csrf
        @method('PUT')

        @include('owners._form')

    </form>

</div>

@endsection