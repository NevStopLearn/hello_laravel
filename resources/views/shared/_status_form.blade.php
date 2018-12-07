<form action="{{ route('statuses.store') }}" method="POST">
    @include('shared._errors')
    @include('vendor.ueditor.assets')
    {{ csrf_field() }}
    <!-- 编辑器容器 -->
    <script id="container" name="content" style="height: 200px" type="text/plain"></script>
    <button type="submit" class="btn btn-primary pull-right">发布</button>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container',{
            toolbars: [
                ['fontsize', 'bold', 'italic', 'underline', 'strikethrough', 'blockquote', 'insertunorderedlist', 'insertorderedlist', 'justifyleft','justifycenter', 'justifyright',  'link', 'insertimage', 'fullscreen']
            ],
            elementPathEnabled: false,
            enableContextMenu: false,
            autoClearEmptyNode:true,
            wordCount:false,
            imagePopup:false,
            autotypeset:{ indent: true,imageBlockLine: 'center' }
        });
        ue.ready(function() {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
        });
    </script>
</form>