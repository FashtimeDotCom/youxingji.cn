{{if $multipage}}
<div id="pagination" class="pagination">
	{{foreach from=$multipage item=page}}
        {{if $page.1}}
            <a class="btn{{if $page.2}} {{$page.2}}{{/if}}" href="javascript:;" onclick="Controller.main('{{$page.1}}')">{{$page.0}}</a>
        {{else}}
            <button class="btn" disabled="disabled">{{$page.0}}</button>
        {{/if}}
    {{/foreach}}
</div>
{{/if}}