@extends('layouts.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الرئيسية</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الفروع /
                    تعديل
                    فرع</span>
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
                        تعديل فرع
                    </div>
                    <form action="{{ route('branches.update', ['branch' => $branch->id]) }}" data-parsley-validate=""
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row row-sm">
                            <div class="col-6">
                                <div class="form-group mg-b-0">
                                    <label class="form-label">الكود <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="branch_code" placeholder="الكود" required=""
                                        type="text" value="{{ $branch->branch_code }}">
                                </div>
                                @error('branch_code')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">الاسم <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="branch_name" placeholder="الاسم" required=""
                                        type="text" value="{{ $branch->branch_name }}">
                                </div>
                                @error('branch_name')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="form-group mg-b-0">
                                    <label class="form-label">الدولة <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="country" placeholder="الدولة" required=""
                                        type="text" value="{{ $branch->country }}">
                                </div>
                                @error('country')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">المحافظة <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="mohafza" placeholder="المحافظة" required=""
                                        type="text" value="{{ $branch->mohafza }}">
                                </div>
                                @error('mohafza')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="form-group mg-b-0">
                                    <label class="form-label">المدينة <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="city" placeholder="المدينة" required=""
                                        type="text" value="{{ $branch->city }}">
                                </div>
                                @error('city')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">المنطقة <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="zone" placeholder="المنطقة" required=""
                                        type="text" value="{{ $branch->zone }}">
                                </div>
                                @error('zone')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">العنوان <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="address" placeholder="العنوان" required=""
                                        type="text" value="{{ $branch->address }}">
                                </div>
                                @error('address')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="form-group mg-b-0">
                                    <label class="form-label">رقم التلفون <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="phone" placeholder="رقم التلفون " required=""
                                        type="text" value="{{ $branch->phone }}">
                                </div>
                                @error('phone')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="form-group mg-b-0">
                                    <label class="form-label">Fax <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="fax" placeholder="Fax" required=""
                                        type="text" value="{{ $branch->fax }}">
                                </div>
                                @error('fax')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-3">
                                <label class="ckbox"><input type="checkbox" name="checkbox[]"
                                        value="activity"><span>فعال</span></label>
                            </div>
                            <div class="col-lg-3 mg-t-20 mg-lg-t-0">
                                <label class="ckbox"><input checked type="checkbox" name="checkbox[]"
                                        value="main"><span>رئيسي
                                    </span></label>
                            </div>

                            <div class="col-12"><button class="btn btn-main-primary pd-x-20 mg-t-10"
                                    type="submit">تعديل</button></div>
                        </div>
                    </form>
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
    <!--Internal  Select2 js -->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal  Parsley.min js -->
    <script src="{{ URL::asset('assets/plugins/parsleyjs/parsley.min.js') }}"></script>
    <!-- Internal Form-validation js -->
    <script src="{{ URL::asset('assets/js/form-validation.js') }}"></script>
@endsection
