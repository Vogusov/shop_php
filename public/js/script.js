btn = $('.add-to-cart');
btn.click( function (e) {
  idProduct = $(this).data('id')



  $.ajax({
    type: 'POST',
    url: '/public/cart.php',
    data: {ID: idProduct},
    success: function(data){
      console.log(data)
      alert('Товар ' + idProduct + ' добавлен в корзину')
      // $('#gallery').html(data)
    }
  })
})
