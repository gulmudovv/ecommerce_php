{* Страница категории *}

<h2>Товары категории - {$rsCategory['name']}</h2>

{foreach $rsProducts as $item name=products}
    <div style="float:left; padding: 0px 30px 40px 0px;">
    	<a href="/product/{$item['id']}/"><img src="/images/products/nf.jpg" width="100"/></a><br>
    	<a href="/product/{$item['id']}/">{$item['name']}</a>
    </div>
    {if $smarty.foreach.products.iteration mod 4 == 0}
        <div style="clear:both;"></div>
    {/if}
{/foreach}

{foreach $rsChildCats as $item name=childCats}
<h3><a href="/category/{$item['id']}/">{$item['name']}</a></h3>
{/foreach}
