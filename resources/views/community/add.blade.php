@extends('base-modal')

@section('modal_title')
    添加社团
@endsection

@section('modal_body')
    {{--<from id="community_add" action="" method="post">--}}
        {{--<div class="form-group">--}}
            {{--<label for="name">社团名称</label>--}}
            {{--<input type="email" class="form-control" id="name" placeholder="名称">--}}
        {{--</div>--}}
    {{--</from>--}}

@endsection()

@section('modal_footer')
    <button type="button" class="btn btn-default " data-dismiss="modal">关闭</button>
    <button type="button" id="community_submit" class="btn btn-primary show-primary" value="111">保存</button>
@endsection

@section('modal_js')
    <script src="/js/community/add.js"></script>
@endsection