<!-- 成功提示框 -->
@if(session('success'))
<div class="alert alert-success alert-dismissible">
    <button type="buttn" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <strong>成功！</strong>
    <!-- 操作成功提示 -->
</div>
@endif
@if(session('error'))
<!-- 失败提示框 -->
<div class="alert alert-danger alert-dismissible">
    <button type="buttn" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <strong>失败！</strong>
    <!-- 操作失败提示 -->
</div>
@endif

