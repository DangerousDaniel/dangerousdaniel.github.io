@foreach($posts as $post)
    <div class="card">
        <div class="card-header">{{$post->title}}</div>
        <div class="card-body">
            <p>{{$post->description}}</p>

            <p>{{$post->created_by}}</p>
        </div>
    </div>
@endforeach
