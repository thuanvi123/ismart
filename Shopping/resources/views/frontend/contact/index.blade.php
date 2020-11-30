@extends('layouts.shop')
@section('css')
    <link href="{{asset('contact/bootstrap.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('contact/style.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div id="main-content-wp" class="clearfix category-product-page">
        <div class="wp-inner">
            <div class="secion" id="breadcrumb-wp">
                <div class="secion-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="" title="">Trang chủ</a>
                        </li>
                        <li>
                            <a href="" title="">Liên hệ</a>
                        </li>
                    </ul>
                </div>
                <div class="container py-xl-4 py-lg-2">
                    <!-- tittle heading -->
                    <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
                        <span>C</span>ontact
                        <span>U</span>s
                    </h3>
                    <!-- //tittle heading -->
                    <div class="row contact-grids agile-1 mb-5">
                        <div class="col-sm-4 contact-grid agileinfo-6 mt-sm-0 mt-2">
                            <div class="contact-grid1 text-center">
                                <div class="con-ic">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                </div>
                                    <h4 class="font-weight-bold mt-sm-4 mt-3 mb-3">Địa chỉ</h4>
                                <p>
                                    <label>{{getConfigValueSettingTable('address')}}</label>
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-4 contact-grid agileinfo-6 my-sm-0 my-4">
                            <div class="contact-grid1 text-center">
                                <div class="con-ic">
                                    <i class="fa fa-phone-square" aria-hidden="true"></i>
                                </div>
                                <h4 class="font-weight-bold mt-sm-4 mt-3 mb-3">Liên hệ</h4>
                                <p>
                                    <label>{{getConfigValueSettingTable('phone_contact')}}</label>
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-4 contact-grid agileinfo-6">
                            <div class="contact-grid1 text-center">
                                <div class="con-ic">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </div>
                                <h4 class="font-weight-bold mt-sm-4 mt-3 mb-3">Email</h4>
                                <p>
                                    <label>{{getConfigValueSettingTable('email_contact')}}</label>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- form -->
                    <form action="" method="post">
                        @csrf
                        <div class="contact-grids1 w3agile-6">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 contact-form1 form-group">
                                    <label class="col-form-label">Name</label>
                                    <input type="text" class="form-control" name="c_name" placeholder="" required="">
                                </div>
                                <div class="col-md-6 col-sm-6 contact-form1 form-group">
                                    <label class="col-form-label">E-mail</label>
                                    <input type="email" class="form-control" name="c_email" placeholder="" required="">
                                </div>
                            </div>
                            <div class="contact-me animated wow slideInUp form-group">
                                <label class="col-form-label">Nội dung</label>
                                <textarea name="c_content" class="form-control" placeholder="" required=""> </textarea>
                            </div>
                            <div class="contact-form">
                                <input type="submit" value="Gửi thông tin">
                            </div>
                        </div>
                    </form>
                    <!-- //form -->
                </div>
            </div>
        </div>
    </div>
@endsection