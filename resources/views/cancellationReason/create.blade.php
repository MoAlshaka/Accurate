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
                <h4 class="content-title mb-0 my-auto">الرئيسية</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    أسباب الإلغاء / إنشاء</span>
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
                        إنشاء
                    </div>
                    <form action="{{ route('cancellation-reasons.store') }}" data-parsley-validate="" method="POST">
                        @csrf
                        <div class="row row-sm">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">الاسم</label>
                                    <input class="form-control" name="name" placeholder="الاسم" required=""
                                        type="text">
                                </div>
                                @error('name')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="form-group mg-b-0">
                                    <label class="form-label">الكود</label>
                                    <input class="form-control" name="code" placeholder="الكود" required=""
                                        type="text">
                                </div>
                                @error('code')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="parsley-select col-lg-6 col-md-8" id="slWrapper">
                                <label class="form-label">النوع </label>
                                <select class="form-control select1" data-parsley-class-handler="#slWrapper"
                                    data-parsley-errors-container="#slErrorContainer" data-placeholder="النوع "
                                    required="" name="type">
                                    <option value="أسباب رفض الشاحنة"> أسباب رفض الشاحنة</option>
                                    <option value="أسباب عدم التوصيل"> أسباب عدم التوصيل</option>
                                </select>
                                <div id="slErrorContainer"></div>
                                @error('type')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-3 mg-t-20 mg-lg-t-40 mg-lg-b-40">
                                <label class="ckbox"><input checked type="checkbox" name="status"
                                        value="1"><span>فعال
                                    </span></label>
                            </div>
                            <div class="col-12"><button class="btn btn-main-primary pd-x-20 mg-t-10"
                                    type="submit">إضافة</button></div>
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
    <!--Internal  Select2 js -->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal  Parsley.min js -->
    <script src="{{ URL::asset('assets/plugins/parsleyjs/parsley.min.js') }}"></script>
    <!-- Internal Form-validation js -->
    <script src="{{ URL::asset('assets/js/form-validation.js') }}"></script>
@endsection
