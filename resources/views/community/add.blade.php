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
        {{--<div class="form-group">--}}
            {{--<label for="type">Select</label>--}}
            {{--<select class="form-control" id="type" >--}}
                {{--<option value="1">option 1</option>--}}
                {{--<option value="2">option 2</option>--}}
                {{--<option value="3">option 3</option>--}}
                {{--<option value="4">option 4</option>--}}
                {{--<option value="5">option 5</option>--}}
            {{--</select>--}}
        {{--</div>--}}

    </form>


@endsection()

@section('modal_footer')
    <button type="button" class="btn btn-default " data-dismiss="modal">关闭</button>
    <button type="button" id="community_add_submit" class="btn btn-primary show-primary" value="111">保存</button>
@endsection

@section('modal_js')
    <script src="/js/add.js"></script>
@endsection