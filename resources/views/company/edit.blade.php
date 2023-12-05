@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الرئيسية</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعديل
                    بيانات
                    الشركة</span>
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
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">تعديل </h4>
                    </div>
                    <form action="{{ route('company.update', ['company' => $company->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row row-sm">
                            <div class="col-6">
                                <div class="form-group mg-b-0">
                                    <label class="form-label"><span class="tx-danger">اسم الشركة </span></label>
                                    <input class="form-control" name="company_name" placeholder="اسم الشركة" required=""
                                        type="text" value="{{ $company->company_name }}">
                                </div>
                                @error('company_name')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label"><span class="tx-danger">اسم المالك </span></label>
                                    <input class="form-control" name="company_owner" placeholder="اسم المالك" required=""
                                        type="text" value="{{ $company->company_owner }}">
                                </div>
                                @error('company_owner')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="form-group mg-b-0">
                                    <label class="form-label"> <span class="tx-danger">النشاط</span></label>
                                    <input class="form-control" name="activity" placeholder="النشاط" required=""
                                        type="text" value="{{ $company->activity }}">
                                </div>
                                @error('activity')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="form-group mg-b-0">
                                    <label class="form-label"><span class="tx-danger">رقم الموبايل </span></label>
                                    <input class="form-control" name="phone" placeholder="رقم الموبايل" required=""
                                        type="text" value="{{ $company->phone }}">
                                </div>
                                @error('phone')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="form-group mg-b-0">
                                    <label class="form-label"><span class="tx-danger">رقم التشغيل العملائى
                                        </span></label>
                                    <input class="form-control" name="number_of_recorder" placeholder="رقم التشغيل العملائى"
                                        required="" type="text" value="{{ $company->number_of_recorder }}">
                                </div>
                                @error('number_of_recorder')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="form-group mg-b-0">
                                    <label class="form-label"><span class="tx-danger">رقم البطافة الضريبية
                                        </span></label>
                                    <input class="form-control" name="number_of_credit" placeholder="رقم البطافة الضريبية"
                                        required="" type="text" value="{{ $company->number_of_credit }}">
                                </div>
                                @error('number_of_credit')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="form-group mg-b-0">
                                    <label class="form-label"><span class="tx-danger">البريد الإلكترونى </span></label>
                                    <input class="form-control" name="email" placeholder="البريد الإلكترونى"
                                        required="" type="text" value="{{ $company->email }}">
                                </div>
                                @error('email')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label"><span class="tx-danger">الموقع الإلكترونى </span></label>
                                    <input class="form-control" name="website" placeholder="الموقع الإلكترونى"
                                        required="" type="text" value="{{ $company->website }}">
                                </div>
                                @error('website')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="form-group mg-b-0">
                                    <label class="form-label"><span class="tx-danger">منطقة الضرائب </span></label>
                                    <input class="form-control" name="zone" placeholder="منطقة الضرائب"
                                        required="" type="text" value="{{ $company->zone }}">
                                </div>
                                @error('zone')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-group mg-b-0">
                                    <label for="head_of_report"><span class="tx-danger">رأس التقارير</span></label>
                                    <textarea class="form-control" placeholder="رأس التقارير" rows="3" name="head_of_report" id="head_of_report">{{ $company->head_of_report }}</textarea>
                                </div>
                                @error('head_of_report')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-group mg-b-0">
                                    <label for="footer_of_report"><span class="tx-danger">تزيل التقارير</span></label>
                                    <textarea class="form-control" placeholder="تزيل التقارير" rows="3" name="footer_of_report"
                                        id="footer_of_report">{{ $company->footer_of_report }}</textarea>
                                </div>
                                @error('footer_of_report')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12"><button class="btn btn-main-primary pd-x-20 mg-t-10"
                                    type="submit">تعديل</button></div>
                        </div>
                    </form>



                </div>
            </div>

            <!-- row closed -->
        </div>
        <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
@endsection
