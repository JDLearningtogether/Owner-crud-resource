@extends('layouts.app')

@section('title', 'รายละเอียดเจ้าของกิจการ')

@section('content')

<div class="container py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="mb-1">
                รายละเอียดเจ้าของกิจการ
            </h3>

            <p class="text-muted mb-0">
                {{ $owner->owner_name }}
            </p>
        </div>

        <div>

            <a
                href="{{ route('owners.edit', $owner) }}"
                class="btn btn-warning"
            >
                แก้ไข
            </a>

            <a
                href="{{ route('owners.index') }}"
                class="btn btn-secondary"
            >
                กลับ
            </a>

        </div>

    </div>


    {{-- ข้อมูลเจ้าของกิจการ --}}
    <div class="card shadow-sm">

        <div class="card-header">
            <strong>ข้อมูลเจ้าของกิจการ</strong>
        </div>

        <div class="card-body">

            <div class="row">

                {{-- Owner Code --}}
                <div class="col-md-6 mb-3">

                    <label class="form-label text-muted">
                        รหัสเจ้าของกิจการ
                    </label>

                    <div class="form-control bg-light">
                        {{ $owner->owner_code }}
                    </div>

                </div>


                {{-- Owner Name --}}
                <div class="col-md-6 mb-3">

                    <label class="form-label text-muted">
                        ชื่อเจ้าของกิจการ
                    </label>

                    <div class="form-control bg-light">
                        {{ $owner->owner_name }}
                    </div>

                </div>


                {{-- Phone --}}
                <div class="col-md-6 mb-3">

                    <label class="form-label text-muted">
                        เบอร์โทรศัพท์
                    </label>

                    <div class="form-control bg-light">
                        {{ $owner->phone ?: '-' }}
                    </div>

                </div>


                {{-- Email --}}
                <div class="col-md-6 mb-3">

                    <label class="form-label text-muted">
                        Email
                    </label>

                    <div class="form-control bg-light">
                        {{ $owner->email ?: '-' }}
                    </div>

                </div>


                {{-- Address --}}
                <div class="col-12 mb-3">

                    <label class="form-label text-muted">
                        ที่อยู่
                    </label>

                    <div class="form-control bg-light">
                        {{ $owner->address ?: '-' }}
                    </div>

                </div>


                {{-- Status --}}
                <div class="col-md-6 mb-3">

                    <label class="form-label text-muted">
                        สถานะ
                    </label>

                    <div>

                        @if($owner->status)

                            <span class="badge bg-success">
                                เปิดใช้งาน
                            </span>

                        @else

                            <span class="badge bg-secondary">
                                ปิดใช้งาน
                            </span>

                        @endif

                    </div>

                </div>


                {{-- Created At --}}
                <div class="col-md-6 mb-3">

                    <label class="form-label text-muted">
                        วันที่สร้าง
                    </label>

                    <div>
                        {{ $owner->created_at?->format('d/m/Y H:i') ?? '-' }}
                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- Delete --}}
    <div class="card shadow-sm mt-4">

        <div class="card-body">

            <form
                action="{{ route('owners.destroy', $owner) }}"
                method="POST"
                onsubmit="return confirm('ต้องการลบเจ้าของกิจการนี้หรือไม่?')"
            >

                @csrf

                @method('DELETE')

                <button
                    type="submit"
                    class="btn btn-danger"
                >
                    ลบเจ้าของกิจการ
                </button>

            </form>

        </div>

    </div>

</div>

@endsection