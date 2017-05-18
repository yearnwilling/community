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
        <a type="button" data-url="{{ route('community_create') }}" class="btn btn-block btn-success btn-sm" data-toggle="modal" data-target="#modal"><i class="glyphicon glyphicon-plus"></i>添加</a>
    </div>
    <table class="table table-hover">
        <tbody>
        <tr>
            <th>名字</th>
            <th>创建时间</th>
            <th width="30%">社长</th>
            <th width="20%">分类</th>
            <th width="20%">操作</th>
        </tr>
        @foreach($communities as $community)
            <tr >
                <td>{{ $community->name }}</td>
                <td>{{ $community->created_at }}</td>
                <td>{{ $community->president->name }}</td>
                <td>{{ $community->communityType->name }}</td>
                <td>
                    <a class="btn btn-default btn-sm" data-url="{{ route('community_create') }}" data-toggle="modal" data-target="#modal"><i class="fa fa-edit"></i>编辑</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="paginator-center">
        {{ $communities->links() }}
    </div>
@endsection

@section('page-js')
    <script type="text/javascript" src="/js/app/community/index.js"></script>
@endsection