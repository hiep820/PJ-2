    @extends('layout.app')
    @section('content')
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title"><b>DASHBOARD</b></h4>
                                <p class="category">Management</p>
                            </div>

                            <div class="content">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    {{-- <tr>
                                                        <th >
                                                            ID GIÁO VỤ
                                                        </th>
                                                        <th>TÊN GIÁO VỤ</td>
                                                        <th class="text-right">
                                                            USERNAME
                                                        </th>
                                                        <th class="text-right">
                                                            PASSWORD
                                                        </th>
                                                        <th class="text-right">GIỚI TÍNH</th>
                                                        <th class="text-right">SỐ ĐIỆN THOẠI</th>
                                                        <th></th>
                                                    </tr> --}}
                                                    <tr>
                                                        <td>
                                                            <div class="flag">
                                                                <img src="{{ asset('assets') }}/img/flags/US.png"
                                                            </div>
                                                        </td>
                                                        <td>USA</td>
                                                        <td class="text-right">
                                                            2.920
                                                        </td>
                                                        <td class="text-right">
                                                            53.23%
                                                        </td>
                                                    
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="flag">
                                                                <img src="{{ asset('assets') }}/img/flags/DE.png"
                                                            </div>
                                                        </td>
                                                        <td>Germany</td>
                                                        <td class="text-right">
                                                            1.300
                                                        </td>
                                                        <td class="text-right">
                                                            20.43%
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="flag">
                                                                <img src="{{ asset('assets') }}/img/flags/AU.png"
                                                            </div>
                                                        </td>
                                                        <td>Australia</td>
                                                        <td class="text-right">
                                                            760
                                                        </td>
                                                        <td class="text-right">
                                                            10.35%
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="flag">
                                                                <img src="{{ asset('assets') }}/img/flags/GB.png"
                                                            </div>
                                                        </td>
                                                        <td>United Kingdom</td>
                                                        <td class="text-right">
                                                            690
                                                        </td>
                                                        <td class="text-right">
                                                            7.87%
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="flag">
                                                                <img src="{{ asset('assets') }}/img/flags/RO.png"
                                                            </div>
                                                        </td>
                                                        <td>Romania</td>
                                                        <td class="text-right">
                                                            600
                                                        </td>
                                                        <td class="text-right">
                                                            5.94%
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="flag">
                                                                <img src="{{ asset('assets') }}/img/flags/BR.png"
                                                            </div>
                                                        </td>
                                                        <td>Brasil</td>
                                                        <td class="text-right">
                                                            550
                                                        </td>
                                                        <td class="text-right">
                                                            4.34%
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    {{-- <div class="col-md-6 col-md-offset-1">
                                        <div id="worldMap" style="height: 300px;"></div>
                                    </div> --}}

                                    <div class="col-md-7">
                                        
                                    </div>
                                </div>
                            </div>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
 @endsection

