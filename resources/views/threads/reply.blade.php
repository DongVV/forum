<div class="col-md-8 mt-2">
    <div class="card">
        <div class="card-header">
            <a href="#">{{$reply->owner->name}}</a>
            said {{$reply->created_at->diffForhumans()}}</div>
        <div class="card-body">{{$reply->body}}</div>
    </div>
</div>