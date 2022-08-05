@extends('layout')

@section('title','Customer List')


@section('content')

    <table id="example" class="display" style="width:100%">
        <thead>
        <tr>
            <th>Service Plate</th>
            <th>Name Surname</th>
            <th>Requested Service</th>
            <th>Province</th>
            <th>Town</th>
            <th>Address</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($customerData as $data)
            <tr>
                <td>{{$service_plate}}</td>
                <td>{{$data->name_surname}}</td>
                <td>{{$data->requested_service}}</td>
                <td>{{$data->province}}</td>
                <td>{{$data->town}}</td>
                <td>{{$data->address}}</td>
                <td width="5"><a class="btn btn-danger" href="{{route('customer.destroy',$data->id)}}">Delete</a></td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>Plate</th>
            <th>Name Surname</th>
            <th>Requested Service</th>
            <th>Province</th>
            <th>Town</th>
            <th></th>
            <th></th>
        </tr>
        </tfoot>
    </table>

@endsection
