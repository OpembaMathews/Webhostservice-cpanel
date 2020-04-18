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
                                    <div class="page-title-right">
                                        <a href="{{url('admin/generateVoucher')}}">
                                            <button type="button" class="btn btn-dark waves-effect waves-light">
                                                <strong>Generate Vouchers</strong>
                                            </button>
                                        </a>
                                    </div>
                                    <h4 class="page-title">
                                        <i class="mdi mdi-barcode-scan" style="margin: 0 10px 0 3px;"></i>Vouchers
                                    </h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Type</th>
                                                <th>Host Size</th>
                                                <th>Drive Size</th>
                                                <th>Used</th>
                                                <th>Generated</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($vouchers as $voucher)
                                            <tr>
                                                <td>{{ $voucher->id }}</td>
                                                <td>{{ $voucher->voucher}}</td>
                                                <td>{{ $voucher->type == 'host' || $voucher->type == 'drive' ? ucfirst($voucher->type) : 'Host & Drive' }}</td>
                                                <td>{{ $voucher->host_size ? $voucher->host_size.' Years' : $voucher->host_size}} </td>
                                                <td>{{ $voucher->drive_size ?(int)($voucher->drive_size/1000000).' GB' : $voucher->drive_size}} </td>
                                                <td>
                                                    @if($voucher->active == 1)
                                                        Yes
                                                    @else
                                                        No
                                                    @endif
                                                </td>
                                                <td>{{ $voucher->created_at }}</td>
                                                <td>
                                                    <a class="ui button" href="{{ url('delete/voucher').'/'.$voucher->id}}">Delete</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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