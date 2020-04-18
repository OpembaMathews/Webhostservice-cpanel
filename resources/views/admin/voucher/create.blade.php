@include('admin.layouts.header')
    @include('admin.layouts.topbar')
        @include('admin.layouts.sidebar')
            <div class="content-page">
                <div class="content">
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <!-- <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Uplon</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                            <li class="breadcrumb-item active">Starter</li>
                                        </ol>
                                    </div> -->
                                    <h4 class="page-title">
                                        <i class="mdi mdi-barcode-scan" style="margin: 0 10px 0 3px;"></i>Generate Vouchers
                                    </h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <form class="generate-voucher-form">
                                                <div class="voucher-response"></div>
                                                <div class="form-group">
                                                    <label >Select Voucher Type</label>
                                                    <select name="voucher_type" class="form-control" onchange="checkForHostOrDrive(this);">
                                                        <option value="">--option--</option>
                                                        <option value="host">Host</option>
                                                        <option value="drive">Drive</option>
                                                        <option value="both">Host & Drive</option>
                                                    </select>
                                                </div>

                                                <div class="form-group host-select" style="display: none">
                                                    <label >Select Host Period</label>
                                                    <select name="host_period" class="form-control">
                                                        <option value="">--option--</option>
                                                        <option value="3">3 Year</option>
                                                        <option value="5">5 Year</option>
                                                    </select>
                                                </div>

                                                <div class="form-group drive-select" style="display: none">
                                                    <label >Select Storage Capacity</label>
                                                    <select name="storage_capacity" class="form-control">
                                                        <option value="">--option--</option>
                                                        <option value="100000000">100 GB</option>
                                                        <option value="250000000">250 GB</option>
                                                        <option value="1000000000">1000 GB (1 TB)</option>
                                                    </select>
                                                </div>
                                                <div class="form-group voucher-number" style="display: none">
                                                    <label >Number of vouchers to generate</label>
                                                    <input type="number" name="voucher_number" min="1" max="100" class="form-control">
                                                </div>

                                                <button type="button" class="btn btn-dark btn-block" onclick="generateVoucher(this);"><strong>Generate</strong></button>
                                            </form>
                                        </div><!-- end col -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                            </div>
                        </div>
                        
                    </div> 
                    <!-- end container-fluid -->
                </div> 
                <!-- end content -->

                @include('admin.layouts.footer')
            </div>
        </div>

        @include('admin.scripts.index')
        @include('admin.scripts.datatable-js')
        
    </body>
<html>