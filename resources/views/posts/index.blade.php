<h1>Latest Posts</h1>

<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body">
                @foreach ($posts as $post)
                    <div class="row"><br>
                        <div class="col-md-2 col-sm-3 text-center">
                            <a href="#">
                                <img src="//placehold.it/100" style="width:100px;height:100px" class="img-circle">
                            </a>
                        </div>
                        <div class="col-md-10 col-sm-9">
                            <h3>{{ $post->title }}</h3>
                            <div class="row">
                                <div class="col-xs-9">
                                    <p>{{ substr($post->body, 0, 100) . "..." }}</p>
                                    <p class="lead"><button class="btn btn-default">Read More</button></p>
                                    <ul class="list-inline">
                                        <li><a href="#">{{ $post->created_at->diffForHumans() }}</a></li>
                                        <li><a href="#"><i class="glyphicon glyphicon-comment"></i> {{ $post->comments()->count() }} Comments</a></li>
                                        <li><a href="#"><i class="glyphicon glyphicon-share"></i> Share</a></li>
                                    </ul>
                                </div>
                                <div class="col-xs-3"></div>
                            </div><br><br>
                        </div>
                    </div><!--/row-->
                    <hr>
                @endforeach

                {{ $posts->render() }}
            </div><!--/panel-body-->
        </div><!--/panel-->
    </div><!--/col-12-->
</div><!--/row-->
