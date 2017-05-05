@extends('layout.dashboard')

@section('title', '社团管理')

@define $site = 'community';

@section('page-css')
    <link rel="stylesheet" href="/css/community/community.css">
@endsection

@section('content-header')
    <h1>
        社团列表
    </h1>

@endsection

@section('content-body-boxed')
    <div class="col-md-2 custom-button">
        <button type="button" class="btn btn-block btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i>添加</button>
    </div>
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
    <div class="paginator-center">
        {{ $communities->links() }}
    </div>
@endsection