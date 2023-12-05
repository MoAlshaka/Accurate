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
                <h4 class="content-title mb-0 my-auto">الرئيسية</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ مندوبي
                    التوصيل /
                    إضافة
                </span>
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
                        إنشاء مندوب
                    </div>
                    <form action="{{ route('agents.store') }}" data-parsley-validate="" method="POST">
                        @csrf
                        <div class="row row-sm">
                            <div class="col-2">
                                <div class="form-group mg-b-0">
                                    <input class="form-control" name="code" placeholder="الكود" required=""
                                        type="text">
                                </div>
                                @error('code')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input class="form-control" name="name" placeholder="الاسم" required=""
                                        type="text">
                                </div>
                                @error('name')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="parsley-select col-lg-6 col-md-8" id="slWrapper">
                                <select class="form-control select1" data-parsley-class-handler="#slWrapper"
                                    data-parsley-errors-container="#slErrorContainer" data-placeholder="اختر الفرع"
                                    required="" name="branch_id">
                                    <option label="اختر الفرع ">
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

                            <div class="parsley-select col-lg-6 col-md-8 mg-lg-b-20" id="slWrapper">
                                <select class="form-control select1" data-parsley-class-handler="#slWrapper"
                                    data-parsley-errors-container="#slErrorContainer" data-placeholder="اختر قائمة العمولات"
                                    required="" name="commission_id">
                                    <option label="اختر قائمة العمولات ">
                                    </option>
                                    @isset($commissions)
                                        @foreach ($commissions as $commission)
                                            <option value="{{ $commission->id }}">
                                                {{ $commission->name }}
                                            </option>
                                        @endforeach
                                    @endisset
                                </select>
                                <div id="slErrorContainer"></div>
                                @error('commission_id')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="parsley-select col-lg-6 col-md-8 mg-lg-b-20" id="slWrapper">
                                <select class="form-control select1" data-parsley-class-handler="#slWrapper"
                                    data-parsley-errors-container="#slErrorContainer" data-placeholder="اختر خط السير "
                                    required="" name="route_id">
                                    <option label="اختر خط السير ">
                                    </option>
                                    @isset($routes)
                                        @foreach ($routes as $route)
                                            <option value="{{ $route->id }}">
                                                {{ $route->name }}
                                            </option>
                                        @endforeach
                                    @endisset
                                </select>
                                <div id="slErrorContainer"></div>
                                @error('route_id')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="form-group mg-b-0 mg-lg-b-20">
                                    <input class="form-control" name="personal_account" placeholder="حساب الاستاذ"
                                        required="" type="text">
                                </div>
                                @error('personal_account')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="form-group mg-b-0 mg-lg-b-20">
                                    <input class="form-control" name="ahda_account" placeholder="حساب العهد" required=""
                                        type="text">
                                </div>
                                @error('ahda_account')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <div class="form-group mg-b-0">
                                    <input class="form-control" name="kind_of_commission" placeholder="نوع العمولة للمندوب"
                                        required="" type="text">
                                </div>
                                @error('kind_of_commission')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <div class="form-group mg-b-0">
                                    <input class="form-control" name="much_of_commission" placeholder="مقدار العمولة"
                                        required="" type="text">
                                </div>
                                @error('much_of_commission')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <div class="form-group mg-b-0">
                                    <input class="form-control" name="country" placeholder="الدولة" required=""
                                        type="text">
                                </div>
                                @error('country')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <input class="form-control" name="mohafza" placeholder="المحافظة" required=""
                                        type="text">
                                </div>
                                @error('mohafza')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <div class="form-group mg-b-0">
                                    <input class="form-control" name="city" placeholder="المدينة" required=""
                                        type="text">
                                </div>
                                @error('city')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <input class="form-control" name="zone" placeholder="المنطقة" required=""
                                        type="text">
                                </div>
                                @error('zone')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <input class="form-control" name="address" placeholder="العنوان" required=""
                                        type="text">
                                </div>
                                @error('address')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <div class="form-group mg-b-0">
                                    <input class="form-control" name="phone" placeholder="رقم التلفون " required=""
                                        type="text">
                                </div>
                                @error('phone')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <div class="form-group mg-b-0">
                                    <input class="form-control" name="phone1" placeholder="رقم المحمول " required=""
                                        type="text">
                                </div>
                                @error('phone1')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <div class="form-group mg-b-0">
                                    <input class="form-control" name="email_box" placeholder="رقم صندوق البريد"
                                        required="" type="text">
                                </div>
                                @error('email_box')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <div class="form-group mg-b-0">
                                    <input class="form-control" name="email_sign" placeholder="الرمز البريدى"
                                        required="" type="text">
                                </div>
                                @error('email_sign')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <div class="form-group mg-b-0">
                                    <input class="form-control" name="email" placeholder="البريد الالكترونى"
                                        required="" type="text">
                                </div>
                                @error('email')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-3 mg-lg-b-20 mg-lg-t-20">
                                <label class="ckbox"><input type="checkbox" name="checkbox[]"
                                        value="activity"><span>فعال</span></label>
                            </div>
                            <div class="col-lg-3 mg-t-20 mg-lg-t-20 mg-lg-b-20 ">
                                <label class="ckbox"><input checked type="checkbox" name="checkbox[]"
                                        value="1"><span>سداد العموبة اليا
                                    </span></label>
                            </div>

                            <div class="col-12"><button class="btn btn-main-primary pd-x-20 mg-t-10"
                                    type="submit">إضافة</button></div>
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
