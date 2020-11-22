// запрос на добавление в корзину
btn = $('.js-add-to-cart')

btn.click(function (e) {
  productId = $(this).data('id')
  productName = $(this).data('name')
  console.log('pr name', productName)

  $.ajax({
    type: 'POST',
    url: '/public/form.php',
    data:
      {
        ACTION: 'add',
        ID: productId
      },
    success: function (data) {
      if (data) {
        console.log('data: ' + data)
        alert('Товар ' + productName + ' добавлен в корзину')
      }
    }
  })
})


// запрос на изменение клоличества товара в корзине
btnChangeQnt = $('.js-change-quantity')

btnChangeQnt.click(function (e) {
  sign = $(this).val()
  console.log('sign ', sign)

  productId = $(this).closest('tr[data-id]').data('id')
  console.log('id ', productId)

  productQnt = $(this).siblings('.js-cart-quantity').html()
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
        $('.js-cart-table tr[data-id =' + productId + '] .js-change-quantity[value="-"]').attr('disabled', true)
        : $('.js-cart-table tr[data-id =' + productId + '] .js-change-quantity[value="-"]').attr('disabled', false)

      // перерисовываем ко-во товара
      $('.js-cart-table tr[data-id =' + productId + '] .js-cart-quantity').html(data)

      // перерисовываем стоимость
      cartPrice = $('.js-cart-table tr[data-id =' + productId + '] .js-cart-price').html()
      $('.js-cart-table tr[data-id =' + productId + '] .js-cart-total').html(data * cartPrice)
    }
  })
})


// запрос на удаление товара из корзины
btnDeleteProduct = $('.js-cart-delete')

btnDeleteProduct.click(function (e) {
  productId = $(this).closest('tr[data-id]').data('id')
  console.log('id ', productId)

  productName = $(this).data('name')
  console.log('pr name', productName)

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
        alert('Товар ' + productName + ' удален из корзины')
        $('.js-cart-table tr[data-id =' + productId + ']').remove()

        emptyCartMassege = '<p>Ваша корзина пуста. Вернитесь в <a href="/public/catalog.php" style="text-decoration: underline">магазин</a> , чтобы ее пополнить.</p>'
        if ( $('#cart-table').children('tr').length = 1 ) { $('.js-cart-wrapper').html(emptyCartMassege) }
      }
    }
  })
})