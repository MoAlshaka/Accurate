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
                    رسائل الادارة / إنشاء</span>
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
                    <form action="{{ route('alerts.store') }}" data-parsley-validate="" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row row-sm">
                            <div class="col-6 mg-lg-b-20">
                                <div class="form-group">
                                    <input class="form-control" name="address" placeholder="العنوان" type="text"
                                        required=''>
                                </div>
                                @error('address')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="parsley-select col-lg-6 col-md-8 mg-lg-b-20" id="slWrapper">
                                <select class="form-control select1" data-placeholder="النوع" required="" name="type">
                                    <option label="النوع ">
                                    <option value="Information">Information </option>
                                    <option value="Warning Message">Warning Message </option>

                                    </option>

                                </select>
                                <div id="slErrorContainer"></div>
                                @error('type')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="parsley-select col-lg-6 col-md-8 mg-lg-b-20" id="slWrapper">
                                <select class="form-control select1" data-placeholder="وسائل التنبية" required=""
                                    name="methods">
                                    <option label="وسائل التنبية">
                                    </option>
                                    <option value="Datebase">Datebase </option>
                                    <option value="Whatsapp">Whatsapp </option>
                                    <option value=" FCM"> FCM</option>
                                    <option value=" SMS"> SMS</option>

                                </select>
                                <div id="slErrorContainer"></div>
                                @error('methods')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6 mg-lg-b-20">
                                <div class="custom-file">
                                    <input class="custom-file-input" id="customFile" type="file" name="image"> <label
                                        class="custom-file-label" for="customFile"> تحميل الصورة</label>
                                </div>
                                {{-- <input class="form-control" type="file" name="image"> --}}
                                @error('image')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mg-lg-b-20 mg-lg-t-20">
                                <textarea class="form-control" placeholder="محتوى الرسالة" rows="3" name="content" required=""></textarea>
                                @error('content')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-3"><button class="btn btn-main-primary pd-x-20 mg-t-10" type="submit"
                                    name="save">حفظ </button></div>
                            <div class="col-3"><button class="btn btn-main-primary pd-x-20 mg-t-10" type="submit"
                                    name="save$send">حفظ و إرسال</button></div>
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
