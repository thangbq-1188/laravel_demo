@if (isset($errors) && (count($errors) > 0))
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
    {{ Form::label('title', 'Title') }} <em>*</em>
    {{ Form::text('title', null, ['class' => 'form-control', 'id' => 'title', 'required' => 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('category_id', 'Category') }} <em>*</em>
    {{ Form::select('category_id', $categoriesDropdown, null,
        ['class' => 'form-control', 'id' => 'category-id', 'required' => 'required'])}}
</div>

<div class="form-group">
    {{ Form::label('content', 'Content') }} <em>*</em>
    {{ Form::textarea('content', null, ['class' => 'form-control', 'id' => 'email']) }}
</div>

<div class="form-group">
    {{ Form::submit('Submit', ['class' => 'btn btn-success']) }}
</div>
