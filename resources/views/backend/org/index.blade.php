@extends('backend/layouts.app')

@section('content')
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th class="text-center">Org Id</th>
                <th class="text-center">Org Nama</th>
                <th class="text-center">Org Kode</th>
                <th class="text-center">Org Alamat</th>
                <th class="text-center">Org Telpon</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orgs as $org)
                <tr>
                    <td>{{ $org_id }}</td>
                    <td>{{ $org_nama }}</td>
                    <td>{{ $org_kode }}</td>
                    <td>{{ $org_alamat }}</td>
                    <td>{{ $org_telpon }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection