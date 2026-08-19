@extends('layouts.app')

@section('content')

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>
            เจ้าของกิจการ
        </h3>
        <a href="{{ route('owners.create') }}" class="btn btn-primary">
            + เพิ่มเจ้าของกิจการ
        </a>
    </div>


    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif


    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>รหัส</th>
                        <th>ชื่อเจ้าของกิจการ</th>
                        <th>โทรศัพท์</th>
                        <th>Email</th>
                        <th>สถานะ</th>
                        <th width="200">จัดการ</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($owners as $owner)
                    <tr>
                        <td>
                            {{ $owners->firstItem() + $loop->index }}
                        </td>

                        <td>
                            {{ $owner->owner_code }}
                        </td>

                        <td>
                            {{ $owner->owner_name }}
                        </td>

                        <td>
                            {{ $owner->phone }}
                        </td>

                        <td>
                            {{ $owner->email }}
                        </td>

                        <td>
                            @if($owner->status)
                            <span class="badge bg-success">
                                เปิดใช้งาน
                            </span>
                            @else

                            <span class="badge bg-secondary">
                                ปิดใช้งาน
                            </span>
                            @endif
                        </td>

                        <td>
                            <a
                                href="{{ route('owners.show', $owner) }}"
                                class="btn btn-info btn-sm"
                            >
                                show
                            </a>
                            <a href="{{ route('owners.edit', $owner) }}" class="btn btn-warning btn-sm">
                                แก้ไข
                            </a>
                            <form action="{{ route('owners.destroy', $owner) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('ต้องการลบข้อมูลนี้หรือไม่?')">
                                    ลบ
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">
                            ยังไม่มีข้อมูลเจ้าของกิจการ
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $owners->links() }}
        </div>
    </div>
</div>

@endsection