@if(isset($error))
    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i>
        {{ $error }}
        <button type="button" class="close" data-dismiss="alert">×</button>
    </div>
@endif

@if(isset($info))
    <div class="alert alert-info"><i class="fa fa-exclamation-triangle"></i>
        {{ $info }}
        <button type="button" class="close" data-dismiss="alert">×</button>
    </div>
@endif

@if(isset($warning))
    <div class="alert alert-warning w-100"><i class="fa fa-info-circle"></i>
        {{ $info }}
        <button type="button" class="close" data-dismiss="alert">×</button>
    </div>
@endif
