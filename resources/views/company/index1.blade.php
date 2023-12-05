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
        @if (session()->has('Update'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session()->get('Update') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">بيانات الشركة</h4>
                        @isset($company)
                            {{-- <a href="{{ route('company.edit', ['company' => $company->id]) }}">تعديل</a> --}}
                            <a href="{{ route('company.edit', ['company' => $company->id]) }}"
                                class="btn ripple btn-primary text-white btn-icon" data-placement="top" data-toggle="tooltip"
                                title="تعديل"><i class="fe fe-edit"></i></a>
                        @endisset
                    </div>
                    <div class="row row-sm">
                        <div class="col-6">
                            <div class="form-group mg-b-0">
                                <label class="form-label"><span class="tx-danger">اسم الشركة </span></label>
                                <input class="form-control" name="company_name" placeholder="اسم الشركة" required=""
                                    type="text" value="{{ $company->company_name }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label"><span class="tx-danger">اسم المالك </span></label>
                                <input class="form-control" name="company_owner" placeholder="اسم المالك" required=""
                                    type="text" value="{{ $company->company_owner }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mg-b-0">
                                <label class="form-label"> <span class="tx-danger">النشاط</span></label>
                                <input class="form-control" name="activity" placeholder="النشاط" required=""
                                    type="text" value="{{ $company->activity }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mg-b-0">
                                <label class="form-label"><span class="tx-danger">رقم الموبايل </span></label>
                                <input class="form-control" name="phone" placeholder="رقم الموبايل" required=""
                                    type="text" value="{{ $company->phone }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mg-b-0">
                                <label class="form-label"><span class="tx-danger">رقم التشغيل العملائى </span></label>
                                <input class="form-control" name="number_of_recorder" placeholder="رقم التشغيل العملائى"
                                    required="" type="text" value="{{ $company->number_of_recorder }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mg-b-0">
                                <label class="form-label"><span class="tx-danger">رقم البطافة الضريبية </span></label>
                                <input class="form-control" name="number_of_credit" placeholder="رقم البطافة الضريبية"
                                    required="" type="text" value="{{ $company->number_of_credit }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mg-b-0">
                                <label class="form-label"><span class="tx-danger">البريد الإلكترونى </span></label>
                                <input class="form-control" name="email" placeholder="البريد الإلكترونى" required=""
                                    type="text" value="{{ $company->email }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label"><span class="tx-danger">الموقع الإلكترونى </span></label>
                                <input class="form-control" name="website" placeholder="الموقع الإلكترونى" required=""
                                    type="text" value="{{ $company->website }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mg-b-0">
                                <label class="form-label"><span class="tx-danger">منطقة الضرائب </span></label>
                                <input class="form-control" name="zone" placeholder="منطقة الضرائب" required=""
                                    type="text" value="{{ $company->zone }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group mg-b-0">
                                <label for="head_of_report"><span class="tx-danger">رأس التقارير</span></label>
                                <textarea class="form-control" placeholder="رأس التقارير" rows="3" name="head_of_report" id="head_of_report">{{ $company->head_of_report }}</textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group mg-b-0">
                                <label for="footer_of_report"><span class="tx-danger">تزيل التقارير</span></label>
                                <textarea class="form-control" placeholder="تزيل التقارير" rows="3" name="footer_of_report"
                                    id="footer_of_report">{{ $company->footer_of_report }}</textarea>
                            </div>
                        </div>
                    </div>

                </div>
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
