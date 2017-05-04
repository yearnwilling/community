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
            <th>创建时间</th>
            <th>社长</th>
            <th>分类</th>
            <th>操作</th>
        </tr>
        @foreach($communities as $community)
            <tr>
                <td>{{ $community->name }}</td>
                <td>{{ $community->created_at }}</td>
                <td>{{ $community->president->name }}</td>
                <td>{{ $community->communityType->name }}</td>
                <td></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection