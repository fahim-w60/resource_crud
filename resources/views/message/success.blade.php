@if (Session::has('success'))
    <section class="content">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="alert alert-success alert-dismissible">
                    <h4><i class="icon fa fa-check"></i> Success!</h4>
                    {!! Session::get('success') !!}
                </div>
            </div>
        </div>
    </section>
@endif