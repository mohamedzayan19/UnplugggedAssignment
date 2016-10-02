<div class="box box-success" id = {{$id}}>

    @forelse($projects as $project)
        @include('partials.project')
        @unless($projects->last()->id == $project->id)
            <hr>
        @endunless
    @empty
        <h2>No projects to display.</h2>
    @endforelse
</div>