@extends('layout')

@section('title','Customer Add')


@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Customer Add</h3>
                <div align="right">
                    <a href="" class="btn btn-warning" style="margin-left: 50px">Geri</a>
                </div>
            </div>
            <div class="box-body">
                <form action="{{route('customer.store')}}" method="post" enctype="multipart/form-data"><!--dosya yükleme işlemi oludğu için multipart/form-data kullandık-->
                    @csrf
                    <div class="form-group">
                        <label>Customer Name</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="text" class="form-control" name="customer_name" value="">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Choice Province</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select name="province" class="form-control" id="provinces">
                                    <option value="0" disable="true" selected="true">İl</option>
                                    @foreach ($province as $key => $value)
                                        <option>{{ $value['title'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Choice Town</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select name="town" class="form-control" id="regencies">
                                    <option value="0">Choice Town</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <textarea class="form-control" id="editor1" name="address"></textarea>
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
                        <label>Choice Service</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select name="service_id" class="form-control" id="">
                                    <option disabled="true" selected="true">Choice Service</option>
                                    @foreach($service as $data=>$value)
                                        <option value="{{$value['id']}}">{{$value['service_plate']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div align="right">
                        <button type="submit" class="btn btn-success">Ekle</button>
                    </div>
                </form>
            </div>
        </div>
    </section>


@endsection
