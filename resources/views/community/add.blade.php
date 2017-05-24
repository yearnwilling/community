@extends('layout.dashboard')

@section('content-header')
    <h1>社团添加</h1>
@endsection

@section('content-body-boxed')
    <form id="community_add"
          @if ($type == 'add')
            action="{{ route('community_create') }}"
          @elseif ($type == 'edit')
            action="{{ route('community_edit', ['communityId' => $community->id]) }}"
          @endif
          method="post">
        <div class="form-group">
            <label for="name">社团名称</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="名称" value="{{ $community->name or '' }}">
        </div>
        <div class="form-group">
            <label for="type">社团分类</label>
            <select class="form-control" id="type" name="community_type_id">
                @foreach($communityTypes as $communityType)
                    <option value="{{$communityType->id}}" @if($communityType->id == (isset($community->community_type_id)? $community->community_type_id  :''))) selected @endif >{{$communityType->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="president_id">社长</label>
            <select id="users" name="president_id" placeholder="请选择社长..." value="admin">
                <option value="{{ $community->president->id  or ''}}">{{ $community->president->name  or ''}}</option>
            </select>
        </div>
        @if ($type == 'edit')
            <input type="hidden" name="_method" value="PUT">
        @endif
        {{ csrf_field() }}
        <button type="button" class="btn btn-default " data-dismiss="modal">关闭</button>
        <button type="button" data-success-url="{{route('community_index')}}" id="community_add_submit" class="btn btn-primary show-primary" value="111">保存</button>
    </form>
@endsection()


@section('page-js')
    {{--<script src="/js/app/community/add.js"></script>--}}
    <script type="text/javascript" src="{{ asset('/js/app/community/add.js') }}"></script>
@endsection