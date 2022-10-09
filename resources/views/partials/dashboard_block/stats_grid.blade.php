<div class="container d-flex">
    <h3>Here are your detailed stats:</h3>
</div>
@if ($allCategoriesResults !== null)
    

<div class="container overflow-hidden p-3">
    <div class="row gy-3">
        <div data-toggle="tooltip" data-container="body" data-html="true" data-placement="top" title="{{$allCategoriesResults['Grammar']}}" class="col-6 col-style">
            <div {!! $allCategoriesResults['Grammar'] > 49 ? 'class="p-3 border bg-success"' : 'class="p-3 border bg-danger"' !!}>
                <h5>Grammar: </h5>
                <h4>{{$allCategoriesResults['Grammar'] > 49 ? 'Good' : 'Poor'}}</h4>
            </div>
        </div>
        <div data-toggle="tooltip" data-container="body" data-html="true" data-placement="top" title="{{$allCategoriesResults['Tenses']}}" class="col-6 col-style">
            <div {!! $allCategoriesResults['Tenses'] > 30 ? 'class="p-3 border bg-success"' : 'class="p-3 border bg-danger"' !!}>
                <h5>Tenses </h5>
                <h4>{{$allCategoriesResults['Tenses'] > 49 ? 'Good' : 'Poor'}}</h4></div>
        </div>
        <div data-toggle="tooltip" data-container="body" data-html="true" data-placement="top" title="{{$allCategoriesResults['Present Simple']}}" class="col-6 col-style">
            <div {!! $allCategoriesResults['Present Simple'] > 30 ? 'class="p-3 border bg-success"' : 'class="p-3 border bg-danger"' !!}>
                <h5>Present Simple: </h5>
                <h4>{{$allCategoriesResults['Present Simple'] > 49 ? 'Good' : 'Poor'}}</h4></div>
        </div>
        <div data-toggle="tooltip" data-container="body" data-html="true" data-placement="top" title="{{$allCategoriesResults['Vocabulary']}}" class="col-6 col-style">
            <div {!! $allCategoriesResults['Vocabulary'] > 30 ? 'class="p-3 border bg-success"' : 'class="p-3 border bg-danger"' !!}>
                <h5>Vocabulary: </h5>
                <h4>{{$allCategoriesResults['Vocabulary'] > 49 ? 'Good' : 'Poor'}}</h4></div>
        </div>
        <div data-toggle="tooltip" data-container="body" data-html="true" data-placement="top" title="{{$allCategoriesResults['Business']}}" class="col-6 col-style">
            <div {!! $allCategoriesResults['Business'] > 30 ? 'class="p-3 border bg-success"' : 'class="p-3 border bg-danger"' !!}>
                <h5>Business vocabulary: </h5>
                <h4>{{$allCategoriesResults['Business'] > 49 ? 'Good' : 'Poor'}}</h4></div>
        </div>
        <div data-toggle="tooltip" data-container="body" data-html="true" data-placement="top" title="{{$allCategoriesResults['Vocabulary']}}" class="col-6 col-style">
            <div {!! $allCategoriesResults['Vocabulary'] > 30 ? 'class="p-3 border bg-success"' : 'class="p-3 border bg-danger"' !!}>
                <h5>General vocabulary: </h5>
                <h4>{{$allCategoriesResults['Vocabulary'] > 49 ? 'Good' : 'Poor'}}</h4></div>
        </div>
    </div>
</div>

@else

<h1>No results as no questions answered yet!</h1>

@endif

<script>
    $('.tooltiplink').tooltip();
</script>