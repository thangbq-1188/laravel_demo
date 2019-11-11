<section class="newsletter">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="content">
                    <h2>SUBSCRIBE TO OUR NEWSLETTER</h2>
                    {{ Form::open(array(
                        'url'=> URL::to('subscribers'),
                        'method' => 'post',
                        'class' => 'input-group')) }}
                        {{ Form::text('email', null,
                            array('placeholder'=>'Type your E-mail address here', 'class' => 'form-control')) }}

                        <span class="input-group-btn">
                            {{ Form::submit('Subcribe Now!', array('class' => 'btn btn-subscribe')) }}
                        </span>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</section>
