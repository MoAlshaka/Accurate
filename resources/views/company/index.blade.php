@extends('layouts.master')
@section('css')
    <style>
        .width30 {
            width: 30%;
        }
    </style>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الرئيسية</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ بيانات
                    الشركة</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('message') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!-- row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">بيانات الشركة</h4>
                        @isset($company)
                            {{-- <a href="{{ route('company.edit', ['company' => $company->id]) }}">تعديل</a> --}}
                            <a href="{{ route('company.edit', ['company' => $company->id]) }}"
                                class="btn ripple btn-primary text-white btn-icon" data-placement="top" data-toggle="tooltip"
                                title="تعديل"><i class="fe fe-edit"></i></a>
                        @endisset
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mg-b-0 text-md-nowrap">

                            @isset($company)
                                <tr>
                                    <td class='width30'>اسم الشركة</td>
                                    <td scope="row">{{ $company->company_name }}</td>
                                </tr>
                                <tr>
                                    <td class='width30'>اسم المالك</td>
                                    <td>{{ $company->company_owner }}</td>
                                </tr>

                                <tr>
                                    <td class='width30'> النشاط</td>
                                    <td>{{ $company->activity }}</td>
                                </tr>
                                <tr>
                                    <td class='width30'>رقم الموبايل</td>
                                    <td>{{ $company->phone }}</td>
                                </tr>
                                <tr>
                                    <td class='width30'>رقم التشغيل العملائى</td>
                                    <td>{{ $company->number_of_recorder }}</td>
                                </tr>
                                <tr>
                                    <td class='width30'>رقم البطافة الضريبية</td>
                                    <td>{{ $company->number_of_credit }}</td>
                                </tr>
                                <tr>
                                    <td class='width30'>البريد الإلكترونى</td>
                                    <td>{{ $company->email }}</td>
                                </tr>
                                <tr>
                                    <td class='width30'>الموقع الإلكترونى</td>
                                    <td>{{ $company->website }}</td>
                                </tr>
                                <tr>
                                    <td class='width30'>منطقة الضرائب</td>
                                    <td>{{ $company->zone }}</td>
                                </tr>
                                <tr>
                                    <td class='width30'>رأس التقارير</td>
                                    <td>{{ $company->head_of_report }}</td>
                                </tr>
                                <tr>
                                    <td>تزيل التقارير</td>
                                    <td>{{ $company->footer_of_report }}</td>
                                </tr>




                                {{-- <tr>
                                        <th scope="row">{{ $company->company_name }}</th>
                                        <td>{{ $company->company_owner }}</td>
                                        <td>{{ $company->activity }}</td>
                                        <td>{{ $company->phone }}</td>
                                        <td>{{ $company->number_of_recorder }}</td>
                                        <td>{{ $company->number_of_credit }}</td>
                                        <td>{{ $company->email }}</td>
                                        <td>{{ $company->website }}</td>
                                        <td>{{ $company->zone }}</td>
                                        <td>{{ $company->head_of_report }}</td>
                                        <td>{{ $company->footer_of_report }}</td>
                                    </tr> --}}
                            @endisset

                        </table>
                    </div>
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
