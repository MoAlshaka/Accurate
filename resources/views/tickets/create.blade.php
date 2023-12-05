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
                    الشكاوى / إنشاء</span>
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
                    <form action="{{ route('tickets.store') }}" data-parsley-validate="" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row row-sm">
                            <div class="col-4 mg-lg-b-20">
                                <div class="form-group">
                                    <input class="form-control" name="code" placeholder="الكود" type="text">
                                </div>
                                @error('code')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="parsley-select col-lg-4 col-md-8 mg-lg-b-20" id="slWrapper">
                                <select class="form-control select1" data-placeholder="العميل" required=""
                                    name="customer_id">
                                    <option label="العميل ">
                                    </option>
                                    @isset($customers)
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}">
                                                {{ $customer->name }}
                                            </option>
                                        @endforeach
                                    @endisset
                                </select>
                                <div id="slErrorContainer"></div>
                                @error('customer_id')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="parsley-select col-lg-4 col-md-8 mg-lg-b-20" id="slWrapper">
                                <select class="form-control select1" data-placeholder="قسم الدعم" required=""
                                    name="support_cate_id">
                                    <option label="قسم الدعم ">
                                    </option>
                                    @isset($supportCates)
                                        @foreach ($supportCates as $supportCate)
                                            <option value="{{ $supportCate->id }}">
                                                {{ $supportCate->name }}
                                            </option>
                                        @endforeach
                                    @endisset
                                </select>
                                <div id="slErrorContainer"></div>
                                @error('support_cate_id')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6 mg-lg-b-20">
                                <div class="form-group">
                                    <input class="form-control" name="address" placeholder="العنوان" type="text"
                                        required="">
                                </div>
                                @error('address')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="parsley-select col-lg-3 col-md-8 mg-lg-b-20" id="slWrapper">
                                <select class="form-control select1" data-placeholder="الحالة" required=""
                                    name="status">
                                    <option label="الحالة">
                                    </option>
                                    <option value="جديد">جديد </option>
                                    <option value="إعادة فتح">إعادة فتح </option>
                                    <option value=" مغلقة"> مغلقة</option>
                                    <option value=" قيد المعالجة"> قيد المعالجة</option>

                                </select>
                                <div id="slErrorContainer"></div>
                                @error('status')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-3 mg-lg-b-20">
                                <div class="custom-file">
                                    <input class="custom-file-input" id="customFile" type="file" name="image"> <label
                                        class="custom-file-label" for="customFile"> تحميل الصورة</label>
                                </div>
                                {{-- <input class="form-control" type="file" name="image"> --}}
                                @error('image')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mg-lg-b-20">
                                <textarea class="form-control" placeholder="التفاصيل" rows="3" name="notes" required=""></textarea>
                                @error('notes')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
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
