     {* Левый столбец *}
<div id="leftColumn">

<div id="leftMenu">
    <div class="menuCaption">Каталог:</div>
	   {foreach $rsCategories as $item}

	        <a href="/category/{$item['id']}/">{$item['name']}</a><br>
	            {if isset($item['children'])}
                    {foreach $item['children'] as $itemChild}
                        &mdash;<a href="/category/{$itemChild['id']}/">{$itemChild['name']}</a><br> 
                    {/foreach}
	            {/if}
	   {/foreach}
    </div>

 <div id="registerBox">
    <div class="menuCaption showHidden" onclick="showRegisterBox();">Регистрация</div>
    <div id="registerBoxHidden">
        email:<br>
        <input type="text" id="email" name="email" value=""><br>
        password:<br>
        <input type="password" id="pwd1" name="pwd1" value=""><br>
        password:<br>
        <input type="password" id="pwd2" name="pwd2" value=""><br>
        <input type="button" onclick="registerNewUser();" value="Sign in">

        

    </div>
     
 </div>





    <div class="menuCaption">Корзина</div>
    <a href="/cart/" title="Перейти в корзину">В корзине</a>
    <span id="cartCntItems">
        {if $cartCntItems}{$cartCntItems}{else}0{/if}
    </span>	
</div>
