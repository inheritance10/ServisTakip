@extends('layout')

@section('title','Service Send')


@section('content')

    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Service Send</h3>
                <div align="right">
                    <a href="{{route('service.index')}}" class="btn btn-warning" style="margin-left: 50px">Geri</a>
                </div>
            </div>
            <div class="box-body">
                <form action="{{route('service.update',$service->id)}}" method="post" enctype="multipart/form-data"><!--dosya yükleme işlemi oludğu için multipart/form-data kullandık-->
                    @csrf
                    @method('PUT')


                    @isset($service->service_file)
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-12">
                                    <img src="/images/service/{{$service->service_file}}" width="100px;" alt="">
                                </div>
                            </div>
                        </div>
                    @endisset


                    <div class="form-group">
                        <label>Serive Plate</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="text" class="form-control" name="service_plate" value="{{$service->service_plate}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Province</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select name="province" class="form-control" id="provinces">
                                    <option disable="true" selected="true">{{$service->province}}</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label>Town</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select name="town" class="form-control" id="regencies">
                                    <option selected="true" disabled="true">{{$service->town}}</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Customer Name</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="text" class="form-control" name="customer_name" value="">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Requested Service</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select name="requested_service" class="form-control" id="">
                                    <option disabled="true" selected="true">Hizmet Seçiniz</option>
                                    <option>Mutfak Tamiratı</option>
                                    <option>Lavabo Tamiratı</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Customer Address</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <textarea class="form-control" id="editor1" name="address"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <textarea class="form-control" id="editor1" name="description">{{$service->description}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Note</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="text" class="form-control" name="note" value="{{$service->note}}">
                            </div>
                        </div>
                    </div>



                    <div class="form-group">
                        <label>Service Status</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select name="service_state" class="form-control" id="">
                                    <option value="0">Serviste</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div align="right">
                        <button type="submit" class="btn btn-success">Send Service</button>
                    </div>
                </form>
            </div>
        </div>
    </section>






@endsection

