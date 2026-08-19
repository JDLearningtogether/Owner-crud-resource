

@csrf

<div class="mb-3">
    <label class="form-label">
        รหัสเจ้าของกิจการ
    </label>

    <input type="text" name="owner_code" class="form-control @error('owner_code') is-invalid @enderror"
        value="{{ old('owner_code', $owner->owner_code ?? $ownerCode ?? '') }}" readonly>

    @error('owner_code')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>


<div class="mb-3">
    <label class="form-label">
        ชื่อเจ้าของกิจการ
    </label>

    <input type="text" name="owner_name" class="form-control @error('owner_name') is-invalid @enderror"
        value="{{ old('owner_name', $owner->owner_name ?? '') }}">

    @error('owner_name')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>


<div class="mb-3">
    <label class="form-label">
        เบอร์โทรศัพท์
    </label>

    <input  type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror" 
            value="{{ old('phone', $owner->phone ?? '') }}">

    @error('phone')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>


<div class="mb-3">
    <label class="form-label">
        Email
    </label>

    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
        value="{{ old('email', $owner->email ?? '') }}">

    @error('email')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>


<div class="mb-3">
    <label class="form-label">
        ที่อยู่
    </label>

    <textarea name="address" class="form-control" rows="4">{{ old('address', $owner->address ?? '') }}</textarea>
</div>


<div class="form-check mb-3">
    <input type="hidden" name="status" value="0">

    <input type="checkbox" name="status" value="1" class="form-check-input" id="status" {{ old('status', $owner->status
    ?? true) ? 'checked' : '' }}
    >

    <label class="form-check-label" for="status">
        เปิดใช้งาน
    </label>
</div>


<button type="submit" class="btn {{ isset($owner) ? 'btn-warning' : 'btn-primary' }}">
    {{ isset($owner) ? 'แก้ไข' : 'บันทึก' }}
</button>

<a href="{{ route('owners.index') }}" class="btn btn-secondary">
    ยกเลิก
</a>