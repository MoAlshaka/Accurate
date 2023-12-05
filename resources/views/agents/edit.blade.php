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
                <h4 class="content-title mb-0 my-auto">الرئيسية</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ مندوبى
                    التوصيل /
                    تعديل
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
                        تعديل
                    </div>
                    <form action="{{ route('agents.update', ['agent' => $agent->id]) }}" data-parsley-validate=""
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row row-sm">
                            <div class="col-2">
                                <div class="form-group mg-b-0">
                                    <label class="form-label">الكود </label>
                                    <input class="form-control" name="code" placeholder="الكود" required=""
                                        type="text" value="{{ $agent->code }}">
                                </div>
                                @error('code')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="form-label">الاسم </label>
                                    <input class="form-control" name="name" placeholder="الاسم" required=""
                                        type="text" value="{{ $agent->name }}">
                                </div>
                                @error('name')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="parsley-select col-lg-6 col-md-8" id="slWrapper">
                                <label class="form-label">الفرع </label>
                                <select class="form-control select2" data-parsley-class-handler="#slWrapper"
                                    data-parsley-errors-container="#slErrorContainer" data-placeholder="اختر "
                                    required="" name="branch_id">
                                    <option value="{{ $agent->branch->id }}">
                                        {{ $agent->branch->branch_name }}
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
                            <div class="parsley-select col-lg-6 col-md-8" id="slWrapper">
                                <label class="form-label"> قائمة العمولات </label>
                                <select class="form-control select2" data-parsley-class-handler="#slWrapper"
                                    data-parsley-errors-container="#slErrorContainer" data-placeholder="اختر "
                                    required="" name="commission_id">
                                    <option value="{{ $agent->commission->id }}">
                                        {{ $agent->commission->name }}
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
                            <div class="parsley-select col-lg-6 col-md-8" id="slWrapper">
                                <label class="form-label"> خط السير </label>
                                <select class="form-control select2" data-parsley-class-handler="#slWrapper"
                                    data-parsley-errors-container="#slErrorContainer" data-placeholder="اختر "
                                    required="" name="route_id">
                                    <option value="{{ $agent->route->id }}">
                                        {{ $agent->route->name }}
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
                            <div class="col-3">
                                <div class="form-group mg-b-0">
                                    <label class="form-label">حساب الاستاذ </label>
                                    <input class="form-control" name="personal_account" placeholder="حساب الاستاذ"
                                        required="" type="text" value="{{ $agent->personal_account }}">
                                </div>
                                @error('personal_account')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <div class="form-group mg-b-0">
                                    <label class="form-label">حساب العهد </label>
                                    <input class="form-control" name="ahda_account" placeholder="حساب العهد" required=""
                                        type="text" value="{{ $agent->ahda_account }}">
                                </div>
                                @error('ahda_account')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <div class="form-group mg-b-0">
                                    <label class="form-label">نوع العمولة للمندوب </label>
                                    <input class="form-control" name="kind_of_commission" placeholder="نوع العمولة للمندوب"
                                        required="" type="text" value="{{ $agent->kind_of_commission }}">
                                </div>
                                @error('kind_of_commission')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <div class="form-group mg-b-0">
                                    <label class="form-label">مقدار العمولة </label>
                                    <input class="form-control" name="much_of_commission" placeholder="مقدار العمولة"
                                        required="" type="text" value="{{ $agent->much_of_commission }}">
                                </div>
                                @error('much_of_commission')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <div class="form-group mg-b-0">
                                    <label class="form-label">الدولة </label>
                                    <input class="form-control" name="country" placeholder="الدولة" required=""
                                        type="text" value="{{ $agent->country }}">
                                </div>
                                @error('country')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="form-label">المحافظة </label>
                                    <input class="form-control" name="mohafza" placeholder="المحافظة" required=""
                                        type="text" value="{{ $agent->mohafza }}">
                                </div>
                                @error('mohafza')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <div class="form-group mg-b-0">
                                    <label class="form-label">المدينة </label>
                                    <input class="form-control" name="city" placeholder="المدينة" required=""
                                        type="text" value="{{ $agent->city }}">
                                </div>
                                @error('city')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="form-label">المنطقة </label>
                                    <input class="form-control" name="zone" placeholder="المنطقة" required=""
                                        type="text" value="{{ $agent->zone }}">
                                </div>
                                @error('zone')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="form-label">العنوان </label>
                                    <input class="form-control" name="address" placeholder="العنوان" required=""
                                        type="text" value="{{ $agent->address }}">
                                </div>
                                @error('address')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <div class="form-group mg-b-0">
                                    <label class="form-label">رقم التلفون </label>
                                    <input class="form-control" name="phone" placeholder="رقم التلفون " required=""
                                        type="text" value="{{ $agent->phone }}">
                                </div>
                                @error('phone')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <div class="form-group mg-b-0">
                                    <label class="form-label">رقم المحمول </label>
                                    <input class="form-control" name="phone1" placeholder="رقم المحمول " required=""
                                        type="text" value="{{ $agent->phone1 }}">
                                </div>
                                @error('phone1')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <div class="form-group mg-b-0">
                                    <label class="form-label">رقم صندوق البريد </label>
                                    <input class="form-control" name="email_box" placeholder="رقم صندوق البريد"
                                        required="" type="text" value="{{ $agent->email_box }}">
                                </div>
                                @error('email_box')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <div class="form-group mg-b-0">
                                    <label class="form-label">الرموز البريدى </label>
                                    <input class="form-control" name="email_sign" placeholder="الرموز البريدى"
                                        required="" type="text" value="{{ $agent->email_sign }}">
                                </div>
                                @error('email_sign')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <div class="form-group mg-b-0">
                                    <label class="form-label">البريد الالكترونى </label>
                                    <input class="form-control" name="email" placeholder="البريد الالكترونى"
                                        required="" type="text" value="{{ $agent->email }}">
                                </div>
                                @error('email')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-3">
                                <label class="ckbox"><input type="checkbox" name="checkbox[]"
                                        value="activity"><span>فعال</span></label>
                            </div>
                            <div class="col-lg-3 mg-t-20 mg-lg-t-0">
                                <label class="ckbox"><input checked type="checkbox" name="checkbox[]"
                                        value="1"><span>رئيسي
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
