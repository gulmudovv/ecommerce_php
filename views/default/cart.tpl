{* шаблон корзины *}
<h1>Корзина</h1>

{if !$rsProducts}
    В корзине пусто.


{else}
     <h2> Данные заказа </h2>
     <table>

     	<tr>
     		
     		<td>№</td>
     		<td>Название</td>
     		<td>Кол-во</td>
     		<td>Цена</td>
     		<td>Сумма</td>
     		<td>Действие</td>
     		
     	</tr>

     	{foreach $rsProducts as $item name=products}
     	<tr>
     		
     		<td>{$smarty.foreach.products.iteration}</td>
     		<td><a href="/product/{$item['id']}/">{$item['name']}</a></td>
     		<td><input id="itemCnt_{$item['id']}" type="text" name="itemCnt_{$item['id']}" value = "1" onchange="conversionPrice({$item['id']});"/></td>
     		<td>
     			<span id="itemPrice_{$item['id']}" value="{$item['price']}">
     		{$item['price']}
                </span>
     	    </td>
     		<td>
     			<span id="itemRealPrice_{$item['id']}">
     				{$item['price']}     				
     			</span>     				
     		</td>

     		<td>
     			<a id="addCart_{$item['id']}" class="hideme" title="Востановить элемент"   onclick="addToCart({$item['id']}); return false;" href="#" alt="В корзину">Востановить</a>
	   <a id="removeCart_{$item['id']}"  title="Удалить из корзины" onclick="removeFromCart({$item['id']}); return false;" href="#" alt="Удалить из корзины">Удалить</a>
     		</td>
     		
     	</tr>
     	{/foreach}
     </table> 
{/if}