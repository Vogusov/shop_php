// запрос на добавление в корзину
btn = $('.add-to-cart')

btn.click(function (e) {
  idProduct = $(this).data('id')

  $.ajax({
    type: 'POST',
    url: '/public/form.php',
    data:
      {
        ACTION: 'add',
        ID: idProduct
      },
    success: function (data) {
      if (data) {
        console.log('data: ' + data)
        alert('Товар ' + idProduct + ' добавлен в корзину')
      }
    }
  })
})


// запрос на изменение клоличества товара в корзине
btnChangeQnt = $('.change-quantity')

btnChangeQnt.click(function (e) {
  sign = $(this).val()
  console.log('sign ', sign)

  productId = $(this).closest('tr[data-id]').data('id')
  console.log('id ', productId)

  productQnt = $(this).siblings('.cart__quantity').html()
  console.log('qnt: ' + productQnt)

  $.ajax({
    type: 'POST',
    url: '/public/form.php',
    data:
      {
        ACTION: 'change',
        SIGN: sign,
        PROD_ID: productId,
        QNT: productQnt
      },
    success: function (data) {
      console.log('data: ' + data)
      console.log('Товар ' + productId + ' поменял свое колличество')

      // отключаем уменьшение кол-ва товаров, если 0, и влючаем, если > 0
      data == 0 ?
        $('.cart-table tr[data-id =' + productId + '] .change-quantity[value="-"]').attr('disabled', true)
        : $('.cart-table tr[data-id =' + productId + '] .change-quantity[value="-"]').attr('disabled', false)

      // перерисовываем ко-во товара
      $('.cart-table tr[data-id =' + productId + '] .cart__quantity').html(data)

      // перерисовываем стоимость
      cartPrice = $('.cart-table tr[data-id =' + productId + '] .cart__price').html()
      $('.cart-table tr[data-id =' + productId + '] .cart__total').html(data * cartPrice)
    }
  })
})


// запрос на удаление товара из корзины
btnDeleteProduct = $('.cart__delete')

btnDeleteProduct.click(function (e) {
  productId = $(this).closest('tr[data-id]').data('id')
  console.log('id ', productId)

  $.ajax({
    type: 'POST',
    url: '/public/form.php',
    data:
      {
        ACTION: 'delete',
        ID: productId
      },
    success: function (data) {
      if (data) {
        console.log('data: ' + data)
        alert('Товар ' + productId + ' удален из корзины')
        $('.cart-table tr[data-id =' + productId + ']').remove()
      }
    }
  })
})