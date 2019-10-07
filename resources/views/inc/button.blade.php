<div align = "center">
    <div class="btn-group btn-group-toggle">
        <div class="btn-lg">
        @if(auth()->user()->role == 'Admin')   
            <a class="btn btn-info text-white" href="/admin/show">Users</a>
        @endif
            <a class="btn btn-info text-white" href="/admin/club">Clubs</a>
            <a class="btn btn-info text-white" href="/admin/player">Players</a>
        </div>
    </div>
</div>