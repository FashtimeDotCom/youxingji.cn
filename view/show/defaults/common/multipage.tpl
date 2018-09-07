{{if $multipage}}
<div class="pages clearfix">
	<ul>
    {{foreach from=$multipage item=page}}
        {{if $page.1}}
            <li><a {{if $page.2}}class="{{$page.2}}"{{/if}} href="{{$page.1}}">{{$page.0}}</a></li>
        {{else}}
            <li>{{$page.0}}</li>
        {{/if}}
    {{/foreach}}
    </ul>
</div>
{{/if}}