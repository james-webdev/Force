<div class="flex flex-row text-white px-10">
    <div class="flex-1">
        &copy; 2020 - {{now()->format('Y')}} <a href="{{config('force.owner_website')}}" 
        title="Visit {{config('force.owner')}}'s website "target="_blank">{{config('force.owner')}}</a> 
    </div>
    <div class="flex-1">

    </div>
    <div class="flex-1">

    @if(config('app.env')=='local' or config('app.env')=='staging')
        <div class="float-right" style="color:grey">
            {{ucwords(App::environment())}} | 
            {{ucwords(exec('git describe --tags'))}} |
            {{ ucwords(exec('git rev-parse --abbrev-ref HEAD'))}} |
            {{ phpversion() }}
        </div>
    @endif
    </div>
</div>