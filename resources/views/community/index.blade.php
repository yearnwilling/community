@extends('layout.dashboard')

@section('title', '社团管理')

@define $site = 'community';

@section('content-header')
    <h1>
        社团管理
    </h1>
@endsection

@section('content-body-boxed')
    <table class="table table-hover">
        <tbody>
        <tr>
            <th>名字</th>
        </tr>
        @foreach($communities as $community)
            <tr>
                <td>{{ $community->name }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection