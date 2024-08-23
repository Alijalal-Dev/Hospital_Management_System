@extends('Dashboard.layouts.master')
@section('css')
@endsection
@section('title')
    {{ trans('patient.patient_info') }}
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('patient.patient_info') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('patient.patient_info') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-lg-12 col-md-12">
            <div class="card" id="basic-alert">
                <div class="card-body">
                    <div class="text-wrap">
                        <div class="example">
                            <div class="panel panel-primary tabs-style-1">
                                <div class=" tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs main-nav-line">
                                            <li class="nav-item"><a href="#tab1" class="nav-link active" data-toggle="tab">{{ trans('patient.patient_info') }}</a></li>
                                            <li class="nav-item"><a href="#tab2" class="nav-link" data-toggle="tab">{{ trans('patient.invoices') }}</a></li>
                                            <li class="nav-item"><a href="#tab3" class="nav-link" data-toggle="tab">{{ trans('patient.payments') }}</a></li>
                                            <li class="nav-item"><a href="#tab4" class="nav-link" data-toggle="tab">{{ trans('patient.statement') }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body main-content-body-right border-top-0 border">
                                    <div class="tab-content">

                                        {{-- Strat Show Information Patient --}}
                                        <div class="tab-pane active" id="tab1">
                                            <br>
                                            <div class="table-responsive">
                                                <table class="table table-hover text-md-nowrap text-center">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>{{ trans('patient.patient_name') }}</th>
                                                        <th>{{ trans('patient.phone_number') }}</th>
                                                        <th>{{ trans('patient.email') }}</th>
                                                        <th>{{ trans('patient.birth_date') }}</th>
                                                        <th>{{ trans('patient.gender') }}</th>
                                                        <th>{{ trans('patient.blood_group') }}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>{{$Patient->name}}</td>
                                                        <td>{{$Patient->Phone}}</td>
                                                        <td>{{$Patient->email}}</td>
                                                        <td>{{$Patient->Date_Birth}}</td>
                                                        <td>{{$Patient->Gender == 1 ? 'ذكر' : 'انثي'}}</td>
                                                        <td>{{$Patient->Blood_Group}}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        {{-- End Show Information Patient --}}

                                        {{-- Start Invoices Patient --}}
                                        <div class="tab-pane" id="tab2">
                                            <div class="table-responsive">
                                                <table class="table table-hover text-md-nowrap text-center">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>{{ trans('patient.service_name') }}</th>
                                                        <th>{{ trans('patient.invoice_date') }}</th>
                                                        <th>{{ trans('patient.total_with_tax') }}</th>
                                                        <th>{{ trans('patient.invoice_type') }}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($invoices as $invoice)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$invoice->Service->name ?? $invoice->Group->name}}</td>
                                                            <td>{{$invoice->invoice_date}}</td>
                                                            <td>{{$invoice->total_with_tax}}</td>
                                                            <td>{{$invoice->type == 1 ? 'نقدي' : 'اجل'}}</td>
                                                        </tr>
                                                        <br>
                                                    @endforeach
                                                    <tr>
                                                        <th colspan="4" scope="row" class="alert alert-success">
                                                            {{ trans('patient.total') }}
                                                        </th>
                                                        <td class="alert alert-primary">{{ number_format( $invoices->sum('total_with_tax') , 2)}}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        {{-- End Invoices Patient --}}

                                        {{-- Start Receipt Patient  --}}
                                        <div class="tab-pane" id="tab3">
                                            <div class="table-responsive">
                                                <table class="table table-hover text-md-nowrap text-center">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>{{ trans('patient.receipt_date') }}</th>
                                                        <th>{{ trans('patient.amount') }}</th>
                                                        <th>{{ trans('patient.description') }}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($receipt_accounts as $receipt_account)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$receipt_account->date}}</td>
                                                            <td>{{$receipt_account->amount}}</td>
                                                            <td>{{$receipt_account->description}}</td>
                                                        </tr>
                                                        <br>
                                                    @endforeach
                                                    <tr>
                                                        <th scope="row" class="alert alert-success">{{ trans('patient.total') }}</th>
                                                        <td colspan="4" class="alert alert-primary">{{ number_format( $receipt_accounts->sum('amount') , 2)}}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        {{-- End Receipt Patient  --}}

                                        {{-- Start payment accounts Patient --}}
                                        <div class="tab-pane" id="tab4">
                                            <div class="table-responsive">
                                                <table class="table table-hover text-md-nowrap text-center" id="example1">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>{{ trans('patient.receipt_date') }}</th>
                                                        <th>{{ trans('patient.description') }}</th>
                                                        <th>{{ trans('patient.debit') }}</th>
                                                        <th>{{ trans('patient.credit') }}</th>
                                                        <th>{{ trans('patient.final_balance') }}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($Patient_accounts as $Patient_account)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$Patient_account->date}}</td>
                                                            <td>
                                                                @if($Patient_account->invoice_id == true)
                                                                    {{$Patient_account->invoice->Service->name ?? $Patient_account->invoice->Group->name }}
                                                                @elseif($Patient_account->receipt_id == true)
                                                                    {{$Patient_account->ReceiptAccount->description}}
                                                                @elseif($Patient_account->Payment_id == true)
                                                                    {{$Patient_account->PaymentAccount->description}}
                                                                @endif
                                                            </td>
                                                            <td>{{ $Patient_account->Debit}}</td>
                                                            <td>{{ $Patient_account->credit}}</td>
                                                            <td></td>
                                                        </tr>
                                                        <br>
                                                    @endforeach
                                                    <tr>
                                                        <th colspan="3" scope="row" class="alert alert-success">
                                                            {{ trans('patient.total') }}
                                                        </th>
                                                        <td class="alert alert-primary">{{ number_format( $Debit = $Patient_accounts->sum('Debit'), 2) }}</td>
                                                        <td class="alert alert-primary">{{ number_format( $credit = $Patient_accounts->sum('credit'), 2) }}</td>
                                                        <td class="alert alert-danger">
                                                            <span class="text-danger"> {{$Debit - $credit}}   {{ $Debit-$credit > 0 ? trans('patient.debtor') : trans('patient.creditor') }}</span>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <br>
                                        </div>
                                        {{-- End payment accounts Patient --}}

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Prism Precode -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
@endsection
@section('js')
@endsection
