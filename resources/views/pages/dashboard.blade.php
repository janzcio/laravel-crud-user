@extends('layouts.master')

@section('title', 'Dashboard')

@section('extend_css')
@endsection

@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">

            <div class="main-body">
                <div class="page-wrapper">

                    <div class="page-header">
                        <div class="row align-items-end">
                            <div class="col-lg-8">
                                <div class="page-header-title">
                                    <div class="d-inline">
                                        <h4>Dashboard</h4>
                                        <span>############</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="page-header-breadcrumb">
                                    <ul class="breadcrumb-title">
                                        <li class="breadcrumb-item" style="float: left;">
                                            <a href="#!"> <i class="fas fa-home"></i> </a>
                                        </li>
                                        <li class="breadcrumb-item" style="float: left;">
                                            <a href="#!">Dashboard</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Include the breadcrumbs partial -->
                            </div>
                        </div>
                    </div>


                    <div class="page-body">


                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
