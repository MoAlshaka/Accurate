@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الريئسية</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    قائمة العمولات / تعديل</span>
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
                    <form action="{{ route('agent-commission.update', ['agent_commission' => $commission->id]) }}"
                        data-parsley-validate="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row row-sm">
                            <div class="col-6">
                                <div class="form-group mg-b-0">
                                    <label class="form-label">الكود <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="code" placeholder="الكود" required=""
                                        type="text" value="{{ $commission->code }}">
                                </div>
                                @error('code')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">الاسم <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="name" placeholder="الاسم" required=""
                                        type="text" value="{{ $commission->name }}">
                                </div>
                                @error('name')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="form-group mg-b-0">
                                    <label class="form-label">الوصف <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="desc" placeholder="الوصف" required=""
                                        type="text" value="{{ $commission->desc }}">
                                </div>
                                @error('desc')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
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
