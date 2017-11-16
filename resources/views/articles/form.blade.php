<!--{!! Form::hidden('user_id', 1) !!} -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('body', 'Body:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('published_at', 'Published On') !!}
    {!! Form::input('date', 'published_at', $article->published_at, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('tag', 'Tags:') !!}
    {!! Form::select('tags[]',$tags, null, ['id' => 'tags', 'class' => 'form-control', 'multiple']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

@section('footer')
    <script>
        $('#tags').select2({
            placeholder: 'Choose a tag',
            tags: true
        });
    </script>

@endsection