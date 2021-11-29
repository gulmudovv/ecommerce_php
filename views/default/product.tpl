{* Шаблон для страницы товара *}

<div>
	   <h3>{$rsProduct['name']}</h3>
	   <img src="/images/products/nf.jpg" width="300"><br>
	   Цена: &#8381;{$rsProduct['price']}
	   
	   <a id="addCart_{$rsProduct['id']}" {if $itemInCart}class="hideme"{/if} onclick="addToCart({$rsProduct['id']}); return false;" href="#" alt="В корзину">В корзину</a>
	   <a id="removeCart_{$rsProduct['id']}" {if !$itemInCart}class="hideme"{/if} onclick="removeFromCart({$rsProduct['id']}); return false;" href="#" alt="Удалить из корзины">Удалить</a>
	   <p>Характеристики <br>{$rsProduct['description']}</p>
	   
  </div>