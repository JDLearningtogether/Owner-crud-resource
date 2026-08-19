<?php

namespace App\Http\Controllers;

use App\Models\TbOwner;
use Illuminate\Http\Request;
use App\Http\Requests\OwnerRequest;

class TbOwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $owners = TbOwner::latest()->paginate(10);

        return view('owners.index', compact('owners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('owners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OwnerRequest $request)
    {
        //
        // TbOwner::create($request->validated());
        $lastOwner = TbOwner::orderByDesc('id')->first();

        if ($lastOwner) {
            $lastNumber = (int) str_replace('OWN', '', $lastOwner->owner_code);
            $nextNumber = $lastNumber + 1;
        } else {
            $nextNumber = 1;
        }


        $ownerCode = 'OWN' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
        $data = $request->validated();

        $data['owner_code'] = $ownerCode;

        TbOwner::create($data);

        return redirect()
            ->route('owners.index')
            ->with('success', 'บันทึกเจ้าของกิจการเรียบร้อยแล้ว');
    }

    /**
     * Display the specified resource.
     */
    public function show(TbOwner $owner)
    {
        return view('owners.show', compact('owner'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TbOwner $owner)
    {
        //
        return view('owners.edit', compact('owner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OwnerRequest $request, TbOwner $owner)
    {
        //
        $owner->update($request->validated());

        return redirect()
            ->route('owners.index')
            ->with('success', 'แก้ไขข้อมูลเจ้าของกิจการเรียบร้อยแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TbOwner $owner)
    {
        //
        $owner->delete();

        return redirect()
            ->route('owners.index')
            ->with('success', 'ลบเจ้าของกิจการเรียบร้อยแล้ว');
    }
}
