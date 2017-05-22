@extends('layout.dashboard')

@section('content-header')
    <h1>社团添加</h1>
@endsection

@section('content-body-boxed')
    <form id="community_add" action="{{ route('community_create') }}" method="post">
        <div class="form-group">
            <label for="name">社团名称</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="名称">
        </div>
        <div class="form-group">
            <label for="type">社团分类</label>
            <select class="form-control" id="type" name="community_type_id">
                @foreach($communityTypes as $communityType)
                    <option value="{{$communityType->id}}">{{$communityType->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="president_id">社长</label>
            <select id="users" name="president_id" placeholder="请选择社长...">
            </select>
        </div>
        {{ csrf_field() }}
        <button type="button" class="btn btn-default " data-dismiss="modal">关闭</button>
        <button type="button" data-success-url="{{route('community_index')}}" id="community_add_submit" class="btn btn-primary show-primary" value="111">保存</button>
    </form>
@endsection()


@section('page-js')
    {{--<script src="/js/app/community/add.js"></script>--}}
    <script type="text/javascript" src="{{ asset('/js/app/community/add.js') }}"></script>
@endsection