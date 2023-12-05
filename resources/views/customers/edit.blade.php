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
                <h4 class="content-title mb-0 my-auto">الرئيسية</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ العملاء
                    /
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
                    <form action="{{ route('customers.update', ['customer' => $customer->id]) }}" data-parsley-validate=""
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row row-sm">
                            <div class="col-4">
                                <div class="form-group mg-b-0">
                                    <input class="form-control" name="code" placeholder="الكود" required=""
                                        type="text" value="{{ $customer->code }}">
                                </div>
                                @error('code')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input class="form-control" name="name" placeholder="الاسم" required=""
                                        type="text" value="{{ $customer->name }}">
                                </div>
                                @error('name')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input class="form-control" name="company_representative" placeholder="ممثل الشركة"
                                        required="" type="text" value="{{ $customer->company_representative }}">
                                </div>
                                @error('company_representative')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="parsley-select col-lg-4 col-md-8" id="slWrapper">
                                <select class="form-control select1" data-placeholder="اختر الفرع" required=""
                                    name="branch_id">
                                    <option value="{{ $customer->branch->branch_id }}">
                                        {{ $customer->branch->branch_name }}
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
                            <div class="col-4">
                                <div class="form-group">
                                    <input class="form-control" name="personal_account" placeholder="حساب الاستاذ"
                                        required="" type="text" value="{{ $customer->personal_account }}">
                                </div>
                                @error('personal_account')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input class="form-control" name="activity" placeholder="النشاط" required=""
                                        type="text" value="{{ $customer->activity }}">
                                </div>
                                @error('activity')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="parsley-select col-lg-4 col-md-8" id="slWrapper">
                                <select class="form-control select1" data-placeholder="نوع السعر" required=""
                                    name="account_type">
                                    <option value="{{ $customer->account_type }}">
                                        {{ $customer->account_type }}
                                    </option>
                                    <option value="شامل مصاريف الشحن"> شامل مصاريف الشحن </option>
                                    <option value="غير شامل مصاريف الشحن"> غير شامل مصاريف الشحن </option>
                                </select>
                                <div id="slErrorContainer"></div>
                                @error('account_type')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="parsley-select col-lg-4 col-md-8 mg-lg-b-20" id="slWrapper">
                                <select class="form-control select1" data-placeholder="نوع الطلب  " required=""
                                    name="request_type">
                                    <option value="{{ $customer->request_type }}">
                                        {{ $customer->request_type }}
                                    </option>
                                    <option value="تسليم كامل الطرد">تسليم كامل الطرد</option>
                                    <option value="تسليم جزء الطرد">تسليم جزء الطرد </option>
                                    <option value="طرد مقابل طرد / إستبدال">طرد مقابل طرد / إستبدال</option>
                                    <option value="إسترجاع طرد"> إسترجاع طرد</option>
                                    <option value="تحصيل أموال"> تحصيل أموال </option>
                                </select>
                                <div id="slErrorContainer"></div>
                                @error('request_type')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="parsley-select col-lg-4 col-md-8 mg-lg-b-20" id="slWrapper">
                                <select class="form-control select1" data-placeholder="إمكانية فتح الطرد " required=""
                                    name="package_open">
                                    <option value="{{ $customer->package_open }}">
                                        {{ $customer->package_open }}
                                    </option>
                                    <option value="غير مسموح بفتح الطرد"> غير مسموح بفتح الطرد</option>
                                    <option value="مسموح بفتح الطرد"> مسموح بفتح الطرد </option>
                                </select>
                                <div id="slErrorContainer"></div>
                                @error('package_open')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="parsley-select col-lg-6 col-md-8 mg-lg-b-20" id="slWrapper">
                                <select class="form-control select1" data-placeholder="التصنيف " required=""
                                    name="category">
                                    <option value="{{ $customer->category }}">
                                        {{ $customer->category }}
                                    </option>
                                    <option value="تاجر"> تاجر</option>
                                    <option value="شركة"> شركة</option>
                                    <option value="مصنع"> مصنع</option>
                                    <option value="سوبرماركت"> سوبرماركت</option>
                                    <option value="اونلاين استور"> اونلاين استور</option>
                                </select>
                                <div id="slErrorContainer"></div>
                                @error('category')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="parsley-select col-lg-6 col-md-8 mg-lg-b-20" id="slWrapper">
                                <select class="form-control select1" data-placeholder="قائمة الاسعار " required=""
                                    name="price_list_id">
                                    <option value="{{ $customer->priceList->id }}">
                                        {{ $customer->priceList->name }}
                                    </option>
                                    @isset($priceLists)
                                        @foreach ($priceLists as $priceList)
                                            <option value="{{ $priceList->id }}">
                                                {{ $priceList->name }}
                                            </option>
                                        @endforeach
                                    @endisset
                                </select>
                                <div id="slErrorContainer"></div>
                                @error('price_list_id')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="parsley-select col-lg-6 col-md-8 mg-lg-b-20" id="slWrapper">
                                <select class="form-control select1" data-placeholder="الضريبة " required=""
                                    name="tax">
                                    <option value="{{ $customer->tax }}">
                                        {{ $customer->tax }}
                                    </option>
                                    <option value="غير خاضع للضريبة"> غير خاضع للضريبة</option>
                                    <option value="خاضع للضريبة"> خاضع للضريبة </option>
                                </select>
                                <div id="slErrorContainer"></div>
                                @error('tax')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="parsley-select col-lg-6 col-md-8 mg-lg-b-20" id="slWrapper">
                                <select class="form-control select1" data-placeholder="وسيلة الدفع " required=""
                                    name="payment_method">
                                    <option value="{{ $customer->payment_method }}">
                                        {{ $customer->payment_method }}
                                    </option>
                                    <option value="حساب بنكى"> حساب بنكى </option>
                                    <option value="فوداقون كاش"> فوداقون كاش</option>
                                    <option value="نقدى">نقدى </option>
                                    <option value="مقر الشركة">مقر الشركة </option>

                                </select>
                                <div id="slErrorContainer"></div>
                                @error('payment_method')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="parsley-select col-lg-6 col-md-8 mg-lg-b-20" id="slWrapper">
                                <select class="form-control select1" data-placeholder="جدول السداد " required=""
                                    name="payment_schedule">
                                    <option value="{{ $customer->payment_schedule }}">
                                        {{ $customer->payment_schedule }}
                                    </option>
                                    <option value="اسبوعى">اسبوعى </option>
                                    <option value="شهرى">شهرى </option>
                                </select>
                                <div id="slErrorContainer"></div>
                                @error('payment_schedule')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="parsley-select col-lg-6 col-md-8 mg-lg-b-20" id="slWrapper">
                                <select class="form-control select1" data-placeholder="إخفاء الهاتف " required=""
                                    name="phone_hiden">
                                    <option value="{{ $customer->phone_hiden }}">
                                        {{ $customer->phone_hiden }}
                                    </option>
                                    <option value="إخفائه تماما">إخفائه تماما </option>
                                    <option value="البوليصة">البوليصة </option>
                                    <option value="قائمة التوصيل">قائمة التوصيل </option>
                                    <option value="نطبيق المندوب">نطبيق المندوب </option>
                                </select>
                                <div id="slErrorContainer"></div>
                                @error('phone_hiden')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-4 mg-t-20 mg-lg-b-20 mg-lg-t-20">
                                <label class="ckbox"><input type="checkbox" name="shipping_code"
                                        value="1"><span>كود الشحنة</span></label>
                            </div>
                            <div class="col-lg-4 mg-t-20 mg-lg-t-20 mg-lg-b-20 ">
                                <label class="ckbox"><input checked type="checkbox" name="return_fees"
                                        value="1"><span>مشاركة رسوم الارجاع
                                    </span></label>
                            </div>
                            <div class="col-lg-4 mg-t-20 mg-lg-t-20 mg-lg-b-20 ">
                                <label class="ckbox"><input checked type="checkbox" name="uncollected_shipments"
                                        value="1"><span>سداد الشحنات الغير محصلة
                                    </span></label>
                            </div>
                            <div class="col-lg-4 mg-t-20 mg-lg-t-20 mg-lg-b-20 ">
                                <label class="ckbox"><input checked type="checkbox" name="storage"
                                        value="1"><span>التخزين
                                    </span></label>
                            </div>
                            <div class="col-lg-4 mg-t-20 mg-lg-t-20 mg-lg-b-20 ">
                                <label class="ckbox"><input checked type="checkbox" name="receipt_code"
                                        value="1"><span> كود الاستلام
                                    </span></label>
                            </div>
                            <div class="col-lg-4 mg-t-20 mg-lg-t-20 mg-lg-b-20 ">
                                <label class="ckbox"><input checked type="checkbox" name="status"
                                        value="1"><span> فعال
                                    </span></label>
                            </div>
                            <div class="col-4">
                                <div class="form-group mg-b-0">
                                    <input class="form-control" name="city" placeholder="المدينة" required=""
                                        type="text" value="{{ $customer->city }}">
                                </div>
                                @error('city')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input class="form-control" name="zone" placeholder="المنطقة" required=""
                                        type="text" value="{{ $customer->zone }}">
                                </div>
                                @error('zone')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input class="form-control" name="address" placeholder="العنوان" required=""
                                        type="text" value="{{ $customer->address }}">
                                </div>
                                @error('address')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <div class="form-group mg-b-0">
                                    <input class="form-control" name="phone" placeholder="رقم التلفون " required=""
                                        type="text" value="{{ $customer->phone }}">
                                </div>
                                @error('phone')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <div class="form-group mg-b-0">
                                    <input class="form-control" name="mobile" placeholder="رقم المحمول " required=""
                                        type="text" value="{{ $customer->mobile }}">
                                </div>
                                @error('mobile')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <div class="form-group mg-b-0">
                                    <input class="form-control" name="postal_code" placeholder="الرمز البريدى"
                                        required="" type="text" value="{{ $customer->postal_code }}">
                                </div>
                                @error('postal_code')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <div class="form-group mg-b-0 mg-lg-t-20">
                                    <input class="form-control" name="email" placeholder="البريد الالكترونى"
                                        required="" type="text" value="{{ $customer->email }}">
                                </div>
                                @error('email')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mg-lg-t-20"> نوع الدفع
                                <div class="col-lg-4 mg-t-20 mg-lg-t-20 mg-lg-b-20 ">
                                    <label class="ckbox"><input checked type="checkbox" name="colc"
                                            value="1"><span>واجبة التحصيل
                                        </span></label>
                                </div>
                                <div class="col-lg-4 mg-t-20 mg-lg-t-20 mg-lg-b-20 ">
                                    <label class="ckbox"><input checked type="checkbox" name="crdt"
                                            value="1"><span> اجلة-بريد
                                        </span></label>
                                </div>
                                <div class="col-lg-4 mg-t-20 mg-lg-t-20 mg-lg-b-20 ">
                                    <label class="ckbox"><input checked type="checkbox" name="cash"
                                            value="1"><span> مسددة نقدا
                                        </span></label>
                                </div>
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
