<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заголовок страницы</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://widget.cloudpayments.ru/bundles/cloudpayments.js"></script>
    <script>
        this.pay = function () {
           var widget = new cp.CloudPayments();
           var data = { //данные дарителя
               name: $('#name').val(),
               lastName: $('#lastName').val(),
               phone: $('#phone').val()
            };
           var auto = $('#checkbox').is(':checked'); //проверка
           if (auto) { //включаем подписку
               data.CloudPayments = {
                   recurrent: { interval: 'Month', period: 1 } //один раз в месяц начиная со следующего месяца
                }
            }
            var amount = parseFloat($('#amount').val());
            var accountId = $('#email').val();
            widget.charge({ // options
               publicId: 'pk_49fe0d72e4f3be47320ec9f6332ab', //id из личного кабинета
               description: 'Пожертвование в БФ "За все хорошее против всего плохого', //назначение
               amount: amount, //сумма
               currency: 'RUB', //валюта
               accountId: accountId, //идентификатор плательщика (обязательно для создания подписки)
               email: accountId,
               data: data
            },
            function (options) { // success
                  //действие при успешной оплате
            },
            function (reason, options) { // fail
                  //действие при неуспешной оплате
            });
        };
        
        window.onload = function() {
           document.getElementById('payButton').onclick = pay
        };
        
    </script>
  </head>
  <body>
    <header>
      <h1>Благотворительный Фонд</h1>
      <h1>"За все хорошее против всего плохого"</h1>
      <p>Который создан в рамках тестового задания</p>
    </header>
    <main>
      <article>
        <section>
          <h2>Маленьких добрых дел не бывает</h2>
              <div class="container">
                 <h3>Форма для сбора данных</h3>
                 <form id="dataForm">
                     <label for="name">Имя:</label>
                     <input type="text" id="name" required />
                     
                     <label for="lastName-">Фамилия:</label>
                     <input type="text" id="lastName" required />

                     <label for="phone">Телефон:</label>
                     <input type="tel" id="phone" required />

                     <label for="amount">Сумма:</label>
                     <input type="number" id="amount" required />

                     <label for="email">Email:</label>
                     <input type="email" id="email" required />
                     
                     <label for="recurrent">Cделать платеж ежемесячным:</label>
                     <input type="checkbox" id="recurrent" />
                     
                     <button type="button" id="payButton">Пожертвовать</button>
        </form>
          
        </section>
      </article>
    </main>
  </body>
</html>
