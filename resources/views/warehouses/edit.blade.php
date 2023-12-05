@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الريئسية</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الأقاليم و
                    أقسام المخزن/ تعديل</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        تعديل
                    </div>
                    <form action="{{ route('warehouses.update', ['warehouse' => $warehouse->id]) }}"
                        data-parsley-validate="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row row-sm">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">الاسم </label>
                                    <input class="form-control" name="name" placeholder="الاسم" required=""
                                        type="text" value="{{ $warehouse->name }}">
                                </div>
                                @error('name')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="parsley-select col-lg-6 col-md-8" id="slWrapper">
                                <label class="form-label">اختر الفرع<span class="tx-danger">*</span></label>
                                <select class="form-control select2" data-parsley-class-handler="#slWrapper"
                                    data-parsley-errors-container="#slErrorContainer" data-placeholder="اختر الفرع"
                                    required="" name="branch_id">
                                    <option value="{{ $warehouse->branch->id }}">
                                        {{ $warehouse->branch->branch_name }}
                                    </option>
                                    @isset($branches)
                                        @foreach ($branches as $branch)
                                            <option value="{{ $branch->id }}">
                                                {{ $branch->branch_name }}
                                            </option>
                                        @endforeach
                                    @endisset


                                </select>
                                <div id="slErrorContainer"></div>
                                @error('branch_id')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-3 mg-t-20 mg-lg-t-20 mg-lg-b-20">
                                <label class="ckbox"><input checked type="checkbox" name="status"
                                        value="1"><span>فعال
                                    </span></label>
                            </div>
                            <div class="col-12"><button class="btn btn-main-primary pd-x-20 mg-t-10"
                                    type="submit">تعديل</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
@endsection
