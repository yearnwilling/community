@extends('base-modal')

@section('modal_title')
    添加社团
@endsection

@section('modal_body')
    <form id="community_add" action="" method="post">
        <div class="form-group">
            <label for="name">社团名称</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="名称">
        </div>
        <div class="form-group">
            <label for="type">社团分类</label>
            <select class="form-control" id="type" >
                @foreach($communityTypes as $communityType)
                    <option value="{{$communityType->id}}">{{$communityType->name}}</option>
                @endforeach
            </select>
        </div>
    </form>


@endsection()

@section('modal_footer')
    <button type="button" class="btn btn-default " data-dismiss="modal">关闭</button>
    <button type="button" id="community_add_submit" class="btn btn-primary show-primary" value="111">保存</button>
@endsection

@section('modal_js')
    <script src="/js/app/community/add.js"></script>
@endsection