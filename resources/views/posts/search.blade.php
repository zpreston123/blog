<form method="GET" action="/posts/search" style="padding-bottom: 40px;">
    {{ csrf_field() }}

    <div class="control has-icons-left">
        <input type="search" name="q" class="input is-medium" placeholder="Search...">
        <span class="icon is-left">
            <i class="fa fa-search"></i>
        </span>
    </div>
</form>
