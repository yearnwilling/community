<div class="modal-dialog @yield('modal_class', '')">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">@yield('modal_title')</h4>
        </div>
        <div class="modal-body">@yield('modal_body')</div>
        @if ( !((isset($hiddenFooter) ? $hiddenFooter: false) && $hiddenFooter) )
        <div class="modal-footer">@yield('modal_footer')</div>
        @endif
        @yield('modal_js')
    </div>
</div>
