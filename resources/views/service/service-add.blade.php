@extends('layout')

@section('title','Service Add')


@section('content')

    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Service Add</h3>
                <div align="right">
                    <a href="{{route('service.index')}}" class="btn btn-warning" style="margin-left: 50px">Geri</a>
                </div>
            </div>
            <div class="box-body">
                <form action="{{route('service.store')}}" method="post" enctype="multipart/form-data"><!--dosya yükleme işlemi oludğu için multipart/form-data kullandık-->
                    @csrf
                    <div class="form-group">
                        <label>Choice Image</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="file" required name="service_file" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Serive Plate</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="text" class="form-control" name="service_plate" value="">
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
                                        <option value="{{ $value['plate'] }}">{{ $value['title'] }}</option>
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

                    <script type="text/javascript">
                        $('#provinces').on('change', function(e){
                            var plate = e.target.value;

                            $.get('/json-regencies?plate=' + plate,function(data) {
                                console.log(data);
                                $('#regencies').empty();
                                $('#regencies').append('<option value="0" disable="true" selected="true">Choice Town</option>');

                                $.each(data, function(index, regenciesObj){
                                    $('#regencies').append('<option value="'+ regenciesObj.city_id +'">'+ regenciesObj.name +'</option>');
                                })
                            });
                        });
                    </script>

                    <div class="form-group">
                        <label>Description</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <textarea class="form-control" id="editor1" name="description"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Note</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="text" class="form-control" name="note" value="">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Service Status</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select name="service_state" class="form-control" id="">
                                    <option value="1">Aktif</option>
                                    <option value="0">Pasif</option>
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
