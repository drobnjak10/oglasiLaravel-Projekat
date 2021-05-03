@if (Session::get('updated'))
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">
            &times;
        </a>
        <strong>Info:</strong> {{Session('updated')}}
    </div>
@endif

@if (Session::get('deleted'))
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">
            &times;
        </a>
        <strong>Info:</strong> {{Session('deleted')}}
    </div>
@endif

@if (Session::get('Success'))
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">
            &times;
        </a>
        <strong>Info:</strong> {{Session('Success')}}
    </div>
@endif


@if (Session::get('messageError'))
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">
            &times;
        </a>
        <strong>Info:</strong> {{Session('messageError')}}
    </div>
@endif
