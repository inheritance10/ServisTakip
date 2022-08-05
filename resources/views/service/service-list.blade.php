@extends('layout')

@section('title','Service List')


@section('content')

    <script>
        /*<th>Customer Name</th>
        <th>Service Image</th>
        <th>Service Plate</th>
        <th>Service State</th>
        <th>Province</th>
        <th>Town</th>
        <th>Note</th>
        <th>Description</th>*/
    </script>


    <table id="example" class="stripe row-border order-column" style="width:100%">
        <thead>
        <tr>
            <th>Service Plate</th>
            <th>Service State</th>
            <th>Province</th>
            <th>Town</th>
            <th>Service Image</th>
            <th>Description</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($serviceData as $data)
            @if($data->service_state == 0)
                <tr style="background-color: red; color: black;">
                    <td>{{$data->service_plate}}</td>
                    <td>Serviste</td>
                    <td>{{$data->province}}</td>
                    <td>{{$data->town}}</td>
                    <td width="150px;">
                        <img src="/images/service/{{$data->service_file}}" width="100px;" alt="">
                    </td>
                    <td>{{$data->description}}</td>
                    <td width="5"><a class="btn btn-success" href="{{route('service.edit',$data->id)}}">Send Service </a></td>
                </tr>
            @else
                <tr style="background-color: green;">
                    <td>{{$data->service_plate}}</td>
                    <td>Müsait</td>
                    <td>{{$data->province}}</td>
                    <td>{{$data->town}}</td>
                    <td width="150px;">
                        <img src="/images/service/{{$data->service_file}}" width="100px;" alt="">
                    </td>
                    <td>{{$data->description}}</td>
                    <td width="5"><a class="btn btn-success" href="{{route('service.edit',$data->id)}}">Send Service </a></td>
                </tr>
            @endif
        @endforeach

        </tbody>
        <tfoot>
        <tr>
            <th>Plate</th>
            <th>State</th>
            <th>Province</th>
            <th>Town</th>
            <th>Image</th>
            <th>Description</th>
            <th></th>
        </tr>
        </tfoot>
    </table>



@endsection






